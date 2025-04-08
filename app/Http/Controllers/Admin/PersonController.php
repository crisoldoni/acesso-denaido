<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Rules\CpfCnpj;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $query = Person::query();

        // Aplicar filtros
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('cpfcnpj')) {
            $query->where('cpfcnpj', 'like', '%' . $request->cpfcnpj . '%');
        }

        // Aplicar ordenação
        $sortField = $request->query('sort', 'name'); // Padrão: name
        $sortDirection = $request->query('direction', 'asc'); // Padrão: asc

        if (in_array($sortField, ['name', 'cpfcnpj']) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortField, $sortDirection);
        }

        // Paginação mantendo filtros e ordenação
        $people = $query->paginate(10)->appends($request->query());

        return view('admin.people.index', compact('people'));
    }



    public function create()
    {
        return view('admin.people.create');
    }

    public function store(StorePersonRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpfcnpj' => ['required', 'string', 'max:18', new CpfCnpj], // Validação personalizada
        ]);

        // Remover caracteres não numéricos do CPF/CNPJ
        $validatedData['cpfcnpj'] = preg_replace('/\D/', '', $validatedData['cpfcnpj']);

        // Criar a pessoa no banco de dados
        Person::create($validatedData);

        return redirect()->route('people.index')->with('success', 'Pessoa criada com sucesso!');
    }

    public function edit(string $id)
    {
        if (!$person = Person::find($id)) {
            return redirect()->route('people.index')->with('message', 'Cliente não encontrado');
        }

        return view('admin.people.edit', compact('person'));
    }

    public function update(UpdatePersonRequest $request, string $id)
    {
        if (!$person = Person::find($id)) {
            return back()->with('message', 'Cliente não encontrado');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpfcnpj' => ['required', 'string', 'max:18', new CpfCnpj], // Validação personalizada
        ]);

        // Remover caracteres não numéricos do CPF/CNPJ
        $validatedData['cpfcnpj'] = preg_replace('/\D/', '', $validatedData['cpfcnpj']);

        $person->update($validatedData);

        return redirect()
            ->route('people.index')
            ->with('success', 'Cliente editado com sucesso');
    }

    public function show(string $id)
    {
        if (!$person = Person::find($id)) {
            return redirect()->route('people.index')->with('message', 'Cliente não encontrado');
        }

        return view('admin.people.show', compact('person'));
    }

    public function destroy(string $id)
    {
        // if (Gate::denies('is-admin')) {
        //     return back()->with('message', 'Você não é um administrador');
        // }
        if (!$person = Person::find($id)) {
            return redirect()->route('people.index')->with('message', 'Cliente não encontrado');
        }
        $person->delete();

        return redirect()
            ->route('people.index')
            ->with('success', 'Cliente deletado com sucesso');
    }
}
