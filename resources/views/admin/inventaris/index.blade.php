<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')
<title>Dashboard Admin</title>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        @include('layout.sider')

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Tabel Inventaris -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Daftar Inventaris</h2>
                    <a href="{{ route('admin.inventaris.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Inventaris
                    </a>
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
                    
                            <!-- Button Action -->
                            <td class="py-2 px-4 border-b text-center space-x-2">
                                <a href="{{ route('admin.inventaris.edit', $item->id) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition duration-300">
                                   Edit
                                </a>
                    
                                <form action="{{ route('admin.inventaris.destroy', $item->id) }}" 
                                      method="POST" class="inline-block" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-300">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>