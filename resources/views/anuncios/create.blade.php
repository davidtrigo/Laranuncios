@extends('layout.master')  
@section('titulo','Nuevo anuncio')
@section('contenido')
  <form class ="my-2 border p-5" method="POST" action ="{{route('anuncios.store')}}" enctype="multipart/form-data" >
   {{csrf_field()}}
   
    <div class="form-group  row">
        <label for="inputTitulo" class="col-sm-2 col-form-Label">Titulo</label>
        <input name="titulo" type="text" class="up form-control col-sm-10" id="inputTitulo" placeholder="Titulo"
        	   maxlength="255"  value="{{old('titulo')}}">
    </div>
       <div class="form-group  row">
        <label for="inputDescripcion" class="col-sm-2 col-form-Label">Descripcion</label>
        <textarea name="descripcion"  type="text" class="up form-control col-sm-10" 
        id="inputDescripcion" placeholder="Descripcion"
        	   maxlength="255"  value="{{old('descripcion')}}" >{{old('descripcion')}}</textarea>
    </div>
    
 	<div class="form-group  row">
       	<label for="inputPrecio" class="col-sm-2 col-form-Label">Precio</label>
       	<input name="precio" type="text" maxlength="11" class="up form-control col-sm-4" id="inputPrecio" placeholder="precio"
   			    step="0.01" value="{{old('precio')}}">
	</div>	

	<div class="form-group row">
	<label for="inputImagen" class="col-sm-2 col-form-label p5">Imagen</label>
	<input name="imagen" type="file" class="form-control-file col-sm-10" id="inputImagen">
	</div>
	<div class="form-group  row">
       <button type="submit" class="btn btn-success mx-2">Guardar</button>
       <button type="reset" class="btn btn-secondary">Borrar</button>
	</div>
   </form>
@endsection
 @section('enlaces')     	
   @parent
    <a href ="{{route('anuncios.index')}}" class="btn btn-primary">Anuncios</a>
@endsection