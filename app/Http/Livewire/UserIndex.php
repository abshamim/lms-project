<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.user-index', [
            'users' => $users
        ]);
    }

    public function userDelete($id){

        // Permission check
        permission_check('user-management');

        $user = User::findOrFail($id);
        $user->delete();

        flash()->addSuccess('Successfully Deleted');
    }
}
