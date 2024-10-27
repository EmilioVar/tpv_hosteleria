<?php

namespace App\Livewire\Products;

use App\Models\Table;
use Livewire\Component;
use Livewire\Attributes\On;

class ListTpv extends Component
{
    public $productsTpv;
    public $quantityProduct;
    public $idProduct;

    #[On(['productSelect','tableSelected'])]
    public function updateProductsInTable()
    {
        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->dispatch('renderSelectItemInProuctsTpv');
    }

    #[On('productQuantityChangued')]
    public function productQuantityChangued($quantityProduct, $idProduct)
    {
        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $idProduct)
            ->first()
            ->pivot->update(['quantity' => $quantityProduct]);

        $this->dispatch('productQuantityIsChangedToCreateTicket');
    }

    public function productIncrement($productId)
    {
        Table::find(session('tableSelected'))->products()->where('product_id', $productId)->first()->pivot->increment('quantity');

        $p = Table::find(session('tableSelected'))->products;
        $this->productsTpv = $p;
        $this->dispatch('updateTotalAmount', products: $p);
    }

    public function productDecrement($productId)
    {
        $product = Table::find(session('tableSelected'))->products()->where('product_id', $productId)->first();

        $quantity = $product->pivot->quantity;

        if ($quantity == 1) {
            $product->tables()->detach($productId);
        } else {
            $product->pivot->decrement('quantity');
        }

        $p = Table::find(session('tableSelected'))->products;
        $this->productsTpv = $p;
        $this->dispatch('updateTotalAmount', products: $p);
    }

    public function productRemove($productId)
    {
        $product = Table::find(session('tableSelected'))->products()->where('product_id', $productId)->first();

        $product->tables()->detach($productId);

        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->dispatch('updateTotalAmount');
    }

    #[On(['productIncrementKeyboard', 'deletedAllProductsInCurrentTable'])]
    public function renderizame()
    {
        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->render();
    }

    public function render()
    {
        return view('livewire.products.list-tpv');
    }
}
