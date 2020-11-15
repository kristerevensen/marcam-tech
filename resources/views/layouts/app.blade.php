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
	<link rel="stylesheet" href="../../../assets/css/demo_5/style.css">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    <link rel="stylesheet" href="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  

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
	<!-- endinject -->

    <!-- plugin js for this page -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
      <!-- end plugin js for this page -->

    <!-- custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../../../assets/js/data-table.js"></script>
    <script src="../../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
      <!-- end custom js for this page -->
   
</body>
</html>
