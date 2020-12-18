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
                <h6 class="card-title">Channels Weekly</h6>
                <p class="card-description"></p>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Channel</th>
                            <th>Avg.Sessions</th>
                            <th>Avg.Pagevs.</th>
                            <th>Avg.Orderv.</th>
                            <th>Avg.Trans.</th>
                            <th>Avg.Revenue</th>
                            <th>Avg.Bounce%</th>
                            <th>Avg.Exit%</th>
                            <th>Avg.PageValue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($channels as $row)
                        <tr>
                            <td><a href="{{ route('analysis.channel.year',$row->year) }}">{{ $row->year }}</a></td>
                            <td><a href="{{ route('analysis.channel.trends',[$row->year,$row->channel_token]) }}">{{ $row->channel }}</a></td>
                            <td>{{ number_format($row->sessions,0) }}</td>
                            <td>{{  number_format($row->pageviews,0) }}</td>
                            <td>{{  number_format($row->avgorder,1) }}</td>
                            <td>{{  number_format($row->transactions,0) }}</td>
                            <td>{{  number_format($row->revenue,0) }}</td>
                            <td>{{  number_format($row->bouncerate,1) }}</td>
                            <td>{{  number_format($row->exitrate,1) }}</td>
                            <td>{{  number_format($row->pagevalue,0) }}</td>
                            
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

