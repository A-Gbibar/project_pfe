<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;
use Carbon\Carbon;
use App\Models\Medecin;
use App\Models\daily;
use App\Http\Controllers\ControllerDaily;

class ControllerHome extends Controller
{
    public function index(){
        
        return view('index');
    }

    public function calcUsers(){
                // get Last User
                $adulte = adulte::query()->latest()->first();
                $Enfant = Enfant::query()->latest()->first();
                $lastUser = ( $Enfant['idClient'] > $adulte['idClient'] ) ? $Enfant : $adulte;
                
                
                // get count Users
                $count = adulte::all()->count();
                $count += Enfant::all()->count();

                // get date today is yesterday
                $today = Carbon::now()->toArray();
                $yesterday = Carbon::yesterday()->toArray();
                // $year  = $lastUser['created_at']->format('Y');
                // $Month = $lastUser['created_at']->format('m');
                $day = $lastUser['created_at']->format('d');
                $day = ($today['day'] > $day ) ? ($today['day'] - $day) *24 : 0;
                $Hour  = $lastUser['created_at']->format('H');
                $lastHour = ( $day == 0 ) ? $today['hour'] - $Hour : ($today['hour'] - $Hour) +  $day  ;

                $today     =  explode(' ' , $today['formatted']) ;
                $today     = $today[0];
                $yesterday = explode(' ' , $yesterday['formatted']) ;
                $yesterday = $yesterday[0];

                // get 
                $adulteAndEnfant = 
                [
                    'adulte' => adulte::query()->get('created_at'),
                    'Enfant' => Enfant::query()->get('created_at')
                ];
                $countToday = 0;
                $countlastday = 0;
                
                foreach($adulteAndEnfant as $elemnt){
                    foreach( $elemnt as $elemntAdulteAndEnfant ){
                        if( $elemntAdulteAndEnfant['created_at']->format('Y-m-d') == $today ){
                            $countToday += 1;
                        }elseif( $elemntAdulteAndEnfant['created_at']->format('Y-m-d') ==  $yesterday){
                            $countlastday += 1;
                        }
                    }
                }
                $calc = ($countToday * 0.1) /  $countlastday ;
                $calc =  ($calc !== 0) ? ($calc *100)*10 : $calc; 
                $calc = number_format($calc) . '%';

                $photo = ( isset($lastUser['photo']) ) ? 'storage/'.$lastUser['photo'].'': 'storage/images/person-fill.svg';
                $count = ($count > 10) ? $count : '0'.$count;
                $lastHour = ($lastHour > 10) ? $lastHour : '0'.$lastHour;
                $idClient = ($lastUser['idClient'] > 10) ? $lastUser['idClient'] : '0'.$lastUser['idClient'];
                $html = '
                        <div class="user ms-2 d-flex">
                        <img src="'.$photo.'" class="image me-3" alt="">
                        <span class="d-flex  flex-column align-items-center">'.$lastUser['UserName'].'<b
                                class="gree">'.$idClient.'</b> </span>
                    </div>
                    <div class="total mt-2 d-flex justify-content-between align-items-center w-100">
                        <div class="title text-center ">
                            <h6>Totla User</h6>
                            <h5 class="">'.$count.'</h5>
                        </div>
                        <div class="donne position-relative display-flex-center">
                            <svg>
                                <circle cx="37" cy="37" r="33"></circle>
                            </svg>
                            <span class="position-absolute">'.$calc.'</span>
                        </div>

                    </div>
                    <span class="gree last">Last ' . $lastHour  .' Hours</span>
                ';



                // =======================================Docter==============================

                // $Medecin = Medecin::query()->latest()->first();
                // $countDocter = Medecin::all()->count();

                // $day = $Medecin['created_at']->format('d');
                // $day = ($today['day'] > $day ) ? ($today['day'] - $day) *24 : 0;
                // $Hour  = $Medecin['created_at']->format('H');
                // $lastHour = ( $day == 0 ) ? $today['hour'] - $Hour : ($today['hour'] - $Hour) +  $day  ;

                

                return response()->json( $html);
    }

    public function daily(){
        $read = daily::query()->latest()->get();
        $html = '';
        for( $i = count($read) - 1 ; $i > count($read) - 3 ; $i-- ){
            $ControllerDaily = new ControllerDaily;
            $HourStart = $ControllerDaily->time12($read[$i]['HoureStart']);
            $HoureFin = $ControllerDaily->time12($read[$i]['HoureFin']);

           $html .= '
           <div class="subBox horaire H-tow bodySection d-grid  align-items-center">
           <span class="time s-time"> <b>'.$HourStart.'</b></span>
           <span class="name name-user">'.$read[$i]['UserNameUser'].'</span>
           <span class="name name-doctor">'.$read[$i]['UserNameDocter'].'</span>
           <span class="para">'.$read[$i]['description'].'</span>
           <span class="time e-time"><b>'. $HoureFin.'</b></span>
        </div>
           ';
        }
        return response()->json($html);
    }
}
