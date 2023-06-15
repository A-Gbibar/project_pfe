<?php

namespace App\Http\Controllers;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;

use Illuminate\Http\Request;

class ControllerDaily extends Controller
{
    public function index(){
        return view('layout.daily');
    }
    // =======================search-user================

    public function searchUser(Request $request){

            if($request->ajax()){
                $html = '';
                $infoAdulte = adulte::query()->where('nom' , 'LIKE' , '%'.$request->search.'%'  )
                ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%'  )
                ->orWhere('idClient', 'LIKE' , '%'.$request->search.'%')
                ->get();
                $searchEnfant = Enfant::query()
                ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
                ->where('nom' , 'LIKE' , '%'.$request->search.'%'  ) 
                ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%')
                ->orWhere('idClient' , 'LIKE' , '%'.$request->search.'%')
                ->get();

                $html .= '<ul>';
            
                foreach( $infoAdulte as $key => $element ){
                    $photoPath = $element->photo;
                    $photoPath = ($photoPath !== null) ? '<img src="storage/' . $photoPath . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
                    $html .= '
                    <li class="Users"> 
                        <span > '. $photoPath.' </span>   
                        <span class="id">'.$element->idClient .'</span>
                        <span> A </span>
                        <span class="userName">'.$element->nom .' ' .$element->Prenom.'</span> 
                    </li>
                    ';
                }

                    
                foreach( $searchEnfant as $key => $element ){
                    $photoPath = $element->photo;
                    $photoPath = ($photoPath !== null) ? '<img src="storage/' . $photoPath . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
                    $html .= '
                    <li class="Users"> 
                        <span > '. $photoPath.' </span>   
                        <span class="id">'.$element->idClient .'</span>
                        <span> E </span>
                        <span class="userName">'.$element->nom .' ' .$element->Prenom.'</span> 
                    </li>
                    ';
                }

                $html .= '</ul>';
            return response()->json($html);
                
            }
            return response()->json('Not resoult');


    }
}
