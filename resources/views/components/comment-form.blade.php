<x-card>
    <form method="POST" action="/comment">
        @csrf
        <h1 class=" font-bold lg:text-center">Add comment</h1>
        <div class="m-5">
            <textarea
                   name="body"
                   id="body"
                   class="w-full p-5 focus:outline-none focus:ring"
                   cols="20"
                   rows="5"
                   required>
            </textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5 flex justify-end" >
            <button type="submit"
                    class="bg-blue-400 rounded margin-5 p-2 text-white font-bold hover:bg-blue-500"
            >Send</button>
        </div>
    </form>
</x-card>
