<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Practica Laravel">
        <title>{{config('app.name')}} - @yield('titulo')</title>
        
        <!-- CSS Bootstrap y Laravel -->
        	<link rel="stylesheet" href="{{asset('css/app.css')}}">
            <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
            

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>  
  
  
  
  
   </head>      
  <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href ="{{url('/')}}">
      <img src="{{url('img/welcome.jpg')}}" width="80" height="35" class="d-inline-block align-top" alt="LARANUNCIOS">
       <b> SEGUNDA MANO - LARANUNCIOS</b>
      </a>
   @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                     <p> Hola,  {{ Auth::user()->name }} <span class="caret"></span></p>
                        <a href="{{ url('/home') }}">Perfil</a>
                          <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Registro</a>
                    @endauth
                </div>
        @endif 
    </nav>          
    <body class="container p-3">
    <!--Botonera superior -->
    @section('navegacion')
        <ul class="nav nav-pills my-3">
            <li class="nav nav-item mr-2">
    			<a class="  nav-link active" href ="{{url('/')}}">Inicio</a>
            </li>
             <li class="nav nav-item mr-2">
    			<a class="  nav-link " href ="{{route('anuncios.index')}}">Anuncios</a>
            </li>
              
             <li class="nav nav-item mr-2">
    				<a class=" nav-link " href ="{{route('anuncios.create')}}">Nuevo anuncio</a>
            </li>
               
        </ul>
  	@show
  	
  	<!-- PARTE CENTRAL -->
  	<h1 class="my-2">Practica Laravel</h1>
    
   
    @includeWhen(Session::has('success'),'layout.success') 
    @includeWhen($errors->any(),'layout.error') 
     @yield('contenido')
 	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$tablon}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
       <a class=" btn btn-primary" href ="{{route('anuncios.create')}}">Mis anuncios</a>
  
    <!--PARTE INFERIOR  --> 
    @section('pie')
     <footer border="1" class="page-footer font-small p-4 bg-light">
              <div class="container">
                <p class="text-muted"> Practica de Laravel
                	<a href="https://davidtrigo.com" target="blank"><b>{{$autor}}</b></a> 
              </div>
        </footer> 
     @show  
     </body>
</html>
