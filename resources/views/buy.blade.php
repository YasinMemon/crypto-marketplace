<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Bitcoin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-500 text-center">
        <h1 class="text-5xl font-bold mt-4 tracking-wide text-indigo-300">Buy Bitcoin (BTC)</h1>
        <p class="text-2xl font-semibold mt-2 text-green-400">Current Price: <span id="btc-price">$--</span></p>
        <form action="" method="POST" class="mt-4" onsubmit="return confirmPurchase()">
            @csrf
            <input type="number" name="amount" placeholder="Amount in USD" class="px-4 py-2 rounded-lg text-black" required>
            <button type="submit" class="mt-4 inline-block px-6 py-3 bg-green-500 hover:bg-green-400 transition-all duration-300 text-white rounded-lg font-semibold shadow-md">Buy Now</button>
        </form>
    </div>
    <script>
        async function fetchCryptoData() {
            const response = await fetch("https://api.coingecko.com/api/v3/coins/bitcoin");
            const data = await response.json();
            document.getElementById("btc-price").innerText = `$${data.market_data.current_price.usd.toLocaleString()}`;
        }
        fetchCryptoData();

        function confirmPurchase() {
            return confirm('Are you sure you want to buy Bitcoin?');
        }
    </script>
</body>
</html>
