<div class="container py-8">

    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">

        <h1 class="text-lg font-semibold mb-6">
            Carro de compras
        </h1>

        <table class="table-auto w-full">

            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>


            <tbody>

                @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-28 object-cover mr-4" src="{{ $item->options->image }}" alt="">

                            <p class="font-bold">
                                {{ $item->name }}
                            </p>
                        </div>
                        </td>
                        <td>
                           <span>{{ $item->price }}</span>


                        </td>
                        <td>{{ $item->qty }}</td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>


        </table>

    </section>

</div>
