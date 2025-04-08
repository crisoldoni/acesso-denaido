@extends('admin.layouts.app')

@section('title', 'Editar o Grupo')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Editar Grupo') }}
    </h2>
@endsection

@section('content')
    @include('admin.groups.partials.breadcrumb')
    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @method('put')
        @include('admin.groups.partials.form')
    </form>
@endsection
