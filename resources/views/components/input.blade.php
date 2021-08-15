@props(['disabled' => false])

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}> --}}

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border border-gray-300 rounded-xl focus:ring focus:ring-blue-200 focus:border-blue-600 transition duration-200'
    ]) !!}>
