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
                    @forelse ($orders as $order)
                        <tr>
                            <td class="border-b p-4">{{ $order['id'] }}</td>
                            <td class="border-b p-4">{{ $order['customer'] }}</td> <!-- Proper customer name -->
                            <td class="border-b p-4">
                                <!-- Debug information -->
                                @if(isset($order['crypto']))
                                    Crypto: {{ $order['crypto'] }} <br>
                                @endif
                                
                                <!-- Display amount properly - include all possible fields -->
                                ${{ 
                                    isset($order['amount']) && is_numeric($order['amount']) ? 
                                        number_format($order['amount'], 2) : 
                                        (isset($order['total_price']) && is_numeric($order['total_price']) ? 
                                            number_format($order['total_price'], 2) : '0.00') 
                                }}
                                
                                <!-- Show all available keys for debugging -->
                                <small class="text-gray-400">
                                    <br>Available keys: {{ implode(', ', array_keys($order)) }}
                                </small>
                            </td>
                            <td class="border-b p-4">{{ $order['status'] }}</td> <!-- Correct status display -->
                            <td class="border-b p-4">
                                @if ($order['status'] === 'Pending')
                                    <form action="{{ route('admin.orders.approve', $order['id']) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-green-500 px-4 py-2 rounded text-white transition-all duration-300 hover:bg-green-400">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.orders.reject', $order['id']) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-red-500 px-4 py-2 rounded text-white transition-all duration-300 hover:bg-red-400">
                                            Reject
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic">{{ $order['status'] === 'Approved' ? 'Order Approved' : 'Order Rejected' }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4 text-gray-300">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center shadow-lg">
        &copy; 2025 CryptoPlace | Admin Panel
    </footer>
</body>
</html>
