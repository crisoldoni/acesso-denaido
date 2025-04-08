@extends('admin.layouts.app')

@section('title', 'Editar o Acesso')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Editar Acesso') }}
    </h2>
@endsection

@section('content')
    @include('admin.accesses.partials.breadcrumb')
    <form action="{{ route('accesses.update', $access->id) }}" method="POST">
        @method('put')
        @include('admin.accesses.partials.form')
    </form>
@endsection
