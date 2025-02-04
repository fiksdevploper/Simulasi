<!DOCTYPE html>
<html lang="en">

@include('layout.haeader')

<body>
    @include('layout.navbar')

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Login Form</h2>
            <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="usernamame" class="block text-gray-700 font-medium">Nama</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Nama Anda" value="{{ old('nama') }}"
                    class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}"
                        class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" value="{{ old('password') }}"
                        class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Login -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>

    {{-- daftar table peminjaman --}}
</body>
</html>
