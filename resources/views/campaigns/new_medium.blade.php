@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.mediums')}}">{{ __('Mediums')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New </li>
    </ol>
</nav>
            
            <form action="{{ route('campaigns.save_medium')}}" method="post" id="sourc_new" class="validate">
                @csrf
            <div class="row">
                        <div class="grid-margin stretch-card col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">{{ __('New Medium') }}</h6>
                                    <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="campaign_name">{{ __('Medium name')}}</label>
                                            <input type="text" name="campaign_medium" id="campaign_medium" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="savethecampaign" id="savethecampaign" class="btn btn-sm btn-block btn-primary">
                                        </div>
                                </div>
                            </div>
                        </div>
                        
            </div>
                        

                        
                </div>
            </div>
        </form>
        
@endsection
