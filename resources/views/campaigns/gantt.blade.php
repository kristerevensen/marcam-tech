@extends('layouts.app')

@section('custom_head')
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
<style type="text/css">
    html, body{
        height:100%;
        padding:0px;
        margin:0px;
        overflow: hidden;
    }

</style>
@endsection

@section('content')



<div>
    
        <div id="gantt_chart" class="container" style='margin:0px; padding:0px; width:100%; height:100%'></div>
        <script type="text/javascript">
            gantt.config.autosize = "xy";
            gantt.config.xml_date="%Y-%m-%d %H:%i:%s";

            gantt.init('gantt_chart');
            gantt.load ('{{ route('campaigns.api.data')}}');
            
            var dp = new gantt.dataProcessor('/api');
            dp.init(gantt);
            dp.setTransactionMode('REST');
        </script>
    </div>

    @endsection

    @section('custom_scripts')

    @endsection
