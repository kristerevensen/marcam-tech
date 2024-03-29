@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.links')}}">{{ __('Links')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All links </li>
    </ol>
</nav>
           
        <form action="{{ route('campaigns.save_link')}}" method="post" id="link_new" class="validate">
                @csrf
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <h6 class="card-title">{{ __('New Link') }}</h6>
                <div>
                    <a href="{{ route('campaigns.new_bulk_links') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        {{ __('Bulk Link Creator') }}
                    </a>
                    
                    <a href="{{ route('campaigns.new_template') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        {{ __('New Template') }}
                    </a>
                </div>
            </div>
            <p class="card-description">{{ __('Standard URL Builder') }}</p>
            <div class="row">
                <div class="grid-margin stretch-card col-md-8">  
                    <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                    <input type="hidden" name="set_campaign_id" value="{{ $campaign_id}}">
                    <div class="form-group col-12">
                        <label for="landing_page">{{ __('Landing Page URL')}}</label>
                        <input type="text" name="landing_page" id="landing_page" placeholder="Https://..."  class="form-control" required>
                    </div>   
                </div>
               
                <div class="grid-margin stretch-card col-md-4">
                    <div class="form-group col-12">
                        <label for="campaign">{{ __('Campaign')}} <a href="{{ route('campaigns.new') }}">New Campaign</a></label>
                        <select name="campaign" id="">
                            @foreach($campaigns as $campaign)
                                <option value="{{ $campaign->campaign_id }}" {{ ($campaign->campaign_id == $campaign_id) ? 'selected' : null}}>{{ $campaign->campaign_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="source">{{ __('Sources')}} <a href="{{ route('campaigns.new_source') }}">New Source</a></label>
                        <select name="source" id="">
                            <option value="Google">Google</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Twitter">Twitter</option>
                            <option value="SnapChat">SnapChat</option>
                            <option value="LinkedIn">LinkedIn</option>
                            @foreach($sources as $source)
                                <option value="{{ $source->source }}">{{ $source->source}}</option>
                            @endforeach
                        </select>
                        The referrer (e.g. google, newsletter)
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="medium">{{ __('Medium')}} <a href="{{ route('campaigns.new_medium') }}">New Medium</a></label>
                        <select name="medium" id="">
                            <option value="Banner">Banner</option>
                            <option value="CPC ">CPC</option>
                            <option value="Email">Email</option>
                            <option value="Organic">Organic</option>
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->medium }}">{{ $medium->medium}}</option>
                            @endforeach
                        </select>
                        Marketing medium (e.g. cpc, banner, email)
                    </div>
                </div>
                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="content">{{ __('Content')}} <a href="{{ route('campaigns.new_content') }}">New Content</a></label>
                        <select name="content" id="">
                            @foreach($contents as $content)
                                <option value="{{ $content->content }}">{{ $content->content}}</option>
                            @endforeach
                        </select>
                        Use to differentiate ads
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="term">{{ __('Terms')}} <a href="{{ route('campaigns.new_term') }}">New Term</a></label>
                        <select name="term" id="term">
                            @foreach($terms as $term)
                                <option value="{{ $term->term }}">{{ $term->term}}</option>
                            @endforeach
                        </select>
                        Identify the paid keywords
                    </div>
                </div>
            </div>
        </div>
            <div class="row" style="margin-top:20px">
                <div class="grid-margin stretch-card col-md-12">
                    <h5 class="form-group" style="padding-left:10px; margin-bottom:0px; padding-bottom:0px;">{{ __('Custom Parameters to be added to URL builder') }} </h5> 
                </div>
                @if(count($parameters)>0) 
                @foreach($parameters as $parameter)
                    <div class="grid-margin stretch-card col-md-4">
                        <div class="form-group col-12">
                            <label for="parameters">{{ $parameter->custom_parameter }}</label>
                            <input type="text" name="parameters[{{ $parameter->custom_parameter }}]" class="form-control">
                        </div>
                    </div>
                @endforeach
                @else
                <div class="grid-margin stretch-card col-md-12">
                    <div class="form-group col-12">
                        <p>No custom parameters added. <a href="{{ route('campaigns.new_custom_parameter')}}">Go here to add custom parameters</a></p>
                    </div>
                </div>
                  
                @endif
               

            </div>
            <div class="row">
                <div class="grid-margin stretch-card col-md-12">
                    <div class="form-group col-12">
                        <input type="submit" name="savethecampaignlink" value="Register link" id="savethecampaignlink" class="btn btn-sm btn-block btn-primary">
                    </div>
                </div>
            </div>            
        </form>
        
@endsection
