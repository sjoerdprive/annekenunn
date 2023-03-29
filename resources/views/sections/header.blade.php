<header class="banner p-2">
    <div class="container header-content">
        <div class="brand">
            {{-- <a class="brand" href="{{ home_url('/') }}">
                {!! $siteName !!}
            </a>
            <small>
                Tekstschrijver en (web)redacteur
            </small> --}}
            @php(dynamic_sidebar('sidebar-identity'))
        </div>
        
        @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            @include('partials.menu')
        </nav>
        @endif
    </div>
</header>
