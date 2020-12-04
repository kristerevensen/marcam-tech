@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Links') }}</h4>
                </div>
                @include('partials.campaigns.addCategory')
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Campaigns') }}</h6>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-80p">{{ __('Name') }}</th>
                                            <th class="wd-10p"></th>
                                      
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/category/delete/'.$category->id) }}" ><i data-feather="x-circle"></i></a>  
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.campaigns.addcategoryform')
@endsection
