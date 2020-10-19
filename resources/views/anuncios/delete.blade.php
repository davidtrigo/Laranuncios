 @extends('layout.master')  
@section('titulo',"Borrado de  $anuncio->titulo")

  <!-- PARTE CENTRAL --> 
 @section('contenido')    
<form class ="my-2 border p-5" method="POST" action ="{{URL::temporarySignedRoute('anuncios.destroy',now()->addMinute(1),$anuncio->id)}}">
   {{csrf_field()}}
    <input name="_method" type="hidden" value="DELETE">
    <label for="confirmedelete"> Confirmar el borrado del anuncio  {{"$anuncio->titulo"}} con ID {{$anuncio->id}}:</label>
    <input type="submit" alt="Borrar" title="Borrar" class="btn btn-danger" value="Borrar" id="confirmdelete">
</form>
@endsection

 @section('enlaces')     	
   @parent
    <a href ="{{route('anuncios.index')}}"          class="btn btn-primary">Anuncios</a>
    <a href ="{{route('anuncios.show',$anuncio->id)}}" class=" btn btn-primary mr-2" >Regresar a detalles del anuncio</a>
@endsection 


 
