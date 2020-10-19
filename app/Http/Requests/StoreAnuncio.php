<?php

namespace App\Http\Requests;

use App\Anuncio;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnuncio extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //doc/5.8/validation
      
        //permisos sobre que puede hacer el usuario
       // $anuncio = Anuncio::find($this->route('anuncios'));
        
     //  return $this->user()->can('create',$anuncio);
  return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => "required|max:255|min:3",
            'descripcion'=>'required|max:255',
            'precio'=>'required|numeric|min:0',
            'imagen'=>'sometimes|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ];
    }
    
    
    public function messages() {
        return [
            'precio.min'=>'El precio debe ser mayor o igual a cero',
            'precio.numeric'=>'El precio debe ser un numero',
            'titulo.min'=>'El titulo debe tener almenos tres caracteres'
            
        ];
    }
}
