<article @php(post_class('h-entry'))>
    @include('components.featured-image-banner')
    <div class="section">

        <div class="container">
            <header>
                <h1 class="p-name">
                    {!! $title !!}
                </h1>

                @include('partials.entry-meta')
            </header>

            <div class="e-content">
                @php(the_content())

            </div>
            <footer>
                {!! wp_link_pages([
                    'echo' => 0,
                    'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
                    'after' => '</p></nav>',
                ]) !!}
            </footer>

        </div>
        {{-- @php(comments_template()) --}}
    </div>
</article>
