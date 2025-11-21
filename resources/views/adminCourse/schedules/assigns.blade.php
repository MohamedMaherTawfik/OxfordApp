<x-panel>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-start py-10 px-4">
        <div class="w-full max-w-5xl bg-white shadow-lg rounded-lg p-6">

            <!-- العنوان و زر التحديد -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-700">
                    {{ __('teacher.assign_students') }} for {{ $day }}
                </h1>

                <button type="button" id="toggleSelect"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    {{ __('teacher.select') }}
                </button>
            </div>

            <!-- الفورم الرئيسي للحفظ -->
            <form action="{{ route('admin.course-schedules.students', [$course, $day]) }}" method="POST">
                @csrf
                <input type="hidden" name="day" value="{{ $day }}">

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-center">
                                <th class="py-3 px-4 border-b">{{ __('teacher.select') }}</th>
                                <th class="py-3 px-4 border-b">{{ __('teacher.name') }}</th>
                                <th class="py-3 px-4 border-b">{{ __('teacher.email') }}</th>
                                <th class="py-3 px-4 border-b">{{ __('teacher.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @php
                                    $accessRecord = $access->firstWhere('user_id', $user->id);
                                @endphp

                                <tr class="text-center text-gray-700 hover:bg-gray-50 transition">
                                    <!-- checkbox -->
                                    <td class="py-4 px-4 border-b">
                                        <input type="checkbox" name="users[]" value="{{ $user->id }}"
                                            class="user-checkbox {{ $accessRecord ? '' : 'hidden' }}"
                                            {{ $accessRecord ? 'checked' : '' }}>
                                    </td>

                                    <td class="py-4 px-4 border-b font-semibold">{{ $user->name }}</td>
                                    <td class="py-4 px-4 border-b font-semibold">{{ $user->email }}</td>

                                    <!-- زر الريفوك بدون ajax -->
                                    <td class="py-4 px-4 border-b">
                                        @if ($accessRecord)
                                            <button type="submit"
                                                onclick="return confirm('{{ __('teacher.confirm_revoke_access') }}')"
                                                formaction="{{ route('admin.course-schedules.students.revoke', $accessRecord->id) }}"
                                                formmethod="POST"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">

                                                {{ __('teacher.revoke') }}

                                            </button>

                                            @method('DELETE')
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- زر حفظ التحديد -->
                <div class="mt-4 flex justify-end">
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        {{ __('teacher.save') }}
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleSelect');
        const checkboxes = document.querySelectorAll('.user-checkbox');

        toggleBtn.addEventListener('click', () => {
            checkboxes.forEach(cb => cb.classList.toggle('hidden'));
        });
    </script>
</x-panel>
