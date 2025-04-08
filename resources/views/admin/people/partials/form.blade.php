<x-alert />

<div class="">
    @csrf()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="mb-5">
        <input type="text" name="name" placeholder="Nome" value="{{ $person->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <div class="flex items-center mb-2">
            <label class=" text-white mr-2">
                <input type="radio" name="type" value="cpf" id="cpfRadio" class="mr-1" {{ isset($person) && $person->type == 'cpf' ? 'checked' : '' }}>
                CPF
            </label>
            <label class=" text-white mr-2">
                <input type="radio" name="type" value="cnpj" id="cnpjRadio" class="mr-1" {{ isset($person) && $person->type == 'cnpj' ? 'checked' : '' }}>
                CNPJ
            </label>
        </div>
        <input type="text" name="cpfcnpj" id="cpfcnpj" placeholder="CNPJ ou CPF" value="{{ $person->cpfcnpj ?? old('cpfcnpj') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            {{ isset($person) ? 'disabled' : '' }}>
        @if(isset($person))
            <input type="hidden" name="cpfcnpj" value="{{ $person->cpfcnpj }}">
        @endif
    </div>
    <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        <i class="fa-solid fa-floppy-disk mr-2" aria-hidden="true"></i>
        Salvar
    </button>
    <button type="button" onclick="window.location='{{ route('people.index') }}'" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        <i class="fa-solid fa-x mr-2" aria-hidden="true"></i>
        Cancelar
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cpfRadio = document.getElementById('cpfRadio');
        const cnpjRadio = document.getElementById('cnpjRadio');
        const cpfcnpjInput = document.getElementById('cpfcnpj');

        function applyMask() {
            if (cpfRadio.checked) {
                cpfcnpjInput.placeholder = 'CPF';
                cpfcnpjInput.value = cpfcnpjInput.value.replace(/\D/g, '').slice(0, 11);
                cpfcnpjInput.setAttribute('maxlength', '14');
                cpfcnpjInput.addEventListener('input', cpfMask);
            } else if (cnpjRadio.checked) {
                cpfcnpjInput.placeholder = 'CNPJ';
                cpfcnpjInput.value = cpfcnpjInput.value.replace(/\D/g, '').slice(0, 14);
                cpfcnpjInput.setAttribute('maxlength', '18');
                cpfcnpjInput.addEventListener('input', cnpjMask);
            }
        }

        function cpfMask(event) {
            let value = event.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            event.target.value = value;
        }

        function cnpjMask(event) {
            let value = event.target.value.replace(/\D/g, ''); // Remove tudo que não for número
            if (value.length > 2) value = value.replace(/^(\d{2})(\d)/, '$1.$2');
            if (value.length > 5) value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            if (value.length > 8) value = value.replace(/^(\d{2})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3/$4');
            if (value.length > 12) value = value.replace(/^(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})(\d)/, '$1.$2.$3/$4-$5');

            event.target.value = value;
        }


        cpfRadio.addEventListener('change', applyMask);
        cnpjRadio.addEventListener('change', applyMask);

        applyMask(); // Apply mask on page load based on the default selection
    });
</script>
