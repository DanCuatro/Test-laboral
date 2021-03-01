<?php

namespace App\Http\Controllers;

use App\Model\Usuario\Area;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(){
        $arePemiso=false;
        if(Gate::check('areas.index')){
            $arePemiso=true;
        }else{
            $nombresArea=Area::all();
            for($i=1;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso))
                    $arePemiso=true;  
            }
        }
        
        if(Gate::check('areas.index')){
            return view('areas.area',compact('arePemiso')); 
        }else{
            $nombresArea=Area::all();
            for($i=1;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso))
                    return view('areas.area',compact('arePemiso'));     
            }
        }
    }
}
