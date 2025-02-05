<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')

<body>
    @include('layout.navbar')
    {{-- search enggine --}}
    <div class="flex justify-center my-6">
        <form action="" method="GET" class="w-1/2">
            <div class="relative">
                <input type="text" name="search" placeholder="Search..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
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
        
        <tbody>
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
</body>
</html>
