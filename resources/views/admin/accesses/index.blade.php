@extends('admin.layouts.app')

@section('title', 'Listagem dos Acessos')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Acessos') }}
    </h2>
@endsection

@section('content')
    @include('admin.accesses.partials.breadcrumb')
    <div class="py-1 mb-4">
        <a href="{{ route('accesses.create') }}"
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
                            <a href="{{ route('accesses.index', array_merge(request()->query(), ['sort' => 'name', 'direction' => $sortField === 'name' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Nome
                                @if ($sortField === 'name')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('accesses.index') }}">
                                <input type="text" name="name" value="{{ request('name') }}"
                                    placeholder="Pesquisar Nome Acesso"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">
                            <a href="{{ route('accesses.index', array_merge(request()->query(), ['sort' => 'rust_id', 'direction' => $sortField === 'rust_id' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Rust ID
                                @if ($sortField === 'rust_id')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('accesses.index') }}">
                                <input type="text" name="rust_id" value="{{ request('rust_id') }}"
                                    placeholder="Pesquisar Rust ID"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">
                            <a href="{{ route('accesses.index', array_merge(request()->query(), ['sort' => 'client', 'direction' => $sortField === 'client' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Cliente
                                @if ($sortField === 'client')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('accesses.index') }}">
                                <input type="text" name="client" value="{{ request('client') }}"
                                    placeholder="Pesquisar Cliente"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">
                            <a href="{{ route('accesses.index', array_merge(request()->query(), ['sort' => 'group', 'direction' => $sortField === 'group' ? $toggleDirection : 'asc'])) }}" class="flex items-center justify-center">
                                Grupo
                                @if ($sortField === 'group')
                                    <i class="fa-solid fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                @endif
                            </a>
                            <form method="GET" action="{{ route('accesses.index') }}">
                                <input type="text" name="group" value="{{ request('group') }}"
                                    placeholder="Pesquisar Grupo"
                                    class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </form>
                        </th>
                
                        <th scope="col" class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                
                <tbody class="text-white-700 text-sm font-bold dark:text-gray-300">
                    @forelse ($accesses as $access)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $access->name }}</td>
                            <td class="px-6 py-4">{{ $access->rust_id }}</td>
                            <td class="px-6 py-4">{{ $access->person->name ?? 'Pessoa não vinculada' }}</td>
                            <td class="px-6 py-4">{{ $access->group->name ?? 'Grupo não vinculada' }}</td>
                            <td class="px-6 py-4 flex justify-center">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('accesses.remote', $access->id) }}" 
                                        title="Acesso Remoto"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <i class="fa-solid fa-play" aria-hidden="true"></i></a>
                                    <a href="#" 
                                        title="Visualizar Detalhes"
                                        x-data=""
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-access-password');
                                            document.getElementById('access_id').value = '{{ $access->id }}';
                                        "
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100">Nenhum acesso cadastrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="py-4">
        <div class="flex justify-center">
            {{ $accesses->links() }}
        </div>
    </div>

    <x-modal name="confirm-access-password" :show="$errors->accessDetails->isNotEmpty()" focusable>
        <form method="POST" action="" id="access-validate-form" class="p-6">
            @csrf
    
            {{-- Campo oculto para o ID do acesso --}}
            <input type="hidden" id="access_id" name="access_id" value="">
    
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Digite sua senha para visualizar os detalhes do acesso') }}
            </h2>
            
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-6 block w-3/4"
                    placeholder="{{ __('Digite sua senha') }}"
                />
                <x-input-error :messages="$errors->accessDetails->get('password')" class="mt-2" />
            </div>
    
            <div class="mt-6 flex flex-col sm:flex-row gap-2 justify-end">
                <button type="submit"
                    x-on:click.prevent="
                        const accessId = document.getElementById('access_id').value;
                        const form = document.getElementById('access-validate-form');
                        form.action = `{{ url('accesses') }}/${accessId}/validate`;
                        form.submit();"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fa-solid fa-key mr-2" aria-hidden="true"></i>{{ __('Confirmar') }}
                </button>
                <button type="button"
                    x-on:click="$dispatch('close')"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <i class="fa-solid fa-x mr-2" aria-hidden="true"></i>{{ __('Cancelar') }}
                </button>
            </div>
        </form>
    </x-modal>
@endsection
