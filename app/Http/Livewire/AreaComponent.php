<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\Usuario\Area;
use App\Model\Usuario\Puesto;
use App\Model\Usuario\User_Puesto;
use Caffeinated\Shinobi\Models\Permission;	
use App\User;
use Illuminate\Support\Facades\Gate;

class AreaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$estado,$idArea,$botonStor;

    public $viewCreate = "default";
    public $viewCrut = "default";
    public $viewPuesto = "agregar";
    public $nuevoPuesto,$antiguoPuesto;
    public $idPuesto;
    public $puestosArreglo = array();
    public $puestosArregloEliminados = array();
    
    public function render(){
        return view('areas.livewire.area-component',[
            'areas'=>$this->permisos()]);
    }
    
    public function permisos(){
        if(Gate::check('areas.index')){
            return Area::orderBy('id','desc')->paginate(8);
        }else{
            $nombresArea=Area::all();
            $areas=Area::where('name',"area inexistente no hay no existe");
            for($i=0;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso)){
                    $areas=$areas->orwhere('name',$nombresArea[$i]->name);
                }
            }
            return $areas->orderBy('id','desc')->paginate(8);
        }
    }
        //Funciones para manipular los puestos
    public function agregrar(){
        $this->validate([
            'nuevoPuesto' => 'required'
        ]);
        if($this->nuevoPuesto!=null)
            if($this->puestosArreglo==null)
                $this->puestosArreglo[] = array($this->nuevoPuesto,null);
            else
                if($this->encontrar($this->nuevoPuesto))
                    $this->puestosArreglo[] = array($this->nuevoPuesto,null);
        $this->nuevoPuesto = null;
    }

    public function encontrar($nuevoPuesto){
        foreach ($this->puestosArreglo as $key) 
            if(strcasecmp($key[0], $nuevoPuesto) === 0)
                return false;
        return true;
    }

    public function eliminarPuesto($nombrePuesto, $idPuesto){
        $res=array_search(array($nombrePuesto,$idPuesto),$this->puestosArreglo);
        $this->puestosArregloEliminados[] = $this->puestosArreglo[$res];
        unset($this->puestosArreglo[$res]);
        $this->cancelarAcualizacionPuesto();
    }

    public function altaPuesto($nombrePuesto, $idPuesto){
        $res=array_search(array($nombrePuesto,$idPuesto),$this->puestosArregloEliminados);
        $this->puestosArreglo[] = $this->puestosArregloEliminados[$res];
        unset($this->puestosArregloEliminados[$res]);
        $this->cancelarAcualizacionPuesto();
    }
    
    public function editarPuesto($nombrePuesto, $idPuesto){
        $this->nuevoPuesto = $this->antiguoPuesto =$nombrePuesto;
        $this->idPuesto = $idPuesto;
        $this->viewPuesto ="editar";
    }
    
    public function actualizarPuesto(){
        $res=array_search(array($this->antiguoPuesto,$this->idPuesto),$this->puestosArreglo);
        $this->puestosArreglo[$res] = array($this->nuevoPuesto,$this->idPuesto);
        $this->cancelarAcualizacionPuesto();
    }

    public function cancelarAcualizacionPuesto(){
        $this->nuevoPuesto = $this->antiguoPuesto = $this->idPuesto =  null;
        $this->viewPuesto ="agregar";
    }
                        //CRUD principal del Area

    public function show($idArea){
        if(Gate::check('areas.edit') || Gate::check(Area::find($idArea)->name.'.areas.edit')){
        $this->defaultView();
            $this->idArea = $idArea;
            $puestos=Puesto::where('area_id','=',$idArea)->get();
            foreach ($puestos as $puesto) {
                $idpues=$puesto->id;
                if($puesto->estado==true)
                $this->puestosArreglo[] = array($puesto->name,$puesto->id,User::whereHas('userPuesto',function ($query) use($idpues) {$query->where('id_puesto',$idpues)->where('fecha_final',null);})->where('email_verified_at','!=',null)->where('estado',true)->count());
                else
                $this->puestosArregloEliminados[] = array($puesto->name,$puesto->id,User::whereHas('userPuesto',function ($query) use($idpues) {$query->where('id_puesto',$idpues);})->where('email_verified_at','!=',null)->count());
            }
            $this->viewCrut = "show";
        }
    }

    public function create(){
        if(Gate::check('areas.create')){
            $this->name = null;
            $this->botonStor="store";
            $this->defaultView();
            $this->viewCreate = "create";
        }
    }

    public function store(){
        if(Gate::check('areas.create')){
            $this->validate([
                'name' => 'required | unique:areas,name'
            ]);
            $area=Area::create([
                'name' => $this->name,
                'estado' => true
            ]);
            foreach ($this->puestosArreglo as $key) 
                Puesto::create([
                    'area_id' => $area->id,
                    'name' => $key[0],
                    'estado' => true
                ]);
            //crear permosis del area
            $this->crearPermisos($this->name);
            $this->edit($area->id);
            $this->idArea = $area->id;
        }
    }   

    public function edit($idArea){
        $this->defaultView();
        $this->idArea = $idArea;
        $this->name = (Area::find($this->idArea))->name;
        if(Gate::check('areas.edit') || Gate::check($this->name.'.areas.edit')){
            $this->botonStor="update";
            $this->viewCrut = "edit";
            $puestos=Puesto::where('area_id','=',$idArea)->get();
            foreach ($puestos as $puesto) {
                if($puesto->estado==true)
                $this->puestosArreglo[] = array($puesto->name,$puesto->id);
                else
                $this->puestosArregloEliminados[] = array($puesto->name,$puesto->id);
            }
        }
    }

    public function update(){
        //Permiso de actualizacion
        if(Gate::check('areas.edit') || Gate::check((Area::find($this->idArea))->name.'.areas.edit')){
            //Validacion de campos
            $this->validate([
                'name' => 'required | unique:areas,name,'.$this->idArea
            ]);
            $area = Area::find($this->idArea);
            //Actualizar Area
            $this->actulizarPermisos($area->name,$this->name);
            $area->update(['name' => $this->name]);
            //Actualizar Puestos
            foreach ($this->puestosArreglo as $key)
                if($key[1]==null){
                    //crear Puesto en caso de ser necesario
                    Puesto::create(['area_id' => $area->id,'name' => $key[0],'estado' => true]);
                }else{
                    //Actualizar puesto o darlos de alta
                    $puesto = Puesto::find($key[1]);
                    $puesto->update(['name' => $key[0],'estado' => 1]);
                }
            //Dar de Baja puestos
            if(count($this->puestosArregloEliminados)!=0)
            foreach ($this->puestosArregloEliminados as $key){
                if ($key[1]!=null){
                    $puesto = Puesto::find($key[1]);
                    $puesto->update(['estado' => false]);
                }           
            }      
            $this->defaultView();
        }
    }

    public function BajaAlta($idArea){
        if(Gate::check('areas.destroy')){
            $this->defaultView();
            $area=Area::find($idArea);
            $puestos=Puesto::where('area_id','=',$idArea)->get();
            $numeroEmpleados=0;
            //Vefiricar si hay o hubo empleados en esa area
            foreach ($puestos as $puesto) {
                $idpues=$puesto->id;
                $numeroEmpleados=$numeroEmpleados+User::whereHas('userPuesto',function ($query) use($idpues) {$query->where('id_puesto',$idpues);})->count();
            }
            //Eliminar el area o darla de baja en caso de que tega o haya tenido empelados
            if ($numeroEmpleados!=0) {
                if($area->estado) $this->destruirPermisos($area->name);
                else $this->crearPermisos($area->name);
                $area->update(['estado' => !$area->estado]);
            } else {
                $this->destruirPermisos($area->name);
                $area->delete();
            }
        }
    }

    public function destruirPermisos($area){
        //Empleados
        Permission::where('slug',$area.'.users.index')->delete();
        Permission::where('slug',$area.'.users.show')->delete();
        Permission::where('slug',$area.'.users.edit')->delete();
        Permission::where('slug',$area.'.users.editCom')->delete();
        Permission::where('slug',$area.'.users.destroy')->delete();
        //Area
        Permission::where('slug',$area.'.areas.index')->delete();
        Permission::where('slug',$area.'.areas.show')->delete();
        Permission::where('slug',$area.'.areas.edit')->delete();
    }

    public function actulizarPermisos($area,$nuevo){
        //Empleados
        Permission::where('slug',$area.'.users.index')->update(['name' => 'Navegar Empleados de '.$nuevo,'slug' => $nuevo.'.users.index']);
        Permission::where('slug',$area.'.users.show')->update(['name' => 'Ver los detalles de los Empleados de '.$nuevo,'slug' => $nuevo.'.users.show']);
        Permission::where('slug',$area.'.users.edit')->update(['name' => 'Edición de los Empleados de '.$nuevo,'slug' => $nuevo.'.users.edit']);
        Permission::where('slug',$area.'.users.editCom')->update(['name' => 'Complemento de Datos de Empleados de'.$nuevo,'slug' => $nuevo.'.users.editCom']);
        Permission::where('slug',$area.'.users.destroy')->update(['name' => 'Dar de baja Empleados de '.$nuevo,'slug' => $nuevo.'.users.destroy']);
        //Area
        Permission::where('slug',$area.'.areas.index')->update(['name' => 'Navegar el Área de'.$nuevo,'slug' => $nuevo.'.areas.index','description' => 'Lista de navegación de'.$nuevo.' permite el acceso a este apartado']);
        Permission::where('slug',$area.'.areas.show')->update(['name' => 'Ver detalles de '.$nuevo,'slug' => $nuevo.'.areas.show','description' => 'Ver detalles de'.$nuevo]);
        Permission::where('slug',$area.'.areas.edit')->update(['name' => 'Edición de '.$nuevo,'slug' => $nuevo.'.areas.edit','description' => 'Modificar los datos de '.$nuevo]);
    }

    public function crearPermisos($area){
        //Empleados
        Permission::create(['name' => 'Navegar Empleados de '.$area,'slug' => $area.'.users.index','description' => 'Lista de navegación de Empleados',]);
        Permission::create(['name' => 'Ver los detalles de los Empleados de '.$area,'slug' => $area.'.users.show','description' => 'Ver los datos personales e informacion los Empleados']);
        Permission::create(['name' => 'Edición de los Empleados de '.$area,'slug' => $area.'.users.edit','description' => 'Modificar los datos de un Empleados']);
        Permission::create(['name' => 'Complemento de Datos de Empleados de'.$area,'slug' => $area.'.users.editCom','description' => 'Complementar los datos Faltantes de un Empleado']);
        Permission::create(['name' => 'Dar de baja Empleados de '.$area,'slug' => $area.'.users.destroy','description' => 'Dar de baja Empleados']);
        //Area
        Permission::create(['name' => 'Navegar el Área de'.$area,'slug' => $area.'.areas.index','description' => 'Lista de navegación de'.$area.' permite el acceso a este apartado',]);
        Permission::create(['name' => 'Ver detalles de '.$area,'slug' => $area.'.areas.show','description' => 'Ver detalles de'.$area]);
        Permission::create(['name' => 'Edicion de '.$area,'slug' => $area.'.areas.edit','description' => 'Modificar los datos de '.$area]);
    }

    public function defaultView(){
        $this->viewCreate = "default";
        $this->viewCrut = "default";
        $this->viewPuesto ="agregar";
        $this->validate(['name' => '']);
        $this->puestosArreglo = array();
        $this->puestosArregloEliminados = array();
        $this->nuevoPuesto = null;
    }

}