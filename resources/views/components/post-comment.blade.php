@props(['comment'])

<div class="flex m-5 p-5  bg-gray-100 border border-gray-200 rounded-xl">
    <div class="rounded-xl  flex-shrink-0 space=10" >
        <img src="https://i.pravatar.cc/60?u" alt="" height=60 width=60 class="rounded-xl"/>
    </div>
    <article class="px-6">
        <h3 class="font-bold">{{$comment->author->name}}</h3>
        <p class="text-xs font-bold"><time>{{$comment->created_at->diffForHumans()}}</time></p>
        <p>{{$comment->body}}</p>
    </article>
</div>
