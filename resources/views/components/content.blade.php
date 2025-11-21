<?php
use App\Models\User;
use App\Models\Courses;
use App\Models\applyTeacher;
$totalUsers = User::where('role', 'user')->get();
$totalTeachers = User::where('role', 'teacher')->get();
$users = User::orderBy('created_at', 'desc')->get();
$courses = Courses::get();
$pendings = applyTeacher::where('status', 'pending')->get();
?>
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

<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto p-6 bg-gray-50">

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">{{ __('teacher.total_students') }}</p>
                    <h3 class="text-2xl font-bold">{{ count($totalUsers) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 12% {{ __('teacher.from_last_month') }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">{{ __('teacher.total_courses') }}</p>
                    <h3 class="text-2xl font-bold">{{ count($courses) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fa-solid fa-book"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 8% {{ __('teacher.from_last_month') }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">{{ __('teacher.teachers') }}</p>
                    <h3 class="text-2xl font-bold">{{ count($totalTeachers) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
            </div>
            <p class="text-sm text-red-500 mt-2">
                <i class="fas fa-arrow-down mr-1"></i> 3% {{ __('teacher.from_last_month') }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">{{ __('teacher.pendings_teacher') }}</p>
                    <h3 class="text-2xl font-bold">{{ count($pendings) }}</h3>
                </div>
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2">
                <i class="fas fa-arrow-up mr-1"></i> 2% {{ __('teacher.from_last_month') }}
            </p>
        </div>
    </div>

    <!-- User Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold">{{ __('teacher.recent_users') }}</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('teacher.name') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('teacher.email') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('teacher.status') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('teacher.role') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('teacher.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users->sortByDesc('created_at') as $user)
                        <tr> </tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ __('teacher.active') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">{{ __('teacher.edit') }}</a>
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4"
                                    onclick="return confirm('{{ __('teacher.delete_confirm') }}')">
                                    {{ __('teacher.delete') }}
                                </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>


</div>
