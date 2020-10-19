@extends('layout.master')  
@section('titulo','Portada de Laranuncios')
     <!-- PARTE CENTRAL --> 
  @section('contenido')    
  <div align="right">
        <figure class = "row mt-2 mb-2 col-10 offset-1 ">
        	<img  class="d-dblock w-90" src="{{asset('img/welcome.jpg')}}" alt="Portada" >
        </figure>
   </div> 
  @endsection   
  @section('enlaces')
  @endsection
