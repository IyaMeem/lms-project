<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::all();
        return view('livewire.role-index', [
            'roles' => $roles
        ]);
    }
}
