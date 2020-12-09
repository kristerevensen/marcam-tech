@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('New Custom Parameter') }}</h4>
                </div>
            </div>
            <form action="{{ route('campaigns.save_custom_parameter')}}" method="post" id="sourc_new" class="validate">
                @csrf
            <div class="row">
                        <div class="grid-margin stretch-card col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="campaign_name">{{ __('Parameter Name')}}</label>
                                            <input type="text" name="campaign_parameter" id="source_name" class="form-control" required>
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
        @include('campaigns.addcategory')
@endsection
