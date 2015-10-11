<?php 
use Cartalyst\Sentinel\Native\Facades\Sentinel;

use miApp\User;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword"
	content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>Mi APP</title>

<!-- Bootstrap core CSS -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<!--external css-->
<link href="{{ asset('/font-awesome/css/font-awesome.css') }}"
	rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="{{asset('/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/css/style-responsive.css')}}" rel="stylesheet">


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<section id="container">
		<!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
		<!--header start-->
		<!-- <header class="header black-bg" style="border: red 1px solid">
			<div class="row">
				<div class="col-md-1" style="border: red 1px solid">
					<div class="sidebar-toggle-box">
						<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
						
					</div>
				</div>
				<div class="col-md-2">
						<a href="index.html" class="logo"><b>Mi APP</b></a>
				
				</div>
				<div class="col-md-4"style="border: red 1px solid">
				
					<div class="nav notify-row" id="top_menu">
						<ul class="nav top-menu" >
							<li class="dropdown"><a data-toggle="dropdown"
								class="dropdown-toggle" href="index.html#"> <i class="fa fa-tasks"></i>
									<span class="badge bg-theme">4</span>
							</a>
								<ul class="dropdown-menu extended tasks-bar">
									<div class="notify-arrow notify-arrow-green"></div>
									<li>
										<p class="green">You have 4 pending tasks</p>
									</li>
									<li><a href="index.html#">
											<div class="task-info">
												<div class="desc">DashGum Admin Panel</div>
												<div class="percent">40%</div>
											</div>
											<div class="progress progress-striped">
												<div class="progress-bar progress-bar-success"
													role="progressbar" aria-valuenow="40" aria-valuemin="0"
													aria-valuemax="100" style="width: 40%">
													<span class="sr-only">40% Complete (success)</span>
												</div>
											</div>
									</a></li>
									<li><a href="index.html#">
											<div class="task-info">
												<div class="desc">Database Update</div>
												<div class="percent">60%</div>
											</div>
											<div class="progress progress-striped">
												<div class="progress-bar progress-bar-warning"
													role="progressbar" aria-valuenow="60" aria-valuemin="0"
													aria-valuemax="100" style="width: 60%">
													<span class="sr-only">60% Complete (warning)</span>
												</div>
											</div>
									</a></li>
									<li><a href="index.html#">
											<div class="task-info">
												<div class="desc">Product Development</div>
												<div class="percent">80%</div>
											</div>
											<div class="progress progress-striped">
												<div class="progress-bar progress-bar-info" role="progressbar"
													aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
													style="width: 80%">
													<span class="sr-only">80% Complete</span>
												</div>
											</div>
									</a></li>
									<li><a href="index.html#">
											<div class="task-info">
												<div class="desc">Payments Sent</div>
												<div class="percent">70%</div>
											</div>
											<div class="progress progress-striped">
												<div class="progress-bar progress-bar-danger"
													role="progressbar" aria-valuenow="70" aria-valuemin="0"
													aria-valuemax="100" style="width: 70%">
													<span class="sr-only">70% Complete (Important)</span>
												</div>
											</div>
									</a></li>
									<li class="external"><a href="#">See All Tasks</a></li>
								</ul></li>
						</ul>
						

					</div>
					
				</div>
				<div class="col-md-5" style="border: red 1px solid">
					<div>
				
						@if (!$user = Sentinel::check())
						<a href="{{url('/auth/login')}}">Login</a>
						<a href="{{url('/auth/register')}}">Register</a> 
						@else
						<div class="dropdown">
						  
						  <a href="#" class="dropdown-toggle" id="dropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    {{ $user->first_name." ".$user->last_name}}
						    <span class="caret"></span>
						  </a>
						  
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="#">Salir</a></li>
						  </ul>
						</div>
						@endif
						
					</div>
				</div>
			</div>
			
		</header>
		-->
		
		<!--header end-->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    	
		      <a class="navbar-brand" href="#">
		      	<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
		      	WebSiteName
		      </a>
		    </div>
		    <div>
				<ul class="nav navbar-nav navbar-right">
					@if (!$user = Sentinel::check())
			        <li><a href="{{url('/auth/login')}}"><span class="fa fa-sign-in">Sign Up</span> </a></li>
			        <li><a href="{{url('/admin/users/create')}}"><span class="fa fa-user">Login</span></a></li>
			        @else
				 		<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	{{ $user->first_name." ".$user->last_name}} <span class="caret"></span>
				          </a>
				          <ul class="dropdown-menu">
				          
				            <li><a href="{{url('/auth/logout')}}"><span class="fa fa-sign-out">Salir</span></a></li>
				          </ul>
				        </li>
			        @endif
			      </ul>
		    </div>
		  </div>
		</nav>
		<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu" id="nav-accordion">

					<li class="sub-menu"><a href="javascript:;"> <i
							class="fa fa-desktop"></i> <span>Reporte</span>
					</a>
						<ul class="sub">
							<li><a href="{{ url('/focus/isd') }}">ISD</a></li>
						</ul></li>
				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->

		<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper site-min-height">
				<div class="row mt">
					<div class="col-lg-12">@yield('content')</div>
				</div>

			</section>
			<!-- wrapper -->
		</section>
		<!-- /MAIN CONTENT -->

		<!--main content end-->
		<!--footer start-->
		<footer class="site-footer">
			<div class="text-center">
				2014 - Alvarez.is <a href="blank.html#" class="go-top"> <i
					class="fa fa-angle-up"></i>
				</a>
			</div>
		</footer>
		<!--footer end-->
	</section>
	@include('flash::message')
	<!-- js placed at the end of the document so the pages load faster -->
	<script src="{{ asset('/js/jquery.js') }}"></script>
	
	<script src="{{ asset('/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.ui.touch-punch.min.js') }}"></script>
	<script class="include" type="text/javascript"
		src="{{asset('/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('/js/jquery.scrollTo.min.js')}}"></script>
	<script src="{{asset('/js/jquery.nicescroll.js')}}"
		type="text/javascript"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

	<!--common script for all pages-->
	<script src="{{asset('/js/common-scripts.js')}}"></script>
	<!--script for this page-->
	
	@yield('highcharts')
	@yield('javascript')
	
	<script>
	$('#flash-overlay-modal').modal();
   
  	</script>

</body>
</html>
