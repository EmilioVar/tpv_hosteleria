<?php

namespace App\Livewire\Tables;

use App\Models\Table;
use Livewire\Component;

class DeleteTable extends Component
{
    public function deleteActualTable() {
        $sessionTable = session('tableSelected');

        $allProductsTable = Table::find($sessionTable)->products()->detach();
        $this->dispatch('deletedAllProductsInCurrentTable');
        $this->dispatch('updateTotalAmount');
    }
    
    public function render()
    {
        return view('livewire.tables.delete-table');
    }
}
