<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $quiz->title }} - Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind --}}
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">

    <div class="bg-white shadow-lg rounded-lg max-w-xl w-full p-8">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-[#79131d]">Quiz Result</h1>
            <p class="text-gray-600 mt-2 text-lg">{{ $quiz->title }}</p>
        </div>

        <!-- Score Card -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
            <p class="text-lg text-gray-800 mb-2">
                <span class="font-semibold">Your Score:</span>
                <span
                    class="
                    @if ($result->score === 0) text-red-600
                    @elseif($result->score < $quiz->questions->count())
                        text-yellow-600
                    @else
                        text-green-600 @endif
                    font-bold text-xl">
                    {{ $result->score }} / {{ $quiz->questions->count() }}
                </span>
            </p>
            @php
                dd($quiz->questions->count());
            @endphp

            <p class="text-sm text-gray-600">Duration: {{ $quiz->duration }} minutes</p>

            @if ($result->score === 0)
                <div class="mt-4 bg-red-100 text-red-700 px-4 py-2 rounded">
                    You exited the quiz without submitting any answers.
                </div>
            @elseif ($result->score < $quiz->questions->count() / 2)
                <div class="mt-4 bg-yellow-100 text-yellow-800 px-4 py-2 rounded">
                    Keep practicing! You can do better next time.
                </div>
            @else
                <div class="mt-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                    Well done! You performed great! 🎉
                </div>
            @endif
        </div>

        <!-- Back to Dashboard -->
        <div class="text-center">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-1 text-[#79131d] hover:text-[#5a0e16] font-medium transition">
                <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
                Back
            </a>
        </div>
    </div>

</body>

</html>
