@extends('layout.master')
@section('titulo','Editar anuncio')

@section('contenido')     
    
    
    
     <form class ="my-2 border p-5" method="POST" action ="{{route('anuncios.update',$anuncio->id)}}" enctype="multipart/form-data" >
   {{csrf_field()}}
   <input name="_method" type="hidden" value="PUT">
   
  	<div class="form-group  row">
        <label for="inputTitulo" class="col-sm-2 col-form-Label">Titulo</label>
        <input name="titulo" type="text" class="up form-control col-sm-10" 
        id="inputTitulo" placeholder="Titulo"
        	   maxlength="255"  value="{{$anuncio->titulo}}">
    </div>
    
    <div class="form-group  row">
        <label for="inputDescripcion" class="col-sm-2 col-form-Label">Descripcion</label>
        <textarea name="descripcion"  type="text" class="up form-control col-sm-10" 
        id="inputDescripcion" placeholder="Descripcion"
        	   maxlength="255"  value="{{$anuncio->descripcion}}" >{{$anuncio->descripcion}}</textarea>
    </div>
    
    <div class="form-group  row">
       	<label for="inputPrecio" class="col-sm-2 col-form-Label">Precio</label>
       	<input name="precio"   type="number" maxlength="11" class="up form-control col-sm-4" 
       	id="inputPrecio" placeholder="precio" step="0.01"
   			 	  min="0" value="{{$anuncio->precio}}" ">
    </div>
  
	<div class="form-group row">
	<label for="inputImagen" class="col-sm-2 col-form-label p5">Imagen</label>
	<input name="imagen" type="file" class="form-control-file col-sm-10" id="inputImagen">
	</div>

	<img  alt="{{$anuncio ->titulo}} " title="{{$anuncio ->titulo}}"  height="350" width="350" 
	 src="{{$anuncio->imagen?
	 			asset(config('filesystems.anunciosImageDir').$anuncio->imagen):
	 			asset(config('filesystems.anunciosImageDir').'default_ad.png')}}" 
	 class=img-fluid>
	 Imagen actual
 
	<div class="form-group  row">
       <button type="submit" class="btn btn-success mx-2">Guardar</button>
       <button type="reset" class="btn btn-secondary">Restablecer</button>
	</div>
   </form>
    
     
@endsection

@section('enlaces')     	
   @parent
    <a href ="{{route('anuncios.index')}}" class="btn btn-primary">Anuncios</a>
@endsection
