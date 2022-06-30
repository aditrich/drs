@props([
    'paginatedData' => false,
    'tableTitle' => false,
    'headerButton' => false
])

<section class="relative">
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full shadow-lg rounded 
  bg-white text-gray-900">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div
                        class="relative w-full px-4 max-w-full flex justify-between flex-grow">
                        <h3 class="font-semibold text-lg text-blue-700">{{ $tableTitle }}
                        </h3>
                        @if ($headerButton)
                        <div>
                            {{ $headerButton }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-y-auto">
                <table {{ $attributes->merge(['class' => 'items-center w-full bg-transparent border-collapse']) }}>
                    {{ $slot }}
                </table>
            </div>
            @if ($paginatedData)
                {{ $paginatedData->links() }}
            @endif
        </div>
    </div>
</section>