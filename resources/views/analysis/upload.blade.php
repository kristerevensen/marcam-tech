@extends('layouts.app')

@section('content')

            <div class="container">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upload data</li>
                    </ol>
                    </nav>
                <div class="card mt-3">
                    <div class="card-body">
                        <h6 class="card-title"> {{ __('Upload Analysis Data') }}</h6>
                        <form action="{{ route('analysis.import') }}" method="POST" enctype="multipart/form-data" class="validate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="import_type">Select file</label>
                                    <input type="file" name="file" class="form-control" required>
                                    <input type="hidden" name="selected_project_token" id="selected_project_token" value="{{ session('selected_project')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="import_type">Import Type</label>
                                    <select name="import_type" id="import_type">
                                        <option value="none">{{ __('Choose..') }}</option>
                                        <option value="pages">{{ __('Pages')}}</option>
                                        <option value="channels">{{ __('Channels')}}</option>
                                        <option value="segments">{{ __('Segments')}}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-block btn-sm btn-primary">Upload Data</button>
                            </div>
                        </form>
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
