@props([
    'columns',
    'rows'
])

@aware(['prefixRouteName', 'items'])

<div class="overflow-auto rounded-lg shadow">
    {{-- Tools --}}
    <div class="flex items-center p-3 bg-white border-b border-gray-200">
        <div class="mr-auto">
            <input type="checkbox" class="form-checkbox"/>
        </div>
    </div>

    <div class="overflow-auto border-b border-gray-200">

        <table class="min-w-[1000px] w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="w-8 px-3 py-3"></th>
                    {{ $columns }}
                    <th scope="col" class="relative px-3 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{ $rows }}
            </tbody>
        </table>

    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-between p-3 text-sm font-semibold bg-slate-100">
        @if (!$items->onFirstPage())
            <a href="{{ $items->previousPageUrl() }}" class="flex items-center text-gray-500 hover:text-gray-600">
                <span class="material-icons-outlined">chevron_left</span>
                <span class="hidden sm:inline-block">{{ __('Trang trước') }}</span>
            </a>
        @endif
        
        <span class="text-gray-500">
            {{ __('Trang :current trên tổng :last_page', ['current' => $items->currentPage(), 'last_page' => $items->lastPage()]) }}
            &bull;
            {{ __('Tất cả :total bản ghi', ['total' => $items->total()]) }}
        </span>

        @if ($items->hasMorePages())
            <a href="{{ $items->nextPageUrl() }}" class="flex items-center text-gray-500 hover:text-gray-600">
                <span class="hidden sm:inline-block">{{ __('Trang sau') }}</span>
                <span class="material-icons-outlined">chevron_right</span>
            </a>
        @endif
    </div>
</div>