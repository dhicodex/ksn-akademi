<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - @yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @yield('css-custom')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex md:flex-row-reverse flex-wrap">

        <!-- Main Content -->
        <div class="w-full md:w-4/5 bg-gray-100 content-border">
            <div class="container bg-white min-h-screen p-6">
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
        <div class="w-full md:w-1/5 bg-white md:min-h-screen">
            <div class="p-6">
                <a href="{{ route('admin.blogs.index') }}" class="text-gray-800 text-2xl font-semibold playfairFont">Admin Panel</a>
                <nav class="mt-6">
                    <a href="{{ route('admin.blogs.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 text-gray-800 hover:bg-gray-200">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Blogs
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 text-gray-800 hover:bg-gray-200">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        Categories
                    </a>
                    <a href="{{ route('admin.plans.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 text-gray-800 hover:bg-gray-200">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        Plans
                    </a>
                    <a href="{{ route('admin.plan-features.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 text-gray-800 hover:bg-gray-200">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Plan Features
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center py-2.5 px-4 rounded transition duration-200 text-gray-800 hover:bg-gray-200">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3"></path></svg>
                            Logout
                        </button>
                    </form>
                    <!-- Add other links here -->
                </nav>
            </div>
        </div>

    </div>

    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Write your blog content here...',
                tabsize: 2,
                height: 300
            });
        });
    </script>
    @yield('js-custom')
</body>
</html>
