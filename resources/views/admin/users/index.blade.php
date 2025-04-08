@extends('admin.layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    @include('admin.users.partials.breadcrumb')
    <div class="py-1 mb-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Usuários
        </h2>

        <a href="{{ route('users.create') }}"
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
                        <th scope="col" class="px-6 py-4">
                            <form method="GET" action="{{ route('users.index') }}">
                                <input type="text" name="name" value="{{ request('name') }}"
                                    placeholder="Pesquisar por Nome"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                        <th scope="col" class="px-6 py-4">
                            <form method="GET" action="{{ route('users.index') }}">
                                <input type="text" name="email" value="{{ request('email') }}"
                                    placeholder="Pesquisar por E-mail"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                        <th scope="col" class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-white-700 text-sm font-bold dark:text-gray-300">
                    @forelse ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 flex justify-center">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                    <i class="fa-solid fa-pen-to-square mr-2" aria-hidden="true"></i> Editar</a>
                                    <a href="{{ route('users.show', $user->id) }}"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-address-card mr-2" aria-hidden="true"></i> Detalhes</a>
                                </div>    
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100">Nenhum usuário cadastrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>    
    </div>

    <div class="py-4">
        <div class="flex justify-center">
            {{ $users->links() }}
        </div>    
    </div>
@endsection
