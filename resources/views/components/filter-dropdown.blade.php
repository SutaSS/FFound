{{-- resources/views/components/filter-dropdown.blade.php --}}
<div class="relative inline-block text-left">
    <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="filter-menu-button" aria-haspopup="true" aria-expanded="true" onclick="toggleDropdown('filter-dropdown-menu')">
        Date
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="filter-menu-button" id="filter-dropdown-menu">
        <div class="py-1">
            @php
                $currentRouteName = request()->route() ? request()->route()->getName() : null;
            @endphp

            @if ($currentRouteName) 
                {{-- Link untuk Ascending (terlama ke terbaru) --}}
                <a href="{{ route($currentRouteName, array_merge(request()->query(), ['sort_order' => 'asc'])) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Date Ascending (Oldest)</a>
                {{-- Link untuk Descending (terbaru ke terlama) --}}
                <a href="{{ route($currentRouteName, array_merge(request()->query(), ['sort_order' => 'desc'])) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Date Descending (Latest)</a>
            @else
                {{-- Fallback jika rute tidak diberi nama (opsional, bisa diganti dengan teks atau kosong) --}}
                <span class="block px-4 py-2 text-sm text-gray-500">unavailable</span>
            @endif
        </div>
    </div>
</div>

<script>
    function toggleDropdown(id) {
        document.getElementById(id).classList.toggle('hidden');
    }

    window.onclick = function(event) {
        if (!event.target.matches('#filter-menu-button')) {
            var dropdowns = document.getElementsByClassName("origin-top-right");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }
</script>