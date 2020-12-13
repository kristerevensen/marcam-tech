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
                    {{ $channel_name}} channel trends for {{ $selected_year}}
                </h4>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>
        @foreach ($channel as $item)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $channel_name}} YTD vs last years to date
                </h4>
            </div>
            <div class="card-body">
                <div id="chart_comparison"></div>
            </div>
        </div>
        @endforeach
       
                


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
            name: 'Sessions',
            type: 'line',
            data: [@foreach($channel as $row){{$row->sessions}},@endforeach]
        },
        {
            name: 'Pageviews',
            type: 'line',
            data: [@foreach($channel as $row){{$row->pageviews}},@endforeach]
        },
        {
            name: 'Revenue',
            type: 'line',
            data: [@foreach($channel as $row){{$row->revenue}},@endforeach]
        },
        {
            name: 'Transactions',
            type: 'line',
            data: [@foreach($channel as $row){{$row->transactions}},@endforeach]
        },
        {
            name: 'Bounce Rate',
            type: 'line',
            data: [@foreach($channel as $row){{$row->bouncerate}},@endforeach]
        },
        {
            name: 'Avg. Order Value',
            type: 'line',
            data: [@foreach($channel as $row){{$row->avgorder}},@endforeach]
        },
        {
            name: 'Page Value',
            type: 'line',
            data: [@foreach($channel as $row){{$row->pagevalue}},@endforeach]
        },
        {
            name: 'Users',
            type: 'line',
            data: [@foreach($channel as $row){{$row->users}},@endforeach]
        },
        {
            name: 'Exit rate',
            type: 'line',
            data: [@foreach($channel as $row){{$row->exitrate}},@endforeach]
        }
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
      position: "top",
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

