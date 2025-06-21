<!-- Header / Navbar -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-10 w-10">
            <span class="font-bold text-lg">Oxford Platform</span>
        </div>

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center gap-6 font-semibold text-gray-800">
            <a href="/" class="hover:text-blue-600">Home</a>
            @auth
                <a href="#" class="hover:text-blue-600">My Courses</a>
            @endauth
            <a href="" class="hover:text-blue-600">Courses</a>

            <!-- Dropdowns -->
            <div class="relative group">
                <button class="hover:text-blue-600 flex items-center gap-1">
                    Learning Fields
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Science</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Math</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Technology</a>
                </div>
            </div>

            <div class="relative group">
                <button class="hover:text-blue-600 flex items-center gap-1">
                    More
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">About</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Right Side: Search, Notification, Profile -->
        <div class="flex items-center gap-4">
            <!-- Search -->
            <button class="bg-[#79131DD0] text-white p-2 rounded-full hover:bg-[#79131d]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            <!-- company profile -->
            <a href="{{ asset('pdf/oxforden.pdf') }}" target="_blank"
                class="px-4 py-2 bg-[#79131DD0] text-white rounded-md hover:bg-[#79131d] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Company Profile
            </a>

            <!-- User Profile -->
            <!-- Add Alpine.js in your <head> or before closing </body> -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            <!-- Dropdown component -->
            @auth
                <div x-data="{ open: false }" class="relative flex items-center gap-2">
                    <!-- Static Profile Image (no JS interaction) -->
                    <img 
    src="{{ Auth::user()->photo 
        ? asset('storage/' . Auth::user()->photo) 
        : asset('images/placeHolder.png') 
    }}" 
    alt="{{ Auth::user()->name ?? 'Guest' }}" 
    class="w-8 h-8 rounded-full object-cover"
/>

                    <!-- Dropdown Toggle Button (text only) -->
                    <button @click="open = !open" class="text-sm text-left focus:outline-none">
                        <div class="font-bold">{{ Auth::user()->name }}</div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-12 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541" alt="User" class="w-8 h-8 rounded-full">
                        <div class="text-sm leading-tight text-right">
                            <div class="font-bold">Guest</div>
                            <div class="text-gray-500">Login / Register</div>
                        </div>
                    </button>

                    <!-- Dropdown content -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50">
                        <a href="/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">login</a>
                        <a href="/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Register</a>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>
