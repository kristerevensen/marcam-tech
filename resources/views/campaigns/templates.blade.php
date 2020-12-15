@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.templates')}}">{{ __('Templates')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
</nav>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ __('Your Templates') }}</h6>
                                <div>
                                    <a href="{{ route('campaigns.new_bulk_links') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('Bulk Link Creator') }}
                                    </a>
                                    <a href="{{ route('campaigns.new_link') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Link') }}
                                    </a>
                                    <a href="{{ route('campaigns.new_template') }}" class="btn btn-sm btn-success  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Template') }}
                                    </a>
                                </div>
                            </div>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('Name') }}</th>
                                            <th class="wd-20p">{{ __('Source') }}</th>
                                            <th class="wd-20p">{{ __('Medium') }}</th>
                                            <th class="wd-20p">{{ __('Term') }}</th>
                                            <th class="wd-20p">{{ __('Content') }}</th>
                                            <th class="wd-20p">{{ __('Parameters') }}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($templates as $template)
                                            <tr>
                                            <td>{{ date_format (new DateTime($template->created_at), 'jS M Y') }}</td>
                                            <td>{{ $template->template_name }}</td>
                                            <td>{{ $template->source }}</td>
                                            <td>{{ $template->medium }}</td>
                                            <td>{{ $template->term }}</td>
                                            <td>{{ $template->content }}</td>
                                            <td>
                                                @foreach (unserialize($template->parameters) as $key => $value)
                                                    <span class="badge badge-light">{{ $key  }}</span>
                                                @endforeach
                                            </td>
                                            
                                                <td>
                                                    <a class="dropdown-item" onclick="javascript: return confirm('Are you sure?');" href="{{ ('/campaigns/links/delete/'.$template->id) }}" ><i data-feather="x-circle"></i></a>  
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
