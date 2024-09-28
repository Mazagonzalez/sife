<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditUserLive extends Component
{
    public $user;
    public $open;

    public $role;
    public $name;
    public $email;
    public $password;

    public function mount()
    {
        $this->role = $this->user->role;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function editUser($userId)
    {
        $this->validate([
            'role' => 'required',
            'password' => 'required'
        ],
        [
            'role.required' => 'Selecciona un rol',
            'password.required' => 'Ingresa una contraseña'
        ]);

        DB::beginTransaction();

        $user = User::find($userId);

        if($user){
            $user->update([
                'role' => $this->role,
                'name' => strtoupper($this->name),
                'email' => strtolower($this->email),
                'password' => $this->password
            ]);

            $user->syncRoles(ucfirst(strtolower($this->role)));
        }

        DB::commit();

        $this->dispatch('load-search');

        $this->reset([
            'password'
        ]);

        $this->open = false;
    }

    public function showModal()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;

        $this->reset([
            'password'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.edit-user-live');
    }
}
