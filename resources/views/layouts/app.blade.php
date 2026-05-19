<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        indigo: {
                            50: 'rgba(255, 0, 127, 0.12)',
                            100: 'rgba(255, 0, 127, 0.2)',
                            500: '#ff007f',
                            600: '#ff007f',
                            700: '#ff3399',
                        },
                        purple: {
                            50: 'rgba(162, 0, 255, 0.12)',
                            500: '#a200ff',
                            600: '#a200ff',
                            700: '#b533ff',
                        },
                        slate: {
                            50: '#151522',
                            100: '#1d1d2f',
                            200: '#2b2b3d',
                            500: '#a3a3cc',
                            600: '#c2c2eb',
                            700: '#e2e2ec',
                            800: '#ffffff',
                            900: '#ffffff',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #07070a !important;
            color: #e2e2ec !important;
        }
        /* Custom neon scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #07070a;
        }
        ::-webkit-scrollbar-thumb {
            background: #ff007f;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ff3399;
        }
        /* Glassmorphism elements */
        .glass {
            background: rgba(15, 15, 25, 0.7) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 0, 127, 0.2) !important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4) !important;
        }
        /* Gradient buttons / backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #ff007f 0%, #a200ff 100%) !important;
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.3) !important;
            border: none !important;
            color: #ffffff !important;
        }
        .gradient-bg:hover {
            box-shadow: 0 0 25px rgba(255, 0, 127, 0.6) !important;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        .gradient-text {
            background: linear-gradient(135deg, #ff007f 0%, #ff66c4 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }
        /* Overriding white backgrounds on cards */
        .bg-white {
            background-color: #0f0f18 !important;
            border: 1px solid rgba(255, 0, 127, 0.15) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }
        /* Slate backgrounds */
        .bg-slate-50 {
            background-color: #151522 !important;
            border-color: rgba(255, 0, 127, 0.1) !important;
        }
        .bg-slate-100 {
            background-color: #1d1d2f !important;
            border-color: rgba(255, 0, 127, 0.15) !important;
        }
        .bg-slate-200 {
            background-color: #2b2b3d !important;
        }
        /* Borders overrides */
        .border-slate-100, .border-slate-200, .border-slate-300 {
            border-color: rgba(255, 0, 127, 0.15) !important;
        }
        /* Text overrides */
        .text-slate-900, .text-slate-800, .text-slate-700 {
            color: #ffffff !important;
        }
        .text-slate-600, .text-slate-500, .text-slate-400 {
            color: #a3a3cc !important;
        }
        /* Form controls */
        input, select, textarea {
            background-color: #151522 !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 0, 127, 0.2) !important;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #ff007f !important;
            box-shadow: 0 0 10px rgba(255, 0, 127, 0.4) !important;
            outline: none !important;
        }
        label {
            color: #ff80bf !important;
        }
        /* Card groups and hover effects */
        .group {
            transition: all 0.3s ease;
        }
        .group:hover {
            box-shadow: 0 0 25px rgba(255, 0, 127, 0.2) !important;
            border-color: rgba(255, 0, 127, 0.4) !important;
        }
        /* Indigo-50 and Purple-50 badges / soft buttons */
        .bg-indigo-50, .bg-purple-50 {
            background-color: rgba(255, 0, 127, 0.12) !important;
            color: #ff4da6 !important;
        }
        .bg-indigo-50:hover, .bg-purple-50:hover {
            background-color: rgba(255, 0, 127, 0.22) !important;
            color: #ffffff !important;
        }
        .text-indigo-600, .text-purple-600 {
            color: #ff3399 !important;
        }
        /* Table enhancements */
        thead {
            background-color: #1d1d2f !important;
            color: #ff80bf !important;
        }
        th {
            color: #ff80bf !important;
            font-weight: 700 !important;
            border-bottom: 2px solid rgba(255, 0, 127, 0.2) !important;
        }
        td {
            color: #e2e2ec !important;
            border-bottom: 1px solid rgba(255, 0, 127, 0.1) !important;
        }
        tr:hover td {
            background-color: rgba(255, 0, 127, 0.03) !important;
        }
        /* Success and alerts */
        .bg-emerald-50 {
            background-color: rgba(16, 185, 129, 0.1) !important;
            border-color: rgba(16, 185, 129, 0.2) !important;
            color: #10b981 !important;
        }
        /* Interactive scale hover items */
        .hover\:scale-105:hover {
            transform: scale(1.05) !important;
        }
        .hover\:scale-110:hover {
            transform: scale(1.10) !important;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800">
    <nav class="glass sticky top-0 z-50 px-6 py-4 mb-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-2xl font-bold gradient-text bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                Khatarina
            </a>
            <div class="flex gap-6 items-center">
                <a href="{{ route('books.index') }}" class="hover:text-indigo-600 transition-colors font-medium">Katalog</a>
                <a href="{{ route('members.index') }}" class="hover:text-indigo-600 transition-colors font-medium">Anggota</a>
                <a href="{{ route('borrows.index') }}" class="hover:text-indigo-600 transition-colors font-medium">Peminjaman</a>
                <a href="{{ route('purchases.index') }}" class="hover:text-indigo-600 transition-colors font-medium">Pembelian</a>
                <a href="{{ route('books.create') }}" class="gradient-bg text-white px-5 py-2 rounded-xl font-medium shadow-lg shadow-indigo-200 hover:scale-105 transition-transform">
                    Tambah Buku
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pb-20">
        @if ($message = Session::get('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p>{{ $message }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-auto py-10 border-t border-slate-200 text-center text-slate-500">
        <p>&copy; {{ date('Y') }} Digital Library System. Made with ❤️</p>
    </footer>
</body>
</html>
