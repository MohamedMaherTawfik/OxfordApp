<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-screen h-screen m-0 p-0 overflow-hidden font-sans">

    <div class="flex w-full h-full">

        <!-- Left Side: Background Image with Overlay -->
        <div class="w-1/2 relative bg-cover bg-center" style="background-image: url('{{ asset('images/backs.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-10">
                <div class="text-white opacity-75 text-lg font-semibold leading-relaxed text-center max-w-md">
                    Welcome back!<br />
                    Continue your journey where you left off.<br />
                    Learn, grow, and succeed—all in one place.<br />
                    Sign in and get started.
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-1/2 flex items-center justify-center bg-gray-900 p-10 text-white">
            <div class="w-full max-w-md space-y-6">

                <h2 class="text-3xl font-bold text-center">Login</h2>
                <form class="space-y-4" action="{{ route('signin') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        @error('email')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        @error('password')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-6 rounded-lg bg-purple-600 hover:bg-purple-800 transition text-white font-semibold">
                            Login
                        </button>
                    </div>
                </form>

                <!-- Social Buttons -->
                <div class="flex items-center justify-center gap-4">
                    <button
                        class="bg-white text-black px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-200"
                        style="width: 40%;">
                        <img src="https://img.icons8.com/color/24/google-logo.png" alt="Google" />
                        Google
                    </button>

                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-blue-700"
                        style="width: 40%;">
                        <img src="https://img.icons8.com/ios-filled/24/ffffff/facebook-new.png" alt="Facebook" />
                        Facebook
                    </button>
                </div>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-purple-400 hover:underline">Register</a>
                </p>

            </div>
        </div>
    </div>

</body>

</html>
