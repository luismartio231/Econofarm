<div class="container py-8">

    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">

        <h1 class="text-lg font-semibold mb-6">
            Carro de compras
        </h1>


        @if (Cart::count())





            <table class="table-auto w-full">

                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>


                <tbody>

                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-28 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">

                                    <p class="font-bold">
                                        {{ $item->name }}
                                    </p>
                                </div>
                            </td>
                            <td class="text-center">
                                <span>{{ $item->price }}</span>


                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>


                            </td>

                            <td class="text-center">

                                $ {{ $item->price * $item->qty }}

                            </td>

                            <td>
                                <a class="ml-6 cursor-pointer hover:text-red-600"

                                wire:click="delete('{{ $item->rowId }}')"
                                wire:loading.class="text-red-600"
                                wire:target="delete('{{ $item->rowId }}')"


                                >


                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">

                <i class="fas fa-trash"></i>
                Borrar pedidos

            </a>
        @else
            <div class="flex flex-col items-center">

                <x-cart />

                <p class="text-lg text-gray-700 mt-4">aun no tienes productos en tu carrito</p>


                <x-button-enlace href="/" class="mt-4 px-10">

                    Ir a comprar

                </x-button-enlace>

            </div>


        @endif
    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>

                        $ {{Cart::subtotal()}}
                    </p>

                </div>

                <div>

                    <x-button-enlace>
                        Ir pagar
                    </x-button-enlace>

                </div>

            </div>

        </div>
    @endif


</div>
