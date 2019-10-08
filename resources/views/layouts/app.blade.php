<!DOCTYPE html>
<html lang="pt-BR">
	<head>  
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>@yield('titulo')</title>

	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js') }}" defer></script>

	    <!-- Fonts -->
	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- <link href="{{ asset('css/OUTROCSS.css') }}" rel="stylesheet"> Pra adicionar outro .css é só entrar na pasta 'public/css' e mudar onde tá escrito 'OUTROCSS' ^^^^  -->

	    <link rel="icon" type="image/x-png" href="https://www.ablehearing.com/wp-content/uploads/2018/10/bigstock-Ear-hearing-aid-deaf-problem-i-38334637-icon-2.png"> 
	    <!-- Pode apagar esse link aqui em cima, só coloquei uma imagem pra não ficar sem nada -->

		<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

		<!-- include summernote css/js -->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

	</head>

	<body>
		<style type="text/css">
			.popover {
			    position: relative;
			    top: 0;
			    left: 0;
			    display: none;
			}
			.note-editing-area {
				height: 200px;
			}
		</style>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
			<div class="container">
				{{ link_to_route(
	                'home',
	                'DeafTech',
	                [],
	                ['class' => 'navbar-brand']
                ) }}
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('home') }}">Homsasasae
								<span class="sr-only">(current)</span>
							</a>
						</li>

						@guest
						<li class="nav-item">
						    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
						</li>
						<li class="nav-item">
						    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
						</li>
						@else					

						<li class="nav-item dropdown">
						    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						        {{ Auth::user()->name }} <span class="caret"></span>
						    </a>

						    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						        <a class="dropdown-item" href="{{ route('logout') }}"
						            onclick="event.preventDefault();
						                          document.getElementById('logout-form').submit();">
						            {{ __('Logout') }}
						        </a>

						        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						            @csrf
						        </form>
						    </div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
            @yield('content')
        </main>

	</body>
</html> 