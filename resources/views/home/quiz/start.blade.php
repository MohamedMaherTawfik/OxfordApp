<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $quiz->title }} - Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <!-- Quiz Container -->
        <div class="w-full max-w-3xl bg-white p-6 rounded-lg shadow" x-data="{ activeTab: 'question0' }">
            <h1 class="text-2xl font-bold text-[#79131d] mb-4">{{ $quiz->title }}</h1>
            <p class="text-gray-700 mb-2">Duration: {{ $quiz->duration }} minutes</p>
            <p class="text-gray-600 mb-6">Answer the following questions:</p>

            <!-- Tabs Navigation -->
            <div class="flex space-x-2 mb-6 overflow-x-auto">
                @foreach ($quiz->questions as $index => $question)
                    <button type="button" class="px-4 py-2 rounded border text-sm font-semibold"
                        :class="activeTab === 'question{{ $index }}' ? 'bg-[#79131d] text-[#e4ce96]' :
                            'bg-white text-gray-700 border-gray-300'"
                        @click="activeTab = 'question{{ $index }}'">
                        Q{{ $index + 1 }}
                    </button>
                @endforeach
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('student.quiz.submit', $quiz->slug) }}">
                @csrf

                @foreach ($quiz->questions as $index => $question)
                    <div x-show="activeTab === 'question{{ $index }}'" x-transition class="space-y-4">
                        <h2 class="font-semibold text-lg">{{ $index + 1 }}. {{ $question->question }}</h2>
                        @foreach ($question->options as $option)
                            <label class="block bg-gray-50 p-3 rounded border">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"
                                    class="mr-2">
                                {{ $option->option_text }}
                            </label>
                        @endforeach
                    </div>
                @endforeach

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit"
                        class="bg-[#79131d] text-[#e4ce96] px-6 py-2 rounded hover:bg-[#5a0e16] transition">
                        Submit Answers
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
