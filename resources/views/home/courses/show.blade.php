<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - {{ __('course.details_page_title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        /* تصحيح المسافات تلقائياً حسب الاتجاه */
        [dir="rtl"] .space-x-2> :not([hidden])~ :not([hidden]) {
            margin-right: 0.5rem;
            margin-left: 0;
        }

        [dir="ltr"] .space-x-2> :not([hidden])~ :not([hidden]) {
            margin-left: 0.5rem;
            margin-right: 0;
        }

        .course-hero {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
    </style>
</head>

<body class="bg-gray-50">

    <x-navbar />

    <div class="mt-10">.</div>
    <div class="mt-5">.</div>

    <section class="course-hero py-16 bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div
                class="flex flex-col lg:flex-row gap-8 lg:gap-12 {{ app()->getLocale() === 'ar' ? 'lg:flex-row-reverse' : '' }}">

                <!-- Image - Enhanced -->
                <div class="lg:w-2/5">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent z-10"></div>
                        <img src="{{ $course->cover_photo_url }}"
                            class="w-full h-96 lg:h-[500px] object-cover transition-transform duration-500 group-hover:scale-110">
                        <!-- Badge -->
                        <div class="absolute top-4 {{ app()->getLocale() === 'ar' ? 'left-4' : 'right-4' }} z-20">
                            <span class="px-4 py-2 bg-[#79131d] text-white rounded-full text-sm font-bold shadow-lg">
                                {{ $course->category->name }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content - Enhanced -->
                <div
                    class="lg:w-3/5 flex flex-col justify-center space-y-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">

                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ $course->title }}
                        </h1>
                        <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                            {{ Str::limit($course->description, 200) }}
                        </p>
                    </div>

                    <!-- Info Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-6">
                        <div
                            class="bg-white/80 backdrop-blur-sm p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div
                                class="flex items-center gap-3 {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                <div class="p-2 bg-[#79131d]/10 rounded-lg">
                                    <svg class="w-6 h-6 text-[#79131d]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                    <p class="text-sm text-gray-500">{{ __('messages.starts') }}</p>
                                    <p class="font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white/80 backdrop-blur-sm p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div
                                class="flex items-center gap-3 {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                <div class="p-2 bg-[#79131d]/10 rounded-lg">
                                    <svg class="w-6 h-6 text-[#79131d]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                    <p class="text-sm text-gray-500">{{ __('messages.duration') }}</p>
                                    <p class="font-semibold text-gray-900">{{ $course->duration }}
                                        {{ __('messages.hours') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Price & CTA - Hidden until schedule selection -->
                    <div class="bg-gradient-to-r from-[#79131d] to-[#5a0f16] p-6 rounded-2xl shadow-xl">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p class="text-white/80 text-sm mb-1">{{ __('messages.pricing') }}</p>
                                <p class="text-4xl font-bold text-white">
                                    {{ $course->admin_price > 0 ? number_format($course->admin_price, 2) : number_format($course->price, 2) }}
                                    <span class="text-2xl text-[#e4ce96]">{{ __('messages.currency') }}</span>
                                </p>
                            </div>
                            <!-- Payment button will be shown after schedule selection -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Training Schedule Selection - Updated -->
    <section class="py-12 bg-white" x-data="scheduleSelector()">
        <div class="container mx-auto px-4 md:px-6">
            <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                <span
                    class="inline-block pb-2 border-b-4 border-[#79131d]">{{ __('messages.select_training_days') }}</span>
            </h3>
            <div class="max-w-5xl mx-auto">
                <div
                    class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 p-6">

                    <!-- Schedule Table -->
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-[#79131d] to-[#5a0f16]">
                                <tr>
                                    <th
                                        class="px-6 py-4 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white font-semibold">
                                        {{ __('messages.day') }}</th>
                                    <th class="px-6 py-4 text-center text-white font-semibold">
                                        {{ __('messages.select_time') }}</th>
                                    <th class="px-6 py-4 text-center text-white font-semibold">
                                        {{ __('messages.select_day') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @php
                                    $days = [
                                        'saturday' => __('messages.saturday'),
                                        'sunday' => __('messages.sunday'),
                                        'monday' => __('messages.monday'),
                                        'tuesday' => __('messages.tuesday'),
                                        'wednesday' => __('messages.wednesday'),
                                        'thursday' => __('messages.thursday'),
                                    ];
                                @endphp

                                @foreach ($days as $dayKey => $dayName)
                                    <tr class="hover:bg-gray-50 transition-colors"
                                        :class="selectedDays.includes('{{ $dayKey }}') ? 'bg-green-50' : ''">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $dayName }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <select x-model="scheduleTimes.{{ $dayKey }}"
                                                class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                                                <option value="">-- {{ __('messages.select_time') }} --</option>
                                                @php $printed = []; @endphp
                                                @foreach ($schedule as $item)
                                                    @if ($item->day == $dayKey)
                                                        @php
                                                            $startTime = new \DateTime($item->start_time);
                                                            $endTime = new \DateTime($item->end_time);

                                                            $start = $startTime->format('g:i A');
                                                            $end = $endTime->format('g:i A');

                                                            $timeValue =
                                                                $item->start_time .
                                                                '|' .
                                                                $item->end_time .
                                                                '|' .
                                                                $item->id;
                                                        @endphp

                                                        @if (!in_array($timeValue, $printed))
                                                            @php $printed[] = $timeValue; @endphp
                                                            <option value="{{ $timeValue }}">{{ $start }} -
                                                                {{ $end }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="checkbox" x-model="selectedDays" value="{{ $dayKey }}"
                                                @change="handleDaySelection('{{ $dayKey }}')"
                                                class="w-5 h-5 text-[#79131d] border-gray-300 rounded focus:ring-[#79131d]">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div x-show="selectedDays.length > 0 && selectedDays.every(day => scheduleTimes[day])"
                        class="text-center">
                        <div class="flex flex-wrap justify-center gap-4 mt-6">

                            {{-- Visa Enabled --}}
                            @if ($visaenables->visa_enable == 1)
                                @guest
                                    <form action="{{ route('pay.form.login', [$course, 'visa']) }}" method="post">
                                        @csrf
                                        <template x-for="day in selectedDays" :key="day">
                                            <div>
                                                <input type="hidden" :name="'days[' + day + '][id]'"
                                                    :value="scheduleTimes[day].split('|')[2]">
                                                <input type="hidden" :name="'days[' + day + '][start_time]'"
                                                    :value="scheduleTimes[day].split('|')[0]">
                                                <input type="hidden" :name="'days[' + day + '][end_time]'"
                                                    :value="scheduleTimes[day].split('|')[1]">
                                            </div>
                                        </template>
                                        <button type="submit"
                                            class="px-8 py-4 bg-gradient-to-r from-[#79131d] to-[#5a0f16] text-white font-bold rounded-xl">
                                            {{ __('messages.proceed_to_payment') }}
                                        </button>
                                    </form>
                                @endguest

                                @auth
                                    <form action="{{ route('pay.form.auth', $course) }}" method="get">
                                        @csrf
                                        <template x-for="day in selectedDays" :key="day">
                                            <div>
                                                <input type="hidden" :name="'days[' + day + '][id]'"
                                                    :value="scheduleTimes[day].split('|')[2]">
                                                <input type="hidden" :name="'days[' + day + '][start_time]'"
                                                    :value="scheduleTimes[day].split('|')[0]">
                                                <input type="hidden" :name="'days[' + day + '][end_time]'"
                                                    :value="scheduleTimes[day].split('|')[1]">
                                            </div>
                                        </template>
                                        <button type="submit"
                                            class="px-8 py-4 bg-gradient-to-r from-[#79131d] to-[#5a0f16] text-white font-bold rounded-xl">
                                            {{ __('messages.proceed_to_payment') }}
                                        </button>
                                    </form>
                                @endauth
                            @endif

                            {{-- Cash Enabled --}}
                            @if ($visaenables->cash_enable == 1)
                                @guest
                                    <form action="{{ route('pay.form.login', [$course, 'cash']) }}" method="POST">
                                        @csrf
                                        <template x-for="day in selectedDays" :key="day">
                                            <div>
                                                <input type="hidden" :name="'days[' + day + '][id]'"
                                                    :value="scheduleTimes[day].split('|')[2]">
                                                <input type="hidden" :name="'days[' + day + '][start_time]'"
                                                    :value="scheduleTimes[day].split('|')[0]">
                                                <input type="hidden" :name="'days[' + day + '][end_time]'"
                                                    :value="scheduleTimes[day].split('|')[1]">
                                            </div>
                                        </template>
                                        <button type="submit"
                                            class="px-8 py-4 bg-gray-700 text-white font-bold rounded-xl">
                                            الدفع لاحقاً
                                        </button>
                                    </form>
                                @endguest

                                @auth
                                    <form action="{{ route('pay.later.auth', $course) }}" method="get">
                                        @csrf
                                        <template x-for="day in selectedDays" :key="day">
                                            <div>
                                                <input type="hidden" :name="'days[' + day + '][id]'"
                                                    :value="scheduleTimes[day].split('|')[2]">
                                                <input type="hidden" :name="'days[' + day + '][start_time]'"
                                                    :value="scheduleTimes[day].split('|')[0]">
                                                <input type="hidden" :name="'days[' + day + '][end_time]'"
                                                    :value="scheduleTimes[day].split('|')[1]">
                                            </div>
                                        </template>
                                        <button type="submit"
                                            class="px-8 py-4 bg-gray-700 text-white font-bold rounded-xl">
                                            الدفع لاحقاً
                                        </button>
                                    </form>
                                @endauth
                            @endif
                        </div>
                    </div>


                    <!-- Warning if no days selected -->
                    <div x-show="selectedDays.length === 0" x-transition class="text-center">
                        <p class="text-gray-500 italic">{{ __('messages.please_select_days') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function scheduleSelector() {
                return {
                    selectedDays: [],
                    scheduleTimes: {
                        saturday: '',
                        sunday: '',
                        monday: '',
                        tuesday: '',
                        wednesday: '',
                        thursday: ''
                    },

                    handleDaySelection(day) {
                        // Sunday logic
                        if (day === 'sunday') {
                            if (this.selectedDays.includes('sunday')) {
                                if (!this.selectedDays.includes('tuesday')) this.selectedDays.push('tuesday');
                                if (!this.selectedDays.includes('thursday')) this.selectedDays.push('thursday');
                                if (this.scheduleTimes.sunday) {
                                    this.scheduleTimes.tuesday = this.scheduleTimes.sunday;
                                    this.scheduleTimes.thursday = this.scheduleTimes.sunday;
                                }
                            } else {
                                this.selectedDays = this.selectedDays.filter(d => d !== 'tuesday' && d !== 'thursday');
                                this.scheduleTimes.tuesday = '';
                                this.scheduleTimes.thursday = '';
                            }
                        }

                        // Saturday logic
                        if (day === 'saturday') {
                            if (this.selectedDays.includes('saturday')) {
                                if (!this.selectedDays.includes('monday')) this.selectedDays.push('monday');
                                if (!this.selectedDays.includes('wednesday')) this.selectedDays.push('wednesday');
                                if (this.scheduleTimes.saturday) {
                                    this.scheduleTimes.monday = this.scheduleTimes.saturday;
                                    this.scheduleTimes.wednesday = this.scheduleTimes.saturday;
                                }
                            } else {
                                this.selectedDays = this.selectedDays.filter(d => d !== 'monday' && d !== 'wednesday');
                                this.scheduleTimes.monday = '';
                                this.scheduleTimes.wednesday = '';
                            }
                        }

                        // Ensure dependencies
                        if ((day === 'monday' || day === 'wednesday') && this.selectedDays.includes(day)) {
                            if (!this.selectedDays.includes('saturday')) this.selectedDays.push('saturday');
                        }
                        if ((day === 'tuesday' || day === 'thursday') && this.selectedDays.includes(day)) {
                            if (!this.selectedDays.includes('sunday')) this.selectedDays.push('sunday');
                        }
                    }
                }
            }
        </script>
    </section>


    <!-- Course Content Section - Enhanced -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-5xl mx-auto">
                <!-- What You Will Learn -->
                <div class="mb-16">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="p-3 bg-[#79131d]/10 rounded-xl">
                            <svg class="w-8 h-8 text-[#79131d]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">{{ __('messages.what_you_will_learn') }}</h2>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-200 shadow-lg {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        <div
                            class="prose max-w-none text-gray-700 leading-relaxed text-lg {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            {!! nl2br(e($course->description)) !!}
                        </div>
                    </div>
                </div>

                <!-- Course Details - Enhanced -->
                <div class="border-t-2 border-gray-200 pt-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">
                        <span
                            class="inline-block pb-2 border-b-4 border-[#79131d]">{{ __('messages.course_details') }}</span>
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Course Info Card -->
                        <div
                            class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl border-2 border-gray-200 shadow-xl hover:shadow-2xl hover:border-[#79131d] transition-all duration-300">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-3 bg-[#79131d]/10 rounded-xl">
                                    <svg class="w-6 h-6 text-[#79131d]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">{{ __('messages.course_info') }}</h3>
                            </div>
                            <ul class="space-y-4">
                                <li
                                    class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'justify-between' }} items-center p-3 bg-white rounded-lg border border-gray-100">
                                    <span class="text-gray-600 font-medium">{{ __('messages.category') }}:</span>
                                    <span
                                        class="px-3 py-1 bg-[#79131d]/10 text-[#79131d] rounded-full font-semibold">{{ $course->category->name }}</span>
                                </li>
                                <li
                                    class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'justify-between' }} items-center p-3 bg-white rounded-lg border border-gray-100">
                                    <span class="text-gray-600 font-medium">{{ __('messages.start_date') }}:</span>
                                    <span
                                        class="text-gray-900 font-semibold">{{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                                </li>
                                <li
                                    class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'justify-between' }} items-center p-3 bg-white rounded-lg border border-gray-100">
                                    <span class="text-gray-600 font-medium">{{ __('messages.duration') }}:</span>
                                    <span class="text-gray-900 font-semibold">{{ $course->duration }}
                                        {{ __('messages.hours') }}</span>
                                </li>
                                <li
                                    class="flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : 'justify-between' }} items-center p-3 bg-white rounded-lg border border-gray-100">
                                    <span class="text-gray-600 font-medium">{{ __('messages.created_at') }}:</span>
                                    <span
                                        class="text-gray-900 font-semibold">{{ \Carbon\Carbon::parse($course->created_at)->format('M d, Y') }}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Pricing Card -->
                        <div
                            class="bg-gradient-to-br from-[#79131d] to-[#5a0f16] p-8 rounded-2xl shadow-2xl text-white">
                            <div
                                class="flex items-center gap-3 mb-6 {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3
                                    class="text-xl font-bold {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                    {{ __('messages.pricing') }}</h3>
                            </div>
                            <div class="mb-6">
                                <p class="text-white/80 text-sm mb-2">{{ __('messages.enroll_course') }}</p>
                                <p class="text-5xl font-bold mb-2">
                                    {{ $course->admin_price > 0 ? number_format($course->admin_price, 2) : number_format($course->price, 2) }}
                                </p>
                                <p class="text-2xl text-[#e4ce96] font-semibold">{{ __('messages.currency') }}</p>
                            </div>
                            <!-- Payment button hidden - will be shown after schedule selection -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Instructor - Enhanced -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">
                <span class="inline-block pb-2 border-b-4 border-[#79131d]">{{ __('messages.instructor') }}</span>
            </h2>
            <div class="max-w-3xl mx-auto">
                <div
                    class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                        <div class="relative">
                            <img src="{{ $course->user->photo ?? 'https://cdn.vectorstock.com/i/1000v/66/13/default-avatar-profile-icon-social-media-user-vector-49816613.jpg' }}"
                                class="w-24 h-24 rounded-full object-cover border-4 border-[#79131d] shadow-lg">
                            <div class="absolute -bottom-2 -right-2 bg-[#e4ce96] rounded-full p-2 shadow-md">
                                <svg class="w-6 h-6 text-[#79131d]" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div
                            class="flex-1 text-center sm:{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $course->user->name }}</h3>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                {{ __('messages.instructor_bio_placeholder') }}</p>
                            <div class="flex items-center gap-2 text-[#79131d]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="font-semibold">خبير معتمد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
    {{-- alpine cdn --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function scheduleSelector() {
            return {
                selectedDays: [],
                scheduleTimes: {
                    saturday: '',
                    sunday: '',
                    monday: '',
                    tuesday: '',
                    wednesday: '',
                    thursday: ''
                },

                handleDaySelection(day) {
                    // Sunday logic
                    if (day === 'sunday') {
                        if (this.selectedDays.includes('sunday')) {
                            if (!this.selectedDays.includes('tuesday')) this.selectedDays.push('tuesday');
                            if (!this.selectedDays.includes('thursday')) this.selectedDays.push('thursday');
                            if (this.scheduleTimes.sunday) {
                                this.scheduleTimes.tuesday = this.scheduleTimes.sunday;
                                this.scheduleTimes.thursday = this.scheduleTimes.sunday;
                            }
                        } else {
                            this.selectedDays = this.selectedDays.filter(d => d !== 'tuesday' && d !== 'thursday');
                            this.scheduleTimes.tuesday = '';
                            this.scheduleTimes.thursday = '';
                        }
                    }

                    // Saturday logic
                    if (day === 'saturday') {
                        if (this.selectedDays.includes('saturday')) {
                            if (!this.selectedDays.includes('monday')) this.selectedDays.push('monday');
                            if (!this.selectedDays.includes('wednesday')) this.selectedDays.push('wednesday');
                            if (this.scheduleTimes.saturday) {
                                this.scheduleTimes.monday = this.scheduleTimes.saturday;
                                this.scheduleTimes.wednesday = this.scheduleTimes.saturday;
                            }
                        } else {
                            this.selectedDays = this.selectedDays.filter(d => d !== 'monday' && d !== 'wednesday');
                            this.scheduleTimes.monday = '';
                            this.scheduleTimes.wednesday = '';
                        }
                    }

                    // Monday/Wednesday requires Saturday
                    if ((day === 'monday' || day === 'wednesday') && this.selectedDays.includes(day)) {
                        if (!this.selectedDays.includes('saturday')) this.selectedDays.push('saturday');
                    }

                    // Tuesday/Thursday requires Sunday
                    if ((day === 'tuesday' || day === 'thursday') && this.selectedDays.includes(day)) {
                        if (!this.selectedDays.includes('sunday')) this.selectedDays.push('sunday');
                    }
                },

                getDayName(day) {
                    const days = {
                        'saturday': '{{ __('messages.saturday') }}',
                        'sunday': '{{ __('messages.sunday') }}',
                        'monday': '{{ __('messages.monday') }}',
                        'tuesday': '{{ __('messages.tuesday') }}',
                        'wednesday': '{{ __('messages.wednesday') }}',
                        'thursday': '{{ __('messages.thursday') }}'
                    };
                    return days[day] || day;
                }
            }
        }
    </script>
</body>

</html>
