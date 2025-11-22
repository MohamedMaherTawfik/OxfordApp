<?php
use App\Models\footer;
$footer = footer::count();
?>
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 text-white" style="background-color: #79131d">
        <div class="flex items-center h-16 px-4 border-b border-[#e4ce96]">
            <i class="fas fa-chart-line mr-2" style="color: #e4ce96"></i>
            <a href="#" class="text-xl font-bold hover:opacity-80 transition"
                style="color: #e4ce96; text-decoration: none; display: inline-block; cursor: pointer;">
                Oxford Dashboard
            </a>
        </div>

        <div class="flex-1 overflow-y-auto">
            <nav class="px-4 py-4">
                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-[#e4ce96] mb-2">{{ __('main.main') }}</h2>
                    <ul>
                        <li class="mb-1">
                            <a href="{{ route('admin.index') }}"
                                class="flex items-center px-3 py-2 rounded-lg text-white"
                                style="background-color: #e4ce96">
                                <i class="fas fa-tachometer-alt mr-3" style="color: #79131d;"></i>
                                <span style="color: #79131d; font-weight: 600;">{{ __('main.dashboard') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h2 class="text-xs uppercase tracking-wider text-indigo-400 mb-2" style="color: #e4ce96">
                        {{ __('main.applications') }}</h2>
                    <ul>
                        {{-- Students --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <span>{{ __('main.students') }}</span>
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.users') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-users mr-1"></i>
                                        {{ __('main.all_students') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-user-plus mr-1"></i>
                                        {{ __('main.add_new_student') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Teachers --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-chalkboard-user mr-2"></i>
                                    {{ __('main.teachers') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.teachers') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-users mr-1"></i>
                                        {{ __('main.all_teachers') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-user-plus mr-1"></i>
                                        {{ __('main.add_new_teacher') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Applies --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fas fa-th-list mr-2"></i>
                                    {{ __('main.applies') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.applies') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-regular fa-clock mr-2"></i>
                                        {{ __('main.pending') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.accepts') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-check mr-2"></i>
                                        {{ __('main.accepted') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.rejects') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-xmark mr-2"></i>
                                        {{ __('main.rejected') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr>

                        {{-- Courses --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fas fa-book text-xl mr-2"></i>
                                    {{ __('main.courses') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.courses.me') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        {{ __('main.my_courses') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.courses.all') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fas fa-folder-open mr-2 text-white text-lg"></i>
                                        {{ __('main.all_courses') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.courses.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-plus mr-2"></i>
                                        {{ __('main.add_new_course') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Categories --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-list mr-2"></i>
                                    {{ __('main.categories') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.categories') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-list mr-2"></i>
                                        {{ __('main.all_categories') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('admin.categories.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-book-medical mr-2"></i>
                                        {{ __('main.create_category') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr>
                        <hr>

                        {{-- Diplomas Category --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-layer-group mr-2"></i>
                                    {{ __('main.diplomas_category') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('diplomas.categorey.index') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-list mr-2"></i>
                                        {{ __('main.all_diplomas_categories') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- All Diplomas --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-layer-group mr-2"></i>
                                    {{ __('main.all_diplomas') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('diplomas.index') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-list mr-2"></i>
                                        {{ __('main.all_diplomas') }}
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('diplomas.create') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-plus mr-2"></i>
                                        {{ __('main.create_diploma') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr>

                        {{-- Footer Settings --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-globe mr-2"></i>
                                    {{ __('main.footer_settings') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                @if ($footer > 0)
                                    <li class="mb-1">
                                        <a href="{{ route('admin.footers.edit') }}"
                                            class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                            style="color: #e4ce96;">
                                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                                            {{ __('main.edit_footer') }}
                                        </a>
                                    </li>
                                @else
                                    <li class="mb-1">
                                        <a href="{{ route('admin.footers') }}"
                                            class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                            style="color: #e4ce96;">
                                            <i class="fa-solid fa-share-nodes mr-2"></i>
                                            {{ __('main.create_footer') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        {{-- Homepage --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-house mr-2"></i>
                                    {{ __('main.homepage') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.home') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-image mr-2"></i>
                                        {{ __('main.sign_photos') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Homepage --}}
                        <li class="mb-1 group">
                            <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg"
                                style="color: #e4ce96">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-credit-card mr-2"></i>
                                    {{ __('main.payment') }}
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform"></i>
                            </a>
                            <ul class="ml-6 mt-1 hidden group-hover:block">
                                <li class="mb-1">
                                    <a href="{{ route('admin.payments.index') }}"
                                        class="flex items-center px-3 py-2 rounded-lg text-sm hover:bg-[#E4CE9648]"
                                        style="color: #e4ce96;">
                                        <i class="fa-solid fa-credit-card mr-2"></i>
                                        {{ __('main.payment') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>


        <div class="p-4 border-t border-[#e4ce96]">
            <div class="flex items-center">
                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541' }}"
                    alt="{{ Auth::user()->name ?? 'Guest' }}" class="w-8 h-8 mr-2 rounded-full object-cover">
                <div>
                    <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[#e4ce96]">Admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
