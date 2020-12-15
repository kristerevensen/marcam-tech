@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.terms')}}">{{ __('Terms')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>
           

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ __('Your Terms') }}</h6>
                                <div>
                                    <a href="{{ route('campaigns.new_term') }}" class="btn btn-sm btn-success  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Term') }}
                                    </a>
                                </div>
                            </div>
                        <p class="card-description">{{ __('Used to identify paid keywords') }}</p>
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
                                            @foreach($terms as $term)
                                            <tr>
                                            <td>{{ date_format(new DateTime($term->created_at), 'jS M Y') }}</td>
                                            <td>{{ $term->term }}</td>
                                          
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/terms/delete/'.$term->id) }}" ><i data-feather="x-circle"></i></a> 
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

@endsection
