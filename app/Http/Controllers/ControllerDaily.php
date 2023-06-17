<?php

namespace App\Http\Controllers;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;
use App\Models\Medecin;
use App\Models\daily;

use Illuminate\Http\Request;

class ControllerDaily extends Controller
{
    public function index(){
        return view('layout.daily');
    }
    // =======================search-user================

    public function searchUser(Request $request){

            if($request->ajax()){
                $count = 0;
                $html = '';
                $html .= '<ul>';

                if( $request->type == 'user' ){
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
                    $count += count($infoAdulte);
                        
                    foreach( $searchEnfant as $key => $element ){
                        $photoPath = $element->photo;
                        $photoPath = ($photoPath !== null) ? '<img src="storage/' . $photoPath . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
                        $html .= '
                        <li class="Users"> 
                            <span > '. $photoPath.' </span>   
                            <span class="idU">'.$element->idClient .'</span>
                            <span> E </span>
                            <span class="userName">'.$element->nom .' ' .$element->Prenom.'</span> 
                        </li>
                        ';
                    }
                    $count += count($searchEnfant);
                }else{

                    $searchDocter = Medecin::query()->where('nom' , 'LIKE' , '%'.$request->search.'%'  )
                    ->orWhere('prenom' , 'LIKE' , '%'.$request->search.'%'  )
                    ->orWhere('idMedecins', 'LIKE' , '%'.$request->search.'%')
                    ->get();
                    foreach( $searchDocter as $key => $element ){
                        $photoPath = $element->photo;
                        $photoPath = ($photoPath !== null) ? '<img src="storage/' . $photoPath . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
                        $html .= '
                        <li class="Docter"> 
                            <span > '. $photoPath.' </span>   
                            <span class="idD">'.$element->idMedecins  .'</span>
                            <span class="userNameDoctre">'.$element->nom .' ' .$element->prenom.'</span> 
                        </li>
                        ';
                    }
                    $count += count($searchDocter);

                }
          

                $html .= '</ul>';
            return response()->json(['html'=>$html , 'count'=>$count]);
                
            }
            return response()->json('Not resoult');


    }

    // ========================Save=====Date===============

    public function store(Request $request){
        if( isset($request->HoureStart) && isset($request->HoureFin) && isset($request->UserNameUser) && isset($request->idUser) && isset($request->Docter)  && isset($request->idDocter) ){
           $data = [
                'DateHoraires' => $request->DateHoraires,
                'HoureStart' => $request->HoureStart,
                'HoureFin' => $request->HoureFin,
                'UserNameUser' => $request->UserNameUser,
                'idU' => $request->idUser,
                'UserNameDocter' => $request->Docter,
                'idD' => $request->idDocter,
                'description' => $request->description,
           ];
          $create =  daily::create($data);
        //    dd($request);

        return response()->json($create);

        }else{
            return response()->json(['Error' => 'this is not writh all athribuite']);
        }

    

    }


    function time12($houre){
        $explodeHour = explode( ' ' , $houre );
        if( $explodeHour[1] == 'PM' ){
            $explodeHour = explode(':' , $houre);
            $Hour = $explodeHour[0] + 12;
            $explodeHour[0] = $Hour; 
            $Hour = explode(" " , $explodeHour[1]);
            $Hour = $explodeHour[0] . ':' . $Hour[0];
            return $Hour;
        }
            $Hour =   $explodeHour[0];
            return $Hour;
    }

    //=================Read============Data=================

    public function show(){
        $read = daily::all();
        if( isset($read) ){
            $html = '';
            foreach( $read as $element ){
    
                $HourStart = $this->time12($element['HoureStart']);
                $HoureFin = $this->time12($element['HoureFin']);

               $html .= '
            <div class="subBoxDaily horaire H-one bodySection d-grid  position-relative align-items-center">
            <div class="AddDele position-absolute">
                <a href="#" onclick="showData('.$element['id'].');" ><span>Modifier</span></a>
                <a href="#"   onclick = "warning(`your are shor Delet Client` , `Delet` , `' . $element['UserNameUser'] . '` , `' . $element['id'] . '`);"><span>Supprimer</span></a>
                <i class="bi bi-caret-down-fill"></i>
            </div>
               <span class="time s-time"> <b>'.$HourStart.'</b></span>
               <span class="name name-user">'.$element['UserNameUser'].'</span>
               <span class="name name-doctor">'.$element['UserNameDocter'].'</span>
               <span class="para">'.$element['description'].'</span>
               <span class="time e-time"><b>'. $HoureFin.'</b></span>
            </div>
               ';
            }
            return response()->json($html);
           
        }
    }

    //=================Saerch==============================

    public function saerch(Request $request){
        $dataSearch = daily::query()->where('UserNameUser' , 'LIKE' , '%'.$request->search.'%')
        ->orWhere('UserNameDocter' , 'LIKE' , '%'.$request->search.'%')
        ->orWhere('idU' , 'LIKE' , '%'.$request->search.'%')
        ->orWhere('idD' , 'LIKE' , '%'.$request->search.'%')
        ->get();
        $html = '';
        if( isset($dataSearch) ){

            foreach( $dataSearch as $key => $element ){
                
                $HourStart = $this->time12($element['HoureStart']);
                $HoureFin = $this->time12($element['HoureFin']);
                $html .= '
                <div class="subBoxDaily searchBoxDaily horaire H-one bodySection position-relative  d-grid  align-items-center">

                <div class="AddDele position-absolute">
                <a href="#" onclick="showData('.$element['id'].');" ><span>Modifier</span></a>
                <a href="#"  onclick="warning("Voulez-vous vraiment supprimer cette personne ?", "DELET", '.$element['UserNameUser'].' , '.$element['id'].')" ><span>Supprimer</span></a>
                <i class="bi bi-caret-down-fill"></i>
                 </div>
                <span class="time s-time"> <b>'.$HourStart.'</b></span>
                <span class="name name-user">'.$element['UserNameUser'].'</span>
                <span class="name name-doctor">'.$element['UserNameDocter'].'</span>
                <span class="para">'.$element['description'].'</span>
                <span class="time e-time"><b>'. $HoureFin.'</b></span>
                </div>
                ';
            }
        }else{
            $html = '
            <div class="subBox horaire  bodySection d-flex justify-content-center flex-column  align-items-center">
                <img src="storage/images/noun-not-found-2157340.svg" alt="" >
                <div>pas trouvé de <span class="gree">${value}</span> </div>
            </div>
            ';
        }
        $NumberSearch = count($dataSearch);
        return response()->json(['html'=>$html , 'NumberSearch'=>$NumberSearch]);
    }

    //=============single=========================================

    public function single($id){
        $single = daily::query()->where('id' , $id)->first();
        $html = '

        <div class="navhoraires d-flex justify-content-between align-items-center">
        <div class="titleHoraires"> <i class="bi bi-arrow-90deg-right"></i> créer horaire quotidien </div>
        <input type="date" name="DateHoraires" id="DateHoraires" value="'. $single->DateHoraires.'">
    </div>
    <div class="taming mt-3 d-flex justify-content-evenly align-items-center">
        <div class="suptime position-relative timeStar">
            <span class="titleTime">heure de début</span>
            <input type="text" class="timepicker" name="HoureStart" value="'. $single->HoureStart.'">
        </div>
        <div class="suptime position-relative timeStar">
            <span class="titleTime">heure de fin</span>
            <input type="text" class="timepicker" name="HoureFin" value="'. $single->HoureFin.'">
        </div>
    </div>
    <div class="upBox mb-4 searchUD d-flex justify-content-evenly  mt-4">
        <div class="listSearch">
            <div class="subBox searchUser horaire d-grid H-one bodySection   ">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="searchUser"  ><input type="text"  name="UserNameUser"  id="searchUser" class="searchInput"
                        placeholder="search Clients" value="'. $single->UserNameUser.'"> <input type="hidden"  class="idUser" name="idUser" value="'. $single->idU.'"> </span>
            </div>
            <div class="listUD listUser">

            </div>
        </div>

        <div class="listSearch">

            <div class="subBox searchDocter horaire d-grid H-one bodySection   ">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="search"><input type="text" name="Docter" id ="searchDocter" class="searchDocterInput"
                        placeholder="search Médecins" value="'. $single->UserNameDocter.'"> <input type="hidden" class="idDocter" name="idDocter" value="'. $single->idD.'"> </span>
            </div>

            <div class="listUD  listDocter">
                
            </div>
        </div>

    </div>

    <div class="texteArea  ">
        <div class="Address mt-4 w-100  d-flex justify-content-center align-items-center">
            <label class="AddressText span-raedy ">
                <textarea name="description" class="Description fild w-100" required="required">'. $single->description.'</textarea>
                <span>Description</span>
            </label>
        </div>
    </div>

    <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
        <span class="btn-button next gree me-4 gree-background  text-white"
        onclick="UpdateInfo();">Retour</span>
        <span  class="btn-button"  >Update</span>
    </div>
        
        ';
        return response()->json($html);
    }
    //=============destroy=========================================

    public function destroy($id){
        if( isset($id) ){
            $info = daily::query()->where('id' , $id)->first();
            $UserName = $info->UserNameUser;
            $destroy = daily::query()->where('id' , $id)->delete();
            return response()->json(['UserName'=>$UserName]);
        }else{
            return response()->json(['Erorr'=>"Ne pas supprimer n'est pas défini"]);
        }
    }


}
