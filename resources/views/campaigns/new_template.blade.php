@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('campaigns.templates')}}">{{ __('Templates')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Template </li>
    </ol>
</nav>
            
        <form action="{{ route('campaigns.save_template')}}" method="post" id="link_new" class="validate">
                @csrf
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                        <h6 class="card-title">{{ __('New Template') }}</h6>
                        <div>
                            <a href="{{ route('campaigns.new_bulk_links') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                                <i class="btn-icon-prepend" data-feather="plus"></i>
                                {{ __('Bulk Link Creator') }}
                            </a>
                            <a href="{{ route('campaigns.new_link') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                                <i class="btn-icon-prepend" data-feather="plus"></i>
                                {{ __('New Link') }}
                            </a>
                        </div>
                    </div>
       
            <div class="row">
                <div class="grid-margin stretch-card col-md-12">  
                    <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                </div>
                <div class="grid-margin stretch-card col-md-12">
                    <div class="form-group col-12">
                        <label for="source">{{ __('Template Name')}}</label>
                       <input type="text" name="template_name" class="form-control" required>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-4">
                    <div class="form-group col-12">
                        <label for="source">{{ __('Sources')}}</label>
                        <select name="source" id="">
                            @foreach($sources as $source)
                                <option value="{{ $source->source }}">{{ $source->source}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-4">
                    <div class="form-group col-12">
                        <label for="medium">{{ __('Medium')}}</label>
                        <select name="medium" id="">
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->medium }}">{{ $medium->medium}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid-margin stretch-card col-md-4">
                    <div class="form-group col-12">
                        <label for="content">{{ __('Content')}}</label>
                        <select name="content" id="">
                            @foreach($contents as $content)
                                <option value="{{ $content->content }}">{{ $content->content}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-margin stretch-card col-md-4">
                    <div class="form-group col-12">
                        <label for="term">{{ __('Terms')}}</label>
                        <select name="term" id="term">
                            @foreach($terms as $term)
                                <option value="{{ $term->term }}">{{ $term->term}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @foreach($parameters as $parameter)
                    <div class="grid-margin stretch-card col-md-4">
                        <div class="form-group col-12">
                            <label for="parameters">{{ $parameter->custom_parameter }}</label>
                            <input type="text" name="parameters[{{ $parameter->custom_parameter }}]" class="form-control">
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="grid-margin stretch-card col-md-12">
                    <div class="form-group col-12">
                        <input type="submit" name="savethetemplate" value="Save template" id="savethetemplate" class="btn btn-sm btn-block btn-primary">
                    </div>
                </div>
            </div>    
        </div>
    </div>        
        </form>
        
@endsection
