@extends('admin.layouts.app')

@section('title', 'Listagem dos Grupos')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Grupos') }}
    </h2>
@endsection

@section('content')
    @include('admin.groups.partials.breadcrumb')
    <div class="py-1 mb-4">
        <a href="{{ route('groups.create') }}"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <i class="fa-solid fa-plus" aria-hidden="true"></i> Cadastrar
        </a>
    </div>

    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        @php
                            $sortField = request('sort', 'name');
                            $sortDirection = request('direction', 'asc');
                            $toggleDirection = ($sortDirection === 'asc') ? 'desc' : 'asc';
                        @endphp
                
                        <th scope="col" class="px-6 py-4">
                            <a href="{{ route('groups.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => $sortField === 'name' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Nome
                                @if ($sortField === 'name')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('groups.index') }}">
                                <input type="text" name="name" value="{{ request('name') }}"
                                    placeholder="Pesquisar Nome"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">
                            <a href="{{ route('groups.index', array_merge(request()->query(), ['sort' => 'client', 'direction' => $sortField === 'client' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Cliente
                                @if ($sortField === 'client')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('groups.index') }}">
                                <input type="text" name="client" value="{{ request('client') }}"
                                    placeholder="Pesquisar Cliente"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                
                <tbody class="text-white-700 text-sm font-bold dark:text-gray-300">
                    @forelse ($groups as $group)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $group->name }}</td>
                            <td class="px-6 py-4">{{ $group->person->name ?? 'Pessoa não vinculada' }}</td>
                            <td class="px-6 py-4 flex justify-center">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('groups.edit', $group->id) }}" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                    <i class="fa-solid fa-pen-to-square mr-2" aria-hidden="true"></i> Editar</a>
                                    <a href="{{ route('groups.show', $group->id) }}"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-address-card mr-2" aria-hidden="true"></i> Detalhes</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100">Nenhum grupo cadastrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>    
    </div>

    <div class="py-4">
        <div class="flex justify-center">
            {{ $groups->appends(request()->query())->links() }}
        </div>    
    </div>
@endsection
