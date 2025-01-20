<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptoplace</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-b from-indigo-900 to-purple-900 text-white min-h-screen">

    <!-- Navbar -->
    <nav class="flex justify-between items-center p-4 bg-indigo-800">
        <div class="text-2xl font-bold">Cryptoplace</div>
        <ul class="flex gap-6 items-center">
            <li class="hover:text-gray-300 cursor-pointer">Home</li>
            <li class="hover:text-gray-300 cursor-pointer">Futures</li>
            <li class="hover:text-gray-300 cursor-pointer">Blog</li>
            <li class="relative group">
                <button class="flex items-center">
                    USD
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="absolute left-0 mt-2 bg-indigo-700 hidden group-hover:block">
                    <li class="px-4 py-2 hover:bg-indigo-600">USD</li>
                    <li class="px-4 py-2 hover:bg-indigo-600">EUR</li>
                </ul>
            </li>
            <li>
                <button class="bg-white text-indigo-800 px-4 py-2 rounded hover:bg-gray-200">SignUp</button>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex flex-col items-center mt-20">
        <div class="text-center">
            <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin Logo" class="w-16 h-16 mx-auto">
            <h1 class="text-4xl font-bold mt-4">Bitcoin (BTC)</h1>
        </div>
        <!-- Chart -->
        <div class="mt-8 w-11/12 md:w-2/3">
            <img src="https://via.placeholder.com/800x300" alt="Chart" class="w-full">
        </div>
    </div>
    
</body>
</html>
