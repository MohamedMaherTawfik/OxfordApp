<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-900 via-gray-900 to-indigo-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 space-y-6" style="background-color: #00000062;">
        <h2 class="text-3xl font-bold text-center text-white">Create Account</h2>

        <form class="space-y-4" action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block text-sm font-medium text-white mb-1">UserName</label>
                <input type="text" name="name" placeholder="Enter UserName"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Email</label>
                <input type="email" name="email" placeholder="you@example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full space-y-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">
                    Upload Photo
                </label>
                <input type="file" name="photo" id="photo"
                    class="block w-full text-sm text-gray-500
               file:mr-4 file:py-2 file:px-4
               file:rounded-lg file:border-0
               file:text-sm file:font-semibold
               file:bg-purple-600 file:text-white
               hover:file:bg-purple-700" />
                @error('photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>



            <div>
                <label class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" name="password" placeholder="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-white">Role</label>
                <select name="role"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                    <option value="">Select Role</option>
                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ old('role') === 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="py-2 px-4 text-white rounded-lg hover:bg-purple-700 transition"
                    style="width: 25%; background-color: rgba(100, 0, 167, 0.685); ">
                    Register
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Login</a>
        </p>
    </div>

</body>

</html>
