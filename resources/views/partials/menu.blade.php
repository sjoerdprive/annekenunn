@php
    $menu = create_menu('primary');
@endphp

<ul class="nav gap-2">
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
                        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    @else
                        <span>{{ $item['title'] }}</span>
                    @endif
                    
                    <button class="px-1" @click="open = !open" :aria-expanded="open">
                        v
                    </button>
                    <ul class="sub-menu" x-show="open" x-transition>
                        @foreach ($item['children'] as $child)
                            <li>
                                <a href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
            @endif
        </li>
    @endforeach
</ul>
