@props(['trigger'])
<div class="mpy-2" x-data="{ show: false}">
    {{--Trigger--}}
    <div @click="show = ! show">
        {{$trigger}}
    </div>

    {{--Dropdown links--}}
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 z-50 rounded-xl overflow-auto max-h-52 relative" style="display: none" @click.away="show=false">
        {{$slot}}
    </div>
</div>

