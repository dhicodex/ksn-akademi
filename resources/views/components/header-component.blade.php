<header id="header" class="flex justify-center bg-white fixed w-full top-0 left-0 z-50 transition-all ease-in-out duration-1000">
    <div class="header__inner container flex items-center justify-between py-4">
        <div class="header__left">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="h-16" alt="KSN Akademi">
            </a>
        </div>
        <div class="header__right flex items-center gap-2">
            <div class="pr-4.5">
                <ul class="flex gap-8">
                    @foreach ($menus as $menu)
                    <li>
                        <a href="/" class="text-sm font-semibold px-2.5 py-3.5 hover:bg-gray-100 hover:rounded-lg duration-300 ease-in-out">{{ $menu->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="btn btn-secondary px-5 py-2 text-sm font-semibold cursor-pointer">Masuk</div>
            <div class="btn btn-primary px-5 py-2 text-sm font-semibold cursor-pointer">Daftar</div>
        </div>
    </div>
</header>

<div class="h-[96px]"></div>