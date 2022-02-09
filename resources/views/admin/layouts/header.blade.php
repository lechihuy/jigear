<header class="fixed flex items-center w-full h-16 bg-white border-b border-gray-300">
    {{-- Logo --}}
    <a class="flex items-center flex-none gap-2 px-5 w-72">
        <img src="{{ asset('images/logo-icon.png') }}" class="h-10">
        <div class="flex flex-col">
            <span class="text-xl text-gray-900 font-logo">Jigear</span>
            <small class="text-xs text-gray-500">Administration</small>
        </div>
    </a>

    {{-- Tools --}}
    <div class="flex items-center flex-grow pr-5 h-14">
        {{-- Search box --}}
        <form method="GET" class="relative hidden lg:block">
            <input type="text" class="form-text w-80" placeholder="Tìm kiếm...">
            <button type="submit" class="absolute w-8 h-8 p-0 shadow-sm btn btn-secondary top-1 right-1">
                <span class="text-gray-500 material-icons-outlined">search</span>
            </button>
        </form>

        {{-- Navs --}}
        <div class="flex items-center gap-5 ml-auto">
            {{-- Dropdown --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = ! open" class="btn btn-primary">
                    <span class="material-icons-outlined">add_circle</span>
                    <span class="hidden sm:block">{{ __('Tạo') }}</span>
                </button>

                <div x-show="open" x-transition class="absolute right-0 mt-2 origin-top-right bg-white rounded-md shadow-lg w-52 ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">{{ __('Tạo sản phẩm') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">{{ __('Tạo bài viết') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">{{ __('Tạo đơn hàng') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">{{ __('Tạo khuyến mãi') }}</a>
                    </div>
                </div>
            </div>
            {{-- /Dropdown --}}

            {{-- Dropdown --}}
            <div class="relative" x-data="{ open: false }">
                <div @click="open = ! open">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&size=50" class="h-10 rounded-full cursor-pointer" :class="open ? 'ring-2 ring-sky-500 ring-offset-2' : ''">
                </div>

                <div x-show="open" x-transition class="absolute right-0 mt-2 origin-top-right bg-white rounded-md shadow-lg w-52 ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">{{ __('Hồ sơ') }}</a>
                        <form method="POST" action="{{ route('admin.auth.logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700">{{ __('Thoát') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- /Dropdown --}}
            
        </div>
    </div>
    {{-- /Tools --}}
</header>