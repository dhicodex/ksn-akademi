<header id="header" class="flex justify-center bg-white fixed w-full top-0 left-0 z-50 transition-all ease-in-out duration-1000">
    <div class="header__inner container flex items-center justify-between py-4 px-4">
        <div class="header__left">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-16" alt="KSN Akademi">
            </a>
        </div>
        <div class="header__right flex items-center gap-2">
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-2">
                <div class="pr-4.5">
                    <ul class="flex gap-8">
                        @foreach ($menus as $menu)
                        <li>
                            <a href="{{ $menu->name === 'Blog' ? route('blogs') : '/' }}" class="text-sm font-semibold px-2.5 py-3.5 hover:bg-gray-100 hover:rounded-lg duration-300 ease-in-out">{{ $menu->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{ route('login') }}" class="btn btn-secondary px-5 py-2 text-sm font-semibold cursor-pointer">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary px-5 py-2 text-sm font-semibold cursor-pointer">Daftar</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-800 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-md">
        <ul class="flex flex-col items-center gap-4 py-4">
            @foreach ($menus as $menu)
            <li>
                <a href="{{ $menu->name === 'Blog' ? route('blogs') : '/' }}" class="text-sm font-semibold px-2.5 py-3.5 hover:bg-gray-100 hover:rounded-lg duration-300 ease-in-out">{{ $menu->name }}</a>
            </li>
            @endforeach
            <li><a href="{{ route('login') }}" class="btn btn-secondary px-5 py-2 text-sm font-semibold cursor-pointer">Masuk</a></li>
            <li><a href="{{ route('register') }}" class="btn btn-primary px-5 py-2 text-sm font-semibold cursor-pointer">Daftar</a></li>
        </ul>
    </div>
</header>

<div class="h-[80px] md:h-[96px]"></div>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    });
</script>