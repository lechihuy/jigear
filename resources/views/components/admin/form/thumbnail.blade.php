<div x-data="imagePreview">
    <label class="block">
        <input type="file" @change="fileChosen" x-ref="{{ $attributes->get('name') }}" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-sky-600 hover:file:bg-sky-100 "/>
    </label>

    <template x-if="imageUrl">
        <div class="mt-5">
            <img :src="imageUrl" class="max-w-full border border-gray-300 rounded-lg max-h-40">
        </div>
    </template>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('imagePreview', () => ({
        imageUrl: '{{ $attributes->get("url") }}',

        fileChosen(e) {
            this.thumbnail = e.target.files[0]
            this.imageUrl = URL.createObjectURL(e.target.files[0])
        },
    }));
});
</script>
@endpush