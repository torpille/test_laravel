<!DOCTYPE html
    >


<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-right">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>
        <div>
        @guest
            <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase">Log in</a>
        @else
            <x-dropdown>
                <div>
            <x-slot name="trigger" >
                <button class="text-xs font-bold p-2 m-5"><p>Welcome, {{auth()->user()->name}}</p></button>
            </x-slot>
                    @admin('admin')
                        <x-dropdown-item href="/admin/posts/create" >Dashboard </x-dropdown-item>
                        <x-dropdown-item href="/admin/posts/create" :active="request()->is('/admin/posts/create')">Create a new post </x-dropdown-item>
                    @endadmin
                <x-dropdown-item href="#"
                                 x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()"
                >Log out
                </x-dropdown-item>

                    <form method="POST" action="/logout" class="hidden" id="logout-form">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </div>
            </x-dropdown>

        @endguest
        </div>

        <div class="mt-8 md:mt-0">

            <a href="#subscribe" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>


        </div>
    </nav>

    <body>@yield('content')</body>
    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 id="subscribe" class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="#" class="lg:flex text-sm">
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        <x-flash></x-flash>
    </footer>
</section>
</body>
