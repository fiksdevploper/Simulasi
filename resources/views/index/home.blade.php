<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')

<body>
    @include('layout.navbar')
    {{-- search enggine --}}
    
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
