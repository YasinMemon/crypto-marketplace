let allCoins = [];

const fetchAllCoinData = async () => {
    const currency = "usd";
    const tbody = document.getElementById("tbody");

    const options = {
        method: 'GET',
        headers: { accept: 'application/json', 'x-cg-demo-api-key': 'CG-ARbMgNQy7QZhCt9jr2JjqJGj' }
    };

    try {
        const response = await fetch(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=${currency}`, options);
        const data = await response.json();

        console.log(data);

        if (data.length === 0) {
            console.error('No data found.');
            return;
        }

        allCoins = data; // Save the data to the global variable

        displayCoins(data.slice(0, 10)); // Display the coins initially
    } catch (error) {
        console.error("Error fetching data:", error);
    }
};

const displayCoins = (coins) => {
    const tbody = document.getElementById("tbody");
    tbody.innerHTML = ''; // Clear the existing table rows

    coins.forEach((coin, idx) => {
        const tr = document.createElement("tr");
        tr.classList.add("bg-purple-700", "hover:bg-purple-800");
        tr.innerHTML = `
        <td class="px-4 py-2">${idx + 1}</td>
            <td class="px-4 py-2 flex items-center">
                <img src="${coin.image}" alt="${coin.name}" class="w-6 h-6 mr-2"> 
                ${coin.name} : ${coin.symbol.toUpperCase()}
            </td>
            <td class="px-4 py-2">$${coin.current_price.toLocaleString()}</td>
            <td class="px-4 py-2 ${coin.price_change_percentage_24h > 0 ? 'text-green-500' : 'text-red-500'}">
                ${coin.price_change_percentage_24h.toFixed(2)}%
            </td>
            <td class="px-4 py-2">$${coin.market_cap.toLocaleString()}</td>
        `;
        tr.addEventListener('click', () => {
            window.location.href = `/crypto/${coin.id}`; // Use the coin's ID dynamically
        });
        tbody.appendChild(tr);
    });
};

const handleSearch = () => {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();

    // Filter coins based on search input (matching by name or symbol)
    const filteredCoins = allCoins.filter(coin => 
        coin.name.toLowerCase().includes(searchInput) || 
        coin.symbol.toLowerCase().includes(searchInput)
    );

    displayCoins(filteredCoins.slice(0, 10)); // Display the filtered coins
};

document.addEventListener('DOMContentLoaded', () => {
    fetchAllCoinData();
    
    const searchInputElement = document.getElementById("searchInput");
    if (searchInputElement) {
        searchInputElement.addEventListener("input", handleSearch); // Add event listener for search input
    }
});
