<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- font awseome --}}
</head>

<body class="bg-white font-sans">

    <!-- Header -->
    <x-navbar />

    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-[500px]"
        style="background-image: url('https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome to the <span class="text-[#79131d]">Oxford
                    Platform</span></h1>
            <p class="text-lg md:text-xl mb-6">Your journey to learning starts here. Discover skills, interact, and
                earn
                certified achievements.</p>
            <div class="flex items-center w-full max-w-md mx-auto">
                <input type="text" id="search" placeholder="Search..."
                    class="flex-grow px-4 py-2 rounded-l-md text-black" />
                <button onclick="searchCourses()"
                    class="bg-[#79131d] text-[#e4ce96] px-4 py-2 rounded-r-md">Search</button>
            </div>
            <button class="mt-4 bg-[#79131DC2] hover:bg-[#79131d] px-5 py-2 rounded-md text-[#e4ce96]">Browse
                Courses</button>
        </div>
    </div>

    <!-- About Us Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#79131d] mb-4">About Oxford Platform</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Empowering learners worldwide with quality
                    education
                    and innovative learning solutions</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        alt="Students learning" class="rounded-lg shadow-xl w-full h-auto">
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Story</h3>
                    <p class="text-gray-600 mb-6">
                        Founded in 2010, Oxford Platform has grown from a small local education provider to a leading
                        international online learning platform. We've helped over 500,000 students achieve their
                        educational goals through our innovative courses and dedicated instructors.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                            <div class="text-[#79131d] text-2xl mb-2">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h4 class="font-bold text-gray-800">500K+ Students</h4>
                            <p class="text-sm text-gray-600">Worldwide learners</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                            <div class="text-[#79131d] text-2xl mb-2">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h4 class="font-bold text-gray-800">100K+ Teachers</h4>
                            <p class="text-sm text-gray-600">Professional educators</p>
                        </div>
                    </div>

                    <a href="{{ asset('storage/pdf/oxforden.pdf') }}" target="_blank"
                        class="px-5 py-3 bg-[#79131DE0] text-white rounded-md hover:bg-[#79131d] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                        Learn More About us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- course section --}}
    @php
        $perPage = 3;
        $totalCourses = count($courses);
        $totalPages = ceil($totalCourses / $perPage);
    @endphp

    <section class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">Suggested Courses</h2>
                <p class="mt-2 text-lg text-gray-600">Most Subscribed</p>
            </div>

            <!-- Course Pages -->
            <div id="courses-wrapper">
                @for ($page = 1; $page <= $totalPages; $page++)
                    <div class="course-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                        data-page="{{ $page }}" style="{{ $page !== 1 ? 'display:none' : '' }}">
                        @foreach ($courses->forPage($page, $perPage) as $course)
                            <div
                                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ $course->cover_photo ? asset('storage/' . $course->cover_photo) : 'https://via.placeholder.com/400x225' }}"
                                        alt="{{ $course->title }}" class="w-full h-full object-cover">
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold text-[#e4ce96] bg-[#79131d] rounded-full">
                                            {{ $course->category->name ?? 'General' }}
                                        </span>
                                    </div>
                                    <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ $course->title }}</h3>
                                    <p class="mt-3 text-gray-600 text-sm">
                                        {{ Str::limit($course->description, 50) }}
                                    </p>
                                    <div class="mt-4 flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3.586a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $course->duration ?? 0 }} hours
                                    </div>
                                    <div class="mt-6 flex items-center justify-between">
                                        <div>
                                            <span class="font-bold text-xl">Instructor:</span>
                                            <span class="opacity-60 text-sm">{{ $course->user->name }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-yellow-400">★</span>
                                            <span class="ml-1 text-gray-600">{{ $course->rating ?? 0 }}
                                                ({{ $course->reviews_count ?? 'no Reviews' }})
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                                        <span class="text-lg font-bold text-gray-900">{{ $course->price ?? 0 }}
                                            SAR</span>
                                        <a href="{{ route('course.show', $course->slug) }}"
                                            class="px-4 py-2 bg-[#79131DD2] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#79131d]">
                                            Subscribe Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>

            <!-- Pagination Controls -->
            <div class="mt-12 flex justify-center items-center space-x-2">
                <button id="prev-btn"
                    class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50"
                    disabled>
                    Previous
                </button>

                <div id="tabs" class="flex space-x-1">
                    @php
                        $currentPage = 1;
                        $visibleTabs = 4;
                        $start = 1;
                        $end = min($totalPages, $visibleTabs);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <button data-page="{{ $i }}"
                            class="w-10 h-10 flex items-center justify-center rounded-md text-sm font-semibold transition border border-[#79131d]
                            {{ $i === 1 ? 'bg-[#79131d] text-white' : 'bg-transparent text-gray-700 hover:bg-[#79131d] hover:text-white' }}">
                            {{ $i }}
                        </button>
                    @endfor
                </div>

                <button id="next-btn"
                    class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const coursePages = document.querySelectorAll('.course-page');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const totalPages = {{ $totalPages }};
            const maxTabs = 4;

            let currentPage = 1;

            function updateCourseView() {
                coursePages.forEach(page => {
                    page.style.display = parseInt(page.dataset.page) === currentPage ? 'grid' : 'none';
                });
            }

            function renderTabs() {
                const tabsContainer = document.getElementById('tabs');
                tabsContainer.innerHTML = ''; // Clear old buttons

                let start = Math.max(1, currentPage - Math.floor(maxTabs / 2));
                let end = start + maxTabs - 1;

                if (end > totalPages) {
                    end = totalPages;
                    start = Math.max(1, end - maxTabs + 1);
                }

                for (let i = start; i <= end; i++) {
                    const btn = document.createElement('button');
                    btn.dataset.page = i;
                    btn.textContent = i;
                    btn.className = `w-10 h-10 flex items-center justify-center rounded-md text-sm font-semibold transition border border-[#79131d] ${
                    i === currentPage
                        ? 'bg-[#79131d] text-white'
                        : 'bg-transparent text-gray-700 hover:bg-[#79131d] hover:text-white'
                }`;
                    btn.addEventListener('click', () => {
                        currentPage = i;
                        updateView();
                    });
                    tabsContainer.appendChild(btn);
                }
            }

            function updateView() {
                updateCourseView();
                renderTabs();
                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages;
            }

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateView();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateView();
                }
            });

            updateView();
        });
    </script>

    {{-- end courses --}}

    <!-- Why Choose Us Section -->
    <section class="bg-gray-100 py-12 px-6 text-center">
        <h2 class="text-2xl font-bold text-teal-700 mb-6">Why Choose Our Platform?</h2>
        <p class="max-w-3xl mx-auto text-gray-700 mb-6">
            We're not just a place to learn — we are a complete environment helping you grow. Whether you're a
            student,
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

    <!-- Enhanced Categories Section -->
    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#79131d] mb-4">Explore Our Categories</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Browse through our diverse range of learning
                    categories to find what interests you</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category 1 -->
                @foreach ($categories as $categorey)
                    <a href="{{ route('categories.show', $categorey->slug) }}"
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 text-center">

                        <h3 class="font-bold text-lg mb-2">{{ $categorey->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ count($categorey->courses) }} Courses</p>
                    </a>
                @endforeach
            </div>

            <div class="flex justify-center mt-8">
                <a href="#"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-[#e4ce96] font-medium rounded-md shadow-sm text-white bg-[#79131DC9] hover:bg-[#79131d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-200">
                    View All Categories
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#79131d] mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Find answers to common questions about our platform</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="open = !open" class="w-full px-6 py-4 bg-white text-left focus:outline-none">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-lg text-gray-800">How do I enroll in a course?</h3>
                            <svg class="w-5 h-5 text-[#79131d] transition-transform duration-200"
                                :class="{ 'transform rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse class="px-6 pb-4 pt-0 bg-gray-50 text-gray-600">
                        <p>To enroll in a course, simply browse our course catalog, select the course you're
                            interested
                            in, and click the "Enroll Now" button. You'll be guided through the registration and
                            payment
                            process if the course isn't free.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="open = !open" class="w-full px-6 py-4 bg-white text-left focus:outline-none">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-lg text-gray-800">Are the certificates recognized?</h3>
                            <svg class="w-5 h-5 text-[#79131d] transition-transform duration-200"
                                :class="{ 'transform rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse class="px-6 pb-4 pt-0 bg-gray-50 text-gray-600">
                        <p>Yes, our certificates are recognized by many educational institutions and employers. Each
                            certificate includes a unique verification code that can be used to validate its
                            authenticity on our website.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <x-footer />


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
