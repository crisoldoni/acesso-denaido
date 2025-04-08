@extends('admin.layouts.app')

@section('title', 'Criar Novo Grupo')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Novo Grupo') }}
    </h2>
@endsection

@section('content')
    {{-- @include('admin.includes.breadcrumb') --}}
    @include('admin.groups.partials.breadcrumb')
    {{-- @include('admin.includes.errors') --}}
    <form action="{{ route('groups.store') }}" method="POST">
        @include('admin.groups.partials.form')
    </form>
@endsection
