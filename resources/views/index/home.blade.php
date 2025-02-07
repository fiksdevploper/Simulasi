<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')

<body>
    @include('layout.navbar')

    <div class="max-w-2xl mx-auto my-4">
        <form id="searchForm" class="flex items-center gap-2">
            <input type="text" id="searchInput" name="search" placeholder="Search..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Search
            </button>
        </form>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID Inventaris</th>
                <th class="py-2 px-4 border-b">Nama Barang</th>
                <th class="py-2 px-4 border-b">Kondisi</th>
                <th class="py-2 px-4 border-b">Stok</th>
                <th class="py-2 px-4 border-b">Tanggal Register</th>
            </tr>
        </thead>

        <tbody id="inventarisTableBody">
            @foreach ($inventaris as $item)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b text-center">{{ $item->id_inventaris }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->nama_barang }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $item->kondisi }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $item->stok }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $item->tanggal_register }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah reload halaman

            let searchQuery = document.getElementById('searchInput').value;
            fetch(`/inventaris/search?search=${searchQuery}`)
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById('inventarisTableBody');
                    tableBody.innerHTML = ''; // Kosongkan tabel sebelum menampilkan hasil

                    data.forEach(item => {
                        let row = `
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-center">${item.id_inventaris}</td>
                                <td class="py-2 px-4 border-b">${item.nama_barang}</td>
                                <td class="py-2 px-4 border-b text-center">${item.kondisi}</td>
                                <td class="py-2 px-4 border-b text-center">${item.stok}</td>
                                <td class="py-2 px-4 border-b text-center">${item.tanggal_register}</td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
