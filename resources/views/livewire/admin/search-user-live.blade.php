<div class="col-span-2">
    <div class="w-full h-full gap-3 p-8 border border-gray-300 rounded-3xl col">
        <p class="text-xl font-semibold text-center">Buscar Usuario</p>

        <div class="col">
            <span class="text-sm font-light">Buscar por usuario, nombre o rol</span>
            <input wire:model.live='search' type="text" class="h-[40px] rounded-md">
        </div>

        <div class="py-4 bg-gray-200 min-h-[250px] max-h-[250px] overflow-hidden col relative">
            <div class="h-full gap-2 overflow-x-hidden overflow-clip hover:overflow-y-auto col scrollbar">
                @forelse ($users as $user)
                    <div
                        wire:key='{{ $user->id }}'
                        class="items-center justify-between gap-2 p-3 mx-3 border border-gray-500 rounded-md row"
                    >
                        <div class="col">
                            <span>{{ $user->name }}</span>
                            <span>{{ $user->email }}</span>
                            <span>{{ $user->role }}</span>
                        </div>

                        <div class="gap-2 col">
                            @livewire('admin.delete-user-live', ['user' => $user], key($user->id . 'delete'))

                            @livewire('admin.edit-user-live', ['user' => $user], key($user->id . 'edit'))
                        </div>
                    </div>
                @empty
                    <div class="absolute-center">
                        Usuario no encontrado
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
