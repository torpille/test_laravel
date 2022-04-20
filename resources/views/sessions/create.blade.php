@extends('layout')
@section('content')
    <x-card>
        <form method="POST" action="/login">
            @csrf
            <h1 class="text-xl font-bold lg:text-center">Log in</h1>
            <x-form.input name="email" type="email" autocomplete="username"/>
            <x-form.input name="password" autocomplete="current-password"/>
            <x-form.button>Submit</x-form.button>
        </form>
    </x-card>
@endsection
