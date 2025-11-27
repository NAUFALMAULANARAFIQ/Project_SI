<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPK TOPSIS</title>
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F3E0; /* Warna latar belakang F1F3E0 */
        }
        /* Custom color pallet */
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .border-primary { border-color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .text-secondary { color: #A1BC98; }
        .hover\:bg-primary-dark:hover { background-color: #5d6b59; } /* Slightly darker 778873 */
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-xl rounded-xl border border-gray-200/50">
        <!-- Header -->
        <h1 class="text-3xl font-extrabold text-center text-primary tracking-wider">
            SPK TOPSIS
        </h1>
        <p class="text-center text-gray-600">Sistem Pendukung Keputusan Matakuliah Pilihan</p>

        <!-- Form Login -->
        <form class="space-y-4">
            <!-- Username Input -->
            <div>
                <label for="username" class="sr-only">Username</label>
                <div class="relative">
                    <input type="text" id="username" name="username" placeholder="Username" required
                           class="w-full p-3 pl-10 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150"
                           aria-label="Username">
                    <!-- Icon User -->
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Password" required
                           class="w-full p-3 pl-10 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150"
                           aria-label="Password">
                    <!-- Icon Lock -->
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
            </div>

            <!-- Login Button -->
            <button type="submit"
                    class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary-dark transition duration-200 shadow-md hover:shadow-lg">
                Login
            </button>
        </form>

        <div class="text-center text-sm text-gray-500">
            <!-- Bisa ditambahkan link lupa password atau registrasi jika ada -->
            <p>Akses Admin: username/password</p>
            <p>Akses Mahasiswa: nim/password</p>
        </div>
    </div>

</body>
</html>
