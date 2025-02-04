<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-3xl font-bold">Admin Panel</h1>
        <form action="" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-red-400">Logout</button>
        </form>
    </header>
    <main class="flex-grow p-6">
        <h2 class="text-2xl mb-6 font-semibold">Welcome to the Admin Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg card transition-all duration-300">
                <h3 class="text-xl font-bold mb-2">User Management</h3>
                <p class="text-gray-300">Manage user accounts and permissions.</p>
                <a href="{{ route('admin.user-management') }}" class="text-indigo-400 hover:underline mt-2 inline-block">Go to User Management</a>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg card transition-all duration-300">
                <h3 class="text-xl font-bold mb-2">Orders</h3>
                <p class="text-gray-300">Track and manage customer orders.</p>
                <a href="{{ route('admin.orders') }}" class="text-indigo-400 hover:underline mt-2 inline-block">Go to Orders</a>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg card transition-all duration-300">
                <h3 class="text-xl font-bold mb-2">Reports</h3>
                <p class="text-gray-300">View and generate various reports.</p>
                <a href="{{ route('admin.reports') }}" class="text-indigo-400 hover:underline mt-2 inline-block">Go to Reports</a>
            </div>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>