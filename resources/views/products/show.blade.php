<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">

            <div>
                <div class="flexslider">
                    <ul class="slides">

                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>



            <div>
                <h1 class="text-xl font-bold text-blue-500">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-gray-700">Marca: <a class="underline capitalize hover:text-blue-400"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="text-gray-700 ml-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-gray-600 hover:text-blue-400 underline ml-6" href="">51 Reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-gray-800 my-4">$ {{ $product->price }} Pesos</p>

                <div class=" bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-300">
                            <i class="fas fa-truck text-sm text-blue-700"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-black">Se hace envío a todo Colombia</p>
                            <p class="">Recibelo el {{ Date::now()->addDay(5)->locale('es')->format('l j F') }}
                            </p>
                        </div>
                    </div>
                </div>

                @livewire('add-cart-item', ['product' => $product])

            </div>
        </div>
    </div>

    {{-- script del slider --}}
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
