<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-3xl font-bold">User Management</h1>
        <a href="{{ route('admin') }}" class="bg-blue-500 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-400">Back to Admin Panel</a>
    </header>
    <main class="flex-grow p-6">
        <h2 class="text-2xl mb-6 font-semibold">Manage user accounts and permissions</h2>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-lg shadow-lg">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="border-b p-4">User ID</th>
                        <th class="border-b p-4">Name</th>
                        <th class="border-b p-4">Email</th>
                        <th class="border-b p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="border-b p-4">{{ $user->id }}</td>
                        <td class="border-b p-4">{{ $user->name }}</td>
                        <td class="border-b p-4">{{ $user->email }}</td>
                        <td class="border-b p-4">
                            <form action="{{ route('admin.user-management.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-4 py-2 rounded text-white transition-all duration-300 hover:bg-red-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>