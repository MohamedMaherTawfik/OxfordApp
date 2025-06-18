<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .category-hero {
            background: linear-gradient(135deg, #f0f4ff 0%, #d6e4ff 100%);
        }

        .rating-stars {
            color: #f59e0b;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar (placeholder) -->
    <x-navbar />

    <!-- Category Hero Section -->
    <section class="category-hero py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ $category->name }} Categorey</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ $category->description ?? 'Browse our top courses in this category' }}</p>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Courses in {{ $category->name }}</h2>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Filter
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Sort
                    </button>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($category->courses as $course)
                    <div class="course-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300">
                        <!-- Course Image -->
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $course->cover_photo) }}" alt="{{ $course->title }}"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded">
                                    {{ $course->level ?? 'Intermediate' }}
                                </span>
                                <div class="flex items-center">
                                    <div class="rating-stars flex mr-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($course->rating))
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-600">{{ number_format($course->rating, 1) }}</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-500 mb-4">By
                                {{ $course->user->name ?? 'Instructor Name' }}</p>

                            <div class="flex justify-between items-center">
                                <span
                                    class="text-lg font-bold text-gray-900">${{ number_format($course->price, 2) }}</span>
                                <a href="{{ route('course.show', $course->slug) }}"
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition duration-200">
                                    Subscribe
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <!-- Pagination (if needed) -->
            @if ($category->courses->hasPages())
                <div class="mt-12 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm">
                        <a href="#"
                            class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            1
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            3
                        </a>
                        <a href="#"
                            class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            Next
                        </a>
                    </nav>
                </div>
            @endif --}}
        </div>
    </section>

    <!-- Category Benefits Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Learn {{ $category->name }}?</h2>
                <p class="text-gray-600">Discover the benefits of mastering this field and how it can advance your
                    career.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Industry Demand</h3>
                    <p class="text-gray-600">High demand for professionals with {{ $category->name }} skills across
                        multiple industries.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Career Growth</h3>
                    <p class="text-gray-600">Unlock new career opportunities and higher earning potential.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Practical Skills</h3>
                    <p class="text-gray-600">Learn practical, real-world skills you can apply immediately.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (placeholder) -->
    <x-footer />
</body>

</html>
