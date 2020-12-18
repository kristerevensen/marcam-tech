@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.links')}}">{{ __('Links')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New links in bulk </li>
    </ol>
</nav>

            
<form action="{{ route('campaigns.save_bulk')}}" method="post" id="new_source" class="validate">
@csrf
    <div class="row">
        <div class="grid-margin stretch-card col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                        <h6 class="card-title">{{ __('Save links in bulk') }}</h6>
                    </div>
                        <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                        <input type="hidden" name="created_by" id="{{ Auth::id() }}">             
                        <div class="form-group">
                            <label for="bulk">{{ __('Source name')}}</label>
                                <textarea name="bulk" id="bulk" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Save Bulk" id="saveBulkList" class="btn btn-sm btn-block btn-primary">
                        </div>
                    </div>
                </div>
            </div>      
        </div>
</form>
        
@endsection
