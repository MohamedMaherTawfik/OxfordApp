<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-900 via-gray-900 to-indigo-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 space-y-6" style="background-color: #00000062;">
        <h2 class="text-3xl font-bold text-center text-white">Login</h2>

        <form class="space-y-4" action="{{ route('signin') }}" method="POST">
            @csrf

            <div>
                <label class="block text-sm font-medium text-white mb-1">Email</label>
                <input type="email" name="email" placeholder="you@example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="py-2 px-4 text-white rounded-lg hover:bg-purple-700 transition"
                    style="width: 40%; background-color: rgba(100, 0, 167, 0.685);">
                    Login
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-300">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-purple-400 hover:underline">Register</a>
        </p>
    </div>

</body>

</html>
