<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Masterlist extends Component
{
    public $add_modal = false;
    public function render()
    {
        return view('livewire.admin.masterlist');
    }
}
