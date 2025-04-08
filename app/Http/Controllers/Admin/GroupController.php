<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $query = Group::query()->leftJoin('people', 'groups.id_person', '=', 'people.id')
            ->select('groups.*', 'people.name as client_name'); // Adicionando alias para ordenação correta

        if ($request->filled('name')) {
            $query->where('groups.name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('client')) {
            $query->where('people.name', 'like', '%' . $request->client . '%');
        }

        $sort = $request->get('sort', 'name'); // Nome padrão
        $direction = $request->get('direction', 'asc');

        // Se tentar ordenar por "client", mudamos para "client_name" (que vem do JOIN)
        if ($sort === 'client') {
            $sort = 'client_name';
        }

        $groups = $query->orderBy($sort, $direction)->paginate(10);

        return view('admin.groups.index', compact('groups'));
    }



    public function create()
    {
        $people = Person::orderBy('name')->get(); // Busca todos os clientes cadastrados
        return view('admin.groups.create', compact('people'));
    }

    public function store(StoreGroupRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_person' => 'required|exists:people,id', // Valida se o cliente existe
        ]);
    
        Group::create($validated);
    
        return redirect()->route('groups.index')->with('success', 'Grupo criado com sucesso!');
        
        //Group::create($request->validated());

        //return redirect()
            //->route('group.index')
            //->with('success', 'Grupo criado com sucesso');
    }

    public function edit(string $id)
    {
        if (!$group = Group::find($id)) {
            return redirect()->route('groups.index')->with('message', 'Grupo não encontrado');
        }

        $people = Person::orderBy('name')->get(); // Busca todos os clientes cadastrados

        return view('admin.groups.edit', compact('group', 'people'));
    }

    public function update(UpdateGroupRequest $request, string $id)
    {
        if (!$group = Group::find($id)) {
            return back()->with('message', 'Grupo não encontrado');
        }
        $data = $request->only('name', 'id_person');
        $group->update($data);
        return redirect()
            ->route('groups.index')
            ->with('success', 'Grupo editado com sucesso');
    }

    public function show(string $id)
    {
        if (!$group = Group::find($id)) {
            return redirect()->route('groups.index')->with('message', 'Grupo não encontrado');
        }

        return view('admin.groups.show', compact('group'));
    }

    public function destroy(string $id)
    {
        // if (Gate::denies('is-admin')) {
        //     return back()->with('message', 'Você não é um administrador');
        // }
        if (!$group = Group::find($id)) {
            return redirect()->route('groups.index')->with('message', 'Grupo não encontrado');
        }
        $group->delete();

        return redirect()
            ->route('groups.index')
            ->with('success', 'Grupo deletado com sucesso');
    }
}
