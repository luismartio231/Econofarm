<div class="container py-8">

        <section class="bg-white rounded-lg shadow-lg px-3 text-gray-700">
            <h1 class="text-lg px-5 font-semibold mb-6">CARRO DE COMPRAS</h1>

            <table class="table-auto w-full">
                <thead>

                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>

                </thead>

                <tbody>

                    @foreach (Cart::content() as $item)

                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover ml-4"
                                            src="{{ $item->options->image }}"
                                            alt="">
                                    <div>
                                        <p class="font-bold ml-2">{{$item->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span> $ {{ $item->price }}</span>
                                <a class="ml-6 cursor-pointer hover:text-blue-600"
                                wire:click="delete('{{$item->rowId}}')"
                                wire:loading.class="text-blue-600 opacity-25"
                                wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                @livewire('update-cart-item', ['rowId' => $item->rowId ], key($item->rowId))
                                </div>
                            </td>
                            <td class="text-center">
                                $ {{ $item->price * $item->qty}}
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            @if (Cart::count())
            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block ml-2 my-4"
                wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar carrito de compras
            </a>

            @else

                <div class="flex flex-col items-center">
                    <x-cart />
                    <p class="text-lg text-gray-700 mt-4">TU CARRO DE COMPRA ESTÁ VACÍO</p>

                    <x-button-enlace href="/" class="my-4 px-16">
                        Ir al inicio
                    </x-button-enlace>
                </div>

            @endif

        </section>

        @if (Cart::count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">

            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        $ {{Cart::subTotal()}}
                    </p>
                </div>

                <div>
                    <x-button-enlace href="{{ route('orders.create') }}">
                        Continuar
                    </x-button-enlace>
                </div>

            </div>

        </div>

        @endif
</div>
