<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- font awseome --}}
</head>

<body class="bg-white font-sans">

    <!-- Header -->
    <!-- Header / Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="your-logo.png" alt="Logo" class="h-10 w-10">
                <span class="font-bold text-lg">Educational</span>
            </div>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-6 font-semibold text-gray-800">
                <a href="#" class="hover:text-blue-600">Home</a>
                <a href="#" class="hover:text-blue-600">Academic Education</a>
                <a href="#" class="hover:text-blue-600">Courses</a>

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
                <button class="bg-blue-700 text-white p-2 rounded-full hover:bg-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Notification -->
                <div class="relative">
                    <button class="bg-blue-700 text-white p-2 rounded-full hover:bg-blue-800 relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1">•</span>
                    </button>
                </div>

                <!-- User Profile -->
                <!-- Add Alpine.js in your <head> or before closing </body> -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

                <!-- Dropdown component -->
                @auth
                    <div x-data="{ open: false }" class="relative flex items-center gap-2">
                        <!-- Static Profile Image (no JS interaction) -->
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User"
                            class="w-8 h-8 rounded-full object-cover">

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
                            <img src="user-avatar.jpg" alt="User" class="w-8 h-8 rounded-full">
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

    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-[500px]"
        style="background-image: url('https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome to the <span class="text-blue-300">Oxford
                    Platform</span></h1>
            <p class="text-lg md:text-xl mb-6">Your journey to learning starts here. Discover skills, interact, and
                earn
                certified achievements.</p>
            <div class="flex items-center w-full max-w-md mx-auto">
                <input type="text" id="search" placeholder="Search..."
                    class="flex-grow px-4 py-2 rounded-l-md text-black" />
                <button onclick="searchCourses()"
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-md">Search</button>
            </div>
            <button class="mt-4 bg-cyan-600 hover:bg-cyan-700 px-5 py-2 rounded-md text-white">Browse Courses</button>
        </div>
    </div>

    <!-- Courses Preview Slider -->

    <!-- Suggested Courses Section -->
    <section class="bg-gray-50 py-10 px-4">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Suggested Courses <span
                    class="text-sm font-normal">(Most
                    Subscribed)</span></h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Course Card 1 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('images/1.jpeg') }}" alt="Learn JavaScript" style="height:60%;"
                        class="w-full h-auto rounded mb-4">
                    <p class="text-sm text-gray-500">Programming Course</p>
                    <h3 class="text-lg font-bold text-gray-800">JavaScript Language Course</h3>
                    <p class="text-gray-600 text-sm mb-2">A complete and simplified explanation of JavaScript in 2025.
                    </p>
                    <div class="text-sm text-gray-500 mb-2">📹 50 Videos</div>

                    <div class="flex items-center justify-between text-sm text-gray-700">
                        <p class="text-blue-700 font-medium">Eng. Osama Elzero</p>
                        <div class="flex items-center gap-1">
                            <span>⭐ 4.8</span><span>(640)</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <p class="text-lg font-bold text-gray-800">1400 EGP</p>
                        <button class="bg-blue-700 text-white px-4 py-1 rounded hover:bg-blue-800">Subscribe
                            Now</button>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('images/2.jpeg') }}" style="height:60%;" alt="Digital Marketing"
                        class="w-full h-auto rounded mb-4">
                    <p class="text-sm text-gray-500">Marketing Course</p>
                    <h3 class="text-lg font-bold text-gray-800">Digital Marketing Course</h3>
                    <p class="text-gray-600 text-sm mb-2">Complete digital marketing guide for 2024 explained simply.
                    </p>
                    <div class="text-sm text-gray-500 mb-2">📹 20 Videos</div>

                    <div class="flex items-center justify-between text-sm text-gray-700">
                        <p class="text-blue-700 font-medium">Eng. Sohel Mahdi</p>
                        <div class="flex items-center gap-1">
                            <span>⭐ 4.8</span><span>(640)</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <p class="text-lg font-bold text-gray-800">999 EGP</p>
                        <button class="bg-blue-700 text-white px-4 py-1 rounded hover:bg-blue-800">Subscribe
                            Now</button>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('images/download.jpeg') }}" style="height:60%;" alt="Biology Course"
                        class="w-full h-auto rounded mb-4">
                    <p class="text-sm text-gray-500">High School Course</p>
                    <h3 class="text-lg font-bold text-gray-800">Biology Subject (Exam Book)</h3>
                    <p class="text-gray-600 text-sm mb-2">Full explanation for 1st year secondary 2023 in a simplified
                        way.</p>
                    <div class="text-sm text-gray-500 mb-2">📹 40 Videos</div>

                    <div class="flex items-center justify-between text-sm text-gray-700">
                        <p class="text-blue-700 font-medium">Dr. Mohamed Ayman</p>
                        <div class="flex items-center gap-1">
                            <span>⭐ 4.8</span><span>(640)</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <p class="text-lg font-bold text-gray-800">800 EGP</p>
                        <button class="bg-blue-700 text-white px-4 py-1 rounded hover:bg-blue-800">Subscribe
                            Now</button>
                    </div>
                </div>

            </div>

            <div class="text-center mt-8">
                <a href="#" class="bg-teal-700 text-white px-6 py-2 rounded hover:bg-teal-800 inline-block">
                    Browse More Courses →
                </a>
            </div>
        </div>
    </section>



    <!-- Why Choose Us Section -->
    <section class="bg-gray-100 py-12 px-6 text-center">
        <h2 class="text-2xl font-bold text-teal-700 mb-6">Why Choose Our Platform?</h2>
        <p class="max-w-3xl mx-auto text-gray-700 mb-6">
            We're not just a place to learn — we are a complete environment helping you grow. Whether you're a student,
            graduate, teacher, or just curious, this is your place to thrive.
        </p>
        <ul class="text-gray-700 text-left max-w-4xl mx-auto space-y-2 mb-10">
            <li>
                <span class="text-green-600 font-bold">✔</span> Over 500,000 students and graduates started their
                educational journey with us.
            </li>
            <li>
                <span class="text-green-600 font-bold">✔</span> A team of more than 100,000 professional teachers and
                trainers.
            </li>
            <li>
                <span class="text-green-600 font-bold">✔</span> Comprehensive courses in academics, tech, personal
                development, and languages.
            </li>
            <li>
                <span class="text-green-600 font-bold">✔</span> Interactive, easy content suitable for all ages and
                levels.
            </li>
            <li>
                <span class="text-green-600 font-bold">✔</span> Certified achievements and career-building
                opportunities.
            </li>
        </ul>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/3449/3449519.png" class="mx-auto h-20"
                    alt="Students">
                <p class="text-xl font-bold mt-2">300,000+ Students</p>
            </div>
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/3048/3048702.png" class="mx-auto h-20"
                    alt="Graduates">
                <p class="text-xl font-bold mt-2">200,000+ Graduates</p>
            </div>
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/4211/4211708.png" class="mx-auto h-20"
                    alt="Teachers">
                <p class="text-xl font-bold mt-2">100,000+ Teachers</p>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-10 px-4">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-blue-700 mb-6 text-right">Course Categories</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Category 1 -->
                <div class="bg-white p-4 rounded-lg shadow text-center" style="height: 120%;">
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-palette text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Arts</h3>
                    <p class="text-blue-700 font-medium">100 Courses</p>
                </div>

                <!-- Category 2 -->
                <div class="bg-white p-4 rounded-lg shadow text-center" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-code text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Programming</h3>
                    <p class="text-blue-700 font-medium">2000 Courses</p>
                </div>

                <!-- Category 3 -->
                <div class="bg-white p-4 rounded-lg shadow text-center" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-pencil-ruler text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Graphic Design</h3>
                    <p class="text-blue-700 font-medium">250 Courses</p>
                </div>

                <!-- Category 4 -->
                <div class="bg-white p-4 rounded-lg shadow text-center" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-graduation-cap text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">School Stages</h3>
                    <p class="text-blue-700 font-medium">1800 Courses</p>
                </div>

                <!-- Category 5 -->
                <div class="bg-white p-4 rounded-lg shadow text-center mt-7" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-video text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Photography</h3>
                    <p class="text-blue-700 font-medium">30 Courses</p>
                </div>

                <!-- Category 6 -->
                <div class="bg-white p-4 rounded-lg shadow text-center mt-7" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-calendar-alt text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Business & Management</h3>
                    <p class="text-blue-700 font-medium">120 Courses</p>
                </div>

                <!-- Category 7 -->
                <div class="bg-white p-4 rounded-lg shadow text-center mt-7" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-book text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">English Language</h3>
                    <p class="text-blue-700 font-medium">30 Courses</p>
                </div>

                <!-- Category 8 -->
                <div class="bg-white p-4 rounded-lg shadow text-center mt-7" style="height: 120%;">>
                    <div class="bg-blue-200 inline-block p-4 rounded-full mb-2">
                        <i class="fas fa-bullhorn text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Digital Marketing</h3>
                    <p class="text-blue-700 font-medium">50 Courses</p>
                </div>
            </div>
            <div class="mt-10">.</div>
            <div class="text-center mt-6">
                <a href="#" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 inline-block">
                    Browse More Categories →
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-100 py-10 px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Quick Links -->
            <div>
                <h4 class="text-teal-700 font-bold border-b-2 border-teal-600 inline-block mb-4">Quick Links</h4>
                <ul class="space-y-2 text-gray-700">
                    <li><a href="#" class="hover:text-teal-600">Home</a></li>
                    <li><a href="#" class="hover:text-teal-600">Courses</a></li>
                    <li><a href="#" class="hover:text-teal-600">Certificates</a></li>
                    <li><a href="#" class="hover:text-teal-600">Services</a></li>
                    <li><a href="#" class="hover:text-teal-600">Specialties</a></li>
                </ul>
            </div>

            <!-- Support & Contact -->
            <div>
                <h4 class="text-teal-700 font-bold border-b-2 border-teal-600 inline-block mb-4">Support & Contact</h4>
                <ul class="space-y-2 text-gray-700">
                    <li><a href="#" class="hover:text-teal-600">Who are we?</a></li>
                    <li><a href="#" class="hover:text-teal-600">Contact Us</a></li>
                    <li><a href="#" class="hover:text-teal-600">Copyright</a></li>
                    <li><a href="#" class="hover:text-teal-600">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-teal-600">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-teal-600">Help Center</a></li>
                </ul>
            </div>

            <!-- Social & App Info -->
            <div class="text-center md:text-left">
                <div class="mb-4">
                    <img src="logo.png" alt="Educational Logo" class="w-24 mx-auto md:mx-0 mb-2">
                    <p class="text-gray-800 font-semibold">Follow us on social media</p>
                    <div class="flex justify-center md:justify-start gap-4 mt-2 text-teal-700 text-xl">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <p class="text-sm text-gray-600 mb-2">Learn anytime, anywhere with our app:</p>
                <div class="flex justify-center md:justify-start gap-4 mb-4">
                    <a href="#"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/512px-Google_Play_Store_badge_EN.svg.png"
                            alt="Google Play" class="w-32"></a>
                    <a href="#"><img
                            src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                            alt="App Store" class="w-28"></a>
                </div>

                <p class="text-sm text-gray-500">© MostafaAita.2025 All rights reserved</p>
            </div>
        </div>
    </footer>


    <!-- AJAX Script -->
    <script>
        function searchCourses() {
            const query = document.getElementById('search').value.trim();
            const container = document.getElementById('courses-container');

            if (!query) {
                alert('Please enter a search term.');
                return;
            }

            container.innerHTML = '<p class="text-gray-500 mx-auto">Searching...</p>';

            setTimeout(() => {
                const results = [{
                        title: 'Intro to Coding',
                        image: 'https://source.unsplash.com/400x200/?code',
                        description: 'Learn programming basics in a fun way.'
                    },
                    {
                        title: 'Graphic Design Basics',
                        image: 'https://source.unsplash.com/400x200/?design',
                        description: 'Start your design journey from scratch.'
                    },
                    {
                        title: 'Improve Your English',
                        image: 'https://source.unsplash.com/400x200/?english',
                        description: 'Boost your English skills for career and academics.'
                    }
                ];

                container.innerHTML = '';

                results.forEach(course => {
                    const card = document.createElement('div');
                    card.className = 'min-w-[250px] bg-gray-100 shadow-md rounded-lg overflow-hidden';
                    card.innerHTML = `
            <img src="${course.image}" class="h-40 w-full object-cover" />
            <div class="p-4">
              <h3 class="font-bold text-lg">${course.title}</h3>
              <p class="text-sm text-gray-600 mt-2">${course.description}</p>
              <a href="#" class="mt-2 inline-block text-blue-500">Read more</a>
            </div>
          `;
                    container.appendChild(card);
                });
            }, 1000);
        }
    </script>

</body>

</html>
