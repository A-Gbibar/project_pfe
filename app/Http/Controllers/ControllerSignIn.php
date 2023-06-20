<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatLogin;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;

class ControllerSignIn extends Controller
{
    public function index(){
        return view('LandingPage.GetStarted.SignIn');
    }

    //========================SignIn======forstTime==========================

    public function forstTime(Request $request){
        $userName = $request->UserName;
        $connexion = $request->connexion;
        if( isset($userName) && isset($connexion) ){
            $getLogin = CreatLogin::query()
            ->where('login', '=' ,  $connexion)
            ->where("UserName", '='  , $userName )
            ->first();
            if( !isset($getLogin) ){
                return back()->withErrors(
                    [
                        'error'=>"check pleas in Login Or User Name"
                    ]
                )->onlyInput();
            }
            $request->session()->put('UserName' , $getLogin['UserName']);

            $html = '';
            if( isset($getLogin['idAdulte'] ) ){
                $getInfo = adulte::query()->where('idClient' , $getLogin['idAdulte'])->first();
                $add =  [ 'Address' => $getInfo['Address'] ,'CINE' =>  $getInfo['CINE']];
            }else if(isset($getLogin['idEnfant'])){
                $getInfo = Enfant::query()->where('idClient' , $getLogin['idEnfant'])->first();
                $add    = parentenfant::query()->where('id' , $getInfo['idParent'] )->get(['Address' , 'CINE']);
                $add =  [ 'Address' => $add[0]->Address ,'CINE' =>  $add[0]->CINE];
            }

      
         if(isset($getInfo)){
            
            return view('LandingPage.GetStarted.gard' , [
                'UserName'=>$getInfo['nom'] . ' ' . $getInfo['Prenom'],
                'type'=>$getInfo['type'],
                'Sexe'=>$getInfo['Sexe'],
                'CINE'=>$add['CINE'],
                'DateNaissance'=>$getInfo['DateNaissance'],
                'Address'=>$add['Address'],
                'tel'=>$getInfo['tel'],
                'photo' => $getInfo['photo'],
                'created_at'=>$getInfo['created_at'],
    
            ]);
        }
             
    }
    }

    // ========================Sava============New==============Data===========

    public function newAccounr(Request $request){
        return response()->json($request->session()->put('UserName'));
    }

}
