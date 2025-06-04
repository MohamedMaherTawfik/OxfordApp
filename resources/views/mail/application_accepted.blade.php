<?php
use App\Models\applyTeacher;
$apply = applyTeacher::where('user_id', $user->id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Accepted</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-md w-full text-center">
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Application Accepted!</h1>
        <p class="text-gray-600 mb-4">Congratulations! Your application has been successfully accepted as A teacher in
            Oxford.
        <p>
            You can now Start Making Courses as {{ $apply->topics }}</p>
        </p>
        <p>Your Email: {{ $user->email }}</p>
        <p>Your Password: {{ $user->password }}</p>
        <a href="{{ route('home') }}"
            class="inline-block mt-4 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition duration-300">
            Go to Homepage
        </a>
    </div>
</body>

</html>
