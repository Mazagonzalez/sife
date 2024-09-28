<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class SearchUserLive extends Component
{
    public $search;
    public $users = [];

    protected $listeners = ['load-search' => 'mount'];

    public function mount()
    {
        $this->updatedSearch();
    }

    public function updatedSearch()
    {
        $this->users = User::where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%')
                            ->orWhere('role', 'like', '%' . $this->search . '%')
                            ->get();
    }

    public function render()
    {
        return view('livewire.admin.search-user-live');
    }
}
