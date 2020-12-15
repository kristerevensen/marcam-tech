@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.contents')}}">{{ __('Contents')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New </li>
    </ol>
</nav>
            
<form action="{{ route('campaigns.save_content')}}" method="post" id="sourc_new" class="validate">
    @csrf
    <div class="row">
        <div class="grid-margin stretch-card col-md-12">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                    @csrf
                    <div class="form-group">
                        <label for="campaign_name">{{ __('Content name')}}</label>
                        <input type="text" name="campaign_content" id="campaign_content" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="savethecampaign" id="savethecampaign" class="btn btn-sm btn-block btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
        
@endsection
