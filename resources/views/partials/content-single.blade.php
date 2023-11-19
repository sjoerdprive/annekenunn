<article @php(post_class('h-entry container py-5'))>
    <header>
        <h1 class="p-name">
            {!! $title !!}
        </h1>

        @include('partials.entry-meta')
    </header>

    <div class="e-content">
        <section class="section">

            @php(the_content())
        </section>
    </div>

    <footer>
        {!! wp_link_pages([
            'echo' => 0,
            'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
            'after' => '</p></nav>',
        ]) !!}
    </footer>

    {{-- @php(comments_template()) --}}
</article>
