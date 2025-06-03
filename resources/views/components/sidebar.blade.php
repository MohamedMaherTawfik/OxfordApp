<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-indigo-800 text-white">
        <div class="flex items-center h-16 px-4 border-b border-indigo-700">
            <i class="fas fa-chart-line mr-2"></i>
            <h1 class="text-xl font-bold">Oxford Dashboard</h1>
        </div>

        <div class="flex-1 overflow-y-auto">
            <nav class="px-4 py-4">
                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-indigo-400 mb-2">Main</h2>
                    <ul>
                        <li class="mb-1">
                            <a href="#" class="flex items-center px-3 py-2 rounded-lg bg-indigo-900 text-white">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-indigo-400 mb-2">Applications</h2>
                    <ul>
                        <li class="mb-1 group">
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-700">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    Student
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.users') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-users mr-2"></i>
                                        All Student
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Add New Student
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-700">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    Teachers
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.teachers') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-users mr-2"></i>
                                        All Teachers
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Add New Teachers
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-700">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    Applies
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.applies') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-users mr-2"></i>
                                        Pending
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.accepts') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Accepted
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.rejects') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Rejected
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-1 group">
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-700">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3"></i>
                                    Courses
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.users') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-users mr-2"></i>
                                        All Courses
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-600 text-sm">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Add New Course
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="p-4 border-t border-indigo-700">
            <div class="flex items-center">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full mr-2"
                    alt="Profile">
                <div>
                    <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-indigo-300">Admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
