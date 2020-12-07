@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Terms') }}</h4>
                </div>
                <div>
                    <a href="{{ route('campaigns.new_term') }}" class="btn btn-sm btn-success  btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus"></i>
                            {{ __('New Term') }}
                        </a>
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Terms') }}</h6>
                        <p class="card-description">{{ __('Used to identify paid keywords') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('Name') }}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($terms as $term)
                                            <tr>
                                            <td>{{ $term->created_at }}</td>
                                            <td>{{ $term->term }}</td>
                                          
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/terms/delete/'.$term->id) }}" ><i data-feather="x-circle"></i></a> 
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

@endsection
