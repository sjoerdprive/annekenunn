@php
    $menu = create_menu('primary');
@endphp

<ul class="nav gap-1">
    @foreach ($menu as $item)
        @php
            // Set class names if the menu item is active
            $menu_item_active_class = get_the_ID() == $item['ID'] ? 'active' : '';
            $sub_menu_item_active_class = get_the_ID() == $item['ID'] ? 'active' : '';
        @endphp

        <li>

            @if (isset($item['children']))
                <div x-data="{ open: false }" class="nav-link has-children">
                    @if (isset($item['url']))
                        <a class="{{ $menu_item_active_class }}" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    @else
                        <span>{{ $item['title'] }}</span>
                    @endif

                    <button class="px-1" @click="open = !open" :aria-expanded="open">
                        <span class="sr-only">
                            Submenu {{ $item['title'] }}
                        </span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul class="sub-menu" x-show="open" x-transition>
                        @foreach ($item['children'] as $child)
                            <li>
                                <a class="{{ $menu_item_active_class }}"
                                    href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="nav-link">
                    <a class="{{ $menu_item_active_class }}" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                </div>
            @endif
        </li>
    @endforeach
</ul>
