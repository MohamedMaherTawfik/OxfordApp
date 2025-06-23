<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Course Cards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .course-card {
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #79131d;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 10;
        }

        .course-card:hover::before {
            transform: scaleX(1);
        }

        .course-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(121, 19, 29, 0.05);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .course-card:hover::after {
            opacity: 1;
        }

        .enroll-btn {
            background: #79131d;
            transition: all 0.3s ease;
        }

        .enroll-btn:hover {
            background: #5a0e16;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(121, 19, 29, 0.2);
        }

        .expand-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50" x-data x-cloak>


    {{-- navbar --}}

    <x-navbar />

    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Featured Courses</h2>
                <div class="w-20 h-1 bg-[#79131d] mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Boost your skills with our top-rated courses</p>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div x-data="{ expanded: false }"
                        class="course-card bg-white rounded-lg shadow-md transition-all duration-300 hover:shadow-xl w-full h-full flex flex-col overflow-hidden group">

                        <!-- Course Image -->
                        <div class="h-60 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $course->cover_photo ?? 'https://source.unsplash.com/random/600x400/?laravel,programming') }}"
                                alt="{{ $course->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <!-- Category Badge -->
                            <span
                                class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold text-white bg-[#79131d] rounded-full shadow">
                                {{ $course->category->name ?? 'Programming' }}
                            </span>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex flex-col h-full">
                            <!-- Course Title -->
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $course->title }}</h2>

                            <!-- Rating -->
                            <div class="flex items-center mb-3 text-gray-600">
                                <div class="flex text-yellow-400 mr-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($course->review->avg('rating') ?? 0))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="#d1d5db" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm">
                                    {{ $course->review->avg('rating') ? number_format($course->review->avg('rating'), 1) : 'No Reviews' }}
                                    ({{ count($course->review) }})
                                </span>
                            </div>

                            <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
                                <!-- Duration with clock icon -->
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $course->duration }} hrs</span>
                                </div>

                                <!-- Start Date with calendar icon -->
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($course->start_date)->format('M d, Y') }}</span>
                                </div>
                            </div>


                            <!-- Short Description -->
                            <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                                {{ Str::limit(strip_tags($course->description), 50) ?? 'Learn the basics of Laravel, a powerful PHP framework.' }}
                            </p>

                            <div class="flex justify-between items-center mb-2">
                                <p class=" text-xl" style="font-weight: 500">
                                    Instructor: <span style="font-weight: 400"
                                        class="text-sm opacity-60 text-[#79131d]">{{ $course->user->name }}</span>
                                </p>
                                <p class="text-xl" style="font-weight: 500">
                                    <span style="font-weight: 500" class="text-[#79131d]  text-sm opacity-60">
                                        {{ $course->price }}</span>
                                    SAR
                                </p>
                            </div>

                            <!-- Enroll Button -->
                            <a href="{{ route('course.show', $course->slug) }}"
                                class="mt-auto bg-[#79131d] hover:bg-[#5e0f17] text-white w-full py-2 text-center text-sm font-medium rounded transition-colors duration-300 shadow hover:shadow-md">
                                Enroll Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .course-card {
            position: relative;
            transition: all 0.3s ease;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #79131d;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 10;
        }

        .course-card:hover::before {
            transform: scaleX(1);
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>



    {{-- footer --}}

    <x-footer />
</body>

</html>
