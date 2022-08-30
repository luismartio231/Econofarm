<x-app-layout>


    <div class="container py-8">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">

            <p class="text-gray-700 uppercase">
                <span class="font-semibold">
                    Numero de orden: orde-{{ $order->id }}
                </span>
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <p class="text-lg font-semibold uppercase">Envio</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recojidos en la tienda</p>
                        <p class="text-sm"> Cra 21 #35-39</p>
                    @else
                        <p class="text-sm">Los productos deben seran enviados a:</p>
                        <p class="text-sm">{{ $order->address }}</p>
                        <p>{{ $order->department->name }} - {{ $order->city->name }} - {{ $order->district->name }} </p>
                    @endif

                </div>

                <div>

                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibira el prducto: {{ $order->contact }}</p>
                    <p class="text-sm">Telefono de contacto: {{ $order->phone }}</p>

                </div>

            </div>

        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700">

            <p class="text-xl font-semibold mb-4">
                Resumen
            </p>

            <table class="table-auto w-full">

                <thead>

                    <tr>

                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">


                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">

                                    <article>
                                        <h1 class="font-bold">
                                            {{ $item->name }}
                                        </h1>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $item->price }}
                            </td>

                            <td class="text-center">
                                {{ $item->qty }}
                            </td>

                            <td class="text-center">
                                {{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach



                </tbody>

            </table>

        </div>

        <div>

        </div>


    </div>

</x-app-layout>
