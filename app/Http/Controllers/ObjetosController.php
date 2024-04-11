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

        return redirect()->route('objetos')->with('success', 'El objeto se ha guardado con exito');
    }

    public function index(){
        $objetos = LostObject::all();
        return view('objetos.index', ['objetos' => $objetos]);
    }

    public function show($id){
        $objeto = LostObject::find($id);
        return view('objetos.show', ['objeto' => $objeto]);
    }

    public function update(Request $request, $id){
        // Validar la solicitud
        $request->validate([
            'objeto' => 'required',
            'lugar' => 'required',
            'description' => 'required'
        ]);

        $objeto = LostObject::find($id);

        if (!$objeto) {
            return back()->with('error', 'El objeto no se encontró.');
        }

    if ($objeto){
            $objeto->object_name = $request->objeto;
            $objeto->place = $request->lugar;
            $objeto->description = $request->description;
            $objeto->save();

            return redirect()->route('objetos')->with('success', 'El objeto se ha actualizado con exito');
        }

    }

    public function destroy($id){
        $objeto = LostObject::find($id);
        $objeto->delete();

        return redirect()->route('objetos')->with('success', 'El objeto se ha eliminado con exito');
    }
}
