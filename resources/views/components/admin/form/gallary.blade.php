@php
    $componentId = str_replace(Str::uuid(), '-', '');
@endphp

<div class="flex w-full gap-2">
    <div class="relative flex items-center justify-center w-40 h-40 border border-gray-300 border-dashed rounded-lg cursor-pointer">
        <span class="text-5xl text-gray-300 material-icons-outlined">add</span>
        <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0">
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('gallaryFormControl{{ $componentId }}', () => ({
        
    }));
});
</script>
@endpush