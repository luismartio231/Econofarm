<x-app-layout>

    <div class="container py-8">
        <ul>
            @forelse($products as $product)
                <x-product-list :product="$product" />

            @empty


                <li class="bg-white rounded-lg shadow-2xl my-10">

                    <div class="p-4">

                        <p class="text-lg font-semibold text-gray-700">
                            Ningún producto coinide con esos parametros
                        </p>
                    </div>
                </li>

                <div class="flex justify-center rounded-3xl">
                    <img class="rounded-3xl" src="{{ asset("img/busca.jpg") }}" alt="">
                </div>
            @endforelse
        </ul>

        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>
