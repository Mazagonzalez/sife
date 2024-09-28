<div>
    @if ($user->id != 1)
        <button
            wire:click='showModal'
            class="px-4 py-2 text-white bg-yellow-500 rounded-md"
        >
            Editar
        </button>
    @else
        <button
            disabled
            class="px-4 py-2 text-white bg-gray-500 rounded-md cursor-not-allowed"
        >
            Editar
        </button>
    @endif

    <x-dialog-modal wire:model='open' maxWidth="md" >
        <x-slot name="title">Editar Usuario</x-slot>
        <x-slot name="content">
           <div class="gap-3 col">
                <div class="col">
                    <span class="text-sm font-light">Nombre</span>
                    <input wire:model='name' type="text" class="h-[40px] rounded-md" >
                </div>

                <div class="col">
                    <span class="text-sm font-light">Usuario</span>
                    <input wire:model='email' type="text" class="h-[40px] rounded-md" >
                    @error('email')
                        <span class="err">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <span class="text-sm font-light">Password</span>
                    <input wire:model='password' type="password" class="h-[40px] rounded-md" >
                    @error('password')
                        <span class="err">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <select wire:model='role'>
                        <option value="">Selecciona un rol</option>
                        <option value="client">Cliente</option>
                        <option value="provider">Proveedor</option>
                        <option value="view">Vista</option>
                    </select>
                    @error('role')
                        <span class="err">{{ $message }}</span>
                    @enderror
                </div>

                @if (session('message'))
                    <span wire:transition class="text-xs font-light text-emerald-500">{{ session('message') }}</span>
                @endif
           </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click='close' class="px-5 py-2 text-white bg-gray-500 rounded-md">
                Cancelar
            </button>

            <button wire:click='editUser({{ $user->id }})' class="px-5 py-2 text-white bg-red-500 rounded-md">
                Confirmar
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
