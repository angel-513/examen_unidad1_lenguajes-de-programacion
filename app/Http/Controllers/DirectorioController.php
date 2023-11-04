<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectorioController extends Controller
{
    function listarDirectorios(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    function agregarDirectorio(){
        return view('crearEntrada');
    }

    function buscarDirectorio(){
        return view('buscar');
    }

    function verContactos($codigoEntrada){
        $contactos = Contacto::all()->where('codigoEntrada', $codigoEntrada);
        return view('vercontactos', compact('contactos', 'codigoEntrada'));
    }

    function eliminarDirectorio($codigoEntrada){
        $directorio = Directorio::find($codigoEntrada);

        return view('eliminar', compact('directorio'));
    }
}
