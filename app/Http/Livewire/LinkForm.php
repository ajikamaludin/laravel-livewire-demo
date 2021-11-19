<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Link;
use Illuminate\Support\Str;
use Livewire\Component;

class LinkForm extends Component
{
    public $isOpen = false;

    protected $listeners = ['toggleFormModal' => 'toggle'];

    public $link = null;

    public $data = [
        'id' => null,
        'name' => '',
        'link' => '',
        'code' => '',
    ];

    protected $rules = [
        'data.name' => 'required|string|max:255',
        'data.link' => 'required|url',
    ];

    public function toggle($id = null)
    {
        $this->resetForm();
        $this->isOpen = !$this->isOpen;
        if ($id != null) {
            $this->link = Auth::user()->links()->findOrFail($id);
            $this->data['id'] = $this->link->id;
            $this->data['name'] = $this->link->name;
            $this->data['link'] = $this->link->real_link;
            $this->data['code'] = $this->link->code;
        }
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->link == null) {
            $link = Auth::user()->links()->create([
                'name' => $this->data['name'],
                'code' => Link::generateCode(),
                'real_link' => $this->data['link'],
            ]);
        } else {
            $this->validate(['data.code' => 'unique:links,code,'.$this->link->id]);
            $this->link->update([
                'name' => $this->data['name'],
                'code' => $this->data['code'],
                'real_link' => $this->data['link'],
            ]);
        }

        $this->emit('refresh');
        $this->toggle();
    }

    public function resetForm()
    {
        $this->link = null;
        $this->data = [
            'id' => null,
            'name' => '',
            'link' => '',
            'code' => '',
        ];
    }

    public function render()
    {
        return view('livewire.link-form', ['data' => $this->data]);
    }
}
