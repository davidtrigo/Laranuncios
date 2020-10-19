@extends('layout.master')  
@section('titulo','Listados de anuncios')
     <!-- PARTE CENTRAL --> 
@section('contenido')        
      
   
 <!--paginado  -->
	<div class="row">
		<div class="col-6 text-left">{{$anuncios->links()}}</div>
    	   
    	<div class="col-6 text-right">
    		<p>Nuevo anuncio <a href="{{route('anuncios.create')}}" class= "btn btn-success ml-2">+</a></p>
    	</div>
    	 
	</div>
       
    <table class="table table-striped table-bordered">
        <thead>
         <tr>
    		  <th scope="col">ID</th>
              <th scope="col">Imagen</th>
              <th scope="col">titulo</th>
              
              <th scope="col">Operaciones</th>
      	</tr>
     	</thead>
     	<tbody> 
     	
      @foreach($anuncios as $anuncio)    
    <tr>
        <td>{{$anuncio ->id}}</td>
        <td>
    		 <img  alt="{{$anuncio ->titulo}}" width="60"  height ="60" title="{{$anuncio ->titulo}}"  
        			 src="{{$anuncio->imagen?
            		 		asset(config('filesystems.anunciosImageDir').$anuncio->imagen):
            		 			asset(config('filesystems.anunciosImageDir').'default_ad.png')}}"  
        		 class=img-fluid>
        </td>
        <td>{{$anuncio ->titulo}}</td>
        
         
         <td class ="text-center">
        	 <a href="{{route('anuncios.show',$anuncio->id)}}">
        	<img height="20" width="20" src="{{asset('/img/buttons/show.svg')}}" alt="Ver detalles" title="Ver detalles">
        	</a>
        @auth
        	@if(Auth::user()->can('update',$anuncio))
  			<a href="{{route('anuncios.edit',$anuncio->id)}}">
        	<img height="20" width="20" src="{{asset('/img/buttons/edit.svg')}}" alt="Modificar" title="Modificar">
        	</a>
          	@endif
          	@if(Auth::user()->can('delete',$anuncio))
          	<a href="{{route('anuncios.delete',$anuncio->id)}}">
        	<img height="20" width="20" src="{{asset('/img/buttons/delete.svg')}}" alt="Borrar" title="Borrar">
        	</a>
        	@endif
        @endauth	
         </td>
    </tr>
      @endforeach
    <tr><td colspan="5">Mostrando {{sizeof($anuncios)}} de {{$total}}</td></tr>
  
     	</tbody>
     </table>
 @endsection   
   @section('enlaces')     	
   @parent
   <a class=" btn btn-primary" href ="{{route('anuncios.create')}}">Nuevo anuncio</a>
@endsection  
  
 
