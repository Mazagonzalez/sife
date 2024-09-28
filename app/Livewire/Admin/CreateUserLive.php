<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateUserLive extends Component
{
    public $role;
    public $name;
    public $email;
    public $password;

    public function createUser()
    {
        $this->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ],
        [
            'role.required' => 'Seleccione un rol',
            'name.required' => 'Ingrese un nombre',
            'email.required' => 'Ingrese un usuario',
            'email.unique' => 'Este usuario ya existe',
            'password.required' => 'Ingrese una contraseña'
        ]);

        DB::beginTransaction();

        $user = User::create([
            'role' => $this->role,
            'name' => strtoupper($this->name),
            'email' => strtolower($this->email),
            'password' => $this->password
        ]);

        $user->assignRole(ucfirst(strtolower($this->role)));

        DB::commit();

        session()->flash('message', $this->role . ' creado con éxito');

        $this->reset([
            'role',
            'name',
            'email',
            'password'
        ]);
    }

    public function clear()
    {
        $this->reset([
            'role',
            'name',
            'email',
            'password'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.create-user-live');
    }
}
