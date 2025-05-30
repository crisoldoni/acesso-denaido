<x-alert />

<div class="">
    @csrf()
    <div class="mb-5">
        <input type="text" name="name" placeholder="Nome Acesso" value="{{ $access->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <input type="number" name="rust_id" placeholder="Rust ID" value="{{ $access->rust_id ?? old('rust_id') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <input type="password" name="password" placeholder="Senha"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <select name="id_person" id="id_person" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled {{ !isset($access->id_person) ? 'selected' : '' }}>Selecione um cliente</option>
            @foreach ($people as $person)
                <option value="{{ $person->id }}" {{ (isset($access->id_person) && $access->id_person == $person->id) ? 'selected' : '' }}>
                    {{ $person->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-5">
        <select name="id_group" id="id_group" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled {{ !isset($access->id_group) ? 'selected' : '' }}>Selecione um grupo</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ (isset($access->id_group) && $access->id_group == $group->id) ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        <i class="fa-solid fa-floppy-disk mr-2" aria-hidden="true"></i>
        Salvar
    </button>
    <button type="button" onclick="window.location='{{ route('accesses.index') }}'" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        <i class="fa-solid fa-x mr-2" aria-hidden="true"></i>
        Cancelar
    </button>
</div>
