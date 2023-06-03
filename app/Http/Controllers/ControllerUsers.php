<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;
use Ramsey\Uuid\Type\Integer;

class ControllerUsers extends Controller
{
    public function index(){
        return view('layout.listUser');
    }
    //create new User
    public function store(Request $request){
        $typeClinent = $request->typeClient;
        $Medecin = " ";
        foreach($request->MedecinChild as $key=>$index){
         $Medecin   .= $request->MedecinChild[$key] . " - " ;
        }
        $Diagnostique = " ";
        foreach($request->Diagnostic as $key=>$index){
            $Diagnostique  .= $request->Diagnostic[$key] . " - " ; 
        }
        $Enfant = new Enfant;
        $parentEnfant = new parentEnfant;
        $adulte = new adulte;
        //create Id in Users
        $idEnfant = Enfant::query()->get('idClient')->last();
        $idAdulte = adulte::query()->get('idClient')->last();
        if(isset($idAdulte) || isset($idEnfant)  ){
            $idAdulte = isset($idAdulte->idClient) ? $idAdulte->idClient : 0;
            $idAdulte += 1;
            $idEnfant =isset($idEnfant->idClient) ? $idEnfant->idClient : 0 ;
            $idEnfant +=1;
        }else{
            $idAdulte = 1;
        }
        $idUnique = ($idAdulte > $idEnfant ) ? $idAdulte : $idEnfant; 
      
        if( $typeClinent === "Enafant" ){
            $parentEnfant->typeParent = $request->typeParent;
            $parentEnfant->nomParent = $request->nomParent;
            $parentEnfant->PrenomParent = $request->PrenomParent;
            $parentEnfant->DateNaissanceParent = $request->datenationParent;
            $parentEnfant->telParent = $request->TelParent;
            $parentEnfant->Address = $request->AddressParent;
            $parentEnfant->save();
            // $file = $request->file('imagechild');
            // $fileName = time() . '' . $file->getClientOriginalName();
            // $filePath = $file->storeAs('imagesEnafant' , $fileName , 'public');
            $Enfant->idClient = $idUnique ;
            $Enfant->idParent = $parentEnfant->id;
            $Enfant->type     = 'Enfant';
            $Enfant->nom =  $request->nomChild;
            $Enfant->Prenom =  $request->PrenomChild;
            $Enfant->Sexe =  $request->sexechild;
            $Enfant->DateNaissance =  $request->datechild;
            $Enfant->tel =  $request->Telchild;
            $Enfant->Medecin = $Medecin;
            $Enfant->Diagnostique = $Diagnostique;
            // $Enfant->photo = $filePath;
            $Enfant->save();
            dd($parentEnfant);

        }else if($typeClinent === "Adulte"){
            $adulte->idClient = $idUnique;
            $adulte->type     = 'Adulte';
            $adulte->nom = $request->nomAdulte;
            $adulte->Prenom = $request->PrenomAdulte;
            $adulte->Sexe	 = $request->sexe;
            $adulte->DateNaissance = $request->dateAdulte;
            $adulte->tel = $request->telAdulte;
            $adulte->Address = $request->AddressAdulte;
            $adulte->Diagnostique = $Diagnostique;
            $adulte->Medecin = $Medecin;
            if($request->file('imageAdulte') != null ){
                $file = $request->file('imageAdulte');
                $fileName = time() . '' . $file->getClientOriginalName();
                $filePath = $file->storeAs('imagesAdult' , $fileName , 'public');
                $adulte->photo = $filePath;
            }
            $adulte->save();
            dd($request);
        }else{
            return redirect()->route('List-clients.index');
        }
    }

    public function readData(){
        $readDataAdulte = adulte::all();
        $readDataEnfant= Enfant::query()
        ->join('parentenfants' , 'enfants.idParent' , '=' , 'parentenfants.id')
        ->get();
        $readData = [
            'adulte' => $readDataAdulte,
            'Enfant' => $readDataEnfant
        ];
        
        return response()->json($readData);
    }
}
