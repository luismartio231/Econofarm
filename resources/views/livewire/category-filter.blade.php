<div class="container">

    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-600 uppercase">{{$category->name}}</h1>
                {{-- <h2> Toda se la llevó Yurani :)</h2> --}}

            <div class="grid grid-cols-2 border border-gray-300 divide-x divide-gray-300 text-blue-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : ''}}" wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : ''}}" wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <aside>

            <h2 class="font-semibold text-center mb-2">Subcategorías</h2>
            <ul class="divide-y divide-gray-400">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-blue-400 capitalize {{ $subcategoria == $subcategory->name ? 'text-blue-600 font-semibold' : ''}}"
                        wire:click="$set('subcategoria', '{{$subcategory->name}}')"
                        >{{$subcategory->name}}</a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mb-2 mt-4">Marcas</h2>
            <ul class="divide-y divide-gray-400">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-blue-400 capitalize {{ $marca == $brand->name ? 'text-blue-600 font-semibold' : ''}}"
                        wire:click="$set('marca', '{{$brand->name}}')"
                        >{{$brand->name}}</a>
                    </li>
                @endforeach
            </ul>

            <x-jet-button class="mt-4 bg-blue-400" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>

        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')


            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                <li class="bg-white rounded-lg shadow">

                    <article>
                        <figure>

                            <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">

                        </figure>

                        <div class="py-2 px-4">
                            <h1 class="text-lg font-semibold">
                                <a href="{{route('products.show', $product)}}"> {{ Str::limit($product->name, 10) }}</a>

                            </h1>
                            

                            <p class="font-bold text-green-500">$ {{ $product->price }}</p>
                        </div>

                    </article>
                </li>
                @endforeach

            </ul>

            @else

            <ul >
                @foreach ($products as $product)
                <li class="bg-white rounded-lg shadow mb-4">
                    <article class="flex">
                        <figure>
                        <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url)}}" alt="">
                        </figure>

                        <div class="flex-1 py-4 px-6 flex flex-col">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="text-lg font-semibold text-gray-700">
                                        {{$product->name}}
                                    </h1>
                                    <p class="font-bold text-green-500">$ {{ $product->price }} Pesos</p>

                                </div>

                                <div class="flex items-center">
                                    <ul class="flex text-sm">

                                        <li>
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        </li>
                                    </ul>

                                    <span class="text-gray-700 text-sm">(41)</span>
                                </div>
                            </div>

                            <div class="mt-auto mb-6">
                                <x-danger-enlace href="{{route('products.show', $product)}}">
                                    MÁS INFORMACIÓN
                                </x-danger-enlace>
                            </div>
                        </div>

                    </article>

                </li>
                @endforeach
            </ul>

            @endif

            <div class="mt-4 ">
                <p class="text-blue-500"> {{$products->links()}}</p>

            </div>


        </div>

    </div>

</div>

