<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class LinkDelete extends Component
{
    public $isOpen = false;

    public $link = null;

    protected $listeners = ['toggleDeleteModal' => 'toggle'];

    public function toggle($id = null)
    {
        $this->isOpen = !$this->isOpen;
        if ($id != null) {
            $this->link = Auth::user()->links()->findOrFail($id);
        } else {
            $this->link = null;
        }
    }

    public function delete()
    {
        if ($this->link != null) {
            $this->link->delete();
            $this->emit('refresh');
        }
        $this->toggle();
    }

    public function render()
    {
        return view('livewire.link-delete');
    }
}
