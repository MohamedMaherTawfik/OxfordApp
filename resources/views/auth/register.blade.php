<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-screen h-screen m-0 p-0 overflow-hidden font-sans">

    <div class="flex w-full h-full">

        <!-- Left Side: Background Image with Overlay -->
        <div class="w-1/2 relative bg-cover bg-center" style="background-image: url('{{ asset('images/backs.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-10">
                <div class="text-white opacity-75 text-lg font-semibold leading-relaxed text-center max-w-md">
                    Start your educational journey with us now.<br />
                    Learn new skills in an easy way.<br />
                    All in one place, easy to use.<br />
                    Certified content and trusted certificates await you.<br />
                    Create your free account now and take the first step toward your future.
                </div>
            </div>
        </div>

        <!-- Right Side: Dark Mode Form -->
        <div class="w-1/2 flex items-center justify-center bg-gray-900 p-10 text-white">
            <div class="w-full max-w-md space-y-6">

                <h2 class="text-3xl font-bold text-center">Create New Account</h2>

                <form class="space-y-4" action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label class="block text-sm font-medium mb-1">UserName</label>
                        <input type="text" name="name" placeholder="UserName"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('name')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Register As</label>
                        <select name="role"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                            <option value="">Select Role</option>
                            <option value="user">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        @error('role')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('email')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full space-y-4">
                        <label for="photo" class="block text-sm font-medium text-white">
                            Upload Photo
                        </label>
                        <input type="file" name="photo"
                            class="block w-full text-sm text-white
               file:mr-4 file:py-2 file:px-4
               file:rounded-lg file:border-0
               file:text-sm file:font-semibold
               file:bg-[#73131DD2] file:text-white
               hover:file:bg-[#73131d]" />
                        @error('photo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('password')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-6 rounded-lg bg-[#73131DCB] hover:bg-[#73131d] transition  text-white font-semibold">
                            Create Account
                        </button>
                    </div>
                </form>

                <!-- Social Buttons -->
                {{-- <div class="flex items-center justify-center gap-4">
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
                </div> --}}

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[#FFFFFFFF] hover:underline">Login</a>
                </p>

            </div>
        </div>

    </div>

</body>

</html>
