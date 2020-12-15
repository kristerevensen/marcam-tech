@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('keywords')}}">{{ __('Keywords')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Explorer </li>
    </ol>
</nav>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Keywords') }}</h6>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-80p">{{ __('Keyword') }}</th>
                                            <th class="wd-10p"></th>
                                      
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($keywords as $keywords)
                                            <tr>
                                              
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.campaigns.addcategoryform')
@endsection
