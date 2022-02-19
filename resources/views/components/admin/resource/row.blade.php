@props([
    'item'
])

@aware(['prefixRouteName'])

<tr>
    {{-- <td class="w-8 px-3 py-4 whitespace-nowrap">
        <input type="checkbox" class="form-checkbox"/>
    </td> --}}

    {{ $slot }}

    <td class="flex items-center justify-end gap-2 px-3 py-4 text-sm font-medium whitespace-nowrap">
        <a href="{{ route($prefixRouteName . 'show', $item) }}" class="flex items-center text-gray-400 hover:text-gray-500">
            <span class="material-icons-outlined">visibility</span>
        </a>
        <a href="{{ route($prefixRouteName . 'edit', $item) }}" class="flex items-center text-gray-400 hover:text-gray-500">
            <span class="material-icons-outlined">drive_file_rename_outline</span>
        </a>
        <x-admin.button.delete prefixRoute="admin.catalogs." :resource="$item" :link="true" :onlyIcon="true" class="flex items-center text-gray-400 cursor-pointer hover:text-gray-500" />
    </td>
</tr>