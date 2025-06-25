<!DOCTYPE html>
<html lang="en" x-data x-init="$nextTick(() => window.scrollTo(0, 0))" x-cloak>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800 font-sans">

    {{-- navbar --}}
    <x-navbar />

    <!-- Header -->
    <header class="bg-gradient-to-r from-[#79131d] to-red-600 py-12 text-white text-center">
        <h1 class="text-4xl font-bold mb-2">About Us</h1>
        <p class="text-lg">Learn more about who we are and what we do</p>
    </header>

    <!-- Section: Company Mission -->
    <section class="container mx-auto px-6 py-16" x-data="{ visible: false }" x-intersect.once="visible = true">
        <div x-show="visible" x-transition.duration.700ms>
            <h2 class="text-3xl font-bold text-center mb-6">Our Mission</h2>
            <p class="text-gray-700 max-w-3xl mx-auto text-center">
                We aim to revolutionize learning by making knowledge accessible, engaging, and practical for everyone.
                Our goal is to empower students and professionals through cutting-edge resources and expert guidance.
            </p>
        </div>
    </section>

    <!-- Section: Our Values -->
    <section class="bg-gray-50 py-16 px-6" x-data="{ visible: false }" x-intersect.once="visible = true">
        <div class="container mx-auto" x-show="visible" x-transition.opacity.duration.700ms>
            <h2 class="text-3xl font-bold text-center mb-10">Our Core Values</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                    <p class="text-gray-600">We constantly evolve to stay ahead in the educational world.</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Integrity</h3>
                    <p class="text-gray-600">We uphold transparency, honesty, and ethics in everything we do.</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Excellence</h3>
                    <p class="text-gray-600">We strive to exceed expectations in both teaching and service.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Meet the Team -->
    <section class="container mx-auto py-16 px-6" x-data="{ showTeam: false }">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold mb-4">Meet the Team</h2>
            {{-- <button @click="showTeam = !showTeam"
                class="bg-[#79131d] hover:bg-red-700 text-white px-6 py-2 rounded transition">
                {{ showTeam ? 'Hide' : 'Show' }} Team Members
            </button> --}}
        </div>

        <div class="grid md:grid-cols-3 gap-8" x-show="showTeam" x-transition.duration.600ms>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://i.pravatar.cc/100?img=1" alt="Team Member"
                    class="mx-auto rounded-full mb-4 w-24 h-24 object-cover" />
                <h3 class="text-xl font-semibold">Sarah Johnson</h3>
                <p class="text-gray-500">Founder & CEO</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://i.pravatar.cc/100?img=2" alt="Team Member"
                    class="mx-auto rounded-full mb-4 w-24 h-24 object-cover" />
                <h3 class="text-xl font-semibold">Ahmed Khan</h3>
                <p class="text-gray-500">Tech Lead</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://i.pravatar.cc/100?img=3" alt="Team Member"
                    class="mx-auto rounded-full mb-4 w-24 h-24 object-cover" />
                <h3 class="text-xl font-semibold">Lina Gomez</h3>
                <p class="text-gray-500">UX Designer</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

</body>

</html>
