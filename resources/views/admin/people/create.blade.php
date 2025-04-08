@extends('admin.layouts.app')

@section('title', 'Criar Novo Cliente')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Novo Cliente') }}
    </h2>
@endsection

@section('content')
    @include('admin.people.partials.breadcrumb')
    {{-- @include('admin.includes.errors') --}}
    <form action="{{ route('people.store') }}" method="POST">
        @include('admin.people.partials.form')
    </form>
@endsection
