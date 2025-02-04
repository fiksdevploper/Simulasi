<!DOCTYPE html>
<html lang="en">
@include('layout.haeader')

<body>
    <div class="flex">
        <!-- Sidebar -->
        @include('layout.sider')
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Tabel Peminjaman -->
            <div class="bg-white shadow-md rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID Peminjaman</th>
                            <th class="py-2 px-4 border-b">ID Inventaris</th>
                            <th class="py-2 px-4 border-b">Nama Barang</th>
                            <th class="py-2 px-4 border-b">Nama Peminjam</th>
                            <th class="py-2 px-4 border-b">Tanggal Pinjam</th>
                            <th class="py-2 px-4 border-b">Tanggal Kembali</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($peminjaman as $pinjam)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->id }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->id_inventaris }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->nama_barang }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->nama_peminjam }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->tanggal_pinjam }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->tanggal_kembali }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $pinjam->Petugas }}</td>

                                <td class="py-2 px-4 border-b text-center">
                                    <form action="{{ route('peminjaman.updateStatus', $pinjam->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status_peminjaman" onchange="this.form.submit()"
                                            class="border border-gray-300 rounded-md p-2">
                                            <option value="Belum Kembali"
                                                {{ $peminjaman->status_peminjaman == 'Belum Kembali' ? 'selected' : '' }}>
                                                Belum Kembali</option>
                                            <option value="Sudah Kembali"
                                                {{ $peminjaman->status_peminjaman == 'Sudah Kembali' ? 'selected' : '' }}>
                                                Sudah Kembali</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="py-2 px-4 border-b text-center">{{ $item->petugas }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    <!-- Action Buttons if needed -->
                                    <form action="" method="POST" class="inline-block"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-300">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
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
