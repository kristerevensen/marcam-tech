@extends('layouts.app')

@section('content')
              
        
<nav class="page-breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Channels </li>
</ol>
</nav>

          <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Channels</h6>
                <p class="card-description"></p>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Channel</th>
                            <th>Sessions</th>
                            <th>Pagevs.</th>
                            <th>Orderv.</th>
                            <th>Trans.</th>
                            <th>Revenue</th>
                            <th>Bounce%</th>
                            <th>Exit%</th>
                            <th>PageValue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($channels as $row)
                        <tr>
                            <td><a href="{{ route('analysis.channel.year',$row->year) }}">{{ $row->year }}</a></td>
                            <td><a href="{{ route('analysis.channel.trends',[$row->year,$row->channel_token]) }}">{{ $row->channel }}</a></td>
                            <td>{{ $row->sessions }}</td>
                            <td>{{ $row->pageviews }}</td>
                            <td>{{ $row->avgorder }}</td>
                            <td>{{ $row->transactions }}</td>
                            <td>{{ $row->revenue }}</td>
                            <td>{{ $row->bouncerate }}</td>
                            <td>{{ $row->exitrate }}</td>
                            <td>{{ $row->pagevalue }}</td>
                            
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
@section('custom_scripts')
<script>

 

$(function() {
  'use strict';

  $(function() {
    $('#datatable').DataTable({
      "iDisplayLength": 10,
      "dom":'frtip',
    });
  
  });

});
</script>
@endsection

