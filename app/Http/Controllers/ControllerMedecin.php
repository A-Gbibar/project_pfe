<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;

class ControllerMedecin extends Controller
{
    // ================= view List Medecin ========================

    public function index()
    {
        return view('layout.listDocter');
    }

    // ================save data =======================
    public function store(Request $request)
    {
        if ($request) {



            $Diagnostique = " ";
            if (isset($request->Diagnostic)) {
                foreach ($request->Diagnostic as $key => $index) {
                    if (count($request->Diagnostic) - 1 == $key) {
                        $Diagnostique  .=  $index;
                        break;
                    }
                    $Diagnostique  .=  $index . "-";
                }
            }

            $filePath = null;
            if (isset($request->imgae)) {
                $file = $request->file('imgae');
                $fileName = time() . '' . $file->getClientOriginalName();
                $filePath = $file->storeAs('imagesMedic', $fileName, 'public');
            }

            $idMedecins = Medecin::query()->latest()->first();
            if(  isset($idMedecins)){
                $idMedecins =  explode(  "-" , $idMedecins->idMedecins  ) ;
                $idMedecins =  $idMedecins[1] + 1;
                $idMedecins =  "M-" . $idMedecins;
            }else{
                $idMedecins = "M-1"; 
            }
       

            $data = [
                'idMedecins' => $idMedecins,
                'nom' => $request->nom,
                'prenom' => $request->Prenom,
                'CINE' => $request->CINE,
                'ville' => $request->Ville,
                'Sexs' => $request->Sexe,
                'DateNaissance' => $request->dateNaissance,
                'tel' => $request->tell,
                'Address' => $request->Address,
                'Diagnostic' => $Diagnostique,
                'photo' => $filePath,
            ];

            $create = Medecin::create($data);

            return response()->json($request);
        }
    }


    // =======================get Tbale Info ==========================

    public function GetTablData($queryArray)
    {
        $htmlCode = '';
        foreach ($queryArray as $key => $index) {
            $photoPath = $index['photo'];
            $photoPath = ($photoPath !== null) ? '<img src="storage/' . $photoPath . '" alt="" class="image">' : '<i class="bi bi-person-fill w-100 h-100"></i>';
            $ExplodeDiagnostic = explode('-', trim($index['Diagnostic']));
            $Diagnostic = implode(" ", $ExplodeDiagnostic);
            if (strlen($Diagnostic) > 19) {
                $Diagnostic = $ExplodeDiagnostic[0] . "...";
            }
            // dd($Diagnostic);

            $tdNull = '';

            for ($i = 0; $i < 10; $i++) {
                $tdNull .= '<td class="ShowProfile"><i class="bi bi-calendar-x-fill"></i></td>';
            }

            $htmlCode .= '
       <div class="accordion item' . $index['id'] . ' accordion-flush h-100" id="accordionFlushExample">

       <div class="accordion-item h-100">
           <h2 class="accordion-header h-100">
               <button class="accordion-button collapsed h-100" type="button" data-bs-toggle="collapse"
                   data-bs-target="#' . $index['id'] . '" aria-expanded="false" aria-controls="flush-collapseOne">
                   <ul class="list-unstyled d-grid h-100 w-100 m-0">
                       <li onclick = "showData(' . $index['id'] . ')">
                       <a href="#" onclick="showUser();">
                               <div class="display-flex-center"><span>Show</span> </div>
                               ' . $photoPath . '
                           </a></li>
                       <li class = "text-capitalize">' . $index['id'] . '</li>
                       <li class = "text-capitalize" >' . $index['nom'] . ' ' . $index['prenom'] . '</li>
                       <li class = "text-capitalize">' . $index['Sexs'] . '</li>
                       <li>+212 ' . $index['tel'] . '</li>
                       <li class = "text-capitalize">' . $index['ville'] . '</li>
                       <li class = "text-capitalize">' . $Diagnostic . '</li>
                       <li></li>
                   </ul>
               </button>
           </h2>
           <div id="' . $index['id'] . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
           <div class="accordion-body">
               <table class="table bodySection text-center overflow-hidden">
                   <thead>
                       <tr class="p-2" >
                           <th></th>
                           <th>08:00</th>
                           <th>09:00</th>
                           <th>10:00</th>
                           <th>11:00</th>
                           <th>12:00</th>
                           <th>13:00</th>
                           <th>14:00</th>
                           <th>15:00</th>
                           <th>16:00</th>
                           <th>17:00</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>Lundi</td>
                            ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Mardi</td>
                           ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Mercredi</td>
                           ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Jeui</td>
                           ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Vevdredi</td>
                           ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Samedi</td>
                           ' . $tdNull . '
                       </tr>
                       <tr>
                           <td>Dimanche</td>
                           ' . $tdNull . '
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>

   </div>


</div>
       
       ';
        }

        return $htmlCode;
    }

    // ================Read All Data====================
    public function read()
    {
        $read = Medecin::query()->get();
        if (isset($read)) {

    
      

            $htmlCode =  $this->GetTablData($read);

            // dd($index['id']);
        }

        return response()->json($htmlCode);
    }

    // ==================Search ========================

    public function search(Request $request)
    {

        if ($request->ajax()) {

            $search = Medecin::query()->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nom', 'LIKE', '%' . $request->search . '%')
                ->orWhere('prenom', 'LIKE', '%' . $request->search . '%')
                ->orWhere('CINE', 'LIKE', '%' . $request->search . '%')
                ->orWhere('Sexs', 'LIKE', '%' . $request->search . '%')
                ->orWhere('DateNaissance', 'LIKE', '%' . $request->search . '%')
                ->orWhere('Address', 'LIKE', '%' . $request->search . '%')
                ->orWhere('Diagnostic', 'LIKE', '%' . $request->search . '%')
                ->get();


            $ControllerMedecin = new ControllerMedecin;
            $htmlCode = $ControllerMedecin->GetTablData($search);

            return response()->json(['htmlCode' => $htmlCode, 'NumberSearch' => count($search)]);
        }
    }

    // ==================Show==Data=======================

    public function show($id)
    {
        $data = Medecin::query()->where('id', $id)->first();
        if (isset($data)) {
            $image =  $data->photo;
            if (!isset($image)) {
                $image = 'images/person-fill.svg';
            }
            // =============================== get Diagnostique in style checkbox =====================================
            $ControllerUsers = new ControllerUsers;
            $DiagnostiqueHTML  =  $ControllerUsers->showDiagnostique($data->Diagnostic);

            $htmlCode = '
        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations Médecins </div>
        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
            <input type="file" name = "imageAdulte" Id="click" accept="image/*" class="input-image d-none">
            <span class="imag-show display-flex-center">
                <img src="storage/' . $image . '" alt="" class="image-uplode">
            </span>
        </label>
        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
            <input type="text" readOnly name="fullName" placeholder="NomPrenom" value="' . $data->nom . ' ' .  $data->prenom . '" class ="text-capitalize">
        </div>
        <div class="perant w-100 display-flex-center mt-4">
            <div class="allInformation d-flex flex-column">
            <div class="idMedecins textAndInput noParmiter w-100  align-items-center">
            <span for="" class="me-4">Id  : </span>
            <input type="text" readOnly  value="' . $data->idMedecins . '">
        </div>
                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">Nom : </span>
                    <input type="text" name="nom" placeholder="Nom" value="' . $data->nom . '">
                </div>
                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">Prenom : </span>
                    <input type="text" name="Prenom" placeholder="Prenom" value="' . $data->prenom . '">
                </div>
                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">CINE : </span>
                    <input type="text" name="CINE" placeholder="CINE" value="' . $data->CINE . '">
                </div>
                <div class="sexe textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">Sexe : </span>
                    <input type="text" name="sexe" placeholder="Sexe" value="' . $data->Sexs . '">
                </div>
                <div class="data textAndInput noParmiter w-100 align-items-center">
                    <span for="" class="me-4">Data de Naissance : </span>
                    <input type="date" name="date" placeholder="mm / dd / yyyy"
                        value="' . $data->DateNaissance . '">
                </div>
                <div class="tel textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">Tel : </span>
                    <input type="text" name="Tel" placeholder="Tel" value="' . $data->tel . '">
                </div>
                <div class="ville textAndInput noParmiter w-100  align-items-center">
                <span for="" class="me-4">ville : </span>
                <input type="text" name="ville" placeholder="Address"
                    value="' . $data->ville . '">
            </div>
                <div class="Address textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">Address : </span>
                    <input type="text" name="Address" placeholder="Address"
                        value="' . $data->Address . '">
                </div>
                <div class="created_at textAndInput noParmiter w-100  align-items-center">
                    <span for="" class="me-4">created ' . $data->type . ' : </span>
                    <input type="text" name="Medecin" redOnly placeholder="Medecin" value="' . $data->created_at . '" readonly>
                </div>
                <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique
                </div>

                <div class="upDiagnostic d-grid mt-2   ">
                 
                        ' . $DiagnostiqueHTML . '
                  
                </div>

                <div class="delete mb-1 mt-4 ">
                    <a href="#" data-type = "' . $data->type . '" data-userName = "' . $data->nom . ' ' .  $data->prenom . '"
                    data-cine="' . $data->CINE . '"  onclick = "warning(`your are shor Delet Client` , `Delet` , `' . $data->nom . ' ' .  $data->Prenom . '` , `' . $data->id . '`);"
                      class="link-danger text-capitalize text-decoration-underline deletUsers">Delete
                        user ' . $data->nom . ' ' .  $data->prenom . '</a>
                </div>

                <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                    <span class="btn-button next gree me-4 gree-background  text-white"
                        onclick="showUser();">Colse</span>
                        <span class="buttonUpdata btn-button next" id="' . $data->id . '" 
                         onclick = "warning(`your are shor Update Client` , `Update` , `' . $data->nom . ' ' .  $data->prenom . '`);"
                        >Update</span>
                </div>

            </div>
        </div>
    ';



            return response()->json($htmlCode);
        }
    }

    // ================Update===============================

    public function update($id, Request $request)
    {

        if (isset($request)) {

            $Diagnostique = " ";
            foreach ($request->Diagnostic as $key => $index) {
                if (count($request->Diagnostic) - 1 == $key) {
                    $Diagnostique  .= $request->Diagnostic[$key];
                    break;
                }
                $Diagnostique  .= $request->Diagnostic[$key] . " - ";
            }

            $getSingle = Medecin::query()->where('id', $id)->first();

            $changeData =
                [
                    'nom' => $request->nom,
                    'prenom' => $request->Prenom,
                    'CINE' => $request->CINE,
                    'ville' => $request->ville,
                    'Sexs' => $request->sexe,
                    'DateNaissance' => $request->date,
                    'tel' => $request->Tel,
                    'Address' => $request->Address,
                    'Diagnostic' => $Diagnostique,
                ];

            $update =  $getSingle->update($changeData);
            return response()->json([
                'UserName' => $request->nom . ' ' . $request->Prenom,
                'CINE' => $request->CINE
            ]);
        }
    }

    //====================Delet==========Users=====================

    public function destroy($id)
    {
        $delet =   Medecin::query()->where('id', $id)->delete();
        return response()->json($delet);
    }
}
