@php $level = $level ?? 0 @endphp

<ul class="my-0">
    @foreach ($items as $label => $item)
        <!-- @include('_nav.menu-item') -->
        <li class="pl-4">
            @if ($url = is_array($item) ? $item['url'] : $item)
                {{-- Menu item with URL--}}
                <a href="{{ $page->url($url) }}"
                    class="{{ 'lvl' . $level }} {{ $page->isActiveParent($item) ? 'lvl' . $level . '-active' : '' }} {{ $page->isActive($url) ? 'active font-semibold text-blue-500' : '' }} nav-menu__item hover:text-blue-500"
                >
                    {{ $label }}
                </a>
            @else
                {{-- Menu item without URL--}}
                <p class="nav-menu__item text-gray-600">{{ $label }}</p>
            @endif

            @if (is_array($item) && $item['children'])
                {{-- Recursively handle children --}}
                @include('_nav.menu', ['items' => $item['children'], 'level' => ++$level])
            @endif
        </li>

    @endforeach
</ul>
