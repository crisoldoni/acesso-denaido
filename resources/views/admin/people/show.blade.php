@extends('admin.layouts.app')

@section('title', 'Detalhes Cliente')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Detalhes Cliente') }}
    </h2>
@endsection

@section('content')
    @include('admin.people.partials.breadcrumb')
    <div class="py-1 mb-4">
    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">CPF/CNPJ</th>
                        <th scope="col" class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-white-700 text-sm font-bold dark:text-gray-300">
                    @if ($person)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $person->name }}</td>
                            <td class="px-6 py-4">{{ $person->cpfcnpj }}</td>
                            <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                                <a href="#" 
                                    title="Excluir Pessoa"
                                    x-data=""
                                    x-on:click.prevent="
                                        $dispatch('open-modal', 'confirm-person-delete');
                                        document.getElementById('person_id').value = '{{ $person->id}}';
                                    "
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <i class="fa-solid fa-trash mr-2" aria-hidden="true"></i>Excluir
                                </a>
                                <a href="{{ route('people.index') }}"
                                    title="Voltar para a lista de clientes" 
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="fa-solid fa-right-to-bracket mr-2" aria-hidden="true"></i>Voltar</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">Nenhum cliente encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="confirm-person-delete" :show="$errors->accessDelete->isNotEmpty()" focusable>
        <form action="{{ route('people.destroy', $person->id) }}" method="post" id="person-delete-form" class="p-6">
            @csrf
            @method('DELETE')
    
            {{-- Campo oculto para o ID do cliente --}}
            <input type="hidden" id="person_id" name="person_id" value="{{ $person->id }}">
    
            <h2 class="text-lg font-medium text-white dark:text-white">
                {{ __('Tem certeza de que deseja excluir o cliente') }}
                <span class="font-bold">'{{ $person->name }}'</span>?
            </h2>

            <p class="mt-2 text-sm text-white dark:text-white">
                {{ __('Ao excluir este cliente os acessos e grupos vinculados a ele também serão excluídos!') }}
            </p>
            
            <p class="mt-2 text-sm text-white dark:text-white">
                {{ __('Esta ação não pode ser desfeita!') }}
            </p>
    
            <div class="mt-6 flex justify-end gap-2">
                <a x-on:click.prevent="document.getElementById('person-delete-form').submit();"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <i class="fa-solid fa-trash mr-2" aria-hidden="true"></i>Excluir</a>
                <a x-on:click="$dispatch('close')"
                                    class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">
                <i class="fa-solid fa-x mr-2" aria-hidden="true"></i>Cancelar</a>
            </div>
        </form>
    </x-modal>
@endsection
