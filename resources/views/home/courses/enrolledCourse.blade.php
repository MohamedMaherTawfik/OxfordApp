<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $course->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- navbar --}}
    <x-navbar />

    <!-- Course Header -->
    <div class="max-w-5xl mx-auto py-10 px-4">
        <img src="{{ asset('storage/' . $course->cover_photo) }}" alt="{{ $course->title }}"
            class="w-full h-64 object-cover rounded-xl shadow mb-6">

        <h1 class="text-4xl font-bold">{{ $course->title }}</h1>
        <p class="text-lg text-gray-600 mt-2">{{ $course->description }}</p>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p><span class="font-bold">Start Date:</span> {{ $course->start_Date }}</p>
                <p><span class="font-bold">Instructor:</span> {{ $course->user->name }}</p>
                <p><span class="font-bold">Duration:</span> {{ $course->duration }} hours</p>
            </div>
            <div>
                <p class="flex items-center space-x-1">
                    <span class="font-bold">Rating:</span>

                    <span>{{ $course->rating }} / 5</span>
                    <span class="text-yellow-500">
                        <!-- Star Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 fill-current"
                            viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.286 3.966c.3.921-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.197-1.539-1.118l1.285-3.966a1 1 0 00-.364-1.118L2.095 9.394c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.951-.69l1.285-3.967z" />
                        </svg>
                    </span>

                </p>
                <p><span class="font-bold">Number of Lessons:</span> {{ $course->lessons->count() }} lessons</p>
            </div>
        </div>
    </div>

    <!-- Lessons List -->
    @php
        $lessons = $course->lessons;
        $perPage = 3;
        $totalLessons = count($lessons);
        $totalPages = ceil($totalLessons / $perPage);
    @endphp

    <div class="max-w-5xl mx-auto px-4 mb-16">
        <h2 class="text-2xl font-semibold mb-6">Lessons</h2>

        <!-- Lessons Tabs -->
        <div id="lessons-wrapper">
            @for ($page = 1; $page <= $totalPages; $page++)
                <div class="lesson-page grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                    data-page="{{ $page }}" style="{{ $page !== 1 ? 'display:none' : '' }}">
                    @foreach ($lessons->forPage($page, $perPage) as $lesson)
                        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden flex flex-col">
                            <img src="{{ asset('storage/' . $lesson->image) }}" alt="{{ $lesson->title }}"
                                class="h-40 w-full object-cover">

                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-bold mb-1">{{ $lesson->title }}</h3>
                                    <p class="text-sm text-gray-600 line-clamp-3">{{ $lesson->description }}</p>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('lesson.show', $lesson->slug) }}"
                                        class="inline-block bg-[#79131DDA] text-[#e4ce96] p-2 rounded hover:underline font-medium text-sm">
                                        Go to Lesson →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor
        </div>

        <!-- Pagination Controls -->
        <div class="mt-10 flex justify-center items-center space-x-2">
            <button id="lesson-prev-btn"
                class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50"
                disabled>
                Previous
            </button>

            <div id="lesson-tabs" class="flex space-x-1">
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

            <button id="lesson-next-btn"
                class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                Next
            </button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lessonPages = document.querySelectorAll('.lesson-page');
            const prevBtn = document.getElementById('lesson-prev-btn');
            const nextBtn = document.getElementById('lesson-next-btn');
            const totalPages = {{ $totalPages }};
            const maxTabs = 4;

            let currentPage = 1;

            function updateLessonView() {
                lessonPages.forEach(page => {
                    page.style.display = parseInt(page.dataset.page) === currentPage ? 'grid' : 'none';
                });
            }

            function renderLessonTabs() {
                const tabsContainer = document.getElementById('lesson-tabs');
                tabsContainer.innerHTML = '';

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
                        updateLessonView();
                        renderLessonTabs();
                        prevBtn.disabled = currentPage === 1;
                        nextBtn.disabled = currentPage === totalPages;
                    });
                    tabsContainer.appendChild(btn);
                }
            }

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateLessonView();
                    renderLessonTabs();
                    prevBtn.disabled = currentPage === 1;
                    nextBtn.disabled = currentPage === totalPages;
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateLessonView();
                    renderLessonTabs();
                    prevBtn.disabled = currentPage === 1;
                    nextBtn.disabled = currentPage === totalPages;
                }
            });

            // Initial setup
            updateLessonView();
            renderLessonTabs();
        });
    </script>



    {{-- End lesson list --}}


    <!-- Related Courses -->
    <div class="bg-gray-100 py-10 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6">Related Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($relatedCourses as $related)
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="{{ asset('storage/' . $related->cover_photo) }}" class="w-full h-40 object-cover"
                            alt="">
                        <div class="p-4">
                            <h3 class="text-lg font-bold">{{ $related->title }}</h3>
                            <p class="text-sm text-gray-600 line-clamp-2">{{ $related->description }}</p>
                            <a href="{{ route('course.show', $related->slug) }}"
                                class="inline-block bg-[#79131d] p-2 mt-2 text-[#e4ce96] hover:underline text-sm font-medium rounded">
                                View Course
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- footer --}}
    <x-footer />
</body>

</html>
