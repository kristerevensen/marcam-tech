<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- core:css -->
	<link rel="stylesheet" href="../../../assets/vendors/core/core.css">    
	<link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    <link rel="stylesheet" href="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../assets/vendors/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" href="../../../assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="../../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../../assets/css/demo_5/style.css">


    <style>
        .ui-datepicker-trigger{cursor:pointer}
    </style>
</head>
<body>
    <div class="main-wrapper">
		<div class="horizontal-menu">
           @include('partials.topnav')
            @guest
            
            @else
            @include('partials.subnav')
            @endguest

        </div>
            <!-- partial -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- breadcrumb here -->
                @include('partials.alerts')
                @yield('content')

            </div>
        </div>
    </div>
        
    <!-- core:js -->
	<script src="../../../assets/vendors/core/core.js"></script>

	<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
    <script src="../../../assets/js/template.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- endinject -->

    <!-- plugin js for this page -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../../../assets/vendors/jquery-validation/jquery.validate.min.js"></script>
      <!-- end plugin js for this page -->

    <!-- custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../../assets/js/data-table.js"></script>
    <script src="../../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../../assets/js/wizard.js"></script>
    <script src="../../../assets/vendors/jquery-steps/jquery.steps.min.js"></script>
    <script src="../../../assets/vendors/select2/select2.min.js"></script>

    <script>
        $(function() {
  'use strict'

  if ($(".select2").length) {
    $(".select2").select2();
  }

});
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate:new Date(),
            todayHighlight: true,
            autoclose: true
        });
        

        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                

                $("#saveCategory").click(function(e){
                   
                    var name = $("#campaigncategory_name").val();
                   
                    
                    $.ajax({
                    type:'POST',
                    url:"{{ route('campaignscategory.post') }}",
                    data:{name:name},
                    success:function(response){
                        var status = response.status;
                       if(status == 'success'){
                            var option = new Option(response.name,response.id);
                            $(option).html(response.name);
                           // $('#CampaignCategories').append(option);
                            $("#CampaignCategories").prepend("<option value='"+response.id+"' selected='selected'>"+response.name+"</option>");
                            $('#addCategoryForm').hide();
                            $('#addCategoryFormMessage').append('Campaign <span style="color:#fc2403;">'+response.name+'</span> was added to selection. <i data-feather="check-circle"></i>');
                        } else if(status == 'error') {
                            var errors = data.responseJSON;
                            console.log(errors);
                            alert(errors);
                        }

                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                        alert(errors);
                    }
            
                });
            });
            $(".validate").validate();
    </script>
</body>
</html>
