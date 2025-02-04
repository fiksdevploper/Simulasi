<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')

<body>
    @include('layout.navbar')

    <div class="max-w-lg mx-auto p-6 mt-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Form Peminjaman Barang Inventaris</h2>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="id_inventaris" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <select id="id_inventaris" name="id_inventaris" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Barang</option>
                    @foreach ($inventaris as $barang)
                        <option value="{{ $barang->id_inventaris }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                    @endforeach
                </select>
                @error('id_inventaris')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="nama_peminjam" class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                <input type="text" id="nama_peminjam" name="nama_peminjam" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('nama_peminjam')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('tanggal_pinjam')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('tanggal_kembali')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="petugas" class="block text-sm font-medium text-gray-700">Petugas</label>
                <input type="text" id="petugas" name="petugas" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('petugas')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="px-6 w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>
