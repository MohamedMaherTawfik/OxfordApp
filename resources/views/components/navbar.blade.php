<header class="bg-white shadow-sm z-50 relative">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            <span class="font-bold text-lg">Oxford Platform</span>
        </div>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-6 font-semibold text-gray-800">
            <a href="/">Home</a>
            @auth
                <a href="{{ route('myCourses') }}">My Courses</a>
            @endauth
            <a href="{{ route('courses.all') }}">Courses</a>

            <!-- More dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-1">
                    More
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none group-hover:pointer-events-auto">
                    <a href="{{ route('about') }}" class="block px-4 py-2 hover:text-[#79131d]">About</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-2 hover:text-[#79131d]">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Profile -->
        <div class="flex items-center gap-4">
            <a href="{{ asset('pdf/oxforden.pdf') }}" target="_blank"
                class="px-4 py-2 text-white bg-[#79131d] rounded-md">Company Profile</a>

            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/placeHolder.png') }}"
                            class="w-8 h-8 rounded-full object-cover">
                        <span class="text-sm font-bold">{{ Auth::user()->name }}</span>
                    </button>

                    <div x-show="open" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm hover:text-[#79131d]">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm hover:text-[#79131d]">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                            class="w-8 h-8 rounded-full">
                        <div class="text-sm leading-tight">
                            <div class="font-bold">Guest</div>
                            <div class="text-gray-500">Login / Register</div>
                        </div>
                    </button>

                    <div x-show="open" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                        <a href="/login" class="block px-4 py-2 text-sm hover:text-[#79131d]">Login</a>
                        <a href="/register" class="block px-4 py-2 text-sm hover:text-[#79131d]">Register</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
