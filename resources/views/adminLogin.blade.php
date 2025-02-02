<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md animate-fade-in">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Admin Login</h1>

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-medium px-4 py-2 rounded-lg shadow-md hover:from-blue-600 hover:to-purple-600 transition duration-300 ease-in-out">
                    Login
                </button>
            </div>
        </form>
    </div>
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 1s ease-in-out;
        }
    </style>
</body>
</html>