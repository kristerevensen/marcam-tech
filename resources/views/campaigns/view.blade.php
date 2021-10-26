@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('campaigns')}}">{{ __('Campaigns')}}</a></li>
        <li class="breadcrumb-item">{{ $campaign_name }}</li>
    </ol>
</nav>
           
            <div id="row">
                <div id="campaign_chart" ></div>
            </div>
            
   

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h6 class="card-title">{{ $campaign_name }} {{ __('links')}}</h6>
                                <a href="{{ route('campaigns.new_link',$campaign_id) }}" class="btn btn-sm btn-success  btn-icon-text">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    {{ __('New Link') }}
                                </a>
                            </div>


                           
                        <p class="card-description">{{ __('') }}</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">{{ __('Created') }}</th>
                                            <th class="wd-10p">{{ __('URL') }}</th>
                                            <th class="wd-20p">{{ __('Campaign') }}</th>
                                            <th class="wd-20p">{{ __('Marcam URL')}}</th>
                                            <th class="wd-10p">{{ __('Clicks')}}</th>
                                            <th class="wd-10p">{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($links as $link)
                                            <tr>
                                            <td>{{ date_format (new DateTime($link->created_at), 'jS M Y') }}</td>
                                            <td>{{ $link->landing_page }}</td>
                                            <td>{{ $link->campaign_name }}</td>
                                            <td><a href="{{ $link->marcam}}" target="_blank">{{ $link->marcam }}</a></td>
                                            <td>{{ $link->nrclicks }}</td>
                                                <td>
                                                    <a class="dropdown-item" onclick="javascript: return confirm('Are you sure?');" href="{{ route('campaigns.delete_link', $link->linkID) }}" ><i data-feather="x-circle"></i></a>  
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
@section('custom_scripts')
@if($series != null) 
<script>
  
var campaign = {
  chart: {
    type: 'line',
    height: '300'
  },
  stroke: {
  curve: 'smooth',
},
  series: [
@foreach($series as $serie)
{
    name: '{{ $serie['name']}}',
    data: [@foreach($serie['seriesData'] as $key => $val) { 'x': new Date('{{ $val['X'] }}').getTime(), 'y': {{ $val['Y'] }} }, @endforeach]
},
@endforeach
],
  xaxis: {
    type: 'datetime',
    labels: {
      format :'yyyy-mm-dd'
    }
  }
}

var campaignChart = new ApexCharts(document.querySelector("#campaign_chart"), campaign);

campaignChart.render();
</script>
@endif;
@endsection