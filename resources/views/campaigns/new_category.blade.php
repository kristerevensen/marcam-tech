@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.categories')}}">{{ __('Categories')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Category </li>
    </ol>
</nav>

         
<form action="{{ route('campaignscategory.store')}}" method="post" id="new_category" class="validate">
    @csrf
        <div class="row">
            <div class="grid-margin stretch-card col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                            <h6 class="card-title">{{ __('New Category') }}</h6>
                        </div>
                            <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                            <input type="hidden" name="created_by" id="{{ Auth::id() }}">             
                            <div class="form-group">
                                <label for="campaign_name">{{ __('Category name')}}</label>
                                    <input type="text" name="campaigncategory_name" id="campaigncategory_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Save Category" id="SaveCampaignCategory" class="btn btn-sm btn-block btn-primary">
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
    </form>

@endsection
