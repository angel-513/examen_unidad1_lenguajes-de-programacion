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

    function eliminarContacto($id){
        $contacto = Contacto::find($id);
        $contacto->delete();

        return redirect()->route('directorio.inicio');
    } 

}
