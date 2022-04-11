<div
    x-data="{show: true}"
    x-init="setTimeout(()=> show = false, 4000)"
    x-show="show">
    <p class="fixed bottom-10 right-8 bg-blue-500  font-bold text-white px-5 py-2 rounded-full">
        {{session('success')}}
    </p>
</div>
