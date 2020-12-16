@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.links')}}">{{ __('Links')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>

            

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <div>
                                    <h6 class="card-title">{{ __('Your Links') }}</h6>
                                </div>
                                <div>
                                    
                                    <a href="{{ route('campaigns.new_link') }}" class="btn btn-sm btn-success  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Link') }}
                                    </a>
                                </div>
                            </div>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('URL') }}</th>
                                            <th class="wd-20p">{{ __('Campaign') }}</th>
                                            <th class="wd-20p">{{ __('Marcam URL')}}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($links as $link)
                                            <tr>
                                            <td>{{ date_format (new DateTime($link->created_at), 'jS M Y') }}</td>
                                            <td>{{ $link->landing_page }}</td>
                                            <td>{{ $link->campaign_name }}</td>
                                            <td><a href="{{ $link->marcam}}" target="_blank">{{ $link->marcam }}</a></td>
                                            
                                                <td>
                                                    <a class="dropdown-item" onclick="javascript: return confirm('Are you sure?');" href="{{ ('/campaigns/links/delete/'.$link->id) }}" ><i data-feather="x-circle"></i></a>  
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
