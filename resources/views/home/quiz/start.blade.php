<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $quiz->title }} - Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind --}}
</head>

<body class="bg-gray-100">

    <div class="relative min-h-screen flex flex-col items-center justify-center p-8">

        <!-- Exit Button -->
        <form method="POST" action="{{ route('student.quiz.exit', $quiz->slug) }}"
            onsubmit="return confirm('Are you sure you want to exit? Your score will be 0.')"
            class="absolute top-4 right-4">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Exit Quiz
            </button>
        </form>

        <!-- Quiz Info -->
        <div class="w-full max-w-3xl bg-white p-6 rounded-lg shadow">
            <h1 class="text-2xl font-bold text-[#79131d] mb-4">{{ $quiz->title }}</h1>
            <p class="text-gray-700 mb-2">Duration: {{ $quiz->duration }} minutes</p>
            <p class="text-gray-600 mb-6">Answer the following questions:</p>

            {{-- Example placeholder question --}}
            <div class="mb-6">
                <h2 class="font-semibold text-lg mb-2">1. Placeholder Question?</h2>
                <div class="space-y-2">
                    <label class="block">
                        <input type="radio" name="question1" value="a" class="mr-2"> Option A
                    </label>
                    <label class="block">
                        <input type="radio" name="question1" value="b" class="mr-2"> Option B
                    </label>
                    <label class="block">
                        <input type="radio" name="question1" value="c" class="mr-2"> Option C
                    </label>
                    <label class="block">
                        <input type="radio" name="question1" value="d" class="mr-2"> Option D
                    </label>
                </div>
            </div>

            <!-- Submit Button (for real quiz logic later) -->
            <button class="bg-[#79131d] text-[#e4ce96] px-6 py-2 rounded hover:bg-[#5a0e16] transition">
                Submit Answers
            </button>
        </div>

    </div>
</body>

</html>
