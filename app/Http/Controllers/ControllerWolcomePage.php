<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use Carbon\Carbon;
use App\Models\Enfant;
use App\Models\adulte;

class ControllerWolcomePage extends Controller
{
    //================================store=======Comment=========================


    public function store(Request $request){

        if( isset($request->UserName) && isset($request->CommentText) && isset($request->number) &&  $request->number <= 10){
            $filePath = null;
            if (isset($request->imageUsers)) {
                $file = $request->file('imageUsers');
                $fileName = time() . '' . $file->getClientOriginalName();
                $filePath = $file->storeAs('ImageCommente', $fileName, 'public');
            }
            $data = [
              'photo' => $filePath ,
              'UserName'  => $request->UserName, 
              'commentaire' => $request->CommentText, 
              'Evaluation' => $request->number
            ];
            $create = comment::create($data);
            return response()->json(['UserName'=>$request->UserName , 'Evale'=>$request->number]);
        }
        dd($data);

    }

    // ===========================================show==============================

    public function show(){
        $read = comment::all();

        if( isset($read) ){
            $i = 0;
            $j = 0;
            $k = 0;
            $html1 = ' <button class="btn-button plusMore"></button> <ul class="commentListOne"> ';
            $html2 = '<ul class="commentListOne">';
            $html3 = '<ul class="commentListOne">';
            // foreach( $read as $key => $element ){
                for( $m = count($read) - 1 ; $m > 0 ; $m-- ){
                $namePhoto = $read[$m]->photo;
                $photoPath = ($namePhoto !== null) ? '<img src="storage/' . $namePhoto . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
               $foramteDate=  $read[$m]->created_at->format('d/m/Y');
                if( $i == $j &&  $k == $i ){
                    $html1 .= '
                     <li>
                        <div class="user user1">
                            <div class="profile mb-2 display-flex-spece-between">
                                <div class="image display-flex-spece-between">
                                    <span>'. $photoPath .'</span>
                                    <span class="display-flex-center flex-column">'.$read[$m]->UserName.' <span> <i
                                                class="bi bi-star-fill"></i> '.$read[$m]->Evaluation.'/10 </span> </span>
                                </div>
                                <span>'.$foramteDate.'</span>
                            </div>
                            <p class="com"> '.$read[$m]->commentaire.' </p>
                        </div>

                    </li>
                    ';
                    $i++;
                }else if( $j <= $i && $j == $k ){
                    $html2 .= '
                    <li>
                    <div class="user user1">
                        <div class="profile mb-2 display-flex-spece-between">
                            <div class="image display-flex-spece-between">
                                <span>'. $photoPath .'</span>
                                <span class="display-flex-center flex-column">'.$read[$m]->UserName.' <span> <i
                                            class="bi bi-star-fill"></i> '.$read[$m]->Evaluation.'/10 </span> </span>
                            </div>
                            <span>'.$foramteDate.'</span>
                        </div>
                        <p class="com"> '.$read[$m]->commentaire.' </p>
                    </div>

                </li>
                   ';
                   $j++;
                }else if($k <= $i && $k <= $j){
                    $html3 .= '
                    <li>
                    <div class="user user1">
                        <div class="profile mb-2 display-flex-spece-between">
                            <div class="image display-flex-spece-between">
                                <span>'. $photoPath .'</span>
                                <span class="display-flex-center flex-column">'.$read[$m]->UserName.' <span> <i
                                            class="bi bi-star-fill"></i> '.$read[$m]->Evaluation.'/10 </span> </span>
                            </div>
                            <span>'.$foramteDate.'</span>
                        </div>
                        <p class="com"> '.$read[$m]->commentaire.' </p>
                    </div>

                </li>
                   ';
                   $k++;
                }
            }

            $html1 .= '</ul>';
            $html2 .= '</ul>';
            $html3 .= '</ul>';
            
            $html = $html1 . ' ' . $html2 . ' ' . $html3; 

        // }
    }

        return response()->json($html);
    }

    // ==============================Stats===========================================

    public function Stats(){
        $count = Enfant::all()->count();
        $count += adulte::all()->count();
        $count = ($count < 10 ) ? "0$count" : $count;
        $Happy = comment::query()->where('Evaluation' , '>=' , '5')->count();
        $Five  = comment::query()->get('Evaluation');
        $stars = 0;
        foreach( $Five as $element ){
            $stars += $element->Evaluation;
        }
        $countCommant = comment::all()->count();
        $stars = round( $stars / $countCommant , 2) ;

        return response()->json(['count'=>$count , 'Happy'=>$Happy , 'stars' => $stars ]);
        
    }

}
