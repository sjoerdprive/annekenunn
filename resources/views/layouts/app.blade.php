<a class="focus-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

  <main id="main" class="main content">
    @yield('content')
    @php(dynamic_sidebar('sidebar-contact'))
  </main>
  @hasSection ('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>      
  @endif


@include('sections.footer')
