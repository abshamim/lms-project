<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $selectedPermissions = [];
    public $name;

    public function render()
    {
        $permission = Permission::all();
        return view('livewire.role-create', [
            'permissions' => $permission
        ]);
    }

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'selectedPermissions' => 'required|array|min:1'
    ];

    public function formSubmit() {
        $this->validate();

        $role = Role::create([
            'name' => $this->name
        ]);

        $role->syncPermissions($this->selectedPermissions);

        flash()->addSuccess('Successfully added Role');
        return redirect()->route('role.index');
    }
}
