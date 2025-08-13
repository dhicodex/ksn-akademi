<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex md:flex-row-reverse flex-wrap">

        <!-- Main Content -->
        <div class="w-full md:w-4/5 bg-gray-100">
            <div class="container bg-white rounded-lg shadow-lg p-6 my-6">
                <h1 class="text-3xl text-gray-800 mb-4 playfairFont">@yield('title')</h1>
                
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        <!-- Sidebar -->
        <div class="w-full md:w-1/5 bg-[#2e3e50] md:min-h-screen">
            <div class="p-6">
                <a href="{{ route('admin.blogs.index') }}" class="text-white text-2xl font-semibold playfairFont">Admin Panel</a>
                <nav class="mt-6">
                    <a href="{{ route('admin.blogs.index') }}" class="block py-2.5 px-4 rounded transition duration-200 text-white hover:bg-gray-700">
                        Blogs
                    </a>
                    <!-- Add other links here -->
                </nav>
            </div>
        </div>

    </div>

    @vite('resources/js/app.js')
</body>
</html>
