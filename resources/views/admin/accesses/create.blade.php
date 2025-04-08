@extends('admin.layouts.app')

@section('title', 'Criar Novo Acesso')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Novo Acesso') }}
    </h2>
@endsection

@section('content')
    @include('admin.accesses.partials.breadcrumb')
    {{-- @include('admin.includes.errors') --}}
    <form action="{{ route('accesses.store') }}" method="POST">
        @include('admin.accesses.partials.form')
    </form>
@endsection
