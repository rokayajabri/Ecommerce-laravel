<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carts;
use Livewire\Component;
use  Illuminate\Support\Str;


class AdminEditStatusComponent extends Component
{
    public $confirmation;
    public $status_id;

    public function mount($status_id){
        $carts= Carts::find($status_id);
        $this->status_id = $carts->id;
        $this->confirmation = $carts->confirmation;
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'confirmation'=>'required',
        ]);
    }

    public function updateStatus(){
        $this->validate([
            'confirmation'=>'required',
        ]);
        $carts= Carts::find($this->status_id);
        $carts->confirmation = $this->confirmation;
        $carts->save();
        session()->flash('message','status has been updated successfuly!');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-status-component');
    }
}
