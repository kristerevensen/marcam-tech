@extends('layouts.app')

@section('content')
              
        
<nav class="page-breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('analysis.channels')}}">{{ __('Channels')}}</a> </li>
    <li class="breadcrumb-item active" aria-current="analysis.channels.years">Years </li>
</ol>
</nav>

          <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Channel data for {{ $year}}</h6>
                <p class="card-description"></p>
                
              </div>
            </div>
		</div>
	</div>


@endsection
@section('custom_scripts')

@endsection

