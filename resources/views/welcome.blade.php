<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoPlace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/api.js') }}" buffer></script>
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #a855f7, #6366f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .loading-spinner {
            border: 4px solid #f3f4f6;
            border-top: 4px solid #6366f1;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="flex justify-between items-center px-6 py-4 bg-opacity-30 backdrop-blur-lg border-b border-gray-700 fixed w-full top-0 z-50 shadow-lg">
        <div class="text-3xl font-extrabold tracking-wide gradient-text">CryptoPlace</div>
        <nav class="flex space-x-6">
            <!-- <a href="#" class="hover:text-indigo-300 transition-all duration-300">Home</a>
            <a href="#" class="hover:text-indigo-300 transition-all duration-300">Futures</a> -->
        </nav>
        <div class="flex items-center space-x-4">
            <a href="/admin" class="hover:text-indigo-300 bg-orange-500 px-6 py-2 rounded-xl transition-all duration-300">Admin</a>
            <!-- <select class="bg-transparent border border-indigo-400 text-sm px-3 py-1 rounded-lg outline-none">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select> -->
            @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-red-500 hover:bg-red-400 transition-all duration-300 text-white rounded-lg font-semibold shadow-md">Logout</button>
                </form>
            @else
                <a href="/login" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-400 transition-all duration-300 text-white rounded-lg font-semibold shadow-md">Login</a>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="text-center mt-28 px-6">
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight gradient-text">Largest Crypto Marketplace</h1>
        <p class="mt-4 text-lg text-gray-300">Explore real-time cryptocurrency data & trends. Sign up to get started!</p>

        <div class="mt-8 flex justify-center">
            <input type="text" id="searchInput" placeholder="Search crypto..." class="px-5 py-3 w-full max-w-md text-black rounded-l-lg shadow-md outline-none">
            <button class="px-5 py-3 bg-indigo-500 hover:bg-indigo-400 transition-all duration-300 rounded-r-lg font-semibold shadow-md">Search</button>
        </div>
    </main>

    <!-- Crypto Table -->
    <section class="mt-16 px-40">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse bg-gradient-to-r from-blue-400 to-indigo-500 shadow-xl rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-indigo-700 to-indigo-900 text-white">
                    <tr>
                        <th class="px-3 py-3 text-xs sm:text-sm">#</th>
                        <th class="px-3 py-3 text-xs sm:text-sm">Coins</th>
                        <th class="px-3 py-3 text-xs sm:text-sm">Price</th>
                        <th class="px-3 py-3 text-xs sm:text-sm">24 Hours</th>
                        <th class="px-3 py-3 text-xs sm:text-sm">Market Cap</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-white">
                    <!-- Loading Indicator (Initially visible) -->
                    <tr id="loadingRow" class="text-center">
                        <td colspan="5" class="py-10 ">
                            <div class="loading-spinner mx-auto cursor-pointer"></div>
                        </td>
                    </tr>
                    <!-- Data rows will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-16 py-6 text-center text-gray-400 text-lg bg-opacity-30 backdrop-blur-lg border-t border-gray-700">
        &copy; 2025 CryptoPlace | All Rights Reserved
    </footer>

    <script>
        // Simulating data fetch for demonstration
        window.onload = () => {
            setTimeout(() => {
                const loadingRow = document.getElementById("loadingRow");
                loadingRow.style.display = "none"; // Hide loading spinner

                // Insert crypto data rows
                const tbody = document.getElementById("tbody");
                tbody.innerHTML = `
                    <tr class="hover:bg-opacity-50 hover:bg-blue-600">
                        <td class="px-3 py-3 text-xs sm:text-sm">1</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">Bitcoin</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$45,000</td>
                        <td class="px-3 py-3 text-xs sm:text-sm text-green-400">+5%</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$800B</td>
                    </tr>
                    <tr class="hover:bg-opacity-50 hover:bg-blue-600">
                        <td class="px-3 py-3 text-xs sm:text-sm">2</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">Ethereum</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$3,000</td>
                        <td class="px-3 py-3 text-xs sm:text-sm text-red-400">-2%</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$350B</td>
                    </tr>
                `;
            }, 2000); // Simulated 2-second delay for data fetch
        };
    </script>
</body>
</html>
