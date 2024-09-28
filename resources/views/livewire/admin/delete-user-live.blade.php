<div>
    @if ($user->id != 1 && $user->id != 2)
        <button
            wire:click='showModal'
            class="px-4 py-2 text-white bg-red-500 rounded-md"
        >
            Borrar
        </button>
    @else
        <button
            disabled
            class="px-4 py-2 text-white bg-gray-500 rounded-md cursor-not-allowed"
        >
            Borrar
        </button>
    @endif

    <x-dialog-modal wire:model='open' maxWidth="md" >
        <x-slot name="title">Elimar Usuario</x-slot>
        <x-slot name="content">
            Estas seguro de eliminar a <strong>{{ $user->name }}</strong>
        </x-slot>
        <x-slot name="footer">
            <button wire:click='close' class="px-5 py-2 text-white bg-gray-500 rounded-md">
                Cancelar
            </button>

            <button wire:click='deleteUser({{ $user->id }})' class="px-5 py-2 text-white bg-red-500 rounded-md">
                Confirmar
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
