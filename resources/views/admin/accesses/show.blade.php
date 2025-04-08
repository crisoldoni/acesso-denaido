@extends('admin.layouts.app')

@section('title', 'Detalhes Acesso')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Detalhes Acesso') }}
    </h2>
@endsection

@section('content')
    @include('admin.accesses.partials.breadcrumb')
    <div class="py-1 mb-4">
    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nome Acesso</th>
                        <th scope="col" class="px-6 py-4">Rust ID</th>
                        <th scope="col" class="px-6 py-4">Senha</th>
                        <th scope="col" class="px-6 py-4">Cliente</th>
                        <th scope="col" class="px-6 py-4">Grupo</th>
                        <th scope="col" class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-white-700 text-sm font-bold dark:text-gray-300">
                    @if ($access)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $access->name }}</td>
                            <td class="px-6 py-4">{{ $access->rust_id }}</td>
                            <td class="px-6 py-4">{{ $access->password }}</td>
                            <td class="px-6 py-4">{{ $access->person->name ?? 'Pessoa não vinculada' }}</td>
                            <td class="px-6 py-4">{{ $access->group->name ?? 'Grupo não vinculado' }}</td>
                            <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                                <a href="#" 
                                    title="Excluir Acesso"
                                    x-data=""
                                    x-on:click.prevent="
                                        $dispatch('open-modal', 'confirm-access-delete');
                                        document.getElementById('access_id').value = '{{ $access->id }}';
                                    "
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('accesses.edit', $access->id) }}"
                                    title="Editar Acesso" 
                                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                <a href="{{ route('accesses.index') }}"
                                    title="Voltar para a lista de acessos" 
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">Nenhum acesso encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="confirm-access-delete" :show="$errors->accessDelete->isNotEmpty()" focusable>
        <form action="{{ route('accesses.destroy', $access->id) }}" method="post" id="access-delete-form" class="p-6">
            @csrf
            @method('DELETE')
    
            {{-- Campo oculto para o ID do acesso --}}
            <input type="hidden" id="access_id" name="access_id" value="{{ $access->id }}">
    
            <h2 class="text-lg font-medium text-white dark:text-white">
                {{ __('Tem certeza de que deseja excluir o acesso') }}
                <span class="font-bold">'{{ $access->name }}'</span>?
            </h2>
            
            <p class="mt-2 text-sm text-white dark:text-white">
                {{ __('Esta ação não pode ser desfeita!') }}
            </p>
    
            <div class="mt-6 flex justify-end gap-2">
                <a x-on:click.prevent="document.getElementById('access-delete-form').submit();"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <i class="fa-solid fa-trash mr-2" aria-hidden="true"></i>Excluir</a>
                <a x-on:click="$dispatch('close')"
                                    class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">
                <i class="fa-solid fa-x mr-2" aria-hidden="true"></i>Cancelar</a>
            </div>
        </form>
    </x-modal>

    <script>
        window.addEventListener('beforeunload', function() {
            sessionStorage.removeItem('access_token');
            fetch("{{ route('accesses.logoutSession', ['id' => $access->id]) }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                }
            });
        });
    </script>
@endsection
