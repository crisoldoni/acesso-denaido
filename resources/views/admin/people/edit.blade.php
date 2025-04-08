@extends('admin.layouts.app')

@section('title', 'Editar o Cliente')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Editar Cliente') }}
    </h2>
@endsection

@section('content')
    @include('admin.people.partials.breadcrumb')
    <form action="{{ route('people.update', $person->id) }}" method="POST">
        @method('put')
        @include('admin.people.partials.form')
    </form>
@endsection
