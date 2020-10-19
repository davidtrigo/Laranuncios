<?php
namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnuncio;

class AnuncioController extends Controller
{
    
    
    public function __construct(){
        //autorizaciones
        $this->middleware('auth')->except('index','show','list');
        //$this->middleware('verified')->except('index','show','list'); no necesario
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // paginado de 10 anuncios por pagina
        $anuncios = Anuncio::orderBy('id', 'DESC')->paginate(10);

        $total = Anuncio::count();

        return view('anuncios.list', [
            'anuncios' => $anuncios,
            'total' => $total
        ]);
    }
    
    
   //crear listado individual por id de usuario

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //carga la vista en el formulario para anadir un anuncio
        return view('anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnuncio $request)
    {
        //validaciones en StoreAnuncio
              
        $imagen =NULL;
        
        if($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store(config('filesystems.anunciosImageDir'));
            $imagen = pathinfo($ruta,PATHINFO_BASENAME);
            
        }
        
        //array con los datos de la creacion del anuncio
        $datos = $request->except('imagen')+['imagen'=>$imagen];
        
        
        $datos+=['user_id'=>$request->user()->id];
        
        $anuncio=Anuncio::create($datos);  
        
        
        return redirect()->route('anuncios.show', $anuncio->id) ->with('success', "El anuncio $anuncio->titulo se ha guardado correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param Anuncio $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        return view('anuncios.show', [
            'anuncio' => $anuncio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Anuncio $anuncio)
    {
        if($request->user()->cant('edit',$anuncio))
            abort(401,'No puedes editar este anuncio'); 
        
            
        // carga la vista correspondiente y le pasa el anuncio
        return view('anuncios.update', [
            'anuncio' => $anuncio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnuncio $request, Anuncio $anuncio) {
        
        if($request->user()->cant('update',$anuncio))
            abort(401,'No puedes actualizar este anuncio'); 
        
            
        // recupera los valores de los inputs de una lista
        $datos = $request->except('imagen');

        // comprueba si llega la imagen y realiza las operaciones pertinentes
        if ($request->hasFile('imagen')) {

            // recordar la imagen para luego borrarla
            $imagenAntigua = $anuncio->imagen;

            // guarda la imagen nueva
            $ruta = $request->file('imagen')->store(config('filesystems.anunciosImageDir'));
            $datos += [
                'imagen' => pathinfo($ruta, PATHINFO_BASENAME)
            ];

            // BORRA LA IMAGEN ANTIGUA
            Storage::delete(config('filesystems.anunciosImageDir') . $imagenAntigua);
        }

        $anuncio->update($datos);
        return back()->with('success', "El anuncio $anuncio->titulo se ha actualizado");
    }

    /**
     * Muestra el formulario de confirmaci�n de borrado del anuncio
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete (Request $request, Anuncio $anuncio)
    {
       if($request->user()->cant('delete',$anuncio))
           abort(401,'No puedes eliminar este anuncio');
        
        return view ('anuncios.delete',['anuncio'=>$anuncio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Anuncio $anuncio)
    {
        
        //  borro el anuncio de la BD
        $anuncio->delete();
        
        // borro la imagen 
        Storage::delete(config('filesystems.anunciosImageDir').$anuncio->imagen);
        
        
        // redirige a la lista de anuncios
        return redirect('anuncios')->with('success',"Anuncio eliminado");
        
    }
}
