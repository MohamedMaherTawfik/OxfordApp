<x-gatelayout>

    <div class="mt-15">.</div>
    <div class="mt-15">.</div>
    <section class="bg-white py-16 mt-8">
        <div class="container mx-auto">

            <!-- Text Content & Button Side by Side -->
            <div class="flex flex-col lg:flex-row items-start gap-10 ">

                <!-- Left: Headings -->
                <div class="lg:w-1/2">
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        Welcome to GATE, the <br>
                        Professional Studies Training Portal
                    </h1>
                </div>

                <!-- Right: Description & Button -->
                <div class="lg:w-1/2">
                    <p class="text-gray-600">
                        We aim to prepare the best leadership and professional competencies, as we strive to develop
                        your skills and enhance your capabilities through specialized training programs that enable you
                        to excel in your fields of work.
                    </p>
                    <a href="#"
                        class="inline-flex items-center px-6 py-3 bg-[#79131d] text-white font-medium rounded hover:bg-[#530B12FF] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Join Now
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container mx-auto">

            <!-- Video Section Alone -->
            <div class="relative w-full mx-auto" style="max-width: 100%;">

                <!-- Auto-play video with reduced height -->
                <video id="homeVideo" class="w-full rounded-xl shadow-lg object-cover h-[520px]" autoplay muted
                    playsinline poster="{{ asset('web/graduation-group.jpg') }}">
                    <source src="{{ asset('web/video.mp4') }}" type="video/mp4">
                </video>

            </div>

        </div>
    </section>

    <section class="py-10 px-4">
        <div class="max-w-7xl mx-auto">

            <div class="max-w-7xl mx-auto lg:flex lg:items-start lg:gap-16">

                <!-- Left Title -->
                <div class="lg:w-1/2 mb-6 lg:mb-0">
                    <h1 class="text-5xl font-bold text-gray-900">
                        Get a certified professional education
                    </h1>
                </div>

                <!-- Right Text -->
                <div class="lg:w-1/2">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        We offer you a real opportunity to develop your skills and acquire the necessary knowledge
                        required in the ever-evolving job market. Combining modern theories with practical application,
                        our
                        training programs provide you with the chance for professional growth and achieving your career
                        goals.
                        Join us and get ready to explore a new world of challenges and opportunities, and to achieve
                        success
                        in your professional journey.
                        <span class="font-semibold block mt-4">Register Free Now!</span>
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-20 mt-12 px-8">

                <!-- Program 1 -->
                <div class="p-10 hover:shadow-lg group rounded-lg  transition-shadow">
                    <div
                        class="w-20 h-20 flex items-center justify-center bg-gray-300 rotate-12 mb-4 transition-colors duration-300 text-white text-3xl font-bold rounded-full group-hover:bg-[#5e1017]">
                        01
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-4">Professional Diplomas</h3>
                    <p class="text-gray-600 mb-4">
                        Enhance your abilities and gain practical experience to excel professionally.
                    </p>
                    <a class="text-[#79131d] font-medium hover:underline">Explore specializations</a>
                </div>

                <!-- Program 2 -->
                <div class="p-10 hover:shadow-lg group rounded-lg  transition-shadow">
                    <div
                        class="w-20 h-20 flex items-center justify-center bg-gray-300 rotate-12 mb-4 transition-colors duration-300 text-white text-3xl font-bold rounded-full group-hover:bg-[#5e1017]">
                        02
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-4">Professional Master’s Degree</h3>
                    <p class="text-gray-600 mb-4">
                        Graduate degree focusing on specialization and practical skills.
                    </p>
                    <a class="text-[#79131d] font-medium hover:underline">Explore specializations</a>
                </div>

                <!-- Program 3 -->
                <div class="p-10 hover:shadow-lg group rounded-lg  transition-shadow">
                    <div
                        class="w-20 h-20 flex items-center justify-center bg-gray-300 rotate-12 mb-4 transition-colors duration-300 text-white text-3xl font-bold rounded-full group-hover:bg-[#5e1017]">
                        03
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-4">Professional Doctorate</h3>
                    <p class="text-gray-600 mb-4">
                        Advanced research and practice to enhance knowledge and skills.
                    </p>
                    <a class="text-[#79131d] font-medium hover:underline">Explore specializations</a>
                </div>

                <!-- Program 4 -->
                <div class="p-10 hover:shadow-lg group rounded-lg  transition-shadow">
                    <div
                        class="w-20 h-20 flex items-center justify-center bg-gray-300 rotate-12 mb-4 transition-colors duration-300 text-white text-3xl font-bold rounded-full group-hover:bg-[#5e1017]">
                        04
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-4">Professional Fellowship</h3>
                    <p class="text-gray-600 mb-4">
                        High distinction for experts in their respective fields.
                    </p>
                    <a class="text-[#79131d] font-medium hover:underline">Explore specializations</a>
                </div>

            </div>

        </div>
    </section>

    <section class="py-16 px-4 max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <p class="text-[#79131d] text-sm font-semibold uppercase tracking-wide">THE MOST ENROLLED PROGRAMS FOR
                    2023</p>
                <h2 class="text-3xl font-bold text-gray-900 mt-1">{{ __('messages.program_categories') }}</h2>
            </div>
            <a href="{{ route('gate.diplomas') }}"
                class="mt-6 md:mt-0 bg-[#79131d] hover:bg-[#5e1017] text-white font-medium py-2 px-6 rounded-md flex items-center gap-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                View all Diplomas
            </a>
        </div>

        <x-diplomasomponent />

    </section>

    <x-diplomascategoreycomponent />
    <!-- ✅ النشرة البريدية -->
    <section class="py-16 bg-gradient-to-r from-[#79131d] to-[#5a0f16]">
        <div
            class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl p-10 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-2/3 mb-6 md:mb-0">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">
                    {{ __('messages.subscribe_section_title') }}
                </h2>
                <p class="text-gray-600">
                    {{ __('messages.subscribe_section_desc') }}
                </p>
            </div>
            <form class="flex w-full md:w-auto gap-3">
                <input type="email" placeholder="{{ __('messages.subscribe_placeholder') }}"
                    class="border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-[#e4ce96] flex-grow">
                <button type="submit"
                    class="bg-[#79131d] text-white px-6 py-3 rounded-lg hover:bg-[#5a0f16] transition">
                    {{ __('messages.subscribe_button') }}
                </button>
            </form>
        </div>
    </section>

</x-gatelayout>
