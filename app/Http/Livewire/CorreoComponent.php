<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\Usuario\Correo;
use App\User;

class CorreoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$estado,$idCorreo,$botonStor,$p;

    public $viewCreate = "default";
    public $viewCrut = "default";

    public $numeroEmpleados=0;


    public function render()
    {
        return view('correos.livewire.correo-component',[
        	'correos'=>Correo::orderBy('id','desc')->paginate(8)]);
    }

    public function defaultView(){
        $this->viewCreate = "default";
        $this->viewCrut = "default";
        $this->validate(['name' => '']);
    }

    public function show($idCorreo){
        $this->defaultView();
        $this->idCorreo = $idCorreo;
        $this->numeroEmpleados=User::where('correo_id',$idCorreo)->count();
        $this->viewCrut = "show";
    }

    public function create(){
        $this->name = $this->p;
        $this->botonStor="store";
        $this->defaultView();
        $this->viewCreate = "create";
    }

    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        $correo=Correo::create([
            'name' => $this->name,
            'estado' => true
        ]);
        $this->edit($correo->id);
        $this->idCorreo = $correo->id;
    }

    public function edit($idCorreo){
        $this->defaultView();
        $this->botonStor="update";
        $this->idCorreo = $idCorreo;
        $this->name = (Correo::find($this->idCorreo))->name;
        $this->viewCrut = "edit";
    }

    public function update(){
        $this->validate([
            'name' => 'required'
        ]);
        $correo = Correo::find($this->idCorreo);
        $correo->update([
            'name' => $this->name
        ]);
        $this->defaultView();
    }

    public function destroy($id){
        $usuarios=User::where('correo_id',$id)->get();
        foreach($usuarios as $usu){
            $usu->update(['correo_id'=>null]);
        }
        Correo::destroy($id);
    }

}
