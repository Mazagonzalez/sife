@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @isset($title)
        <div class="px-6 py-4 text-lg font-semibold">
            {{ $title }}
        </div>
    @endisset

    <div class="px-6 py-4">
        <div class="text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    @isset($footer)
        <div class="flex flex-row justify-end gap-2 px-6 py-4 bg-gray-100 text-end">
            {{ $footer }}
        </div>
    @endisset
</x-modal>
