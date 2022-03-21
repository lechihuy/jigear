<div class="bg-gray-100">
    <div 
        {{ $attributes->merge([
            'class' => 'flex items-center overflow-x-auto no-scrollbar whitespace-nowrap group'
        ]) }}
        x-data="{ 
            shownLeft: false,
            shownRight: true,
            left() {
                $refs.slider.scrollTo({
                    left: $refs.slider.scrollLeft - 200,
                    behavior: 'smooth'
                });
            },
            right() {
                $refs.slider.scrollTo({
                    left: $refs.slider.scrollLeft + 200,
                    behavior: 'smooth'
                });
            },
            update() {
                this.shownLeft = $refs.slider.scrollLeft > 0
                this.shownRight = $refs.slider.scrollWidth - $refs.slider.offsetWidth > $refs.slider.scrollLeft
            }
        }"
        @scroll="update"
        x-ref="slider"
    >
        <div @click="left" x-cloak x-show="shownLeft" class="z-[2] absolute flex items-center justify-center flex-none text-white transition duration-1000 ease-in-out lg:scale-90 rounded-full lg:opacity-0 cursor-pointer select-none left-4 -mr-14 h-14 w-14 bg-gray-900/50 group-hover:opacity-100 group-hover:scale-100">
            <span class="text-4xl font-medium material-icons">
                chevron_left
            </span>    
        </div>
        
        {{ $slot }}
            
        <div @click="right" x-cloak x-show="shownRight" class="z-[2] absolute flex items-center justify-center flex-none text-white transition duration-1000 ease-in-out lg:scale-90 rounded-full lg:opacity-0 cursor-pointer select-none right-4 h-14 w-14 bg-gray-900/50 group-hover:opacity-100 group-hover:scale-100">
            <span class="text-4xl font-medium material-icons">
                chevron_right
            </span>    
        </div>
    </div>
</div>

