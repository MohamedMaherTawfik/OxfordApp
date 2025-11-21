<x-panel>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Uploaded Assignments</h2>

        <table class="min-w-full border border-gray-300 bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">File</th>
                    <th class="py-2 px-4 border-b text-left">Feedback</th>
                    <th class="py-2 px-4 border-b text-left">Grade</th>
                    <th class="py-2 px-4 border-b text-left">User ID</th>
                    <th class="py-2 px-4 border-b text-left">Graduation Project ID</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($assignments as $assignment)
                    <tr class="hover:bg-gray-50" x-data="{ open: false }">
                        <td class="py-2 px-4 border-b">
                            <a href="{{ asset('storage/' . $assignment->file) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                الملف
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $assignment->feedback ?? '—' }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $assignment->grade ?? '—' }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $assignment->user->name ?? 'N/A' }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a
                                href="
                            {{ asset('storage/' . $assignment->graduationProject->file) ?? 'N/A' }}">
                                المشروع </a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button @click="open = true"
                                class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
                                تقييم
                            </button>

                            <!-- Modal -->
                            <div x-show="open"
                                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                                x-cloak>
                                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                                    <h3 class="text-xl font-semibold mb-4">تقييم المشروع</h3>
                                    <form method="POST"
                                        action="{{ route('admin.assignments.evaluate', $assignment->id) }}">
                                        @csrf

                                        <div class="mb-4">
                                            <label for="grade" class="block font-medium mb-1">الدرجة</label>
                                            <input type="number" name="grade" id="grade" min="0"
                                                max="100" value="{{ $assignment->grade }}"
                                                class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-indigo-200">
                                        </div>

                                        <div class="mb-4">
                                            <label for="feedback" class="block font-medium mb-1">التعليق</label>
                                            <textarea name="feedback" id="feedback" rows="3"
                                                class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-indigo-200">{{ $assignment->feedback }}</textarea>
                                        </div>

                                        <div class="flex justify-end gap-2">
                                            <button type="button" @click="open = false"
                                                class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400">
                                                إلغاء
                                            </button>
                                            <button type="submit"
                                                class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Close button -->
                                    <button @click="open = false"
                                        class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                        ✕
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">No assignments uploaded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-panel>
