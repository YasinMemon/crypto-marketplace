<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoPlace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/api.js') }}" buffer></script>
    </head>
<body class="bg-gradient-to-b from-purple-900 to-indigo-900 text-white min-h-screen flex flex-col justify-between">

    <!-- Header -->
    <header class="flex flex-wrap justify-between items-center px-6 py-4">
        <div class="text-2xl font-bold">Crypto<span class="text-indigo-400">place</span></div>
        <nav class="flex flex-wrap space-x-4 mt-2 md:mt-0">
            <a href="#" class="hover:text-indigo-400">Home</a>
            <a href="#" class="hover:text-indigo-400">Futures</a>
            <a href="#" class="hover:text-indigo-400">Blog</a>
        </nav>
        <div class="flex items-center space-x-4 mt-2 md:mt-0">
            <select class="bg-transparent border border-indigo-400 text-sm px-2 py-1 rounded">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
            <a href="#" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Sign Up</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="text-center mt-16 px-4">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight">Largest <br> Crypto Marketplace</h1>
        <p class="mt-4 text-base md:text-lg">Welcome to the world's largest cryptoCurrency Market Place.<br> Sign up to explore more Crypto Currency.</p>

        <div class="mt-8 flex justify-center">
            <input type="text" id="searchInput" placeholder="Search crypto..." class="px-4 py-2 w-full max-w-sm text-black rounded-l">
            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-r">Search</button>
        </div>
    </main>

    <!-- Crypto Table -->
    <section class="mt-16 px-4">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-purple-800 text-indigo-400">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Coins</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">24 Hours</th>
                        <th class="px-4 py-2">Market Cap</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-white">
                    <!-- Data rows will be appended here -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-16 py-4 bg-purple-800 text-center text-indigo-400">
        <p>&copy; 2024 Company, Inc</p>
    </footer>
</body>
</html>
