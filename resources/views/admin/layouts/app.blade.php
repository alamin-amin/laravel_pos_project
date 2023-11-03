<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('admin_assets/css/adminlte.min.css') }}">
		<link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<script src="https://kit.fontawesome.com/f84dd285ef.js" crossorigin="anonymous"></script>
	
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			@include('admin.layouts.top_nav')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->

			@include('admin.layouts.sidebar')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				
                @yield('content')

				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer text-center">
				
				<strong>Copyright &copy; 2023 .  Md. Alamin
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('admin_assets/js/adminlte.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('admin_assets/js/demo.js') }}"></script>

		
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


		<script type="text/javascript">
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('document').ready(function(){
			setTimeout(function(){
				$("div.alert").remove();
			},2000);
		})

		</script>


        @yield('customJs')
	</body>
</html>