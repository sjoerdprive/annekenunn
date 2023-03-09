@php
    $menu = create_menu('primary');
@endphp

<ul class="nav">
    @foreach ($menu as $item)
        @php
            // Set class names if the menu item is active
            $menu_item_active_class = get_the_ID() == $item['ID'] ? 'active' : '';
        @endphp

        <li class="{{ $menu_item_active_class }}">

            @if (isset($item['children']))
                <div x-data="{ open: false }" class="nav-link has-children">
                    <div class="item-wrapper">

                        @if (isset($item['url']))
                            <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                        @else
                            <span>{{ $item['title'] }}</span>
                        @endif

                        <button class="px-1" @click="open = !open" :aria-expanded="open">
                            <span class="sr-only">
                                Submenu {{ $item['title'] }}
                            </span>
                            <div class="submenu-chevron" :class="{ 'submenu-chevron-rotated': open }">

                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </button>

                    </div>
                    <ul class="sub-menu" x-show="open" x-collapse>
                        @foreach ($item['children'] as $child)
                            @php
                                $sub_menu_item_active_class = get_the_ID() == $child['ID'] ? 'active' : '';
                            @endphp
                            <li class="{{ $sub_menu_item_active_class }}">
                                <div class="item-wrapper">
                                    <a href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="item-wrapper">

                    <div class="nav-link">
                        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
