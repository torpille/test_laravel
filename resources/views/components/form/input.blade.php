@props(['name'])
<x-form._field>
    <x-form._label name={{$name}} />
    <input class="border border-gray-300 p-2 w-full"
           name="{{$name}}"
           id="{{$name}}"
           required
           {{$attributes(['value'=>old($name)])}}
    >
    <x-form._error name=$name />
</x-form._field>
