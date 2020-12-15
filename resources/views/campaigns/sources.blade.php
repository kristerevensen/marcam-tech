@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.sources')}}">{{ __('Sources')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>

         

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                            <h6 class="card-title">{{ __('Your Sources') }}</h6>
                          
                                <a href="#" data-target="#addSource" data-toggle="modal" class="btn btn-sm btn-success  btn-icon-text">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    {{ __('New Source') }}
                                </a>
                            </div>
                        <p class="card-description">{{ __('Sources are ...') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('Name') }}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sources as $source)
                                            <tr>
                                            <td>{{ date_format(new DateTime($source->created_at), 'jS M Y') }}</td>
                                            <td>{{ $source->source }}</td>
                                          
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/sources/delete/'.$source->id) }}" ><i data-feather="x-circle"></i></a>  
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('campaigns.sources.new')

@endsection
