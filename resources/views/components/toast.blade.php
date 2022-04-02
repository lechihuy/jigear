<div 
    class="fixed z-30 flex items-center max-w-sm gap-3 p-4 ml-3 text-sm rounded-lg shadow-lg top-3 right-3" 
    x-cloak
    x-data="$store.toast" 
    x-show="shown"
    :class="getThemeClass()"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
>
    <span class="material-icons-round" x-text="getIconName()"></span>
    <div x-text="message"></div>
</div>