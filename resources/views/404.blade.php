@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <div class="container py-5">
        @if (!have_posts())
            <x-alert type="warning">
                {!! __('Deze pagina bestaat niet!', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
        @endif
    </div>
@endsection
