@props([
    'name' => '',
    'type' => 'text',
    'icon' => false,
    'label' => '',
    'errors' => [],
])

<div class="w-full items-stretch mb-3" @if($type === 'hidden') hidden @endif>
    <label>
        {{ $label }}

        <input {{ $attributes->merge(["class" => "px-3 py-3 placeholder-gray-300 text-gray-600 relativebg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full pr-10"]) }} 
        
        @if($label !== '')
            placeholder="Enter {{ $label }} here..."
        @endif
        required autocomplete="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        />
        @if ($icon) 
            <span
            class="z-10 h-full leading-snug font-normal absolute text-center text-gray-300 bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                <i class="fas fa-user"></i>
            </span>
        @endif
    </label>

    @if (!empty($errors))
        <p class="text-red-500">{{ $errors }}</p>
    @endif
</div>