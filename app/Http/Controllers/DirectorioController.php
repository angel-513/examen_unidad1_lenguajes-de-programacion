<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectorioController extends Controller
{
    function listarDirectorios(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios', compact('directorios')));
    }

    function buscarDirectorio(){
        return view('buscar');
    }

    function verContactos($codigoEntrada){
        $directorio = Directorio::where('codigoEntrada',$codigoEntrada);
        $contactos = Contacto::all()->where('codigoEntrada', $codigoEntrada);
        return view('vercontactos', compact('contactos', 'directorio'));
    }

    function eliminarDirectorio($codigoEntrada){
        $directorio = Directorio::where('codigoEntrada', $codigoEntrada);

        return view('eliminar', compact('directorio'));
    }

    function confirmacionEliminacion($codigoEntrada){
        $directorio = Directorio::where('codigoEntrada', $codigoEntrada);
        $contactos = Contacto::all()->where('codigoEntrada', $codigoEntrada);

        foreach ($contactos as $item) {
            $item->delete();
        }

        $directorio->delete();

        return redirect()->route('directorio.inicio');
    }

    function agregarDirectorio(){
        return view('crearEntrada');
    }
    function guardarDirectorio(Request $request){
        $directorio = new Directorio();
        $directorio->codigoEntrada = $request->input("codigo");
        $directorio->codigoEntrada = $request->input("nombre");
        $directorio->codigoEntrada = $request->input("apellido");
        $directorio->codigoEntrada = $request->input("telefono");
        $directorio->codigoEntrada = $request->input("correo");

        $directorio->save();

        return redirect()->route('directorio.inicio');
    }

    function buscarDirectorioByCorreo(Request $request) {
        $directorio = Directorio::where('correo', $request->input("correo"))->first();
        
        if($directorio != null){
            $contactos = Contacto::all()->where('codigoEntrada', $directorio->codigoEntrada);
            return view('vercontactos', compact('contactos', 'directorio'));
        }else{
            return redirect()->route('directorio.inicio');
        }
    }
}
