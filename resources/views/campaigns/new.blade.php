@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('New Campaign') }}</h4>
                </div>
            </div>
            <form action="{{ route('campaigns.save')}}" method="post" id="campaigns_new" class="validate">
                @csrf
            <div class="row">
                        <div class="grid-margin stretch-card col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <input type="hidden" name="project_ud" id="" value="{{ session('selected_project')}}">
                                    <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="campaign_name">{{ __('Campaign Name')}}</label>
                                            <input type="text" name="campaign_name" id="campaign_name" class="form-control" required>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin stretch-card col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="campaign_status" checked="1" value="1" class="form-check-input">
                                        Activated Campaign
                                    <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="campaign_reportings"  value="1" class="form-check-input">
                                        Campaign Reportings
                                    <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="campaign_template" value="1" class="form-check-input">
                                        Use Template
                                    <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="grid-margin mg-l-20 stretch-card col-md-3">
                            <div class="form-group col-12">
                                <label for="dateStart">Start</label>
                                <div class="input-group date datepicker" id="dateStart">
                                    <input type="text" name="start" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin mg-l-20 stretch-card col-md-3">
                            <div class="form-group col-12">
                                <label for="dateStart">End</label>
                                <div class="input-group date datepicker" id="dateEnd">
                                    <input type="text" name="end" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin mg-l-20 stretch-card col-md-3">
                            <div class="form-group col-md-12">
                                <label>{{ __('Category') }} <a href="#" data-toggle="modal" data-target="#addCategory" class="addCategoryModal">Add Category</a></label>
                                <select aria-placeholder="Choose.." name="campaign_category" class=" w-100 form-control" data-width="100%" id="CampaignCategories">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid-margin mg-l-20 stretch-card col-md-3">
                            <div class="form-group col-12">
                                <label for="dateStart">Spend Budget</label>
                                    <input type="text" name="campaign_spend" class="form-control" data-inputmask="'alias': 'currency'">
                            </div>
                        </div>
                        

                      
            </div>
                        

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="campaign_description">{{ __('Campaign Description') }}</label>
                                        <textarea name="campaign_description" id="campaign_description" cols="30" rows="10" class="form-control col-12"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="savethecampaign" id="savethecampaign" class="btn btn-sm btn-block btn-primary">
                        </div>
                </div>
            </div>
        </form>
        @include('campaigns.addcategory')
@endsection
