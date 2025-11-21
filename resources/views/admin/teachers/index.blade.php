<x-panel>
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

    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Search & Add Button -->
        <div class="flex justify-between items-center mb-4">
            <div></div>
            <a href="{{ route('admin.users.create') }}"
                class="bg-[#73131DC9] text-white px-4 py-2 rounded-lg shadow hover:bg-[#73131d]">
                {{ __('main.add_user') }} +
            </a>
        </div>

        <!-- User List Headers -->
        <div class="hidden md:grid grid-cols-7 gap-4 font-semibold text-gray-700 mb-2">
            <div class="text-[#73131d]">{{ __('main.user') }}</div>
            <div class="text-[#73131d]">{{ __('main.email') }}</div>
            <div class="text-[#73131d]">{{ __('main.role') }}</div>
            <div class="text-[#73131d]">{{ __('main.join_date') }}</div>
            <div class="text-right text-[#73131d]">{{ __('main.action') }}</div>
        </div>

        <!-- User List Container -->
        @foreach ($teachers as $teacher)
            <div class="grid grid-cols-7 gap-4 items-center p-4 rounded-lg shadow mb-2 bg-[#e4ce96]">
                <!-- teacher Info -->
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gray-300 rounded-full">
                        <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('images/default-avatar.png') }}"
                            alt="{{ __('main.teacher_photo') }}" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <div class="font-medium">{{ $teacher->name }}</div>
                    </div>
                </div>

                <!-- Email -->
                <div class="text-gray-700">{{ $teacher->email }}</div>

                <!-- role -->
                <div class="text-gray-700">{{ $teacher->role }}</div>

                <!-- Join Date -->
                <div class="text-gray-700">{{ $teacher->created_at }}</div>

                <!-- Actions -->
                <div class="flex justify-end items-center space-x-3 text-gray-600 text-lg">
                    <a href="{{ route('admin.users.show', $teacher) }}" class="hover:text-blue-600"><i
                            class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.users.edit', $teacher->id) }}" class="hover:text-yellow-600"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.users.delete', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('main.confirm_delete_teacher') }}');" type="submit"
                            class="hover:text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
</x-panel>
