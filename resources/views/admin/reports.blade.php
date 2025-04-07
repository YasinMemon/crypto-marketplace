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
            <p class="text-gray-300 mb-4">Total Sales: ${{ number_format($totalSales) }}</p>
            <h3 class="text-xl font-bold mb-2">User Registrations</h3>
            <p class="text-gray-300 mb-4">New Users: {{ $newUsers }}</p>
            <h3 class="text-xl font-bold mb-2">Order Statistics</h3>
            <p class="text-gray-300 mb-4">Total Orders: {{ $totalOrders }}</p>
            <p class="text-gray-300 mb-4">Pending Orders: {{ $pendingOrders }}</p>
            <p class="text-gray-300 mb-4">Approved Orders: {{ $approvedOrders }}</p>
            <p class="text-gray-300 mb-4">Rejected Orders: {{ $rejectedOrders }}</p>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>
