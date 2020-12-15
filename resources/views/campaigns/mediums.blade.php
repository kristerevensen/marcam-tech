@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.mediums')}}">{{ __('Mediums')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>          

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <div>
                                    <h6 class="card-title">{{ __('Mediums') }}</h6><p class="card-description">{{ __('The medium is by which manner you acquire your traffic. Eg. Banner, Email etc.') }}</p>
                                </div>
                                
                                <div>
                                    <a href="{{ route('campaigns.new_medium') }}" class="btn btn-sm btn-success  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Medium') }}
                                    </a>
                                </div>
                            </div>
                            
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
                                            @foreach($mediums as $medium)
                                            <tr>
                                            <td>{{  date_format(new DateTime($medium->created_at), 'jS M Y')  }}</td>
                                            <td>{{ $medium->medium }}</td>
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/mediums/delete/'.$medium->id) }}" ><i data-feather="x-circle"></i></a>  
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
