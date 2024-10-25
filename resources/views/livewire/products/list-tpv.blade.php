<table class="min-h-[2.75rem] w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead
        class="text-xs sticky top-0 text-gray-700 uppercase border-b-4 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Nombre
            </th>
            <th scope="col" class="px-6 py-3">
                Precio
            </th>
            <th scope="col" class="px-6 py-3">
                Cantidad
            </th>
            <th scope="col" class="px-6 py-3">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productsTpv as $productTpv)
            <tr
                class="bg-white rowItem border-b cursor-pointer dark:bg-gray-800 dark:border-gray-700 transition transtion-1000">
                <th id="{{ $productTpv->id }}" scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $productTpv->id }}
                </th>
                <td class="px-6 py-4 border-2">
                    <p type="text" class="rounded-md name" value="{{ $productTpv->name }}">{{ $productTpv->name }}
                    </p>
                </td>
                <td class="px-6 py-4 border-2">
                    <p class="priceProduct rounded-md" step="0.5" type="number"
                        value="{{ $productTpv->pivot->price ? $productTpv->pivot->price : $productTpv->price }}">
                        {{ $productTpv->pivot->price ? $productTpv->pivot->price : $productTpv->price }}</p>
                </td>
                <td class="px-6 py-4 border-2">
                    <p type="number" class="quantity rounded-md" value="{{ $productTpv->pivot->quantity }}">
                        {{ $productTpv->pivot->quantity }}</p>
                </td>
                <td class="px-6 py-4 flex flex-wrap justify-center">
                    <button wire:click="productIncrement({{ $productTpv->id }})"
                        class="border-2 border-green-500 flex items-center justify-center m-1 w-7 h-7 text-xl bg-green-200"><img
                            src="{{ asset('img/icons/plus.svg') }}" alt=""></button>
                    <button wire:click="productDecrement({{ $productTpv->id }})"
                        class="border-2 border-red-500 flex items-center justify-center m-1 w-7 h-7 text-xl bg-red-200"><img
                            src="{{ asset('img/icons/minus.svg') }}" alt=""></button>
                    <button wire:click="productRemove({{ $productTpv->id }})"
                        class="border-2 border-red-700 flex items-center justify-center m-1 w-7 h-7 text-xl bg-red-500 text-white"><img
                            src="{{ asset('img/icons/trash.svg') }}" alt=""></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
