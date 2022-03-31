@php
    $componentId = str_replace('-', '', Str::uuid());
@endphp

<div class="flex flex-wrap w-full gap-2" x-data="gallaryFormControl{{ $componentId }}">
    <template x-for="(image, index) in {{ $attributes->get('x-model') }}">
        <div class="relative flex items-center justify-center flex-none w-40 overflow-hidden border border-gray-300 rounded-lg cursor-pointer">
            <button type="button" class="absolute cursor-pointer right-2 top-2 z-[2]" @click="removeImage(index)">
                <span class="material-icons-outlined">close</span>
            </button>
            <img :src="image.url ? image.url : URL.createObjectURL(image)">
            <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0 z-[1]" @change="changeImage($event, index)">
        </div>
    </template>
    <div class="relative flex items-center justify-center flex-none w-40 h-40 bg-white border border-gray-300 border-dashed rounded-lg cursor-pointer">
        <span class="text-5xl text-gray-300 material-icons-outlined">add</span>
        <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0" @change="addImage">
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('gallaryFormControl{{ $componentId }}', () => ({
        addImage(e) {
            const file = e.target.files[0];
            this.{{ $attributes->get('x-model') }}.push(file);
            e.target.value = '';
        },

        changeImage(e, index) {
            const file = e.target.files[0];
            if (file) {
                this.{{ $attributes->get('x-model') }}[index] = file;
            }
        },

        removeImage(index) {
            this.{{ $attributes->get('x-model') }}.splice(index, 1);
        }
    }));
});
</script>
@endpush