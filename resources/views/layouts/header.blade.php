<div class="container mx-auto lg:px-10">
    <div class='px-[20px] py-[10px]'>
        <div class="flex justify-between align-center items-center">
            <div show="1" class="btn-menu md:hidden">
                <span class="material-icons cursor-pointer">
                    menu
                </span>
            </div>
            <div class="flex justify-between align-center">
                <img class="w-[24px] h-[24px]" src="{{ asset('images/logo-icon.png') }}" alt="">
                <p class="text-[18px] pl-[8px] font-bold">Jigear</p>
            </div>
            <div class="hidden md:block relative mx-auto w-1/4 max-w-md">
                <input class="border-1 border-primary bg-red transition h-8 px-5 pr-16 rounded-full focus:outlin    e-none w-full text-black text-[14px] " type="search" name="search" placeholder="Tìm kiếm" />
                <button type="submit" class="absolute right-2 top-[4px] mr-[2px]">
                    <span class="material-icons">
                        search
                    </span>
                </button>
              </div>
            <div class="flex align-center items-center gap-4">
                <div class="">
                    <a href="" class="flex align-center items-center">
                        <span class="material-icons">
                            shopping_cart
                        </span>
                        <p class="hidden lg:block pl-[8px] text-[13px]">Giỏ hàng</p>
                    </a>
                </div>
                <div>
                    <a href="" class="flex align-center items-center">
                        <span class="material-icons">
                            person
                        </span>
                        <p class="hidden lg:block pl-[8px] text-[13px]">Đăng nhập</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>