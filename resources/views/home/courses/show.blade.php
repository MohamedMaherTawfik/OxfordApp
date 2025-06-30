<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - {{ __('course.details_page_title') }}</title>
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

    <x-navbar />

    <!-- Course Hero Section -->
    <section class="course-hero py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 lg:w-2/5">
                    <div class="rounded-xl overflow-hidden shadow-xl">
                        <img src="{{ $course->cover_photo_url }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                </div>

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
                                    <x-star filled />
                                @else
                                    <x-star />
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-700 font-medium">
                            {{ number_format($course->rating, 1) }} {{ __('course.rating') }}
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="flex items-center">
                            <x-icon-calendar />
                            <span class="text-gray-700">{{ __('course.starts') }}:
                                {{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <x-icon-clock />
                            <span class="text-gray-700">{{ __('course.duration') }}: {{ $course->duration }}
                                {{ __('course.hours') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                {{ __('course.currency') }}</span>
                        </div>
                        <form action="{{ route('enrollment', $course->slug) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-6 py-3 bg-[#79131DE0] hover:bg-[#79131d] text-white font-medium rounded-lg transition duration-200">
                                {{ __('course.enroll_now') }}
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
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('course.what_you_will_learn') }}</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($course->description)) !!}
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('course.course_details') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('course.course_info') }}</h3>
                            <ul class="space-y-3">
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('course.category') }}:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->category->name }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('course.start_date') }}:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('course.duration') }}:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->duration }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('course.created_at') }}:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->created_at)->format('M d, Y') }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('course.pricing') }}</h3>
                            <div class="flex items-end mb-4">
                                <span class="text-4xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                    {{ __('course.currency') }}</span>
                            </div>
                            <button
                                class="w-full px-6 py-3 bg-[#79131DDC] hover:bg-[#79131d] text-white font-medium rounded-lg transition duration-200">
                                {{ __('course.enroll_course') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructor Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('course.instructor') }}</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm flex items-start">
                    <div class="w-16 h-16 rounded-full bg-gray-200 mr-4 overflow-hidden">
                        <img src="{{ asset('storage' . $course->user->photo) }}" alt="{{ $course->user->name }}">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $course->user->name }}</h3>
                        <p class="text-gray-600 mt-1">{{ __('course.instructor_bio_placeholder') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
