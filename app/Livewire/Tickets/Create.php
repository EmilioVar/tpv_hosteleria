<?php

namespace App\Livewire\Tickets;

use App\Models\Table;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\Attributes\On;

class Create extends Component
{
    public $totalTicket;
    public $table_id;
    public $type_pay = "efectivo";
    public $products = [];

    public function mount() {
        $this->products = $this->productsOnInit();
        $this->totalTicket = $this->totalOnInit();
    }

    private function productsOnInit() {
        $products = Table::find(session('tableSelected'))->products ?? [];

        return $products;
    }

    private function totalOnInit() {
        if(session()->has('tableSelected')) {
            $tableSelected = session('tableSelected');
    
            $products = Table::find($tableSelected)->products;
    
            $total = $products->reduce(function ($carry, $product) {
                return $carry + $product->pivot->price * $product->pivot->quantity;
            }, 0);    
        } else {
            $total = 0;
        }

        return $total;
    }

    protected $rules = [
        'totalTicket' => 'nullable',
        'table_id' => 'nullable',
        'type_pay' => 'nullable'
    ];

    public function submit() {
        $products = Table::find(session('tableSelected'))->products;

        $t = new Ticket();
        $t->table_id = session('tableSelected');
        $t->type_pay = $this->type_pay;
        $t->products = json_encode($products);
        $t->total_ticket = $this->totalTicket;

        $t->save();

        return to_route('tickets.show', ['ticket' => $t]);
        
    }

    #[On('totalAmountChangeToTicket')]
    public function totalAmountChangeToTicket($total) {
       $this->totalTicket = $total;
    }
    
    #[On(['tableSelected', 'updateTotalAmount', 'priceProductKeyboard', 'dtoProductKeyboard', /* 'productQuantityIsChangedToCreateTicket' */])]
    public function tableSelected($products = null) {
        if($products) {
            $p = $products;
            $t = $this->totalOnInit();
    
            $this->products = $p;
            $this->totalTicket = $t;
        } else {
            $this->products = $this->productsOnInit()->toArray();
            $this->totalTicket = $this->totalOnInit();
        }
    }
    
    public function render()
    {
        return view('livewire.tickets.create');
    }
}
