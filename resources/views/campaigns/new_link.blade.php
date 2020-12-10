@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('New Link') }}</h4>
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
                </div>
            </div>
        <form action="{{ route('campaigns.save_link')}}" method="post" id="link_new" class="validate">
                @csrf
        <div class="card card-body">
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
                        <label for="campaign">{{ __('Campaign')}}</label>
                        <select name="campaign" id="">
                            @foreach($campaigns as $campaign)
                                <option value="{{ $campaign->id }}" {{ ($campaign_id == $campaign->id) ? 'selected' : null}}>{{ $campaign->campaign_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="source">{{ __('Sources')}}</label>
                        <select name="source" id="">
                            @foreach($sources as $source)
                                <option value="{{ $source->source }}">{{ $source->source}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="medium">{{ __('Medium')}}</label>
                        <select name="medium" id="">
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->medium }}">{{ $medium->medium}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="content">{{ __('Content')}}</label>
                        <select name="content" id="">
                            @foreach($contents as $content)
                                <option value="{{ $content->content }}">{{ $content->content}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-3">
                    <div class="form-group col-12">
                        <label for="term">{{ __('Terms')}}</label>
                        <select name="term" id="term">
                            @foreach($terms as $term)
                                <option value="{{ $term->term }}">{{ $term->term}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
            <div class="row" style="margin-top:20px">
                <div class="grid-margin stretch-card col-md-12">
                    <h5 class="form-group" style="padding-left:10px; margin-bottom:0px; padding-bottom:0px;">{{ __('Custom Parameters to be added to URL builder') }}</h5>
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
