<?php

namespace App\Http\Controllers;

use App\Contactos;
use App\Http\Requests\CreateContactosRequest;
use App\Http\Requests\UpdateContactosRequest;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
   //GET  Listar registro
    public function index(Request $request)
    {   
        //Se realiza busqueda de Nombre o por telefono con parametro xtBuscar
        //ejemplo de buscar en Url ?txtBuscar=nombre
        if ($request->has('txtBuscar')) {
            $directorios = Contactos::where('nombre','like', '%' . $request->txtBuscar . '%')
               ->orwhere('telefono', $request->txtBuscar )                
                ->get();
        }else {
            $directorios = Contactos::all();
        }
        return $directorios;
    }


    //Cargar archivo
    //Crea la carpeta fotografiasdonde se guardan las fotos
    private function cargarArchivo($file)
    {
        $nombreArchivo = time() . '.' .  $file->getClientOriginalExtension();
        $file->move(public_path('fotografias'), $nombreArchivo);
        return $nombreArchivo;
    }

 

   //POST Insertar datos
   //CreateContactosRequest variable  se llama la validacion en carpeta Requests
    public function store(CreateContactosRequest $request)
    {
        $input = $request->all();
        //sube las fotos
        if ($request->has('foto'))
            $input['foto'] = $this->cargarArchivo($request->foto);
        Contactos::create($input);
        return response()->json([ 
            'res' => true,
            'message' => 'Datos creados Exitosamente' 
        ], 200);

    }

    //GET retorna un solo registro
    public function show($id)
    {
        return Contactos::findOrfail($id);          
    }
 
 
    

    //DELETE Eliminar registro
    public function destroy($id)
    {
        Contactos::destroy($id);
        return response()->json([ 
            'res' => true,
            'message' => 'Datos Eliminados' 
        ], 200);
        
    }
}
