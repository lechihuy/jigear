<div 
    x-cloak
    class="fixed top-0 left-0 z-40 flex items-start justify-center w-full h-screen p-5 ite bg-black/70" 
    x-data="$store.confirmModal"
    x-show="shown"
    @click.self="hide"
>
    <div class="flex flex-col max-w-full p-5 text-gray-600 bg-white rounded-lg w-96">
        <div class="flex justify-end">
            <span class="cursor-pointer material-icons-outlined" @click="hide">close</span>
        </div>
        <div class="flex flex-col gap-2 text-center py-7">
            <span class="mx-auto text-5xl material-icons-outlined">help_outline</span>
            <span>{{ __('Bạn có chắc muốn thực hiện tác vụ này?') }}</span>
        </div>
        <div class="flex items-center justify-end gap-2">
            <button type="button" class="btn btn-secondary" @click="hide">Hủy bỏ</button>
            <button type="button" class="btn btn-primary" @click="confirm">
                <span class="material-icons-outlined">check_circle</span> OK
            </button>
        </div>
    </div>
</div>