<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class DisplayTableSelected extends Component
{
    public $tableSelected;

    #[On('tableSelected')]
    public function updateDisplay() {
        $this->tableSelected = session('tableSelected');
        $this->render();
    }
    
    public function render()
    {
        return view('livewire.display-table-selected');
    }
}
