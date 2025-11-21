<x-teacher-panel>

    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-start py-10 px-4"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="w-full max-w-5xl bg-white shadow-lg rounded-lg p-6">

            <!-- العنوان و الزر -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-700">{{ $course->title }} {{ __('teacher.course_schedules') }}
                </h1>
                <a href="{{ route('course-schedules.create', $course) }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    + {{ __('teacher.add_schedule') }}
                </a>
            </div>

            <!-- رسالة نجاح -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- جدول العرض -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-center">
                            <th class="py-3 px-4 border-b">{{ __('teacher.course') }}</th>
                            <th class="py-3 px-4 border-b">{{ __('teacher.day') }}</th>
                            <th class="py-3 px-4 border-b">{{ __('teacher.start_time') }}</th>
                            <th class="py-3 px-4 border-b">{{ __('teacher.end_time') }}</th>
                            <th class="py-3 px-4 border-b">{{ __('teacher.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $item)
                            <tr class="text-center text-gray-700 hover:bg-gray-50 transition">
                                <td class="py-3 px-4 border-b">{{ $item->course->title ?? '—' }}</td>
                                <td class="py-3 px-4 border-b">{{ $item->day }}</td>
                                <td class="py-3 px-4 border-b">{{ $item->start_time }}</td>
                                <td class="py-3 px-4 border-b">{{ $item->end_time }}</td>
                                <td class="py-3 px-4 border-b flex justify-center gap-2">
                                    <form action="{{ route('course-schedules.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow"
                                            onclick="return confirm('{{ __('teacher.delete_confirm') }}')">
                                            {{ __('teacher.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500">
                                    {{ __('teacher.no_schedules') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-teacher-panel>
