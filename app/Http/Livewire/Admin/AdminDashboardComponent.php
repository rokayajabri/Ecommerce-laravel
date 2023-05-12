<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carts;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    
    public function render()
    {
        $carts=Carts::get();
        return view('livewire.admin.admin-dashboard-component',['carts'=>$carts]);
    }
}
