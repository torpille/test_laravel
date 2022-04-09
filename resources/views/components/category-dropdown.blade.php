<x-slot name="trigger">
    <button class="bg-transparent py-2 pl-3 pr-9 text-sm font-semibold inline-flex">
        {{isset($currentCategory) ? $currentCategory->name : 'Categories'}}
        <x-down-arrow class="absolute pointer-events-none"></x-down-arrow>

    </button>
</x-slot>
<x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
@foreach($categories as $category)
    <x-dropdown-item href="/?category={{$category->slug}}"
                     :active="isset($currentCategory) && $currentCategory->is($category)"
    >
        {{$category->name}}</x-dropdown-item>
@endforeach
