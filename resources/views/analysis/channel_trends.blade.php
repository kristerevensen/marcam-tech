@extends('layouts.app')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('analysis')}}">{{ __('Analysis')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('analysis.channels')}}">{{ __('Channels')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Channel Trends </li>
    </ol>
    </nav>
              
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                  <span class="badge badge-light">{{ $channel_name}}</span>  channel trends for <span class="badge badge-secondary">{{ $selected_year}}</span>
                </h4>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>

        <div class="card" style="margin-top: 20px;">
          <div class="card-header">
              <h4 class="card-title">
                <span class="badge badge-light">{{ $channel_name}}</span>  trend analysis for <span class="badge badge-secondary">{{ $selected_year}}</span>
              </h4>
          </div>
          <div class="card-body">
              <div class="datatable-responsive">
                <table class="datatable table datatable-responsive">
                  <thead>
                    <tr>
                      <th>Channel</th>
                      <th>Slope</th>
                      <th>Intercept</th>
                      <th>St. deviation</th>
                      <th>Average</th>
                      <th>Total</th>
                      <th>Trend</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($regression as $key => $value)
                    <tr>
                      <td>{{ $key }}</td>
                      <td>{{ number_format($value['m'],2) }}</td>
                      <td>{{ number_format($value['b'],2) }}</td>
                      <td>{{ number_format($value['standard_deviation'],2)}}</td>
                      <td>{{ number_format($value['average'],2)}}</td>
                      <td>{{ ($value['total']>0)? number_format($value['total'],0) : '' }}  </td>
                      <td>
                        @if($value['m']>0)
                        <span class="badge badge-success"><i data-feather="arrow-up" class="icon-sm"></i></span>
                        @elseif($value['m'] < 0)
                        <span class="badge badge-danger"><i data-feather="arrow-down" class="icon-sm"></i></span>
                        @else
                        <span class="badge badge-light"><i data-feather="arrow-right" class="icon-sm"></i></span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
          </div>
      </div>
        
       
                


@endsection
@section('custom_scripts')

  <!-- plugin js for this page -->
	<script src="../../../assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../../assets/js/template.js"></script>
	<!-- endinject -->
  
<script>

var options = {
  chart: {
    height: 300,
    type: 'line'  
    
  },
  series: [
        {
            name: 'Sessions{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$sessions)}}] 
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Sessions{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['sessions'])}}]
        }
        @endif
        ,
        {
            name: 'Pagevs.{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$pageviews)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Pagevs.{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['pageviews'])}}]
        }
        @endif
        ,
        {
            name: 'Rev.{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$revenue)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Rev.{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['revenue'])}}]
        }
        @endif
        ,
        {
            name: 'Trans.{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$transactions)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Trans{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['transactions'])}}]
        }
        @endif
        ,
        {
            name: 'Bounce%{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$bouncerate)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Bounce%{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['bouncerate'])}}]
        }
        @endif
        ,
        {
            name: 'OrderVal{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$avgorder)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'OrderVal{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['avgorder'])}}]
        }
        @endif
        ,
        {
            name: 'PageV{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$pagevalue)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'PageV{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['pagevalue'])}}]
        }
        @endif
        ,
        {
            name: 'Users{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$users)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Users {{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['users'])}}]
        }
        @endif
        ,
        {
            name: 'Exit%{{$selected_year}}',
            type: 'line',
            data: [{{implode(',',$exitrate)}}]
        }
        @if(isset($lastyear))
        ,
        {
            name: 'Exit%{{$selected_year-1}}',
            type: 'line',
            data: [{{implode(',',$lastyear[0]['exitrate'])}}]
        }
        @endif
],
   
        title: {
          align: 'left',
          offsetX: 110
        },
        chart: {
          height: 350,
          type: 'line',
        },
  xaxis: {
    categories: [@foreach($channel as $row){{ $row->week }},@endforeach]
  },
  stroke: {
      width: 3,
      curve: "smooth",
      lineCap: "round"
    },
   
    legend: {
      show: true,
      position: "bottom",
      horizontalAlign: 'left',
      containerMargin: {
        top: 30
      }
    },
    responsive: [
      {
        breakpoint: 500,
        options: {
          legend: {
            fontSize: "11px"
          }
        }
      }
    ],
    grid: { show: true },
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

</script>
@endsection

