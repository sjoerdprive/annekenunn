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
        <div class="nav-primary">
            @include('partials.menu')
        </div>
        @endif
    </div>
</header>
