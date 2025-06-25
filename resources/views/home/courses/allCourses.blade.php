<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50" x-cloak>

    <x-navbar />

    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto" x-data="{
            courses: @json($courses),
            filter: '',
            search: '',
            get filteredCourses() {
                return this.courses.filter(course => {
                    const matchLevel = !this.filter || course.level === this.filter;
                    const matchSearch = !this.search || course.title.toLowerCase().includes(this.search.toLowerCase());
                    return matchLevel && matchSearch;
                });
            }
        }">

            <!-- Header + Controls -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 gap-4">
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900">Featured Courses</h2>
                    <p class="text-gray-600">Boost your skills with our top-rated courses</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Search -->
                    <input type="text" x-model="search" placeholder="Search courses..."
                        class="block w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-md text-sm focus:ring-[#79131d] focus:border-[#79131d]">

                    <!-- Filter -->
                    <select x-model="filter"
                        class="block bg-[#79131d] w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-[#e4ce96] focus:ring-[#79131d] focus:border-[#79131d]">
                        <option value="">All Levels</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Mid">Mid</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="course in filteredCourses" :key="course.id">
                    <div class="bg-white rounded-lg shadow-md transition hover:shadow-xl overflow-hidden flex flex-col">

                        <div class="relative h-48 overflow-hidden">
                            <img :src="course.cover_photo ?
                                '/storage/' + course.cover_photo :
                                'https://via.placeholder.com/400x225'"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />

                            <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded"
                                x-text="new Date(course.start_Date).toLocaleDateString()"></div>

                            <div class="absolute bottom-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded"
                                x-text="course.level || 'Beginner'"></div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <span
                                    class="inline-block mb-2 px-3 py-1 text-xs font-semibold text-[#e4ce96] bg-[#79131d] rounded-full"
                                    x-text="course.category?.name || 'General'"></span>
                                <h3 class="text-xl font-semibold text-gray-900" x-text="course.title"></h3>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3"
                                    x-text="course.description ? course.description.slice(0, 60) + '...' : ''"></p>

                                <p class="text-sm text-gray-500 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3.586a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="course.duration + ' hours'"></span>
                                </p>
                            </div>

                            <div class="mt-auto border-t pt-4 text-sm text-gray-700 flex justify-between items-center">
                                <div>
                                    <span class="font-bold">Instructor:</span>
                                    <span class="opacity-60" x-text="course.user?.name || 'N/A'"></span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-yellow-400">★</span>
                                    <span class="ml-1 text-gray-600"
                                        x-text="(course.rating ?? 0) + ' (' + (course.reviews_count ?? 'no Reviews') + ')'"></span>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center justify-between">
                                <span class="text-lg font-bold text-[#79131d]" x-text="course.price + ' SAR'"></span>
                                <a :href="'/courses/' + course.slug"
                                    class="px-4 py-2 bg-[#79131DD2] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#79131d] transition">
                                    Subscribe Now
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>
