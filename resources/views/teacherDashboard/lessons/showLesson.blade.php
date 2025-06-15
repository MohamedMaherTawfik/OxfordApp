    <?php
    use App\Models\comments;
    $comments = comments::where('lesson_id', $lesson->id)->get();
    ?>
    <x-teacher-panel>

        <div class="max-w-4xl mx p-6 rounded-lg">
            <!-- Lesson Title -->
            <div class="mb-6 flex justify-between items-start">
                <!-- Title and Timestamp -->
                <div class="text-left">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $lesson->title }}</h1>
                    <p class="text-gray-500 text-sm">Posted on {{ $lesson->created_at }}</p>
                </div>

                <!-- Dropdown Menu -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open"
                        class="bg-[#79131DC0] text-white px-4 py-2 rounded-lg shadow hover:bg-[#79131d]">
                        Options +
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                        <a href="{{ route('teacher.lessons.edit', $lesson->slug) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit lesson</a>
                        <form method="POST" action="{{ route('teacher.lessons.delete', $lesson->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>

            </div>


            <!-- Lesson Description -->
            <div class="mb-8 text-left">
                <p class="text-gray-700 leading-relaxed">
                    {{ $lesson->description }}
                </p>
            </div>

            <!-- Video Player -->
            <div class="mb-8 mx-4 bg-black rounded-lg overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <video controls class="w-full h-full object-cover rounded-md">
                        <source src="{{ asset('storage/' . $lesson->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="p-4 bg-gray-100 flex justify-between items-center">
                    <div class="flex space-x-4">
                        <button class="text-gray-700 hover:text-blue-500">
                            <i class="fas fa-thumbs-up mr-1"></i> Like
                        </button>
                        <button class="text-gray-700 hover:text-blue-500">
                            <i class="fas fa-share mr-1"></i> Share
                        </button>
                    </div>
                    <span class="text-sm text-gray-500">1,245 views</span>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="border-t pt-6 text-left">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Comments ({{ count($comments) }})</h3>
            </div>
        </div>



    </x-teacher-panel>
