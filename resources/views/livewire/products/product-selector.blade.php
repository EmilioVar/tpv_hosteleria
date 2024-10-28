<div class="p-3">
    @forelse($products as $product)
        <button wire:click="productSelected({{ $product->id }})" class="w-20 h-20 m-1 truncate cursor-pointer bg-gray-50 border-2 border-gray-100 p-1 rounded-md shadow-md" value="{{ $product->id }}">{{ $product->name }}</button>
    @empty
    <p>sin grupos, añadelos!</p>
    @endforelse
</div>