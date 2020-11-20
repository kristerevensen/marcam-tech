@extends('layouts.app')

@section('content')



<div>
    <a href="{{ route('projects.new') }}" class="btn btn-sm btn-success  btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            {{ __('Gantt') }}
        </a>
        <div class="row">
            
            <script type="text/javascript">
                gantt.config.xml_date="%Y-%m-%d %H:%i:%s";
                gantt.init('');
                gantt.load ('api/data');

                var dp = new gantt.dataProcessor('/api');
                dp.init(gantt);
                dp.setTransactionMode('REST');
            </script>
        </div>
    </div>

    @endsection
