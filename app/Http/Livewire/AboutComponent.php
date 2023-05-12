<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $users=User::Latest()->take(6)->get();
        return view('livewire.about-component',['users'=>$users]);
    }
}
