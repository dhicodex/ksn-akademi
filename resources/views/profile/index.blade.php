<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - KSN Akademi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
                                KSN Akademi
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        @auth
                            <x-auth-dropdown />
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Masuk</a>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Profile Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl font-semibold mb-4">Profile Anda</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <div class="mt-1 text-sm text-gray-900">{{ auth()->user()->name }}</div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1 text-sm text-gray-900">{{ auth()->user()->email }}</div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Bergabung Sejak</label>
                                <div class="mt-1 text-sm text-gray-900">{{ auth()->user()->created_at->format('d F Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
