@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.contents')}}">{{ __('Contents')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New </li>
    </ol>
</nav>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ __('Your Contents') }}</h6>
                                <div>
                                    <a href="{{ route('campaigns.new_content') }}" class="btn btn-sm btn-success  btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        {{ __('New Content') }}
                                    </a>
                                </div>
                            </div>
                        <p class="card-description">{{ __('This field has previously been used for differentiating ads and links within the same ad. This can be used as a custom field too.') }}</p>
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
                                            @foreach($contents as $content)
                                            <tr>
                                            <td>{{ $content->created_at }}</td>
                                            <td>{{ $content->content }}</td>
                                           
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/contents/delete/'.$content->id) }}" ><i data-feather="x-circle"></i></a> 
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
