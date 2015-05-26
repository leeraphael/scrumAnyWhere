<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<title>ScrumAnyWhere</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/RL.css') }}" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  	
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	@yield('head')
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			 <span class="sr-only">Toggle navigation</span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 </button> <a class="navbar-brand" href="{{ action('homeController@index')}}">ScrumAnyWhere</a>
	</div>
	
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		@if (!Auth::guest())
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Project<strong class="caret"></strong></a>
					<ul class="dropdown-menu">					
						<li>
							<a href="#">TelecomES</a>
						</li>
					</ul>				
				</li>
				<li>
					<a href="{{ action('scrumBoardController@index')}}">Scrum Board</a>
				</li>
				<li>
					<a href="{{ action('miscController@backlog')}}">Story Backlog</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ action('releasePlanController@index')}}">Release Plans</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ action('projectController@index')}}">Projects</a>
						</li>
						<li>
							<a href="{{ action('storyController@index')}}">Stories</a>
						</li>
						<li>
							<a href="{{ action('taskController@index')}}">Tasks</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ action('miscController@timeline')}}">Timeline</a>
						</li>
					</ul>				
				</li>
			</ul>
		@endif
		<ul class="nav navbar-nav navbar-right">			
			@if (Auth::guest())
				<li><a href="{{ url('/auth/login') }}">Login</a></li>
				<li><a href="{{ url('/auth/register') }}">Register</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<img src="{{ asset('/icon/user.ico') }}" height="20px" />
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('user/profile') }}">Profile</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</div>
	
</nav>
		<div class="col-md-2 column ">
			@yield('sidebar')			
		</div>
		<div class="col-md-10 column">
			@yield('main')
		</div>
</body>
</html>
