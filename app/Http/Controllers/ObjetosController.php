<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostObject;

class ObjetosController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'objeto' => 'required',
            'lugar' => 'required',
            'description' => 'required'
        ]);

        $object = new LostObject();
        $object->object_name = $request->objeto;
        $object->place = $request->lugar;
        $object->description = $request->description;
        $object->save();

        return redirect()->route('objetos')->with('Success', 'El objeto se ha guardado con exito');
    }

    public function index(){
        $objetos = LostObject::all();
        return view('objetos.index', ['objetos' => $objetos]);
    }
}
