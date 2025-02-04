<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-3xl font-bold">Reports</h1>
        <a href="{{ route('admin') }}" class="bg-blue-500 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-400">Back to Admin Panel</a>
    </header>
    <main class="flex-grow p-6">
        <h2 class="text-2xl mb-6 font-semibold">View and generate various reports</h2>
        <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-2">Sales Report</h3>
            <p class="text-gray-300 mb-4">Total Sales: ${{ number_format(rand(10000, 50000)) }}</p>
            <h3 class="text-xl font-bold mb-2">User Registrations</h3>
            <p class="text-gray-300 mb-4">New Users: {{ rand(100, 500) }}</p>
            <h3 class="text-xl font-bold mb-2">Order Statistics</h3>
            <p class="text-gray-300 mb-4">Total Orders: {{ rand(200, 1000) }}</p>
            <p class="text-gray-300 mb-4">Pending Orders: {{ rand(50, 200) }}</p>
            <p class="text-gray-300 mb-4">Approved Orders: {{ rand(100, 700) }}</p>
            <p class="text-gray-300 mb-4">Rejected Orders: {{ rand(10, 100) }}</p>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>
