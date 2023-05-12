<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminGestionClientComponent extends Component
{
    public $user_id;

    public function deleteUser(){
        $users=User::find($this->user_id);
        $users->delete();
        session()->flash('message','Client has been deleted successfully!');

    }

    public function render()
    {
        $users=User::get();
        return view('livewire.admin.admin-gestion-client-component',['users'=>$users]);
    }
}
