<?php

namespace App\Livewire\Tables;

use App\Models\Table;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class SelectTable extends Component
{
    public $tables;

    public function mount() {
        $this->tables = Table::all();
    }

    #[On('createdTable')]
    public function createdTable() {
        $this->tables = Table::all();
    }

    public function tableSelected($tableId) 
    {
        $tables = Table::all();

        foreach($tables as $table) {
            $table->selected = 0;
            $table->save();
        }

        $table = Table::find($tableId);
        Session::put('tableSelected', $tableId);
        $table->selected = 1;
        $table->save();
        
        $this->dispatch('tableSelected');
        $this->dispatch('updateTotalAmount');
        $this->dispatch('tableSelected');
    }
    
    public function render()
    {
        return view('livewire.tables.select-table');
    }
}
