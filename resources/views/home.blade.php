@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">{{ __('Projects')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">All </li>
    </ol>
   
</nav>


            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ __('Your Projects') }}</h6>
                                <div>
                                    @include('partials.projects.new')
                                </div>
                            </div>
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-20p">{{ __('Name') }}</th>
                                            <th class="wd-30p">{{ __('URL') }}</th>
                                            <th class="wd-15p">{{ __('Location') }}</th>
                                            <th class="wd-15p">{{ __('Language') }}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $project)
                                            <tr>
                                                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                                                <td>{{ $project->project_name }}</td>
                                                <td><a href="{{ $project->url}}" target="_blank">{{ $project->url }}</a></td>
                                                <td>{{ $project->location }}</td>
                                                <td>{{ $project->language }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @if($project->project_token == session('selected_project'))
                                                        <a class="dropdown-item" href="{{ route('projects.deselect') }}">{{ __('Deselect') }}</a>
                                                        @else
                                                        <a class="dropdown-item" href="{{ route('projects.select',$project->project_token) }}">{{ __('Select') }}</a>
                                                        @endif
                                                        <a class="dropdown-item" href="{{ route('projects.edit',$project->project_token) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('project.delete',$project->project_token) }}" onclick="javascript: return confirm('{{ __('Are you sure?') }}')">Delete</a>
                                                        </div>
                                                    </div>    
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
