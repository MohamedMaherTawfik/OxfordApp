<!-- Header / Navbar -->
<header class="bg-white shadow-sm z-50 relative">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            <span class="font-bold text-lg">Oxford Platform</span>
        </div>

        <!-- Navigation Links -->
        <nav
            class="hidden md:flex items-center gap-6 font-semibold text-gray-800 [&_a:hover]:text-[#79131d] [&_a]:transition">
            <a href="/">Home</a>
            @auth
                <a href="{{ route('myCourses') }}">My Courses</a>
            @endauth
            <a href="{{ route('courses.all') }}">Courses</a>

            <!-- Dropdown 1 -->
            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-[#79131d] transition">
                    Learning Fields
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="#" class="block px-4 py-2 hover:text-[#79131d] transition">Science</a>
                    <a href="#" class="block px-4 py-2 hover:text-[#79131d] transition">Math</a>
                    <a href="#" class="block px-4 py-2 hover:text-[#79131d] transition">Technology</a>
                </div>
            </div>

            <!-- Dropdown 2 -->
            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-[#79131d] transition">
                    More
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('about') }}" class="block px-4 py-2 hover:text-[#79131d] transition">About</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-2 hover:text-[#79131d] transition">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Right Side: Search & Profile -->
        <div class="flex items-center gap-4">
            <!-- Company Profile -->
            <a href="{{ asset('pdf/oxforden.pdf') }}" target="_blank"
                class="px-4 py-2 text-[#ffffff] bg-[#79131d] border border-[#ffffff] rounded-md hover:text-[#79131d] transition-colors duration-200">
                Company Profile
            </a>

            <!-- User Profile -->
            @auth
                <div x-data="{ open: false }" class="relative flex items-center gap-2">
                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/placeHolder.png') }}"
                        alt="{{ Auth::user()->name ?? 'Guest' }}" class="w-8 h-8 rounded-full object-cover" />
                    <button @click="open = !open" class="text-sm text-left focus:outline-none">
                        <div class="font-bold">{{ Auth::user()->name }}</div>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-12 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-[#79131d] transition">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-[#79131d] transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541"
                            alt="User" class="w-8 h-8 rounded-full">
                        <div class="text-sm leading-tight text-right">
                            <div class="font-bold">Guest</div>
                            <div class="text-gray-500">Login / Register</div>
                        </div>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50">
                        <a href="/login" class="block px-4 py-2 text-gray-700 hover:text-[#79131d] transition">Login</a>
                        <a href="/register"
                            class="block px-4 py-2 text-gray-700 hover:text-[#79131d] transition">Register</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
