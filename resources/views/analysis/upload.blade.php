@extends('layouts.app')

@section('content')

            <div class="container">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Upload data')}}</li>
                    </ol>
                    </nav>
                <div class="card mt-3">
                    <div class="card-body">
                        <h6 class="card-title"> {{ __('Upload Analysis Data') }}</h6>
                        <form action="{{ route('analysis.import') }}" method="POST" enctype="multipart/form-data" class="validate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="import_name">{{__('Import Name')}}</label>
                                    <input type="text" name="import_name" class="form-control" placeholder="Name of the import.." required>
                                </div>
                                <div class="form-group col-8">
                                    <label for="import_type">{{__('Select file')}}</label>
                                    <input type="file" name="file" class="form-control" required>
                                    <input type="hidden" name="selected_project_token" class="form-control file-upload-info" id="selected_project_token" value="{{ session('selected_project')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="import_type">{{__('Import Type')}}</label>
                                    <select name="import_type" id="import_type">
                                        <option value="none">{{ __('Choose..') }}</option>

                                            @if( !in_array('pages monthly',$import_types ) )
                                                <option value="pages monthly">{{ __('Pages monthly')}}</option>
                                            @endif

                                            @if( !in_array('channels weekly',$import_types  ) )
                                                <option value="channels weekly">{{ __('Channels weekly')}}</option>
                                            @endif

                                            @if( !in_array('channels monthly',$import_types  ) )
                                                <option value="channels monthly">{{ __('Channels monthly')}}</option>
                                            @endif

                                            @if( !in_array('channels yearly',$import_types  ) )
                                                <option value="channels yearly">{{ __('Channels yearly')}}</option>
                                            @endif
                                            
                                            @if( !in_array('segments',$import_types  ) )
                                                <option value="segments">{{ __('Segments')}}</option>
                                            @endif

                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-block btn-sm btn-primary">{{__('Upload Data')}}</button>
                            </div>
                        </form>
                        <div class="bg-light card-body">
                        <strong>The following analyses have been uploaded already</strong>
                        <ul>
                        @foreach($import_types as $key)
                            <li>{{ $key }}</li>
                        @endforeach
                        </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        Use the following reports for collecting data.
                        <ul>
                            <li>Channels: </li>
                            <li>Pages: </li>
                            <li>Segments</li>
                        </ul>

                        Use the following import templates for uploading data
                        <ul>
                            <li>Channels:</li>
                            <li>Pages:</li>
                            <li>Segments:</li>
                        </ul>
                        Notice!
                        It's important that you collect a Year To Date (full weeks) data, when setting time period in Google Analytics.
                    </div>
                </div>
            </div>


@endsection
