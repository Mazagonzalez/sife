<div>
    <div class="w-full h-full gap-3 p-8 border border-gray-300 rounded-3xl col">
        <p class="text-xl font-semibold text-center">Crear Usuario</p>

        <div class="col">
            <span class="text-sm font-light">Nombre</span>
            <input wire:model='name' type="text" class="h-[40px] rounded-md" >
            @error('name')
                <span class="err">{{ $message }}</span>
            @enderror
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

        <button wire:click='createUser' class="w-full py-2 text-white bg-blue-500 rounded-md">
            Crear Usuario
        </button>
    </div>
</div>
