@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('All Analyses')}} </li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <h6 class="card-title">{{ __('Your Analyses') }}</h6>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th>Created</th>
                                <th>Analysis Name</th>
                                <th>Import Type</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>
                            @foreach($analyses as $analysis)
                            <tr>
                                <td>{{ $analysis->analysis_token}}</td>
                                <td>{{ $analysis->created_at }}</td>
                                <td>{{ $analysis->import_name }}</td>
                                <td><a href="{{ route('analysis.channel',$analysis->analysis_token) }}">{{ $analysis->import_type }}</a></td>
                                <td><a onclick="javascript: return confirm('Are you sure?');" href="{{ route('analysis.delete_analysis',$analysis->analysis_token) }}">
                                    <i data-feather="x-circle"></i>
                                    </a></td>
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
