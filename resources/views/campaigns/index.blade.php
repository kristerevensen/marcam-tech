@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Campaigns') }}</h4>
                </div>
                @include('partials.campaigns.new')
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Campaigns') }}</h6>
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
                                            <td>{{ date_format($campaign->created_at, 'jS M Y') }}</td>
                                            <td>{{ $campaign->campaign_name }}</td>
                                            <td>{{ number_format($campaign->campaign_spend) }}</td>
                                            <td>{{ date_format($campaign->start, 'jS M Y') }}</td>
                                            <td>{{ date_format($campaign->end, 'jS M Y') }}</td>
                                            <td>{{ $campaign->created_by }}<td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="">{{ __('View') }}</a>
                                                        <a class="dropdown-item" href="">{{ __('New link') }}</a>
                                                        <a class="dropdown-item" href="">{{ __('Multiple Links') }}</a>
                                                        <a class="dropdown-item" href="{">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="" onclick="javascript: return confirm('{{ __('Are you sure?') }}')">Delete</a>
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
