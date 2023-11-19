@php
    $menu = create_menu();
@endphp

<ul class="nav">
    @foreach ($menu as $item)
        @php
            // Set class names if the menu item is active
            $is_menu_item_active = $item['ID'] == get_the_ID() || ($item['ID'] == 0 && is_home());
            $menu_item_active_class = $is_menu_item_active ? 'active' : '';
        @endphp

        <li class="{{ $menu_item_active_class }}">
            @if (isset($item['children']))
                <div x-data="{ open: false }" class="nav-link has-children">
                    <div class="item-wrapper">

                        @if (isset($item['url']))
                            <a aria-current="{{ $is_menu_item_active ? 'page' : 'false' }}"
                                href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                        @else
                            <span>{{ $item['title'] }}</span>
                        @endif

                        <button class="px-1" @click="open = !open" :aria-expanded="open">
                            <span class="sr-only">
                                {{ $item['title'] }} submenu
                            </span>
                            <div class="submenu-chevron" :class="{ 'submenu-chevron-rotated': open }">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </button>

                    </div>
                    <ul class="sub-menu" x-show="open" x-collapse>
                        @foreach ($item['children'] as $child)
                            @php
                                $is_submenu_active = $child['ID'] == get_the_ID();
                                $sub_menu_item_active_class = $is_submenu_active ? 'active' : '';
                            @endphp
                            <li class="{{ $sub_menu_item_active_class }}">
                                <div class="item-wrapper">
                                    <a aria-current="{{ $is_submenu_active ? 'page' : 'false' }}"
                                        href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="item-wrapper">
                    <div class="nav-link">
                        <a aria-current="{{ $is_menu_item_active ? 'page' : 'false' }}"
                            href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
