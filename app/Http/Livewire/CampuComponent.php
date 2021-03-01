<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\Usuario\Campu;
use App\User;

class CampuComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$estado,$idCampu,$botonStor,$p;

    public $viewCreate = "default";
    public $viewCrut = "default";

    public $numeroEmpleados=0;


    public function render()
    {
        return view('campus.livewire.campu-component',[
        	'campus'=>Campu::orderBy('id','desc')->paginate(8)]);
    }

    public function defaultView(){
        $this->viewCreate = "default";
        $this->viewCrut = "default";
        $this->validate(['name' => '']);
    }

    public function show($idCampu){
        $this->defaultView();
        $this->idCampu = $idCampu;
        $this->numeroEmpleados=User::where('campu_id',$idCampu)->count();
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
        $campu=Campu::create([
            'name' => $this->name,
            'estado' => true
        ]);
        $this->edit($campu->id);
        $this->idCampu = $campu->id;
    }

    public function edit($idCampu){
        $this->defaultView();
        $this->botonStor="update";
        $this->idCampu = $idCampu;
        $this->name = (Campu::find($this->idCampu))->name;
        $this->viewCrut = "edit";
    }

    public function update(){
        $this->validate([
            'name' => 'required'
        ]);
        $campu = Campu::find($this->idCampu);
        $campu->update([
            'name' => $this->name,
        ]);
        $this->defaultView();
    }

    public function destroy($id){
        $numeroEmpleados=User::where('campu_id',$id)->count();
        if($numeroEmpleados==0){
            $usuarios=User::where('campu_id',$id)->get();
            foreach($usuarios as $usu){
                $usu->update(['campu_id'=>null]);
            }
            Campu::destroy($id);
        }else{
            Campu::find($id)->update([
                'estado' => !Campu::find($id)->estado
            ]);
        }
    }

}
