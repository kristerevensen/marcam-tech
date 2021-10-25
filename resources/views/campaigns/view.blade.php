@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>

              
   

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ __('Your Campaigns') }}</h6>
                                <div>
                                    @include('partials.campaigns.new')
                                </div>
                            </div>


                           
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('Name') }}</th>
                                            <th class="wd-30p">{{ __('Spend') }}</th>
                                            <th class="wd-15p">{{ __('Start') }}</th>
                                            <th class="wd-15p">{{ __('End') }}</th>
                                            <th class="wd-10p">{{ __('Created by') }}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($campaigns as $campaign)
                                            <tr>
                                            <td>{{ date_format(new DateTime($campaign->created_at), 'jS M Y') }}</td>
                                            <td>{{ $campaign->campaign_name }}</td>
                                            <td>{{ number_format($campaign->campaign_spend) }}</td>
                                            <td>{{ date_format (new DateTime($campaign->start), 'jS M Y') }}</td>
                                            <td>{{ date_format (new DateTime($campaign->end), 'jS M Y') }}</td>
                                            <td>{{ $campaign->created_by }}<td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('campaigns.view',$campaign->id) }}">{{ __('View') }}</a>
                                                        <a class="dropdown-item" href="{{ route('campaigns.new_link',$campaign->id) }}">{{ __('New link') }}</a>
                                                        <a class="dropdown-item" href="">{{ __('Multiple Links') }}</a>
                                                        <a class="dropdown-item" href="{{ route('campaigns.edit',$campaign->id) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('campaigns.delete',$campaign->id)}}" onclick="javascript: return confirm('{{ __('Are you sure?') }}')">Delete</a>
                                                        </div>
                                                    </div>    
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
@section('custom_scripts')

@endsection