<div class="p-3">
    @forelse($groups as $group)
        <button wire:click="loadProducts({{ $group->id }})" class="w-20 m-1 h-20 cursor-pointer bg-blue-100" value="{{ $group->id }}">{{ $group->name }}</button>
    @empty
    <p>sin grupos, añadelos!</p>
    @endforelse
</div>