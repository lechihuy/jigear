@props([
    'columns',
    'rows',
    'filter' => null
])

@aware(['prefixRouteName', 'items', 'hasFilter'])

<div class="rounded-lg shadow">
    {{-- Tools --}}
    <div class="flex items-center p-3 bg-white border-b border-gray-200 rounded-t-lg">
        <div class="mr-auto">
            @if ($items->total())
                {{-- <input type="checkbox" class="form-checkbox"/> --}}
            @endif
        </div>
        <div class="ml-auto">
            {{-- Filter button --}}
            <div class="relative" x-data="{ open: false }">
                <button type="button" class="relative btn btn-secondary @if ($hasFilter) text-green-500 @endif" @click="open = ! open">
                    <span class="material-icons-outlined">filter_alt</span>
                    <span>{{ __('Lọc') }}</span>
                </button>

                {{-- Filter dropdown --}}
                <div x-show="open" x-transition class="absolute right-0 z-10 mt-2 origin-top-right bg-white border border-gray-200 rounded-lg shadow-lg w-72 focus:outline-none">
                    
                    {{-- Filter form --}}
                    <form method="GET">

                        {{-- Refresh filter button --}}
                        <a href="{{ route($prefixRouteName.'index') }}" class="border-0 rounded-b-none cursor-pointer btn btn-light btn-block">
                            <span class="material-icons-outlined">refresh</span>
                            {{ __('Làm mới bộ lọc') }}
                        </a>

                        {{ $filter }}
                        
                        <div>
                            <div class="p-2 font-semibold text-gray-500 bg-gray-50">
                                {{ __('Phân trang') }}
                            </div>
                            <div class="flex flex-col gap-2 p-2">
                                <select name="per_page" class="form-select">
                                    @foreach ([15, 20, 25, 50, 100] as $perPage)
                                        <option value="{{ $perPage }}" @selected(request()->input('per_page') == $perPage)>{{ $perPage }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Apply filter button --}}
                        <button type="submit" class="rounded-t-none btn btn-primary btn-block">
                            <span class="material-icons-outlined">check_circle</span>
                            {{ __('Áp dụng') }}
                        </button>
                    </form>
                    {{-- /Filter form --}}
                </div>
                {{-- /Filter dropdown --}}
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-auto border-b border-gray-200">

        @if ($items->total())
            <table class="min-w-[1000px] w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{-- <th scope="col" class="w-8 px-3 py-3"></th> --}}
                        {{ $columns }}
                        <th scope="col" class="relative px-3 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{ $rows }}
                </tbody>
            </table>
        @else
            <div class="flex items-center justify-center py-10 bg-white rounded-b-lg">
                <div class="max-w-full text-center text-gray-500 w-96">
                    <span class="text-5xl material-icons-outlined">search_off</span>
                    <p>{{ __('Không tìm thấy kết quả nào.') }}</p>
                    <a href="{{ route($prefixRouteName.'index') }}" class="mt-5 cursor-pointer btn btn-light">
                        <span class="material-icons-outlined">refresh</span>
                        {{ __('Làm mới bộ lọc') }}
                    </a>
                </div>
            </div>
        @endif

    </div>
    {{-- /Table --}}

    {{-- Pagination --}}
    @if ($items->total())
        <div class="flex items-center justify-between p-3 text-sm font-semibold rounded-b-lg bg-slate-100">
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
    @endif
</div>