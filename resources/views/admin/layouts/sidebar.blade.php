<aside id="sidebar" class="z-20 fixed left-0 min-h-[calc(100vh_-_theme(space.16))] max-h-[calc(100vh_-_theme(space.16))] overflow-auto w-72 top-16 bg-slate-800 lg:block shadow p-5"
    x-data="$store.theme"
    x-show="shownSidebar"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
>
    {{-- Search box --}}
    <form method="GET" class="relative mb-5 lg:hidden">
        <input type="text" class="text-white form-text bg-slate-900 border-slate-900" placeholder="Tìm kiếm...">
        <button type="submit" class="absolute w-8 h-8 p-0 shadow-sm btn border-slate-800 bg-slate-800 top-1 right-1">
            <span class="text-gray-500 material-icons-outlined">search</span>
        </button>
    </form>

    {{-- Navs --}}
    <nav>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">space_dashboard</span> {{ __('Dashboard') }}
        </a>
        
        <p class="nav-heading">{{ __('Cửa hàng') }}</p>
        <a href="{{ route('admin.products.index') }}" class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.products') ? '!text-white' : '' }}">
            <span class="material-icons-outlined">inventory_2</span> {{ __('Sản phẩm') }}
        </a>
        <a href="{{ route('admin.catalogs.index') }}" class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.catalogs') ? '!text-white' : '' }}">
            <span class="material-icons-outlined">category</span> {{ __('Danh mục') }}
        </a>
        <a href="" class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.parameter_products') ? '!text-white' : '' }}">
            <span class="material-icons-outlined">drag_indicator</span> {{ __('Thông số sản phẩm') }}
        </a>

        <p class="nav-heading">{{ __('Quản lý') }}</p>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">tips_and_updates</span> {{ __('Khuyến mãi') }}
        </a>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">receipt</span> {{ __('Đơn hàng') }}
        </a>

        <p class="nav-heading">{{ __('Người dùng') }}</p>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">person_pin_circle</span> {{ __('Khách hàng') }}
        </a>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">admin_panel_settings</span> {{ __('Quản trị') }}
        </a>

        <p class="nav-heading">{{ __('Hệ thống') }}</p>
        <a href="" class="nav-item">
            <span class="material-icons-outlined">settings</span> {{ __('Cài đặt') }}
        </a>

        <form method="POST" action="{{ route('admin.auth.logout') }}" class="block mt-5">
            @csrf
            <button type="submit" class="nav-item">
                <span class="material-icons-outlined">logout</span> {{ __('Thoát') }}
            </button>
        </form>
    </nav>
    {{-- /Navs --}}
</aside>