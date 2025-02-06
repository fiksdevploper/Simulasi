<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')
<title>Dashboard Admin</title>

<body>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-md mt-10">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Tambah Barang Inventaris</h2>
    
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('inventaris.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="id_inventaris" class="block text-gray-700">Kode Barang:</label>
                <input type="text" id="id_inventaris" name="id_inventaris" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400" placeholder="Contoh: INV-001">
            </div>

            <div>
                <label for="nama_barang" class="block text-gray-700">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama barang">
            </div>
    
            <div>
                <label for="stok" class="block text-gray-700">Jumlah/stok tersedia:</label>
                <input type="number" id="stok" name="stok" min="1" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400" placeholder="Masukkan jumlah barang">
            </div>
    
            <div>
                <label for="kondisi" class="block text-gray-700">Kondisi:</label>
                <select id="kondisi" name="kondisi" required
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400">
                    <option value="">Pilih kondisi</option>
                    //value nya samain sm isi enum huruf besar kecil nya
                    <option value="baik">Baik</option>
                    <option value="perbaikan">Proses Perbaikan</option>
                </select>
            </div>
    
            <div>
                <label for="tanggal_register" class="block text-gray-700">Tanggal Register</label>
                <input type="date" id="tanggal_register" name="tanggal_register" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400" placeholder="Masukkan lokasi penyimpanan">
            </div>
    
            <div class="flex justify-end space-x-2">
                <a href="{{ route('inventaris.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>