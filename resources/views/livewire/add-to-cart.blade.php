<div>
    <form wire:submit.prevent="addToCart">
        <div class="flex items-center mt-2">
            <span class="mr-2 font-semibold">Količina:</span>
            <input wire:model="quantity" type="number" min="1" max="10" value="1" class="border border-gray-300 p-2 w-16 text-center rounded">
        </div>

        <button type="submit"
            class="inline-block space-x-2 mt-2 bg-gray-700 hover:bg-gray-900 text-white font-semibold py-2 px-4 transition duration-150">
            <i class="fa-solid fa-bag-shopping"></i><span>DODAJ U KOŠARICU</span>
        </button>  
    </form>
   
</div>