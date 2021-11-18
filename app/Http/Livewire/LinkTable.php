<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LinkTable extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;

    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'sortField',
        'sortDirection'
    ];

    protected $listeners = ['refresh'];

    public function orderBy($field)
    {
        $this->sortField = $field;
        $this->sortDirection = 'desc' == $this->sortDirection ? 'asc' : 'desc';
    }

    public function openFormModal($id = null)
    {
        $this->emit('toggleFormModal', $id);
    }

    public function openDeleteModal($id = null)
    {
        $this->emit('toggleDeleteModal', $id);
    }

    public function refresh()
    {
        $this->sortField = 'links.updated_at';
        $this->sortDirection = 'desc';
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.link-table', [
            'shortlinks' => Auth::user()->links()
            ->where('name', 'ilike', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5)
        ]);
    }
}
