<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-3xl font-bold">Orders</h1>
        <a href="{{ route('admin') }}" class="bg-blue-500 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-400">Back to Admin Panel</a>
    </header>
    <main class="flex-grow p-6">
        <h2 class="text-2xl mb-6 font-semibold">Track and manage customer orders</h2>
        <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="border-b p-4">Order ID</th>
                        <th class="border-b p-4">Customer</th>
                        <th class="border-b p-4">Amount</th>
                        <th class="border-b p-4">Status</th>
                        <th class="border-b p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 20; $i++)
                    <tr>
                        <td class="border-b p-4">{{ $i }}</td>
                        <td class="border-b p-4">Customer {{ $i }}</td>
                        <td class="border-b p-4">${{ rand(100, 10000) }}</td>
                        <td class="border-b p-4">{{ ['Pending', 'Approved', 'Rejected'][rand(0, 2)] }}</td>
                        <td class="border-b p-4">
                            <button class="bg-green-500 px-4 py-2 rounded text-white transition-all duration-300 hover:bg-green-400">Approve</button>
                            <button class="bg-red-500 px-4 py-2 rounded text-white transition-all duration-300 hover:bg-red-400">Reject</button>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>
