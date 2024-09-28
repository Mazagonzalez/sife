<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DeleteUserLive extends Component
{
    public $user;
    public $open = false;

    public function deleteUser($userId)
    {
        DB::beginTransaction();

        User::destroy($userId);

        DB::commit();

        $this->dispatch('delete-user-susscefull');
    }

    public function showModal()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.delete-user-live');
    }
}
