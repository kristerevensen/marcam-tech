@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Custom Parameters') }}</h4>
                </div>
                <div>
                    <a href="{{ route('campaigns.new_custom_parameter') }}" class="btn btn-sm btn-success  btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus"></i>
                            {{ __('New Parameter') }}
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
                            <h6 class="card-title">{{ __('Your parameters') }}</h6>
                        <p class="card-description">{{ __('Custom parameters brings a new dimension to campaign url building, as you can append as many parameters as you want to the links you create') }}</p>
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
                                            @foreach($parameters as $parameter)
                                            <tr>
                                            <td>{{ $parameter->created_at }}</td>
                                            <td>{{ $parameter->custom_parameter }}</td>
                                          
                                                <td>
                                                    <a class="dropdown-item" href="{{ ('/campaigns/custom_parameters/delete/'.$parameter->id) }}" ><i data-feather="x-circle"></i></a>  
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
