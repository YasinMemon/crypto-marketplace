<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptoplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a href="{{ route('adminLogin') }}" class="hover:text-indigo-300 bg-orange-500 px-6 py-2 rounded-xl transition-all duration-300">Admin</a>
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
    <div class="flex flex-col items-center justify-center mt-28 space-y-8">

        <!-- Bitcoin Price Card -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-500 text-center">
            <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin Logo" class="w-24 h-24 mx-auto drop-shadow-lg animate-pulse">
            <h1 class="text-5xl font-bold mt-4 tracking-wide text-indigo-300">Bitcoin (BTC)</h1>
            <p class="text-2xl font-semibold mt-2 text-green-400 animate-pulse">Current Price: <span id="btc-price">$--</span></p>
            <button id="buy-now-btn" class="mt-4 px-6 py-2 bg-green-500 hover:bg-green-400 transition-all duration-300 text-white rounded-lg font-semibold shadow-md">
                Buy Now
            </button>
        </div>

        <!-- Chart Section -->
        <div class="mt-8 w-11/12 md:w-2/3 bg-indigo-900 bg-opacity-30 backdrop-blur-lg border border-indigo-600 shadow-xl rounded-xl p-6">
            <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">Bitcoin Price Chart (Last 24H)</h2>
            <canvas id="btcChart"></canvas>
        </div>

        <!-- Price Table -->
        <div class="w-11/12 md:w-2/3 bg-gray-900 bg-opacity-40 backdrop-blur-lg border border-gray-700 shadow-xl rounded-xl p-6 mt-8">
            <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">Bitcoin Market Details</h2>
            <table class="w-full text-white text-lg border-collapse">
                <tr class="border-b border-gray-600">
                    <td class="p-3">Market Crypto Rank</td>
                    <td class="p-3 text-right" id="btc-rank">--</td>
                </tr>
                <tr class="border-b border-gray-600">
                    <td class="p-3">Current Price</td>
                    <td class="p-3 text-right text-green-400" id="btc-price-table">$--</td>
                </tr>
                <tr class="border-b border-gray-600">
                    <td class="p-3">Market Cap</td>
                    <td class="p-3 text-right text-yellow-300" id="btc-marketcap">$--</td>
                </tr>
                <tr class="border-b border-gray-600">
                    <td class="p-3">24 Hour High</td>
                    <td class="p-3 text-right text-blue-400" id="btc-high">$--</td>
                </tr>
                <tr>
                    <td class="p-3">24 Hour Low</td>
                    <td class="p-3 text-right text-red-400" id="btc-low">$--</td>
                </tr>
            </table>
        </div>

        <!-- Order Form -->
        <div id="order-form" class="mt-8 w-11/12 md:w-2/3 bg-gray-900 bg-opacity-40 backdrop-blur-lg border border-gray-700 shadow-xl rounded-xl p-6 hidden">
            <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">Place an Order</h2>
            <form action="{{ route('place-order') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" id="crypto" name="crypto" value="bitcoin">
                <input type="hidden" id="total-price-input" name="total_price" value="0"> <!-- Hidden input for total price -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-300">Quantity</label>
                    <input type="number" id="quantity" name="quantity" min="1" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-black">
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Price per Coin: <span id="price-per-coin">$--</span></p>
                    <p class="text-sm font-medium text-gray-300">Total Price: <span id="total-price">$--</span></p>
                </div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-medium px-4 py-2 rounded-lg shadow-md hover:from-blue-600 hover:to-purple-600 transition duration-300 ease-in-out">
                    Place Order
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-6 mt-12 text-gray-400 text-lg">
        &copy; 2025 Cryptoplace | All Rights Reserved
    </footer>

    <!-- JavaScript for Price & Chart -->
    <script>
        async function fetchCryptoData() {
            const response = await fetch("https://api.coingecko.com/api/v3/coins/bitcoin");
            const data = await response.json();
            document.getElementById("btc-price").innerText = `$${data.market_data.current_price.usd.toLocaleString()}`;
            document.getElementById("btc-price-table").innerText = `$${data.market_data.current_price.usd.toLocaleString()}`;
            document.getElementById("btc-rank").innerText = data.market_cap_rank;
            document.getElementById("btc-marketcap").innerText = `$${data.market_data.market_cap.usd.toLocaleString()}`;
            document.getElementById("btc-high").innerText = `$${data.market_data.high_24h.usd}`;
            document.getElementById("btc-low").innerText = `$${data.market_data.low_24h.usd}`;
        }
        fetchCryptoData();
        setInterval(fetchCryptoData, 5000);

        async function fetchChartData() {
            const response = await fetch("https://api.coingecko.com/api/v3/coins/bitcoin/market_chart?vs_currency=usd&days=1");
            const data = await response.json();
            const prices = data.prices.map(p => p[1]);
            const times = data.prices.map(p => new Date(p[0]).toLocaleTimeString());

            new Chart(document.getElementById("btcChart"), {
                type: "line",
                data: {
                    labels: times,
                    datasets: [{
                        label: "BTC Price (USD)",
                        data: prices,
                        borderColor: "#6366F1",
                        backgroundColor: "rgba(99, 102, 241, 0.2)",
                        borderWidth: 2,
                        pointRadius: 0
                    }]
                },
                options: { responsive: true, scales: { x: { display: false }, y: { beginAtZero: false } } }
            });
        }
        fetchChartData();

        // Show order form when "Buy Now" button is clicked
        document.getElementById("buy-now-btn").addEventListener("click", () => {
            document.getElementById("order-form").classList.remove("hidden");
            document.getElementById("order-form").scrollIntoView({ behavior: "smooth" });

            // Fetch and display price per coin
            fetchCryptoData().then(() => {
                const pricePerCoin = parseFloat(document.getElementById("btc-price").innerText.replace('$', '').replace(',', ''));
                document.getElementById("price-per-coin").innerText = `$${pricePerCoin.toLocaleString()}`;
            });
        });

        // Update total price dynamically based on quantity
        document.getElementById("quantity").addEventListener("input", () => {
            const quantity = parseFloat(document.getElementById("quantity").value) || 0;
            const pricePerCoin = parseFloat(document.getElementById("btc-price").innerText.replace('$', '').replace(',', ''));
            const totalPrice = quantity * pricePerCoin;

            // Update total price display and hidden input
            document.getElementById("total-price").innerText = `$${totalPrice.toLocaleString()}`;
            document.getElementById("total-price-input").value = totalPrice.toFixed(2); // Ensure this value is sent to the backend
        });

    </script>
    <tbody id="tbody" class="text-white">
        <!-- Loading Indicator (Initially visible) -->
        <tr id="loadingRow" class="text-center">
            <td colspan="5" class="py-10 ">
                <div class="loading-spinner mx-auto cursor-pointer"></div>
            </td>
        </tr>
        <!-- Data rows will be dynamically added here -->
    </tbody>
    <script>
        // Simulating data fetch for demonstration
        window.onload = () => {
            setTimeout(() => {
                const loadingRow = document.getElementById("loadingRow");
                loadingRow.style.display = "none"; // Hide loading spinner

                // Insert crypto data rows
                const tbody = document.getElementById("tbody");
                tbody.innerHTML = `
                    <tr class="hover:bg-opacity-50 hover:bg-blue-600 cursor-pointer" onclick="redirectToCrypto('bitcoin')">
                        <td class="px-3 py-3 text-xs sm:text-sm">1</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">Bitcoin</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$45,000</td>
                        <td class="px-3 py-3 text-xs sm:text-sm text-green-400">+5%</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$800B</td>
                    </tr>
                    <tr class="hover:bg-opacity-50 hover:bg-blue-600 cursor-pointer" onclick="redirectToCrypto('ethereum')">
                        <td class="px-3 py-3 text-xs sm:text-sm">2</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">Ethereum</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$3,000</td>
                        <td class="px-3 py-3 text-xs sm:text-sm text-red-400">-2%</td>
                        <td class="px-3 py-3 text-xs sm:text-sm">$350B</td>
                    </tr>
                `;
            }, 2000); // Simulated 2-second delay for data fetch
        };

        function redirectToCrypto(coin) {
            const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
            if (isLoggedIn) {
                window.location.href = `/crypto/${coin}`;
            } else {
                window.location.href = '/login';
            }
        }
    </script>
</body>
</html>
