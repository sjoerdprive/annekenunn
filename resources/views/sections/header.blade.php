<header class="banner p-2">
    <a class="brand" href="{{ home_url('/') }}">
        {!! $siteName !!}
    </a>

    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            @include('partials.menu')
        </nav>
    @endif
</header>
