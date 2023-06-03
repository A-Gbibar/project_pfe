@extends('layout.app')
@section('title')
    Liste de clients
@endsection
@section('linkCss')
    <link rel="stylesheet" href="../css/ListClient.css">
@endsection
@section('clients')
    active
@endsection
@section('container')
    <section>

        <div class="upBox">
            <div class="subBox horaire H-one bodySection d-grid  align-items-center">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="search"><input type="text" placeholder="search Liste de clients"></span>
            </div>
        </div>

        <div class="tools mb-3 ms-3 d-flex justify-content-between align-items-center">

            <div class="setData">
                <a href="#" class=" me-4 fs-5 HoverInfo" style="--left-var:-140px;" data-info="download info users"><i
                        class="bi bi-cloud-download-fill gree"></i></a>
                <a href="#" class=" me-4 fs-5 HoverInfo" style="--left-var:-118px;" data-info="Copy info users"><i
                        class="bi bi-c-square-fill gree"></i></a>
                <a href="#" class=" me-4 fs-5 HoverInfo" style="--left-var:-110px;" data-info="print info users"><i
                        class="bi bi-printer-fill gree"></i></a>
            </div>
            <div class="dropdown gree-background " style="border-radius: var(--border-radius);">
                <button class="btn gree-background text-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    culmns visibility
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item">Id</a></li>
                    <li><a href="#" class="dropdown-item">Type</a></li>
                    <li><a href="#" class="dropdown-item">nom et prénom</a></li>
                    <li><a href="#" class="dropdown-item">Sexe</a></li>
                    <li><a href="#" class="dropdown-item">Tell</a></li>
                    <li><a href="#" class="dropdown-item">Address</a></li>
                </ul>
            </div>
        </div>

        <table class="table bodySection text-center overflow-hidden">
            <thead>
                <tr class="p-2">
                    <th><i class="bi bi-image-fill"></i></th>
                    <th>Id</th>
                    <th>Type</th>
                    <th>nom et prénom</th>
                    <th>Sexe</th>
                    <th>Age</th>
                    <th>Tell</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


        <div class="btn-create-user" onclick="showCreateBox();">
            <a href="#" class="HoverInfo" data-info="create user" style="--left-var:-132px;"><i
                    class="bi bi-plus-circle-fill"></i></a>
        </div>


        <div class="create create-user display-flex-center  z-3">
            <div class="box-create position-relative box-create-user">
                <span class="close display-flex-center" onclick="showCreateBox();"><i class="bi bi-x-lg"></i></span>
                <form enctype="multipart/form-data" id="formAddUser"  class="overflow-hidden w-100">
                    @csrf
                    <!-- choze type user -->
                    <div class="TypeUser  display-flex-center flex-column">
                        <div class="perant display-flex-center justify-content-around w-75">
                            <label for="chose" class="display-flex-center me-2">
                                <input type="radio" id="chose" name="typeClient" onclick="nextInfoEnfant();"
                                    value="Enafant" class="typeClient d-none">
                                <span class="display-flex-center flex-column">
                                    <img src="../img/child.svg" class="mb-3" alt="">
                                    <b>Enfant</b>
                                </span>
                            </label>
                            <label for="chose2" class="display-flex-center ">
                                <input type="radio" id="chose2" name="typeClient" onclick="nextInfoAdulte();"
                                    value="Adulte" class="typeClient d-none">
                                <span class="display-flex-center flex-column">
                                    <img src="../img/users.svg" class="mb-3" alt="">
                                    <b>Adulte</b>
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- create info user -->
                    <div class="info-user sub-box-create overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            Adulte </div>
                        <label for="click" class="upload-imag mb-4 mt-3 display-flex-center w-100">
                            <input type="file" Id='click' name='imageAdulte' value="aissa.png" accept="image/*"
                                class="input-image">
                            <span class="imag-show display-flex-center">
                                <img src="../img/user.png" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="fullName mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="UserName span-raedy ms-4 me-3">
                                <input type="text" name="nomAdulte" class="fild w-100">
                                <span>Nom</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-2">
                                <input type="text" name="PrenomAdulte" class="fild w-100">
                                <span>Prenom</span>
                            </label>
                        </div>
                        <div class="perant mt-3 display-flex-center">
                            <div class="radios mb-3 position-relative mt-4  d-grid ">
                                <span class=" d-flex align-items-center justify-content-center">Sexe</span>
                                <div class="chose d-flex justify-content-center lign-items-center">
                                    <label class="Exceptionnel h-100 display-flex-center">
                                        <input type="radio" name="sexe" value="Femme" class=" w-100">
                                        <span>Femme</span>
                                    </label>

                                    <label class="Rapide h-100 display-flex-center">
                                        <input type="radio" name="sexe" value="Homme" class=" w-100">
                                        <span>Homme</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="TellN mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="dateRercut span-raedy me-  ms-4">
                                <input type="date" name="dateAdulte" class="fild w-100">
                                <span>Date de naissance</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-4">
                                <input type="tel" name="telAdulte" class="fild w-100">
                                <span>Tell</span>
                            </label>
                        </div>

                        <div class="Address mt-4 display-flex-center w-100">
                            <label class="AddressText span-raedy me-4  ms-4">
                                <textarea name="AddressAdulte" class="fild w-100"=" "></textarea>
                                <span>Address</span>
                            </label>
                        </div>
                        <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="nextInfoAdulte();">Retour</span>
                            <span class="btn-button next" onclick="nextDiagnostic();">Next</span>
                        </div>


                    </div>
                    <!-- create info mather and father -->
                    <div class="fatherMather overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            Parent </div>
                        <div class="perant  display-flex-center">
                            <div class="radios mb-3 position-relative mt-2  d-grid ">
                                <span class=" d-flex align-items-center justify-content-center">
                                    Parents</span>
                                <div class="chose d-flex justify-content-center lign-items-center">
                                    <label class="Exceptionnel display-flex-center">
                                        <input type="radio" name="typeParent" value="Pere" class=" w-100">
                                        <span>Père</span>
                                    </label>

                                    <label class="Rapide display-flex-center">
                                        <input type="radio" name="typeParent" value="Mere" class=" w-100">
                                        <span>Mère</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="fullName mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="UserName span-raedy ms-4 me-3">
                                <input type="text" name="nomParent" class="fild w-100">
                                <span>Nom</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-2">
                                <input type="text" name="PrenomParent" class="fild w-100">
                                <span>Prenom</span>
                            </label>
                        </div>
                        <div class="TellN mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="dateRercut span-raedy me-  ms-4">
                                <input type="date" name="datenationParent" class="fild w-100">
                                <span>Date de naissance</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-4">
                                <input type="tel" name="TelParent" class="fild w-100">
                                <span>Tell</span>
                            </label>
                        </div>

                        <div class="Address mt-4 display-flex-center w-100">
                            <label class="AddressText span-raedy me-4  ms-4">
                                <textarea name="AddressParent" class="fild w-100"=" "></textarea>
                                <span>Address</span>
                            </label>
                        </div>
                        <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="nextInfoEnfant();">Retour</span>
                            <span class="btn-button next" onclick="nextEnfant();">Next</span>
                        </div>
                    </div>
                    <!-- create info chailde  -->
                    <div class="info-child sub-box-create overflow-x-scroll">
                        <div class="title mt-2 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            Enfant </div>
                        <label for="click" class="upload-imag mb-4 mt-3 display-flex-center w-100">
                            <input type="file" Id='click' name="imagechild" value="aissa.png" accept="image/*"
                                onchange="change();" class="input-image1">
                            <span class="imag-show display-flex-center">
                                <img src="../img/user.png" alt="" class="image-uplode1">
                            </span>
                        </label>
                        <div class="fullName mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="UserName span-raedy ms-4 me-3">
                                <input type="text" name="nomChild" class="fild w-100">
                                <span>Nom</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-2">
                                <input type="text" name="PrenomChild" class="fild w-100">
                                <span>Prenom</span>
                            </label>
                        </div>
                        <div class="perant mt-3 display-flex-center">
                            <div class="radios mb-3 position-relative mt-4  d-grid ">
                                <span class=" d-flex align-items-center justify-content-center">Sexe</span>
                                <div class="chose d-flex justify-content-center lign-items-center">
                                    <label class="Exceptionnel display-flex-center">
                                        <input type="radio" name="sexechild" value="Femme" class=" w-100">
                                        <span>Femme</span>
                                    </label>

                                    <label class="Rapide display-flex-center">
                                        <input type="radio" name="sexechild" value="Homme" class=" w-100">
                                        <span>Homme</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="TellN mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="dateRercut span-raedy me-  ms-4">
                                <input type="date" name="datechild" class="fild w-100">
                                <span>Date de naissance</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-4">
                                <input type="tel" name="Telchild" class="fild w-100">
                                <span>Tell</span>
                            </label>
                        </div>
                        <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="Retour();">Retour</span>
                            <span class="btn-button next" onclick="nextDiagnostic();">Next</span>
                        </div>
                    </div>
                    <!-- choze doctor  -->
                    <div
                        class="Medecins d-grid position-relative flex-column display-flex-center  sub-box-create overflow-x-scroll">
                        <div class="title mt-3  p-2 ps-4 m-3  mb-3   fw-bolder fs-5 text-center">
                            Lsit Medecin</div>
                        <div class="up-select display-flex-center w-100 h-100">
                            <select class="form-select" name="MedecinChild[]" multiple
                                aria-label="multiple select example">
                                <option aria-readonly="readonly" class="title-select">chose Medecin</option>
                                <option value="Aissa">Aissa</option>
                                <option value="Gbibar">Gbibar</option>
                                <option value="Mohamade">Mohamade</option>
                                <option value="ousssma">ousssma</option>
                                <option value="favie">favie</option>
                                <option value="Aissa">Aissa</option>
                                <option value="Gbibar">Gbibar</option>
                                <option value="Mohamade">Mohamade</option>
                                <option value="ousssma">ousssma</option>
                                <option value="favie">favie</option>
                                <option value="Aissa">Aissa</option>
                                <option value="Gbibar">Gbibar</option>
                                <option value="Mohamade">Mohamade</option>
                                <option value="ousssma">ousssma</option>
                                <option value="favie">favie</option>
                            </select>
                        </div>
                        <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="nextMedecin();">Retour</span>
                            <input type="submit" id="btn-create" class="btn-button" id="btn-submit" value="Create">
                            {{-- <button class="btn-button next">Create</button> --}}
                        </div>
                    </div>

                    <!-- choze Diagnostic -->
                    <div class="Diagnostic  sub-box-create overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center">Diagnostique</div>
                        <div class="upDiagnostic d-grid mt-4   ">
                            <div class="subDiagnostic-one  p-3">

                                <div class="form-check form-switch ">
                                    <input class="form-check-input" name="Diagnostic[]" value="Kinesitherapie"
                                        type="checkbox" id="Kinesitherapie">
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
                                    <input class="form-check-input" name="Diagnostic[]" value="Education_specialis"
                                        type="checkbox" id="Education">
                                    <label class="form-check-label" for="Education">Education specialise</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="Diagnostic[]" value="Formation_continue"
                                        type="checkbox" id="Formation">
                                    <label class="form-check-label" for="continue">Formation continue</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="Diagnostic[]" value="Psychologie"
                                        type="checkbox" id="Psychologie">
                                    <label class="form-check-label" for="Psychologie">Psychologie</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="Diagnostic[]" value="Neuropsychologie"
                                        type="checkbox" id="Neuropsychologie">
                                    <label class="form-check-label" for="Neuropsychologie">Neuropsychologie</label>
                                </div>
                            </div>
                        </div>
                        <div class="nextButton w-100 mt-4 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="RetourDiagnostic();">Retour</span>
                            <span class="btn-button next" onclick="nextMedecin();">Next</span>
                        </div>
                    </div>



                </form>
            </div>
        </div>

        <div class="create display-flex-center show-user  z-3">
            <div class="box-create position-relative">
                <span class="close display-flex-center" onclick="showUser();"><i class="bi bi-x-lg"></i></span>
                <form action="" class="overflow-hidden w-100" method="">

                    <div class="info-users h-100 sub-box-create overflow-x-scroll">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations
                            Adulte </div>
                        <label for="click" class="upload-imag mb-2 mt-3 display-flex-center w-100">
                            <input type="file" Id='click' accept="image/*" class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="../img/face15.jpg" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="textAndInput fullName w-100 d-flex justify-content-center align-items-center">
                            <input type="text" name="fullName" placeholder="NomPrenom" value="Aissa Gbibar">
                        </div>
                        <div class="perant w-100 display-flex-center mt-4">
                            <div class="allInformation d-flex flex-column">
                                <div class="sexe textAndInput noParmiter w-100 d-flex align-items-center">
                                    <span for="" class="me-4">Sexe : </span>
                                    <input type="text" name="sexe" placeholder="Sexe" value="Homme">
                                </div>
                                <div class="data textAndInput noParmiter w-100 d-flex align-items-center">
                                    <span for="" class="me-4">Data de Naissance : </span>
                                    <input type="text" name="dataNaissance" placeholder="mm / dd / yyyy"
                                        value="05 / 13 / 2004">
                                </div>
                                <div class="tel textAndInput noParmiter w-100 d-flex align-items-center">
                                    <span for="" class="me-4">Tel : </span>
                                    <input type="text" name="tel" placeholder="Tel" value="0651081908">
                                </div>
                                <div class="Address textAndInput noParmiter w-100 d-flex align-items-center">
                                    <span for="" class="me-4">Address : </span>
                                    <input type="text" name="Address" placeholder="Address"
                                        value="casa droua massira">
                                </div>
                                <div class="Medecin textAndInput noParmiter w-100 d-flex align-items-center">
                                    <span for="" class="me-4">Medecin : </span>
                                    <input type="text" name="Medecin" placeholder="Medecin" value="Aissa wazani">
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
                                    <a href="#" class="link-danger text-capitalize text-decoration-underline">Delete
                                        user Aissa Gbibar</a>
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
            </div>
        </div>


    </section>
@endsection

@section('linkJS')
    <script>
        function readData() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '{{ route('list-client.read') }}',
                success: function(readData) {
                    var data = '';
                    let adulte = readData.adulte;
                    let Enfant = readData.Enfant;
                    read = adulte.concat(Enfant);

                    read.sort((s1, s2) => s2.idClient - s1.idClient);
                    $.each(read, function(key, value) {
                        let photo;
                        if (read[key].photo !== null) {
                            photo =
                                `<img src="storage/${read[key].photo }" alt="non" class="w-100 h-100">`;
                        } else {
                            photo = `<i class="bi bi-person-fill w-100 h-100"></i>`;
                        }
                        data += `<tr>
                            <td><a href="#" onclick="showUser();">
                                <div class = 'image overflow-hidden position-relative'>
                                    ${photo}
                                    <div class="display-flex-center"><span>Show</span> </div>

                                </div>
                                </a></td>
                            <td>${read[key].idClient}</td>
                            <td>${read[key].type} </td>
                            <td>${read[key].nom} ${read[key].Prenom}</td>
                            <td>${read[key].Sexe}</td>
                            <td>${read[key].DateNaissance}</td>
                            <td>+212 ${read[key].tel}</td>
                            <td>${read[key].Address}</td>
                        </tr>
                    `;

                    });

                    $('tbody').html(data);

                },

            })
        }
        readData();
        function claerData(){
            var form = $("#formAddUser")[0].reset();
        }
        //save data in ajax
        $(document).ready(function(){
            $("#formAddUser").submit(function(event){
                event.preventDefault();
                var form = $("#formAddUser")[0];
                var data = new FormData(form);
                $.ajax({
                    type:"POST",
                    url:"{{ route('List-clients.store') }}",
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        document.querySelector('.create-user').classList.remove('active');
                        readData();
                        claerData();
                    },
                })
            })
        })
    </script>
@endsection
