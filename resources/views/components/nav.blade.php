<nav class="bg-white shadow-md relative z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-3xl font-bold text-amber-600 font-serif tracking-wide">
                        Los Pollos Hermanos
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" 
                   class="{{ request()->is('/') ? 'text-amber-700 border-b-2 border-amber-600' : 'text-gray-800' }} 
                   hover:text-amber-600 px-3 py-2 text-lg font-medium transition duration-300">
                    Home
                </a>
                
                <a href="{{ route('menu-board.index') }}" 
                   class="{{ request()->is('menu*') ? 'text-amber-700 border-b-2 border-amber-600' : 'text-gray-800' }} 
                   hover:text-amber-600 px-3 py-2 text-lg font-medium transition duration-300">
                    Menu
                </a>
                
                <a href="{{ route('reservations.create') }}" 
                   class="{{ request()->is('reservations*') ? 'text-amber-700 border-b-2 border-amber-600' : 'text-gray-800' }} 
                   hover:text-amber-600 px-3 py-2 text-lg font-medium transition duration-300">
                    Reserveren
                </a>
                
                <a href="{{ route('home.links') }}" 
                   class="{{ request()->is('loyalty*') ? 'text-amber-700 border-b-2 border-amber-600' : 'text-gray-800' }} 
                   hover:text-amber-600 px-3 py-2 text-lg font-medium transition duration-300">
                    Links
                </a>

                <a href="{{ route('reservations.create') }}" 
                   class="ml-4 bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-full 
                   font-medium text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                    Reserveer Nu
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 
                        hover:text-amber-600 hover:bg-amber-50 focus:outline-none transition duration-300">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden absolute w-full bg-white shadow-lg" x-show="isOpen" @click.away="isOpen = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" 
               class="block px-3 py-2 rounded-md text-lg font-medium {{ request()->is('/') ? 'bg-amber-50 text-amber-700' : 'text-gray-800 hover:bg-amber-50 hover:text-amber-600' }}">
                Home
            </a>
            <a href="{{ route('menu-board.index') }}" 
               class="block px-3 py-2 rounded-md text-lg font-medium {{ request()->is('menu*') ? 'bg-amber-50 text-amber-700' : 'text-gray-800 hover:bg-amber-50 hover:text-amber-600' }}">
                Menu
            </a>
            <a href="{{ route('reservations.create') }}" 
               class="block px-3 py-2 rounded-md text-lg font-medium {{ request()->is('reservations*') ? 'bg-amber-50 text-amber-700' : 'text-gray-800 hover:bg-amber-50 hover:text-amber-600' }}">
                Reserveren
            </a>
            <a href="{{ route('home.links') }}" 
               class="block px-3 py-2 rounded-md text-lg font-medium {{ request()->is('loyalty*') ? 'bg-amber-50 text-amber-700' : 'text-gray-800 hover:bg-amber-50 hover:text-amber-600' }}">
                Links
            </a>
            <a href="{{ route('reservations.create') }}" 
               class="block w-full text-center bg-amber-600 text-white px-6 py-3 rounded-full 
               font-medium text-lg mt-2 hover:bg-amber-700 transition duration-300">
                Reserveer Nu
            </a>
        </div>
    </div>
</nav>