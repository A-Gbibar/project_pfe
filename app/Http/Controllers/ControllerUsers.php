<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;
use App\Models\CreatLogin;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Medecin;

class ControllerUsers extends Controller
{

    public function index()
    {
        return view('layout.listUser');
    }

    //======================================= sorte Passworde =================================

    public function sorteLogin($id , $UserName , $type){
        $random_password = Str::random(10);
        $check = CreatLogin::all();
        if( isset($ckeck) ){
            foreach($check as $key=>$element){
                if( $element['login'] == $random_password ){
                    $random_password = Str::random(10);
                    continue;
                }else{
                    $random_password = Str::random(10);
                    break;
                }
            }
        } 
        $idAdulte = null;
        $idEnfant = null;
        if($type === "Adulte"){
            $idAdulte = $id;
        }else if( $type == "Enfant" ){
            $idEnfant = $id;
        }
        $data = [
            'idAdulte'=>$idAdulte,
            'idEnfant'=>$idEnfant,
            'UserName'=>$UserName,
            'login'=>$random_password,
        ];
        $create = CreatLogin::create($data);
    }

    public function Restart($id){
        $random_password = Str::random(10);
        $check = CreatLogin::all();
        $idClient = CreatLogin::where("idAdulte" , $id)->first();
        $idClient = ($idClient !== null) ? $idClient : CreatLogin::where("idEnfant" , $id)->first();
        if( isset( $idClient) ){
            foreach($check as $key=>$element){
                if( $element['login'] == $random_password ){
                    $random_password = Str::random(10);
                    continue;
                }else{
                    $random_password = Str::random(10);
                    break;
                }
            }
            $update = $idClient->update([
                'login' => $random_password
            ]);
            return response()->json($update);
        } 
    }

    //create new User
    public function store(Request $request)
    {
        $typeClinent = $request->typeClient;
        $Medecin = " ";
        foreach ($request->MedecinChild as $key => $index) {
            if( count($request->MedecinChild) - 1 == $key  ){
                $Medecin   .= $request->MedecinChild[$key] ;
                break;
            }
          $Medecin   .= $request->MedecinChild[$key] . " - ";
        }
        $Diagnostique = " ";
        foreach ($request->Diagnostic as $key => $index) {
            if( count($request->Diagnostic) - 1 == $key  ){
                $Diagnostique  .= $request->Diagnostic[$key] ;
                break;
            }
            $Diagnostique  .= $request->Diagnostic[$key] . " - ";
        }
       
        $Enfant = new Enfant;
        $parentEnfant = new parentEnfant;
        $adulte = new adulte;
        //create Id in Users
        $idEnfant = Enfant::query()->get('idClient')->last();
        $idAdulte = adulte::query()->get('idClient')->last();
        if (isset($idAdulte) || isset($idEnfant)) {
            $idAdulte = isset($idAdulte->idClient) ? $idAdulte->idClient : 0;
            $idAdulte += 1;
            $idEnfant = isset($idEnfant->idClient) ? $idEnfant->idClient : 0;
            $idEnfant += 1;
        } else {
            $idAdulte = 1;
        }
        $idUnique = ($idAdulte > $idEnfant) ? $idAdulte : $idEnfant;

        if ($typeClinent === "Enafant") {
            $parentEnfant->typeParent = $request->typeParent;
            $parentEnfant->nomParent = $request->nomParent;
            $parentEnfant->PrenomParent = $request->PrenomParent;
            $parentEnfant->CINE = $request->CINEParent;
            $parentEnfant->DateNaissanceParent = $request->datenationParent;
            $parentEnfant->telParent = $request->TelParent;
            $parentEnfant->Address = $request->AddressParent;
            $parentEnfant->save();
            if (isset($request->imagechild)) {
                $file = $request->file('imagechild');
                $fileName = time() . '' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $fileName, 'public');
                $Enfant->photo = $filePath;
            }
            $Enfant->idClient = $idUnique;
            $Enfant->idParent = $parentEnfant->id;
            $Enfant->type     = 'Enfant';
            $Enfant->nom =  $request->nomChild;
            $Enfant->Prenom =  $request->PrenomChild;
            $Enfant->UserName = $request->nomChild . ' ' . $request->PrenomChild;
            $this->sorteLogin($idUnique , $request->nomChild . ' ' . $request->PrenomChild , "Enfant" );
            $Enfant->Sexe =  $request->sexechild;
            $Enfant->DateNaissance =  $request->datechild;
            $Enfant->tel =  $request->Telchild;
            $Enfant->Medecin = $Medecin;
            $Enfant->Diagnostique = $Diagnostique;
            $Enfant->save();
            return response()->json($Enfant);
        } else if ($typeClinent === "Adulte") {
            $adulte->idClient = $idUnique;
            $adulte->type     = 'Adulte';
            $adulte->nom = $request->nomAdulte;
            $adulte->Prenom = $request->PrenomAdulte;
            $adulte->UserName = $request->nomAdulte . ' ' . $request->PrenomAdulte;
            $this->sorteLogin($idUnique , $request->nomAdulte . ' ' . $request->PrenomAdulte , "Adulte" );

            $adulte->CINE = $request->CINEAdulte;
            $adulte->Sexe     = $request->sexe;
            $adulte->DateNaissance = $request->dateAdulte;
            $adulte->tel = $request->telAdulte;
            $adulte->Address = $request->AddressAdulte;
            $adulte->Diagnostique = $Diagnostique;
            $adulte->Medecin = $Medecin;
            if (isset($request->imageAdulte)) {
                $file = $request->file('imageAdulte');
                $fileName = time() . '' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $fileName, 'public');
                $adulte->photo = $filePath;
            }
            $adulte->save();
            return response()->json($adulte);
        } else {
            return redirect()->route('List-clients.index');
        }
    }
    // read Data In Enfant And Adult
    public function readData()
    {
        $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $limit = 10;
        $start = ($page - 1 )*$limit;
        $readDataAdulte = adulte::all();
        $readDataEnfant = Enfant::query()
            ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
            ->get();
        $readData = [
            'adulte' => $readDataAdulte,
            'Enfant' => $readDataEnfant
        ];
        
        return response()->json($readData);
    }

    // ========================== Show Diagnostique  ===================================

    public function showDiagnostique($typeDiagnostique){

        $ExplodeDiagnostique =  explode('-' ,   trim($typeDiagnostique , " " ));
        $textDiagnostique = ['Kinesitherapie'  , 'Psychomotricite' , 'Orthophonie' , 'Orthoptie' , 'Education_specialis' ,
                            'Formation_continue' , 'Psychologie' , 'Neuropsychologie']; 
        $DiagnostiqueHTML = '';
        $countTextDiagnostique =count($textDiagnostique);
        for( $i = 0 ; $i <  $countTextDiagnostique ; $i++ ){
      
            if(  $i  < count($ExplodeDiagnostique)   ){
                $DiagnostiqueHTML .=  '
                <div class="form-check form-switch ">
                    <input class="form-check-input" name="Diagnostic[]" value="'.$ExplodeDiagnostique[$i].'"
                        type="checkbox" id="'.$ExplodeDiagnostique[$i].'" checked>
                    <label class="form-check-label">'. $ExplodeDiagnostique[$i] .'</label>
                </div>
                ' ;
                for( $j = 0 ; $j < count($ExplodeDiagnostique) ;$j++  ){
                    for( $k = $j ; $k < $countTextDiagnostique ; $k++ ){
                        if($ExplodeDiagnostique[$j] == $textDiagnostique[$k] ){
                            for( $m = $k ; $m < $countTextDiagnostique ; $m++ ){
                                 $textDiagnostique[$m] = @$textDiagnostique[$m + 1 ];
                                }
                            }
                        }
                    }
                    $countTextDiagnostique--; 
            }
                $DiagnostiqueHTML .= '
                <div class="form-check form-switch ">
                    <input class="form-check-input" name="Diagnostic[]" value="'.$textDiagnostique[$i].'"
                        type="checkbox" id="'.$textDiagnostique[$i].'" >
                    <label class="form-check-label">'.$textDiagnostique[$i].'</label>
                </div>
                ';  
               
             
        }

        return   $DiagnostiqueHTML ;

    }

    // Show One User in Use IdCLient
    public function show($idShow)
    {
        $data = adulte::where('idClient', $idShow)->first();
        $html = "";
        if (isset($data)) {
            $image =  $data->photo;
            $createLogin = CreatLogin::where("idAdulte" , $idShow)->first();
            if(!isset($image)){
                $image = 'images/person-fill.svg';
            }
            // =============================== get Diagnostique in style checkbox =====================================
            $ControllerUsers = new ControllerUsers;
            $DiagnostiqueHTML  =  $ControllerUsers->showDiagnostique($data->Diagnostique);
            // dd($DiagnostiqueHTML);
            // ========================================================================================================

            $html .= '
                        <input type = "hidden" name = "typeUser" value = "'. $data->type .'">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                        '. $data->type .' </div>
                        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
                            <input type="file" name = "imageAdulte" Id="click" accept="image/*" class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="storage/' . $image. '" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
                            <input type="text" readOnly name="fullName" placeholder="NomPrenom" value="' . $data->nom . ' ' .  $data->Prenom . '" class ="text-capitalize">
                        </div>
                        <div class="perant w-100 display-flex-center mt-4">
                            <div class="allInformation d-flex flex-column">
                            
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Nom : </span>
                                    <input type="text" name="nomAdulte" placeholder="Nom" value="' . $data->nom . '">
                                </div>
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Prenom : </span>
                                    <input type="text" name="PrenomAdulte" placeholder="Prenom" value="' . $data->Prenom . '">
                                </div>
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">CINE : </span>
                                    <input type="text" name="CINEAdulte" placeholder="CINE" value="' . $data->CINE . '">
                                </div>
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Sexe : </span>
                                    <input type="text" name="sexe" placeholder="Sexe" value="' . $data->Sexe . '">
                                </div>
                                <div class="data textAndInput noParmiter w-100 align-items-center">
                                    <span for="" class="me-4">Data de Naissance : </span>
                                    <input type="date" name="dateAdulte" placeholder="mm / dd / yyyy"
                                        value="' . $data->DateNaissance . '">
                                </div>
                                <div class="tel textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Tel : </span>
                                    <input type="text" name="telAdulte" placeholder="Tel" value="' . $data->tel . '">
                                </div>
                                <div class="Address textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Address : </span>
                                    <input type="text" name="AddressAdulte" placeholder="Address"
                                        value="' . $data->Address . '">
                                </div>
                                <div class="Medecin textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Medecin : </span>
                                    <input type="text" name="MedecinChild" placeholder="Medecin" value="' . $data->Medecin . '">
                                </div>
                                <div class="created_at textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">created ' . $data->type . ' : </span>
                                    <input type="text" name="Medecin" redOnly placeholder="Medecin" value="' . $data->created_at . '" readonly>
                                </div>
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique
                                </div>

                                <div class="upDiagnostic d-grid mt-2   ">
                                 
                                        '. $DiagnostiqueHTML .'
                                  
                                </div>
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Connexion
                                </div>

                                <div class="UserName textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">Nom d\'utilisateur : </span>
                                <input type="text"  readonly  value="' . $createLogin->UserName . '">
                                
                             </div>
    
    
                         <div class="Login textAndInput noParmiter w-100  align-items-center" id="Login">
                          <span for="" class="me-4">Login : </span>
                          <input type="text" readonly value="' . $createLogin->login . '">
                            <span onclick = "warning(`vous êtes abattu connexion Client` , `Restart` , `' . $data->nom . ' ' .  $data->Prenom . '` , `'.$data->idClient.'` );" ><i class="bi bi-arrow-clockwise"></i></span>
                        </div>
                     

                                <div class="delete mb-1 mt-4 ">
                                    <a href="#" data-type = "'.$data->type.'" data-userName = "' . $data->nom . ' ' .  $data->Prenom . '"
                                    data-cine="'. $data->CINE .'"  onclick = "warning(`your are shor Delet Client` , `Delet` , `' . $data->nom . ' ' .  $data->Prenom . '` , `'.$data->idClient.'`);"
                                      class="link-danger text-capitalize text-decoration-underline deletUsers">Delete
                                        user ' . $data->nom . ' ' .  $data->Prenom . '</a>
                                </div>

                

                                <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                                    <span class="btn-button next gree me-4 gree-background  text-white"
                                        onclick="showUser();">Colse</span>
                                        <span class="buttonUpdata btn-button next" id="'.$data->idClient.'" 
                                         onclick = "warning(`vous êtes abattu Mettre à jour le client` , `Update` , `' . $data->nom . ' ' .  $data->Prenom . '`);"
                                        >Update</span>
                                        <!--    <input type="submit"  class="buttonUpdata btn-button next" id="'.$data->idClient.'" value="Update">-->

                                  <!--  <button class="buttonUpdata btn-button next" id="'.$data->idClient.'" type = "submit" >Save</button> -->
                                </div>

                            </div>
                        </div>
                    ';


            return response()->json(['show' => $html]);
        }
        $data = $readDataEnfant = Enfant::query()
            ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
            ->where('enfants.idClient', $idShow)
            ->get();

        $ControllerUsers = new ControllerUsers;
        $DiagnostiqueHTML  =  $ControllerUsers->showDiagnostique($data[0]->Diagnostique);

        if (isset($data)) {
            $createLogin = CreatLogin::where("idEnfant" , $idShow)->first();
            foreach ($data as $key => $index) {
                $image = $index['photo'];
                if(!isset($image)){
                    $image = 'images/child.svg';
                }
                // // =============================== get Diagnostique in style checkbox =====================================

                $html .= '
                        <input type = "hidden" name = "typeUser" value = "'. $index['type'] .'">

                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            ' . $index['type'] . ' </div>
                        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
                            <input type="file" Id="click" accept="image/*" class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="storage/' . $image . '" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
                            <input type="text" readOnly  placeholder="NomPrenom" value="' . $index['nom'] . ' ' .  $index['Prenom'] . '" class ="text-capitalize">
                        </div>
                        <div class="perant w-100 display-flex-center mt-4">
                            <div class="allInformation d-flex flex-column">
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Nom : </span>
                                    <input type="text" name="nomChild" placeholder="Nom" value="' . $index['nom'] . '">
                                </div>
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">PrenomChild : </span>
                                    <input type="text" name="PrenomChild" placeholder="Prenom" value="' . $index['Prenom'] . '">
                                </div>
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Sexe : </span>
                                    <input type="text" name="sexechild" placeholder="Sexe" value="' . $index['Sexe'] . '">
                                </div>
                                <div class="data textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Data de Naissance : </span>
                                    <input type="date" name="datechild" placeholder="mm / dd / yyyy"
                                        value="' . $index['DateNaissance'] . '">
                                </div>
                                <div class="tel textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Tel : </span>
                                    <input type="text" name="Telchild" placeholder="Tel" value="' . $index['tel'] . '">
                                </div>
                                <div class="Medecin textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Medecin : </span>
                                    <input type="text" name="Medecin" placeholder="Medecin" value="' . $index['Medecin'] . '">
                                </div>
                              
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique
                                </div>

                                <div class="upDiagnostic d-grid mt-2   ">
                                    '. $DiagnostiqueHTML.'
                                </div>
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Information ' . $index['typeParent'] . ' </div>
                                <div class="nomParent textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">Nom  : </span>
                                <input type="text" name="nomParent" placeholder="Nom Parent" value="' . $index['nomParent'] . '">
                                </div>
                                <div class="PrenomParent textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">Prenom  : </span>
                                <input type="text" name="PrenomParent" placeholder="Prenom Parent" value="' . $index['PrenomParent'] . '">
                                </div>
                                <div class="data textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">Data de Naissance : </span>
                                <input type="date" name="dataNaissanceParent" placeholder="mm / dd / yyyy"
                                    value="' . $index['DateNaissanceParent'] . '">
                                </div>
                                <div class="CINE textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">CINE: </span>
                                <input type="text" name="CINE" placeholder="CINE"
                                    value="' . $index['CINE'] . '">
                                </div>
                               
                                <div class="tel textAndInput noParmiter w-100  align-items-center">

                                        <span for="" class="me-4">Tel : </span>
                                        <input type="text" name="tel" placeholder="Tel" value="' . $index['telParent'] . '">

                                </div>

                                <div class="Address textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Address : </span>
                                    <input type="text" name="Address" placeholder="Address"
                                        value="' . $index['Address'] . '">
                                </div>

                                <div class="created_at textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">created ' . $index['type'] . ' : </span>
                                <input type="text" readOnly name="created_at" placeholder="Medecin" value="' . $index['created_at'] . '" readonly>
                            </div>

                      
                            <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Connexion
                            </div>

                            <div class="UserName textAndInput noParmiter w-100  align-items-center">
                            <span for="" class="me-4">Nom d\'utilisateur : </span>
                            <input type="text"  readonly  value="' . $createLogin->UserName . '">
                            
                         </div>


                     <div class="Login textAndInput noParmiter w-100  align-items-center" id="Login">
                      <span for="" class="me-4">Login : </span>
                      <input type="text" readonly value="' . $createLogin->login . '">
                        <span onclick = "warning(`vous êtes abattu connexion Client` , `Restart` , `' . $index['nom'] . ' ' .  $index['Prenom'] . '` , `'.$index['id'].'` );" ><i class="bi bi-arrow-clockwise"></i></span>
                    </div>

                                <div class="delete mb-1 mt-4 ">
                                    <a href="#" data-type = "'.$index['type'].'" data-userName = "' . $index['nom'] . ' ' .  $index['Prenom'] . '"
                                    data-cine="'. $index['CINE'] .'" 
                                     onclick = "warning(`your are shor Delet Client` , `Delet` , `' . $index['nom'] . ' ' .  $index['Prenom'] . '` , `'.$index['idClient'].'`);"" class="link-danger text-capitalize text-decoration-underline">Delete
                                        user ' . $index['nom'] . ' ' .  $index['Prenom'] . '</a>
                                </div>

                                <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                                    <span class="btn-button next gree me-4 gree-background  text-white"
                                        onclick="showUser();">Colse</span>
                                        <span class="buttonUpdata btn-button next" id="'.$index['idClient'].'" 
                                        onclick = "warning(`your are shor Update Client` , `Update` , `' . $index['nom'] . ' ' .  $index['Prenom'] . '`);"
                                       >Update</span>
                                        <!-- <input type="submit"  class="buttonUpdata btn-button next" id="'.$index['idClient'].'" value="Save"> -->
                                </div>

                            </div>
                        </div>';
            }
            // <div class="box-create position-relative">
            //     <span class="close display-flex-center" onclick="showUser();"><i class="bi bi-x-lg"></i></span>
            //     <form id = "updateEnfants" enctype="multipart/form-data" class="overflow-hidden w-100">

            return response()->json(['show' => $html]);
        }
    }

    // function this search users
    public function search(Request $request){
        // $DataSearch = $request->search;
        if($request->ajax()){
            $searchAdulte = adulte::query()->where('nom' , 'LIKE' , '%'.$request->search.'%' )
            ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('UserName' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('DateNaissance' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('tel' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('idClient' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('Address' , 'LIKE' , '%'.$request->search.'%')
            ->get();
            $searchEnfant = Enfant::query()
            ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
            ->where('nom' , 'LIKE' , '%'.$request->search.'%'  ) 
            ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('UserName' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('DateNaissance' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('tel' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('idClient' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('Address' , 'LIKE' , '%'.$request->search.'%')
            ->get();
            $DataSearch = [
                'Adulte' => $searchAdulte,
                'Enfant' => $searchEnfant
            ];
            return response()->json($DataSearch);
        }

    }
    
    // ====================Update==========Adult====================
    // update user
    public function updateAdulte($id , Request $request ){
        if(isset($request )){

        $Diagnostique = " ";
        foreach ($request->Diagnostic as $key => $index) {
            if( count($request->Diagnostic) - 1 == $key  ){
                $Diagnostique  .= $request->Diagnostic[$key] ;
                break;
            }
            $Diagnostique  .= $request->Diagnostic[$key] . " - ";
        }

        if( $request->typeUser == "Adulte" ){
            $getSingle = adulte::query()->where('idClient' , $id)->first();

            $changeData = 
            [
                'nom' => $request->nomAdulte, 
                'Prenom' => $request->PrenomAdulte, 
                'CINE' => $request->CINEAdulte, 
                'Sexe' => $request->sexe, 
                'DateNaissance' => $request->dateAdulte, 
                'tel' => $request->telAdulte, 
                'Address' => $request->AddressAdulte, 
                'Medecin' => $request->MedecinChild, 
                'Diagnostique' => $Diagnostique, 
            ];

           $update =  $getSingle->update($changeData);
            return response()->json( [ 
                'UserName' => $request->nomAdulte . ' ' . $request->PrenomAdulte , 
                'CINE' => $request->CINEAdulte] );
        }else if( $request->typeUser == "Enfant" ){

            $getSingleEnfant = Enfant::query()->where('idClient' , $id)->first();
            $getSingleParent = parentenfant::query()->where('id' , $getSingleEnfant->idParent )->first();

            $changeDataEnfant = 
            [
                'nom' => $request->nomChild, 
                'Prenom' => $request->PrenomChild, 
                'Sexe' => $request->sexechild, 
                'DateNaissance' => $request->datechild, 
                'tel' => $request->Telchild, 
                'Medecin' => $request->Medecin, 
                'Diagnostique' => $Diagnostique, 
            ];
            $changeDataParent = 
            [
                'nomParent' => $request->nomParent, 
                'PrenomParent' => $request->PrenomParent, 
                'CINE' => $request->CINE, 
                'DateNaissanceParent' => $request->dataNaissanceParent, 
                'telParent' => $request->tel, 
                'Address' => $request->Address, 
            ];

           $updateEnfant =  $getSingleEnfant->update($changeDataEnfant);
           $updateParent =  $getSingleParent->update($changeDataParent);
            return response()->json( $updateEnfant , $updateParent  );

        }
        
    }

    }

    //====================Delet==========Users=====================

    public function destroy($id , $type){
        if( $type = "Adulte" ){
            adulte::query()->where('idClient' , $id)->delete();
            return response()->json($type);
        }
    }


    // ===================listDocter==================================

    public function listDocter(){
        $Medecin = Medecin::all();
        $html = '
        <option aria-readonly="readonly" readOnly class="title-select">chose Medecin</option>
    
        ';
        if( isset($Medecin) ){
            foreach($Medecin as $elment){

            $html .= '
            <option value="'.$elment['nom'].' '. $elment['prenom'] .'">'.$elment['nom'].' '. $elment['prenom'] .'</option>
            ';
        }

            return response()->json($html);
        }

    }
 

}
