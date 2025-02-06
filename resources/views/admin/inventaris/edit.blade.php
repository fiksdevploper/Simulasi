<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')
<title>Dashboard Admin</title>

<body>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-700">Edit Data Inventaris</h2>
    
        <form action="{{ route('inventaris.update', $inventari->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- id barang --}}
            <div class="mb-4">
                <label for="id_inventaris" class="block text-gray-600 font-semibold mb-1">ID Inventaris</label>
                <input type="text" name="id_inventaris" id="id_inventaris"
                value="{{ old('id_inventaris', $inventari->id_inventaris) }}"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
    
            <!-- Nama Barang -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-gray-600 font-semibold mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang"
                value="{{ old('nama_barang', $inventari->nama_barang) }}"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
    
            <!-- Kondisi -->
            <div class="mb-4">
                <label for="kondisi" class="block text-gray-600 font-semibold mb-1">Kondisi</label>
                <select name="kondisi" id="kondisi"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="baik" {{ $inventari->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="perbaikan" {{ $inventari->kondisi == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </div>
    
            <!-- Stok -->
            <div class="mb-4">
                <label for="stok" class="block text-gray-600 font-semibold mb-1">Stok</label>
                <input type="number" name="stok" id="stok"
                value="{{ old('stok', $inventari->stok) }}"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
    
            <!-- Tanggal Register -->
            <div class="mb-4">
                <label for="tanggal_register" class="block text-gray-600 font-semibold mb-1">Tanggal Register</label>
                <input type="date" name="tanggal_register" id="tanggal_register"
                value="{{ old('tanggal_register', $inventari->tanggal_register) }}"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
    
            <!-- Tombol Simpan & Batal -->
            <div class="flex justify-between items-center">
                <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Simpan Perubahan
                </button>
                <a href="{{ route('inventaris.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-300">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
