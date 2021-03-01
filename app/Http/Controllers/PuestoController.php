<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Area;
use App\areas_puesto;
class PuestoController extends Controller
{

    public function index(){
        $puestos = Puesto::paginate();
        return view('puestos.index', compact('puestos')); 
    }

    public function create(){   
        $areas =Area::get();
        return view('puestos.create', compact('areas'));
    }
   
    public function store(Request $request){
        $areas = $request->get('areas');
        dd(['name' => $request->get('name'),'estado' => 1]);
        $puesto = Puesto::create(['name' => $request->get('name'),'estado' => 1]);
        $puesto->areas()->sync(Area::whereIn('name',$areas)->get('id'));
        return redirect()->route('puestos.edit', $puesto->id)->With('info','Puesto guardado con exito');
    }
   
    public function show(Puesto $puesto){
        return view('puestos.show', compact('puesto'));
    }

    public function edit(Puesto $puesto){
        $areas =Area::get();
        return view('puestos.edit', compact('puesto','areas'));
    }

    public function update(Request $request, Puesto $puesto){
        $areas = $request->get('areas');
        $puesto->update([
            'name' => $request->get('name'),
            'estado' => 1
        ]);
        $puesto->areas()->sync(Area::whereIn('name',$areas)->get('id'));
        return redirect()->route('puestos.edit', $puesto->id)->With('info','Puesto actualizada con exito');
    }

    public function destroy(Puesto $puesto){
        $puesto->delete();
        return back()->with('info','Elemento eliminado');
    }
}
