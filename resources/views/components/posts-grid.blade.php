@props(['posts'])

@if ($posts->count())
    <x-main-post-card :post="$posts[0]"/>
    @if  ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
                <x-post-card
                    :post="$post"
                    class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
                />
            @endforeach
        </div>
        {{$posts->links()}}
    @endif
@else
    <p class="text-center">No posts yet</p>
@endif
