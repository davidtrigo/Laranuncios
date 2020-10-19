<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //Modelo para los anuncios
    
    //campos que debe rellenar en la BBDD
    
    protected $fillable =['titulo','descripcion','precio','imagen','user_id'];
}
