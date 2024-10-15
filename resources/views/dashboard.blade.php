<x-app-layout>
    <div class="max-w-5xl px-4 py-6 mx-auto lg:px-0">
        @role('Admin')
            @livewire('admin.dashboard-live')
        @endrole

        @role('View')
            @livewire('view.dashboard-live')
        @endrole

        @role('Client')
            @livewire('client.dashboard-live')
        @endrole

        @role('Buyer')
            @livewire('buyer.dashboard-live')
        @endrole

        @role('Commercial')
            @livewire('commercial.dashboard-live')
        @endrole

        @role('Provider')
            @livewire('provider.dashboard-live')
        @endrole
    </div>
</x-app-layout>
