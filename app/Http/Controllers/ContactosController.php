<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class ContactosController extends Controller
{
    function agregarContacto(){
        return view('agregarcontacto');
    }

    function guardarContacto(Request $request){
        $contacto = new Contacto();
        $contacto->codigoEntrada = $request->input('codigo');
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->telefoono = $request->input('telefono');

    }

    function eliminarContacto($id){
        $contacto = Contacto::find($id);
        $contacto->delete();

        return redirect()->route('directorio.contactos');
    } 

}
