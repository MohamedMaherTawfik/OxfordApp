<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Course Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .course-hero {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .rating-stars {
            color: #f59e0b;
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- navbar --}}
    <x-navbar />

    <!-- Course Hero Section -->
    <section class="course-hero py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Course Cover -->
                <div class="md:w-1/2 lg:w-2/5">
                    <div class="rounded-xl overflow-hidden shadow-xl">
                        <img src="{{ $course->cover_photo_url }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">

                    </div>
                </div>

                <!-- Course Info -->
                <div class="md:w-1/2 lg:w-3/5 flex flex-col justify-center">
                    <span
                        class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-bold mb-4">
                        {{ $course->category->name }}
                    </span>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $course->title }}</h1>

                    <p class="text-lg text-gray-600 mb-6">{{ Str::limit($course->description, 200) }}</p>

                    <div class="flex items-center mb-6">
                        <div class="rating-stars flex mr-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($course->rating))
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-700 font-medium">{{ number_format($course->rating, 1) }} rating</span>
                    </div>

                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-700">Starts:
                                {{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-700">Duration: {{ $course->duration }} hours</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                SAR</span>
                        </div>
                        <form action="{{ route('enrollment', $course->slug) }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="px-6 py-3 bg-[#79131DE0] hover:bg-[#79131d] text-white font-medium rounded-lg transition duration-200">
                                Enroll Now
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">What You'll Learn</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($course->description)) !!}
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Course Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Course Information</h3>
                            <ul class="space-y-3">
                                <li class="flex justify-between">
                                    <span class="text-gray-600">Category:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->category->name }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">Start Date:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">Duration:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->duration }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">Created:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->created_at)->format('M d, Y') }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Pricing</h3>
                            <div class="flex items-end mb-4">
                                <span class="text-4xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                    SAR</span>
                                <span class="text-gray-500 ml-1"></span>
                            </div>
                            <button
                                class="w-full px-6 py-3 bg-[#79131DDC] hover:bg-[#79131d] text-white font-medium rounded-lg transition duration-200">
                                Enroll in Course
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructor Section (placeholder) -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">About the Instructor</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm flex items-start">
                    <div class="w-16 h-16 rounded-full bg-gray-200 mr-4 overflow-hidden">
                        <img src="{{ asset('storage' . $course->user->photo) }}" alt="{{ $course->user->name }}">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $course->user->name }}</h3>
                        <p class="text-gray-600 mt-1">Instructor bio would go here...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <x-footer />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
