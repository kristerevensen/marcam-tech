@extends('layouts.app')

@section('content')


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}}">{{ __('Projects')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">New</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <form action="{{ route('projects.save')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">New Project</h6>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
