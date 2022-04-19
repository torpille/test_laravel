@props(['name'])

<x-form._field>
    <x-form._label name="{{$name}}"/>
    <textarea
        name="{{$name}}"
        id="{{$name}}"
        class="w-full p-5 focus:outline-none focus:ring  border border-gray-300"
        cols="20"
        rows="5"
        required>{{old($name)}}
            </textarea>
    <x-form._error name=$name />
</x-form._field>
