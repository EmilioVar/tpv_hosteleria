<div class="grid grid-cols-4 grid-rows-5 h-full">
    <input wire:model="inputKeyboard" class="inputKeyboard col-span-full row-span-1 bg-red-200 text-5xl"></input>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-2">1</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-2">2</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-2">3</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-3">4</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-3">5</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-3">6</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-4">7</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-4">8</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-4">9</button>
    <button wire:click="clearInputKeyboard" class="col-span-1 border flex justify-center items-center text-xl font-bold row-start-5 bg-red-500 text-white">C</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-5">0</button>
    <button class="col-span-1 border btnKeyboard flex justify-center items-center text-3xl font-bold row-start-5">.</button>
    <button class="incrementKeyboard border flex justify-center items-center text-xl font-bold">cantidad</button>
    <button class="priceKeyboard border flex justify-center items-center text-xl font-bold">precio</button>
    <button class="dtoKeyboard border flex justify-center items-center text-xl font-bold">DTO</button>
    <button class="border">accion4</button>
</div>