
<div class = "flex-1 relative" x-data>


    <form action="{{ route('search') }}" autocomplete="off">

    <x-jet-input name="name" wire:model="search" tiye="text" class="w-full h-10 text-center" placeholder="¿Que estas buscando?" />

    <button class="absolute top-0 right-0 w-12 h-full bg-gray-500 flex item-center justify-center rounded-r-md">
        <x-search  size="35" color="red"/>
    </button>

    </form>


<div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.open }" @click.away="$wire.open = false">

        <div class="bg-white rounded-lg shadow mt-1">

            <div class="px-4 py-3 space-y-1">

                @forelse ($products as $product)

                <div class="flex">
                    <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}" alt="">

                     <a href="{{ route('products.show', $product) }}" class="ml-4 text-gray-700 ">
                       <p class="text-lg font-semibol leading-5">{{ $product->name }}</p>
                       <p>Categoria: {{ $product->subcategory->category->name}}</p>

                     </a>
                </div>

              @empty

                <p class="text-lgleading-5">
                    No existe ningún registro con los parametros especificados
                </p>

              @endforelse


            </div>

        </div>

</div>



 </div>
