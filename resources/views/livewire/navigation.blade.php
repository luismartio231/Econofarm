

<header class="bg-blue-700 top-0 sticky z-50" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">

         <a :class="{'bg-opacity-100 text-trueGray-200' : open}"
         class="category flex flex-col items-center justify-center h-full w-20 order-last md:order-first px-6 md:px-4
         text-white cursor-pointer rounded-md"
         x-on:click="open = !open" > {{-- Aqui hay un problema esa a no se cierra aqui --}}

            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path
                {{-- :class="{ 'hidden': open, 'inline-flex': !open }" --}}
                class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

            </svg>
            <span class="hidden md:block font-semibold">Categorias</span>
        </a>


        <a href="/" class="mt-2">
            <x-jet-application-mark class="block h-9 " />
            {{-- <img src="{{asset('img/LOGO.png')}}" alt=""> --}}
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <div class="mx-6 relative hidden md:block">
            @auth


                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>



                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <i class="fas fa-user-circle text-white text-4xl cursor-pointer">

                        </i>

                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Acceder') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Registrar') }}
                        </x-jet-dropdown-link>



                    </x-slot>

                </x-jet-dropdown>


            @endauth
        </div>
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>


    </div>


    <nav id="navegation-menu"
     x-show="open"
    {{-- :class="{ 'block': open, 'hidden': !open }" --}}
        class="bg-trueGray-700 bg-opacity-25 w-full absolute  ">

        {{-- menu computadora --}}

        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">

                <ul class="bg-white ">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-blue-400 hover:text-white">
                            <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">

                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>

                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                {{-- <p class="text-blue-500">
                                    {{ $category->name }}
                                </p> --}}
                                <x-navigation-subcategories :category="$category" />
                            </div>



                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>

            </div>

        </div>

        {{-- menu mobil --}}
        <div class="bg-white h-full overflow-y-auto">


            <div class="container bg-blue-200 py-2 mb-2">
                @livewire('search')
            </div>

            <ul>
                @foreach ($categories as $category)

                <li class="text-trueGray-500 hover:bg-blue-400 hover:text-white">
                    <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">

                        <span class="flex justify-center w-9">
                            {!! $category->icon !!}
                        </span>

                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>

            <p class="text-trueGray-500 px-6 my-2">USUARIO</p>

            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-blue-400 hover:text-white">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-address-card"></i>

                    </span>

                    Perfil
                </a>

                <a href=""
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit()"
               class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-blue-400 hover:text-white">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>

                    </span>

                    Cerrar Sesion
                </a>

                <form id="logout-form" action="{{ route('logout')}}" method="POST" class="hidden">
                    @csrf
                </form>

                @else
                    <a href="{{ route('login') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-blue-400 hover:text-white">

                        <span class="flex justify-center w-9">
                            <i class="fas fa-user-circle"></i>

                        </span>

                        Iniciar Sesión
                    </a>

                    <a href="{{ route('register') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-blue-400 hover:text-white">

                        <span class="flex justify-center w-9">
                            <i class="fas fa-fingerprint"></i>

                        </span>

                        Registrate
                    </a>

            @endauth

        </div>

    </nav>






</header>


