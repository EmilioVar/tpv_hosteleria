<?php

namespace App\Livewire;

use App\Models\Table;
use Livewire\Component;
use Livewire\Attributes\On;

class Keyboard extends Component
{
    public $inputKeyboard = '';

    public function clearInputKeyboard() {
        $this->inputKeyboard = '';
    }

    #[On('eventoDesdeJS')]
    public function keyPressed($key)
    {
        $this->inputKeyboard .= $key;
    }

    #[On('incrementProductKeyboard')]
    public function incrementProductInKeyboard($productId, $quantity)
    {
        
        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['quantity' => $quantity]);

        $this->inputKeyboard = '';

        $this->dispatch('productIncrementKeyboard');
        $this->dispatch('updateTotalAmount');
    }

    #[On('priceProductKeyboard')]
    public function priceProductInKeyboard($productId, $price)
    {
        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['price' => $price]);

        $this->inputKeyboard = '';

        $this->dispatch('productIncrementKeyboard');
        $this->dispatch('updateTotalAmount', );
    }

    #[On('dtoProductKeyboard')]
    public function dtoProductInKeyboard($inputKeyboard, $productId, $originalPrice)
    {

        $discount = (trim($originalPrice) * $inputKeyboard) / 100;
        $priceWithDiscount = $originalPrice - $discount;

        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['price' => $priceWithDiscount]);

        $this->inputKeyboard = '';

        $this->dispatch('productIncrementKeyboard');
        $this->dispatch('updateTotalAmount');
    }

    public function render()
    {
        return view('livewire.keyboard');
    }
}
