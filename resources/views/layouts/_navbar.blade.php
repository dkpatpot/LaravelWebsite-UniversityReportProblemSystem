<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded font-mono">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/dblogo.png') }}" alt="DBLogo" width="100" height="50">
            <span class="self-center text-3xl font-semibold whitespace-nowrap">Dogbrain666</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-6 pt-8 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                @auth
                    <li>
                        สวัสดี,{{ Auth::user()->name }} | {{ Auth::user()->email }}
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.index') current-page @endif shadow-md rounded-md border-1 border-black text-black-400" >
                            รายการปัญหาทั้งหมด
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('posts.sorted') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.sorted') current-page @endif pt-6 pb-6 pr-6 pl-6 shadow-md rounded-md border-1 border-black text-black-400">
                           รายการปัญหายอดนิยม
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('posts.create') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.create') current-page @endif pt-6 pb-6 pr-6 pl-6 shadow-md rounded-md border-1 border-black text-black-400">
                            สร้างรายการปัญหา
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('tags.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'tags.index') current-page @endif pt-6 pb-6 pr-6 pl-6 shadow-md rounded-md border-1 border-black text-black-400" >
                            หมวดหมู่
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('posts.summarize')}}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.summarize') current-page @endif pt-6 pb-6 pr-6 pl-6 shadow-md rounded-md border-1 border-black text-black-400" >
                            สรุปผล
                        </a>
                    </li>
                    
                    {{-- <li>
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf

                            <x-dropdown-link :href="route('logout')" 
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li> --}}

                    <li>
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf

                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                            this.closest('form').submit();"
                            class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline shadow-md rounded-md border-1 border-black text-black-400">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif border-double border-4  shadow-md rounded-md border-1 border-black text-black-400" >                             Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'register') current-page @endif border-double border-4  shadow-md rounded-md border-1 border-black text-black-400" >
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
