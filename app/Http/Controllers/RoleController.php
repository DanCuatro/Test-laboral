<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Model\Usuario\Area;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate();
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('roles.index', compact('roles','pemisoArea','pemisoAreaUser')); 
    }

    public function create(){
        $permissions = Permission::get();
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('roles.create', compact('permissions','pemisoArea','pemisoAreaUser'));
    }

    public function store(Request $request){
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)->With('info','Rol guardado con exito');
    }

    public function show(Role $role){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('roles.show', compact('role','pemisoArea','pemisoAreaUser'));
    }

    public function edit(Role $role){
        $permissions = Permission::get();
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('roles.edit', compact('role','permissions','pemisoArea','pemisoAreaUser'));
    }

    public function update(Request $request, Role $role){
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)->With('info','Rol actualizado con exito');
    }

    public function destroy(Role $role){
        $role->delete();
        return back()->with('info','Elemento eliminado');
    }
    
    public function permisosArea(){
        $pemisoArea=false;
        if(Gate::check('areas.index')){
            $pemisoArea=true;
        }else{
            $nombresArea=Area::all();
            for($i=1;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso))
                    $pemisoArea=true;  
            }
        }
        return $pemisoArea;
    }

    public function permisosAreaUser(){
        $pemisoArea=false;
        if(Gate::check('users.index')){
            $pemisoArea=true;
        }else{
            $nombresArea=Area::all();
            for($i=1;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.users.index';
                if(Gate::check($stringPermiso))
                    $pemisoArea=true;  
            }
        }
        return $pemisoArea;
    }

}
