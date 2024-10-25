<?php

namespace App\Livewire;

use App\Models\Table;
use Livewire\Component;
use Livewire\Attributes\On;

class TotalPriceAmount extends Component
{
    public $total;

    #[On('updateTotalAmount')]
    public function render()
    {
        if(session()->has('tableSelected')) {
            $tableSelected = session('tableSelected');
    
            $products = Table::find($tableSelected)->products;
    
            $this->total = $products->reduce(function ($carry, $product) {
                return $carry + $product->pivot->price * $product->pivot->quantity;
            }, 0);    
        } else {
            $this->total = 0;
        }
        
        $this->dispatch('totalAmountChangeToTicket', $this->total);
        
        return view('livewire.total-price-amount');
    }
}
