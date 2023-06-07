<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adulte;
use App\Models\Enfant;
use App\Models\parentenfant;
use Ramsey\Uuid\Type\Integer;

class ControllerUsers extends Controller
{
    public function index()
    {
        return view('layout.listUser');
    }
    //create new User
    public function store(Request $request)
    {
        $typeClinent = $request->typeClient;
        $Medecin = " ";
        foreach ($request->MedecinChild as $key => $index) {
            $Medecin   .= $request->MedecinChild[$key] . " - ";
        }
        $Diagnostique = " ";
        foreach ($request->Diagnostic as $key => $index) {
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
    // Show One User in Use IdCLient
    public function show($idShow)
    {
        $data = adulte::where('idClient', $idShow)->first();
        $html = "";
        if (isset($data)) {
            $image =  $data->photo;
            if(!isset($image)){
                $image = 'images/person-fill.svg';
            }
            $html .= '<div class="box-create position-relative">
                <span class="close display-flex-center" onclick="showUser();"><i class="bi bi-x-lg"></i></span>
                <form action="" class="overflow-hidden w-100" method="">
                    <div class="info-users h-100 sub-box-create overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            Adulte </div>
                        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
                            <input type="file" Id="click" accept="image/*" class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="storage/' . $image. '" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
                            <input type="text" name="fullName" placeholder="NomPrenom" value="' . $data->nom . ' ' .  $data->Prenom . '" class ="text-capitalize">
                        </div>
                        <div class="perant w-100 display-flex-center mt-4">
                            <div class="allInformation d-flex flex-column">
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Sexe : </span>
                                    <input type="text" name="sexe" placeholder="Sexe" value="' . $data->Sexe . '">
                                </div>
                                <div class="data textAndInput noParmiter w-100 align-items-center">
                                    <span for="" class="me-4">Data de Naissance : </span>
                                    <input type="text" name="dataNaissance" placeholder="mm / dd / yyyy"
                                        value="' . $data->DateNaissance . '">
                                </div>
                                <div class="tel textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Tel : </span>
                                    <input type="text" name="tel" placeholder="Tel" value="' . $data->tel . '">
                                </div>
                                <div class="Address textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Address : </span>
                                    <input type="text" name="Address" placeholder="' . $data->Address . '"
                                        value="casa droua massira">
                                </div>
                                <div class="Medecin textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Medecin : </span>
                                    <input type="text" name="Medecin" placeholder="Medecin" value="' . $data->Medecin . '">
                                </div>
                                <div class="created_at textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">created ' . $data->type . ' : </span>
                                    <input type="text" name="Medecin" placeholder="Medecin" value="' . $data->created_at . '" readonly>
                                </div>
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique
                                </div>

                                <div class="upDiagnostic d-grid mt-2   ">
                                    <div class="subDiagnostic-one  p-3">

                                        <div class="form-check form-switch ">
                                            <input class="form-check-input" name="Diagnostic[]" value="Kinesitherapie"
                                                type="checkbox" id="Kinesitherapie" checked>
                                            <label class="form-check-label">Kinesitherapie</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Psychomotricite"
                                                type="checkbox" id="Psychomotricite">
                                            <label class="form-check-label" for="Psychomotricite">Psychomotricite</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Orthophonie"
                                                type="checkbox" id="Orthophonie">
                                            <label class="form-check-label" for="Orthophonie">Orthophonie</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Orthoptie"
                                                type="checkbox" id="Orthoptie">
                                            <label class="form-check-label" for="Orthoptie">Orthoptie</label>
                                        </div>
                                    </div>
                                    <div class="subDiagnostic-tow  p-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]"
                                                value="Education_specialis" type="checkbox" id="Education">
                                            <label class="form-check-label" for="Education">Education
                                                specialise</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]"
                                                value="Formation_continue" type="checkbox" id="Formation">
                                            <label class="form-check-label" for="continue">Formation
                                                continue</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Psychologie"
                                                type="checkbox" id="Psychologie">
                                            <label class="form-check-label" for="Psychologie">Psychologie</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Neuropsychologie"
                                                type="checkbox" id="Neuropsychologie">
                                            <label class="form-check-label"
                                                for="Neuropsychologie">Neuropsychologie</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="delete mb-1 mt-4 ">
                                    <a href="#" onclick = "deletUser(' . $data->idClient . ')" class="link-danger text-capitalize text-decoration-underline">Delete
                                        user ' . $data->nom . ' ' .  $data->Prenom . '</a>
                                </div>

                                <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                                    <span class="btn-button next gree me-4 gree-background  text-white"
                                        onclick="showUser();">Colse</span>
                                    <span class="btn-button next">Save</span>
                                </div>

                            </div>
                        </div>




                    </div>

                </form>
            </div>';


            return response()->json(['show' => $html]);
        }
        $data = $readDataEnfant = Enfant::query()
            ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
            ->where('enfants.idClient', $idShow)
            ->get();
        if (isset($data)) {
            foreach ($data as $key => $index) {
                $image = $index['photo'];
                if(!isset($image)){
                    $image = 'images/child.svg';
                }
                $html .= '<div class="box-create position-relative">
                <span class="close display-flex-center" onclick="showUser();"><i class="bi bi-x-lg"></i></span>
                <form action="" class="overflow-hidden w-100" method="">
                    <div class="info-users h-100 sub-box-create overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            ' . $index['type'] . ' </div>
                        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
                            <input type="file" Id="click" accept="image/*" class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="storage/' . $image . '" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
                            <input type="text" name="fullName" placeholder="NomPrenom" value="' . $index['nom'] . ' ' .  $index['Prenom'] . '" class ="text-capitalize">
                        </div>
                        <div class="perant w-100 display-flex-center mt-4">
                            <div class="allInformation d-flex flex-column">
                                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Sexe : </span>
                                    <input type="text" name="sexe" placeholder="Sexe" value="' . $index['Sexe'] . '">
                                </div>
                                <div class="data textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Data de Naissance : </span>
                                    <input type="text" name="dataNaissance" placeholder="mm / dd / yyyy"
                                        value="' . $index['DateNaissance'] . '">
                                </div>
                                <div class="tel textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Tel : </span>
                                    <input type="text" name="tel" placeholder="Tel" value="' . $index['tel'] . '">
                                </div>
                                <div class="Medecin textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Medecin : </span>
                                    <input type="text" name="Medecin" placeholder="Medecin" value="' . $index['Medecin'] . '">
                                </div>
                              
                                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique
                                </div>

                                <div class="upDiagnostic d-grid mt-2   ">
                                    <div class="subDiagnostic-one  p-3">

                                        <div class="form-check form-switch ">
                                            <input class="form-check-input" name="Diagnostic[]" value="Kinesitherapie"
                                                type="checkbox" id="Kinesitherapie" checked>
                                            <label class="form-check-label">Kinesitherapie</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Psychomotricite"
                                                type="checkbox" id="Psychomotricite">
                                            <label class="form-check-label" for="Psychomotricite">Psychomotricite</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Orthophonie"
                                                type="checkbox" id="Orthophonie">
                                            <label class="form-check-label" for="Orthophonie">Orthophonie</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Orthoptie"
                                                type="checkbox" id="Orthoptie">
                                            <label class="form-check-label" for="Orthoptie">Orthoptie</label>
                                        </div>
                                    </div>
                                    <div class="subDiagnostic-tow  p-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]"
                                                value="Education_specialis" type="checkbox" id="Education">
                                            <label class="form-check-label" for="Education">Education
                                                specialise</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]"
                                                value="Formation_continue" type="checkbox" id="Formation">
                                            <label class="form-check-label" for="continue">Formation
                                                continue</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Psychologie"
                                                type="checkbox" id="Psychologie">
                                            <label class="form-check-label" for="Psychologie">Psychologie</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="Diagnostic[]" value="Neuropsychologie"
                                                type="checkbox" id="Neuropsychologie">
                                            <label class="form-check-label"
                                                for="Neuropsychologie">Neuropsychologie</label>
                                        </div>
                                    </div>
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
                                <input type="text" name="dataNaissance" placeholder="mm / dd / yyyy"
                                    value="' . $index['DateNaissanceParent'] . '">
                                </div>
                                <div class="tel textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">Tel : </span>
                                <input type="text" name="tel" placeholder="Tel" value="' . $index['telParent'] . '">
                                </div>

                                <div class="Address textAndInput noParmiter w-100  align-items-center">
                                    <span for="" class="me-4">Address : </span>
                                    <input type="text" name="Address" placeholder="' . $index['Address'] . '"
                                        value="casa droua massira">
                                </div>

                                <div class="created_at textAndInput noParmiter w-100  align-items-center">
                                <span for="" class="me-4">created ' . $index['type'] . ' : </span>
                                <input type="text" name="Medecin" placeholder="Medecin" value="' . $index['created_at'] . '" readonly>
                            </div>
                 

                                <div class="delete mb-1 mt-4 ">
                                    <a href="#" onclick = "deletUser(' . $index['idClient'] . ')" class="link-danger text-capitalize text-decoration-underline">Delete
                                        user ' . $index['nom'] . ' ' .  $index['Prenom'] . '</a>
                                </div>

                                <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                                    <span class="btn-button next gree me-4 gree-background  text-white"
                                        onclick="showUser();">Colse</span>
                                    <span class="btn-button next">Save</span>
                                </div>

                            </div>
                        </div>




                    </div>

                </form>
            </div>';
            }

            return response()->json(['show' => $html]);
        }
    }
    public function search(Request $request){
        // $DataSearch = $request->search;
        if($request->ajax()){
            $searchAdulte = adulte::query()->where('nom' , 'LIKE' , '%'.$request->search.'%' )
            ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('DateNaissance' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('tel' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('idClient' , 'LIKE' , '%'.$request->search.'%')
            ->orWhere('Address' , 'LIKE' , '%'.$request->search.'%')
            ->get();
            $searchEnfant = Enfant::query()
            ->join('parentenfants', 'enfants.idParent', '=', 'parentenfants.id')
            ->where('nom' , 'LIKE' , '%'.$request->search.'%'  ) 
            ->orWhere('Prenom' , 'LIKE' , '%'.$request->search.'%')
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
}
