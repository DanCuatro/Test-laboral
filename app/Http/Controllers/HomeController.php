<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Model\Usuario\Area;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function permisosArea(){
        $arePemiso=false;
        if(Gate::check('areas.index')){
            $arePemiso=true;
        }else{
            $nombresArea=Area::all();
            for($i=0;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso))
                    $arePemiso=true;  
            }
        }
        return $arePemiso;
    }

    public function permisosAreaUser(){
        $pemisoArea=false;
        if(Gate::check('users.index')){
            $pemisoArea=true;
        }else{
            $nombresArea=Area::all();
            for($i=0;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.users.index';
                if(Gate::check($stringPermiso))
                    $pemisoArea=true;  
            }
        }
        return $pemisoArea;
    }

}
