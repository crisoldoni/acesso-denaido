@extends('admin.layouts.app')

@section('title', 'Criar Novo Usuário')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Novo Usuário') }}
    </h2>
@endsection

@section('content')
    @include('auth.breadcrumb')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <!-- Name -->
        <div class="mb-5">
            <x-input-label for="name" :value="__('Nome')" />
            <input id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" 
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <input id="password_confirmation" 
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 gap-2">
            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
            <x-secondary-button class="ms-4"
                type="button"
                onclick="window.location.href='{{ route('dashboard') }}'"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                {{ __('Cancelar') }}
            </x-secondary-button>
        </div>
    </form>
@endsection
