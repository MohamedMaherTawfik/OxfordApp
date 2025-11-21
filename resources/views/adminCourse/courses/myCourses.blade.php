<x-panel>
    {{-- course section --}}
    @php
        $perPage = 3;
        $totalCourses = count($courses);
        $totalPages = ceil($totalCourses / $perPage);
    @endphp
    {{-- Success Message --}}
    @if (session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 border border-green-400 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="mb-4 p-3 rounded-lg bg-red-100 border border-red-400 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-3 rounded-lg bg-yellow-100 border border-yellow-400 text-yellow-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="bg-gray-50 py-12 px-4 sm:px-6 mt-10 lg:px-8" id="courses">
        <div class="max-w-7xl mx-auto">

            <!-- Course Pages -->
            <div id="courses-wrapper">
                @for ($page = 1; $page <= $totalPages; $page++)
                    <div class="course-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                        data-page="{{ $page }}" style="{{ $page !== 1 ? 'display:none' : '' }}">
                        @foreach ($courses->forPage($page, $perPage) as $course)
                            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1"
                                style="animation: fadeIn 0.5s ease-in-out;">
                                <div class="h-48 overflow-hidden relative">
                                    <img src="{{ $course->cover_photo && file_exists(public_path('storage/' . $course->cover_photo))
                                        ? asset('storage/' . $course->cover_photo)
                                        : 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=' }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">

                                    <!-- Start Date (Bottom Left) -->
                                    <div
                                        class="absolute bottom-2 left-2 bg-white/80 text-gray-800 text-xs font-medium px-2 py-1 rounded">
                                        {{ \Carbon\Carbon::parse($course->start_Date)->format('d M Y') }}
                                    </div>

                                    <!-- Level (Bottom Right) -->
                                    <div
                                        class="absolute bottom-2 right-2 bg-[#79131d]/90 text-[#e4ce96] text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($course->level ?? 'Beginner') }}
                                    </div>
                                </div>
                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-[#e4ce96] bg-[#79131d] rounded-full">
                                                {{ $course->category->name ?? 'General' }}
                                            </span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $course->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-3">
                                            {{ Str::limit($course->description, 50) }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500 mb-2">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3.586a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9.586V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $course->duration ?? 0 }} hours
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="flex items-center justify-between text-sm text-gray-700 mb-2">
                                            <div>
                                                <span class="font-bold text-base">Instructor:</span>
                                                <span class="opacity-60">{{ $course->user->name }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-yellow-400">★</span>
                                                <span class="ml-1 text-gray-600">{{ $course->rating ?? 0 }}
                                                    ({{ $course->reviews_count ?? 'no Reviews' }})
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                                            <span class="text-lg font-bold text-[#79131d]">سعر المعلم:
                                                {{ $course->price ?? 0 }} ﷼</span>
                                            <span class="text-lg font-bold text-[#79131d]">سعر الادمن:
                                                {{ $course->admin_price ?? 0 }} ﷼</span>

                                            <!-- زر فتح المودال -->
                                            <button onclick="openModal('{{ $course->id }}')"
                                                class="px-4 py-2 bg-[#e4ce96] text-[#79131d] text-sm font-medium rounded-md hover:bg-[#d7bd88] transition-colors duration-300">
                                                سعر الأدمن
                                            </button>

                                            <a href="{{ route('admin.courses.show', $course->slug) }}"
                                                class="px-4 py-2 bg-[#79131DD2] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#79131d] transition-colors duration-300">
                                                Show Course
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div id="modal-{{ $course->id }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
                                <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
                                    <button onclick="closeModal('{{ $course->id }}')"
                                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                                        ✖
                                    </button>
                                    <h3 class="text-lg font-semibold text-[#79131d] mb-4">تحديد سعر الأدمن</h3>

                                    <form method="POST" action="{{ route('admin.courses.adminPrice', $course->id) }}">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="admin_price_{{ $course->id }}"
                                                class="block text-sm font-medium text-gray-700 mb-1">
                                                السعر (﷼)
                                            </label>
                                            <input type="number" step="0.01" name="admin_price"
                                                id="admin_price_{{ $course->id }}"
                                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#79131d] focus:border-[#79131d]"
                                                required>
                                        </div>
                                        <div class="flex justify-end gap-2">
                                            <button type="button" onclick="closeModal('{{ $course->id }}')"
                                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                                إلغاء
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-[#79131d] text-[#e4ce96] rounded-md hover:bg-[#5f0f16]">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>

            <!-- مودال JS -->
            <script>
                function openModal(id) {
                    document.getElementById(`modal-${id}`).classList.remove('hidden');
                    document.getElementById(`modal-${id}`).classList.add('flex');
                }

                function closeModal(id) {
                    document.getElementById(`modal-${id}`).classList.add('hidden');
                    document.getElementById(`modal-${id}`).classList.remove('flex');
                }
            </script>


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

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-page {
            animation: fadeIn 0.5s ease-in-out;
        }

        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

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
</x-panel>
