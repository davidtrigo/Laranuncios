@extends('layout.master')
@section('titulo','Detalles de la moto')
 @section('contenido')       
<!-- PARTE CENTRAL -->
       <table class="table table-striped table-bordered">
         
            <tr><td>Titulo</td><td>{{$anuncio ->titulo}}</td></tr>
            <tr><td>Descripcion</td><td>{{$anuncio ->descripcion}}</td></tr>
            <tr><td>Precio</td><td>{{$anuncio ->precio}}</td></tr>
                       
            <tr>
            	<td>Imagen</td>
            	<td class="text-center">
            		 <img  alt="{{$anuncio ->titulo}}"  title="{{$anuncio ->titulo}}"  
        			 src="{{$anuncio->imagen?
            		 			asset(config('filesystems.anunciosImageDir').$anuncio->imagen):
            		 			asset(config('filesystems.anunciosImageDir').'default_ad.png')}}"  
        		 class=img-fluid>
            	
            
            	 
            	</td>
            </tr>
    	</table>    
       	<div class="text-right my-3">
       		<div class ="btn-group mx-2">
       		 @auth
        		@if(Auth::user()->can('update',$anuncio))
           		<a class="mx-2"  href ="{{route('anuncios.edit',$anuncio->id)}}">
           		<img height="20" width="20" src="{{asset('/img/buttons/edit.svg')}}" alt="Modificar" title="Modificar">
           		</a>
           		@endif
           		@if(Auth::user()->can('delete',$anuncio))
           		<a class="mx-2"  href ="{{route('anuncios.delete',$anuncio->id)}}">
           		<img height="20" width="20" src="{{asset('/img/buttons/delete.svg')}}" alt="Borrar" title="Borrar">
           		</a>
           		@endif
           	 @endauth
       		</div>
       	</div> 
    @endsection       
 @section('enlaces')     	
  @parent
    <a href ="{{route('anuncios.index')}}" class="btn btn-primary">Anuncios</a>
@endsection 