<x-app-layout>

<style>
    .contenedor{

width: 800px;
margin: auto;
overflow: hidden;
}

.contenedor ul{
display: flex;
padding: 0;
width: 1500px;
animation: cambio 20s infinite;
}

.contenedor ul li{
width: 100%;
list-style: none;

}

.contenedor img{

width: 100%;
border-radius: 10px;
margin-top: 5px;
}

@keyframes cambio{

0% {margin-left: 0;}
20% {margin-left: 0;}

25% {margin-left: -100%;}
45% {margin-left: -100%;}

50% {margin-left: -200%;}
70% {margin-left: -200%;}




}
</style>

<div class="contenedor">

    <ul>

   <li id="slider1"><img src="{{ asset('img/busca.jpg')}}" alt=""></li>
   <li id="slider2"><img src="{{ asset('img/busca.jpg')}}" alt=""></li>
   <li id="slider3"><img src="{{ asset('img/busca.jpg')}}" alt=""></li>


    </ul>
   </div>

    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-15">
                <div class="flex items-center mb-2">
                <h1 class="text-lg uppercase font-semibold text-gray-700">
                    {{ $category->name }}
                </h1>
                <a href="{{route('categories.show', $category)}}" class="text-blue-500 hover:text-orange-500 hover:underline ml-2 font-semibold">Ver más</a>
                </div>

                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>


    @push('script')
        <script>



            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },

                    responsive: [
                        {
                            breakpoint: 640,
                            settings:{
                                slidesToScroll: 2,
                                slidesToShow: 2.5,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings:{
                                slidesToScroll: 3,
                                slidesToShow: 3.5,
                            }
                        }, {
                            breakpoint: 1024,
                            settings:{
                                slidesToScroll: 4,
                                slidesToShow: 4.5,
                            }
                        }, {
                            breakpoint: 1240,
                            settings:{
                                slidesToScroll: 5,
                                slidesToShow: 6,
                            }
                        }
                    ]


                });

            });
        </script>
    @endpush
</x-app-layout>
