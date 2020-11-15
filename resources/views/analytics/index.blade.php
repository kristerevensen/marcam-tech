@extends('layouts.app')

@section('content')


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ __('Analytics') }}</h4>
        </div>
        @include('partials.selector')
    </div>


@endsection
