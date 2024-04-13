<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Eatio - Restaurant Food Order Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="template_dashboard/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="template_dashboard/vendor/chartist/css/chartist.min.css">
    <link href="template_dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="template_dashboard/css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div id="main-wrapper">
      @yield('content')
    </div>
		
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
  <script src="template_dashboard/vendor/global/global.min.js"></script>
	<script src="template_dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="template_dashboard/vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="template_dashboard/js/custom.min.js"></script>
	<script src="template_dashboard/js/deznav-init.js"></script>
	
	<!-- Counter Up -->
  <script src="template_dashboard/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="template_dashboard/vendor/jquery.counterup/jquery.counterup.min.js"></script>	
		
	<!-- Apex Chart -->
	<script src="template_dashboard/vendor/apexchart/apexchart.js"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="template_dashboard/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	
	
</body>
</html>