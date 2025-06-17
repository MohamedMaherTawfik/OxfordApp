<x-panel>

    <div class="container mx-auto px-4 py-8">
        <!-- Grid with 3 cards per row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            @foreach ($courses as $course)
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Course Image -->
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $course->cover_photo) }}" alt="Course Image"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Card Content -->
                    <div class="p-4 space-y-2">
                        <!-- Category -->
                        <p class="text-sm font-semibold text-gray-500 uppercase">{{ $course->categorey }}</p>

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-gray-800 truncate">{{ $course->title }}</h3>

                        <!-- Instructor -->
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold text-black">Instructor:</span> {{ $course->user->name }}
                        </p>

                        <!-- Price & Show More -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-base font-bold text-gray-900">
                                Price: {{ $course->price }}$
                            </div>
                            <a href=""
                                class="px-4 py-2 bg-[#79131D] text-white rounded-md hover:bg-[#5f1016] transition-colors duration-200">
                                Show More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-panel>
