@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('Projects') }}</h4>
                </div>
                @include('partials.projects.new')
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ __('Your Projects') }}</h6>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Name</th>
                                            <th class="wd-30p">URL</th>
                                            <th class="wd-15p">Location</th>
                                            <th class="wd-15p">Language</th>
                                            <th class="wd-10p">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $project)
                                            <tr>
                                            <td>{{ $project['project_name'] }}</td>
                                                <td>{{ $project['project_url'] }}</td>
                                                <td>{{ $project['location'] }}</td>
                                                <td>{{ $project['language'] }}</td>
                                                <td>{{ __('action') }}</td>
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
