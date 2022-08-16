<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">

        <x-jet-input name="name" wire:model="search" tiye="text" class="w-full h-10 text-center"
            placeholder="¿Que estas buscando?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-gray-500 flex item-center justify-center rounded-r-md">
            <x-search size="35" color="red" />
        </button>
    </form>

    <div class="absolute w-full mt-1  hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">

        <div class="bg-white rounded-lg shadow mt-1">

            <div class="px-4 py-3 space-y-2 ">

                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">

                        <img class="w-20 h-16 object-cover" src="{{ Storage::url($product->images->first()->url) }}">

                        <div class="ml-2 text-gray-700">

                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>{{ $product->subcategory->category->name }}</p>

                        </div>

                    </a>


                @empty

                    <p class="text-lg font-semibold leading-5">
                        Este producto no existe
                    </p>
                @endforelse

            </div>

        </div>

    </div>



</div>
