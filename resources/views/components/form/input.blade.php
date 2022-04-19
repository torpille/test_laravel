@props(['name', 'type'=>'text'])
<x-form._field>
    <x-form._label name={{$name}} />
    <input class="border border-gray-300 p-2 w-full"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           value="{{old($name)}}"
           required>
    <x-form._error name=$name />
</x-form._field>
