<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAccessPasswordRequest;
use App\Http\Requests\StoreAccessRequest;
use App\Http\Requests\UpdateAccessRequest;
use App\Models\Access;
use App\Models\Group;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class AccessController extends Controller
{
    public function index(Request $request)
    {
        $query = Access::query();

        // Pesquisa por campos diretos da tabela "accesses"
        foreach (['name', 'rust_id'] as $field) {
            if ($request->filled($field)) {
                $query->where($field, 'like', "%{$request->$field}%");
            }
        }

        // Pesquisa em relacionamentos (client -> person.name, group -> group.name)
        foreach (['client' => 'person', 'group' => 'group'] as $param => $relation) {
            if ($request->filled($param)) {
                $query->whereHas($relation, fn($q) => $q->where('name', 'like', "%{$request->$param}%"));
            }
        }

        // Ordenação dinâmica
        $sortField = $request->get('sort', 'name'); // Nome como padrão
        $sortDirection = $request->get('direction', 'asc'); // Ascendente como padrão

        // Definir colunas de ordenação válidas
        $sortableFields = [
            'name' => 'accesses.name',
            'rust_id' => 'accesses.rust_id',
            'client' => 'people.name',
            'group' => 'groups.name'
        ];

        if (array_key_exists($sortField, $sortableFields)) {
            // Se estiver ordenando por um relacionamento, fazer um JOIN
            if (in_array($sortField, ['client', 'group'])) {
                if ($sortField === 'client') {
                    $query->leftJoin('people', 'accesses.id_person', '=', 'people.id');
                } elseif ($sortField === 'group') {
                    $query->leftJoin('groups', 'accesses.id_group', '=', 'groups.id');
                }
            }

            // Aplicar a ordenação correta
            $query->orderBy($sortableFields[$sortField], $sortDirection);
        }

        return view('admin.accesses.index', ['accesses' => $query->select('accesses.*')->paginate(10)]);
    }



    public function create()
    {
        return view('admin.accesses.create', [
            'people' => Person::orderBy('name')->get(),
            'groups' => Group::orderBy('name')->get()
        ]);
    }


    public function store(StoreAccessRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Crypt::encryptString($validated['password']);
    
        Access::create($validated);
    
        return redirect()->route('accesses.index')->with('success', 'Acesso criado com sucesso!');
    }

    public function edit(Access $access)
    {
        return view('admin.accesses.edit', [
            'access' => $access,
            'people' => Person::orderBy('name')->get(),
            'groups' => Group::orderBy('name')->get()
        ]);
    }

    public function update(UpdateAccessRequest $request, Access $access)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Crypt::encryptString($data['password']);
        } else {
            unset($data['password']);
        }
        
        $access->update($data);
    
        return redirect()->route('accesses.index')->with('success', 'Acesso editado com sucesso');
    }
    
    public function validatePassword(ValidateAccessPasswordRequest $request, Access $access)
    {
        // Gera um novo token de sessão temporário
        $sessionToken = Str::random(40);
        
        // Armazena o token na sessão do usuário
        $request->session()->put('access_token_' . $access->id, $sessionToken);

        // Redireciona para a página de exibição passando o token via query string
        return redirect()->route('accesses.show', ['id' => $access->id, 'token' => $sessionToken]);
    }

    public function show(Request $request, string $id)
    {
        // Recupera o token enviado na URL e o token armazenado na sessão
        $providedToken = $request->query('token');
        $sessionToken = $request->session()->get('access_token_' . $id);

        // Se o token não existir ou não corresponder, negar o acesso
        if (!$sessionToken || $providedToken !== $sessionToken) {
            return redirect()->route('accesses.index')->withErrors(['password' => 'É necessário validar sua senha para acessar esta página.']);
        }

        // Busca o acesso no banco de dados
        $access = Access::find($id);
        if (!$access) {
            return redirect()->route('accesses.index')->with('message', 'Acesso não encontrado');
        }

        try {
            // Descriptografa a senha
            $access->password = Crypt::decryptString($access->password);
        } catch (\Exception $e) {
            return redirect()->route('accesses.index')->with('message', 'Erro ao descriptografar a senha.');
        }

        // Retorna a view com os detalhes do acesso
        return view('admin.accesses.show', compact('access'));
    }

    public function logoutSession(Request $request, $id)
    {
        $request->session()->forget('access_token_' . $id);
        return response()->json(['message' => 'Sessão encerrada']);
    }

    public function destroy(Access $access)
    {
        $access->delete();
        return redirect()->route('accesses.index')->with('success', 'Acesso deletado com sucesso');
    }

    public function remote(string $id)
    {
        // Busca o acesso pelo ID
        if (!$access = Access::find($id)) {
            return redirect()->route('accesses.index')->with('message', 'Acesso não encontrado');
        }

        // Monta o link de acesso ao RustDesk
        $rustId = $access->rust_id;
        try {
            $password = Crypt::decryptString($access->password); // Descriptografa a senha
        } catch (\Exception $e) {
            return redirect()->route('accesses.index')->with('message', 'Erro ao descriptografar a senha');
        }

        if (!$rustId || !$password) {
            return redirect()->route('accesses.index')->with('message', 'Informações de RustDesk incompletas');
        }

        // Redireciona para o esquema rustdesk://
        $rustDeskLink = "rustdesk://$rustId?password=$password";

        return redirect($rustDeskLink);
    }
}
