<?php

namespace App\Livewire\Tables;

use App\Models\Table;
use Livewire\Component;

class Create extends Component
{
    public function createTable() {
        $tables = Table::latest()->first();
        
        Table::create();

        $this->dispatch('createdTable');
    }
    public function render()
    {
        return view('livewire.tables.create');
    }
}
