@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Links') }}</h4>
                </div>
                <div>
                    <a href="{{ route('campaigns.new_bulk_links') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        {{ __('Bulk Link Creator') }}
                    </a>
                    <a href="{{ route('campaigns.new_template') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        {{ __('New Template') }}
                    </a>
                    <a href="{{ route('campaigns.new_link') }}" class="btn btn-sm btn-success  btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        {{ __('New Link') }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Links') }}</h6>
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
