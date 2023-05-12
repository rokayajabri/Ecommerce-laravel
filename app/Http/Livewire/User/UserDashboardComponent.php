<?php

namespace App\Http\Livewire\User;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    public function render()
    {
        // récupérer l'utilisateur authentifié
        $user = Auth::user();

        // récupérer l'historique des commandes de l'utilisateur authentifié
        $carts = Carts::whereHas('clients.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->with('clients.user')->get();

        return view('livewire.user.user-dashboard-component',['carts'=>$carts]);
    }
}
