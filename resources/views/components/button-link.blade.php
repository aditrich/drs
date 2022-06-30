@props([
    'color' => 'blue',
    'form' => ''
])

<button {{ $attributes->merge(["class" => "px-2 text-sm py-2 mx-auto font-medium transition
duration-500 ease-in-out transform rounded-lg 
focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 " . 
($color === 'blue' ? 'text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-300' : '') .
($color === 'red' ? 'text-red-600 bg-red-100 rounded-lg hover:bg-red-300' : '') .
($color === 'green' ? 'text-green-600 bg-green-100 rounded-lg hover:bg-green-300' : '')]) }}

>
    {{ $slot }}
</button>