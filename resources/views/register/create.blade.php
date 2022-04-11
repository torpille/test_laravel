@extends('layout')
@section('content')
    <main class="max-w-lg mx-auto bg-gray-100 mt-10 rounded-xl border border-gray-300 p-5">
        <form method="POST" action="/register">
            @csrf
            <h1 class="text-xl font-bold lg:text-center">Registration</h1>
            <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="username">
                Username
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="text"
                   name="username"
                   id="username"
                   required>
            </div>

            <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="password">
                Password
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="text"
                   name="password"
                   id="password"
                   required>
            </div>

            <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="name">
                Name
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   required>
            </div>

            <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="email">
                Email
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   required>
            </div>

            <div class="m-5">
               <button type="submit"
                       class="bg-blue-400 rounded margin-5 p-2 text-white font-bold hover:bg-blue-500"
               >Submit</button>
            </div>
        </form>
    </main>
@endsection
