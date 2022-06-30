@props([
    'options' => false,
    'name' => '',
    'field' => '',
    'keyType' => 'id',
    'label' => '',
    'errors' => false
])

{{-- Set keyType to false for 1 dimentional arrays --}}

<div>
    <label for="{{ $name }}">
        {{-- {{ dd($options) }} --}}
        {{ $label }}
        <select {{ $attributes->merge(["class" => "px-3 py-3 placeholder-gray-300 text-gray-600 relativebg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full pr-10"]) }}
            
            name="{{ $name }}"
            >
            @if ($options)
                <option value="" selected disabled>{{ 'Select ' . $label }}</option>
                @if ($keyType)     
                    @foreach ($options as $key => $option)
                        <option value="{{ $option->$keyType }}">{{ ucwords(str_replace(['-', '_'],' ', $option->$field)) }}</option>
                    @endforeach
                @endif
                @if ($keyType === false)
                    @foreach ($options as $key => $option)
                        <option value="{{ $key }}">{{ $option }}</option>
                    @endforeach
                @endif
            @else
                <option value="" selected disabled>{{ 'Select ' . $label }}</option>
            @endif
            {{ $slot }}
        </select>
    </label>

    @if (!empty($errors))
        <p class="text-red-500">{{ $errors }}</p>
    @endif
</div>

