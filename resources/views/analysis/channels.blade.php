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
        <h6 class="card-title">Channels Yearly</h6>
        <p class="card-description"></p>
          <div class="table-responsive">
            <table id="yearlytable" class="table">
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
                  @foreach($channels_yearly as $rad)
                  <tr>
                      <td><a href="{{ route('analysis.channel.year',$rad->year) }}">{{ $rad->year }}</a></td>
                      <td><a href="{{ route('analysis.channel.trends.year',[$rad->year,$rad->channel_token]) }}">{{ $rad->channel }}</a></td>
                      <td>{{ number_format($rad->sessions,0) }}</td>
                      <td>{{  number_format($rad->pageviews,0) }}</td>
                      <td>{{  number_format($rad->avgorder,1) }}</td>
                      <td>{{  number_format($rad->transactions,0) }}</td>
                      <td>{{  number_format($rad->revenue,0) }}</td>
                      <td>{{  number_format($rad->bouncerate,1) }}</td>
                      <td>{{  number_format($rad->exitrate,1) }}</td>
                      <td>{{  number_format($rad->pagevalue,0) }}</td>
                      
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Channels Monthly</h6>
        <p class="card-description"></p>
          <div class="table-responsive">
            <table id="monthlytable" class="table">
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
                  @foreach($channels_monthly as $tad)
                  <tr>
                      <td><a href="{{ route('analysis.channel.year',$tad->year) }}">{{ $tad->year }}</a></td>
                      <td><a href="{{ route('analysis.channel.trends.month',[$tad->year,$tad->channel_token]) }}">{{ $tad->channel }}</a></td>
                      <td>{{ number_format($tad->sessions,0) }}</td>
                      <td>{{  number_format($tad->pageviews,0) }}</td>
                      <td>{{  number_format($tad->avgorder,1) }}</td>
                      <td>{{  number_format($tad->transactions,0) }}</td>
                      <td>{{  number_format($tad->revenue,0) }}</td>
                      <td>{{  number_format($tad->bouncerate,1) }}</td>
                      <td>{{  number_format($tad->exitrate,1) }}</td>
                      <td>{{  number_format($tad->pagevalue,0) }}</td>
                      
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Channels Weekly</h6>
        <p class="card-description"></p>
          <div class="table-responsive">
            <table id="weeklytable" class="table">
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
                  @foreach($channels_weekly as $row)
                  <tr>
                      <td><a href="{{ route('analysis.channel.year',$row->year) }}">{{ $row->year }}</a></td>
                      <td><a href="{{ route('analysis.channel.trends.week',[$row->year,$row->channel_token]) }}">{{ $row->channel }}</a></td>
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
    $('#weeklytable').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#weeklytable').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  $(function() {
    $('#monthlytable').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#monthlytable').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  
  $(function() {
    $('#yearlytable').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#yearlytable').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
 
  
  });

</script>
@endsection

