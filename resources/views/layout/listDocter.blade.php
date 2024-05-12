@extends('layout.app')
@section('title')
    Liste des médecins  
@endsection
@section('linkCss')
    <link rel="stylesheet" href="../css/ListClient.css">
    <!-- link lis Medecin css page  -->
    <link rel="stylesheet" href="../css/ListDocter.css">
@endsection
@section('medecins')
    active
@endsection
@section('TitleHead')
    Liste des médecins
@endsection

@section('container')
    <section>

        <div class="upBox">
            <div class="subBox horaire H-one bodySection d-grid  align-items-center">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="search"><input type="text" id="search" placeholder="search Liste de clients"></span>
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
            <div class="selectSearch gree"></div>
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


        <!-- table medicen -->
        <div class="tbaleMedicen ">
            <div class="headerTable ">
                <ul class="list-unstyled d-grid m-0 h-100">
                    <li><i class="bi bi-image-fill"></i></li>
                    <li>Id</li>
                    <li>nom et prénom</li>
                    <li>Sexe</li>
                    <li>Tell</li>
                    <li>Vill</li>
                    <li>Specialite</li>
                    <li>Show</li>
                </ul>
            </div>
            <div class="bodyTable  w-100">
                <!-- ==========================tr body====================================== -->
            </div>
        </div>





        <div class="btn-create-user" onclick="showCreateBox();">
            <a href="#" class="HoverInfo" data-info="create Medecin" style="--left-var:-162px;"><i
                    class="bi bi-plus-circle-fill"></i></a>
        </div>

        <div class="create create-user display-flex-center  z-3">
            <div class="box-create position-relative box-create-user">
                <span class="close display-flex-center" onclick="showCreateBox();"><i class="bi bi-x-lg"></i></span>
                <form id="DonneMedecin" class="overflow-hidden w-100" method="POST">
                    @csrf
                    <!-- choze Diagnostic -->
                    <div class="Diagnostic sub-box-create overflow-x-scroll">
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
                                    <input class="form-check-input" name="Diagnostic[]" value="Orthophonie" type="checkbox"
                                        id="Orthophonie">
                                    <label class="form-check-label" for="Orthophonie">Orthophonie</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="Diagnostic[]" value="Orthoptie" type="checkbox"
                                        id="Orthoptie">
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
                                onclick="nextDiagnosticM()">Retour</span>
                            {{-- <span class="btn-button next" onclick="nextMedecin();">Create</span> --}}
                            <input type="submit" class="btn-button craete" id="send" value="Create">
                        </div>
                    </div>

                    <div class="h-100 infoDocter sub-box-create overflow-x-scroll active">
                        <div class="title mt-3 ps-4 m-3  p-2 fw-bolder fs-5 text-center"> Informations Medecin
                        </div>
                        <label for="click" class="upload-imag mb-4 mt-3 display-flex-center w-100">
                            <input type="file" Id='click' name="imgae" accept="image/*"
                                class="input-image d-none">
                            <span class="imag-show display-flex-center">
                                <img src="../img/user.png" alt="" class="image-uplode">
                            </span>
                        </label>
                        <div class="fullName mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="UserName span-raedy ms-4 me-3">
                                <input type="text" name="nom" class="fild w-100" required>
                                <span>Nom</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-2">
                                <input type="text" name="Prenom" class="fild w-100" required>
                                <span>Prenom</span>
                            </label>
                        </div>

                        <div class="CineVille mt-4  w-100 d-flex justify-content-center align-items-center">
                            <label class="cine span-raedy ms-4 me-3">
                                <input type="text" name="CINE" class="fild w-100" required>
                                <span>CINE</span>
                            </label>
                            <label class="Ville span-raedy me-4  ms-2">
                                <input type="text" name="Ville" class="fild w-100" required>
                                <span>Ville</span>
                            </label>
                        </div>

                        <div class="perant mt-3 display-flex-center">
                            <div class="radios mb-3 position-relative mt-4  d-grid ">
                                <span class=" d-flex align-items-center justify-content-center">Sexe</span>
                                <div class="chose d-flex justify-content-center lign-items-center">
                                    <label class="Exceptionnel h-100 display-flex-center">
                                        <input type="radio" name="Sexe" value="F" class=" w-100" required>
                                        <span>Femme</span>
                                    </label>

                                    <label class="Rapide h-100 display-flex-center">
                                        <input type="radio" name="Sexe" value="H" class=" w-100" required>
                                        <span>Homme</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="TellN mt-3  w-100 d-flex justify-content-center align-items-center">
                            <label class="dateRercut span-raedy me-  ms-4">
                                <input type="date" name="dateNaissance" class="fild w-100">
                                <span>Date de naissance</span>
                            </label>
                            <label class="UserName span-raedy me-4  ms-4">
                                <input type="tel" name="tell" class="fild w-100" required>
                                <span>Tell</span>
                            </label>
                        </div>


                        <div class="Address mt-4 display-flex-center w-100">
                            <label class="AddressText span-raedy me-4  ms-4">
                                <textarea name="Address" class="fild w-100" required="required"></textarea>
                                <span>Address</span>
                            </label>
                        </div>
                        <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                            <span class="btn-button next gree me-4 gree-background  text-white"
                                onclick="showCreateBox();">Retour</span>
                            <span class="btn-button next" onclick="nextDiagnosticM();">Next</span>
                        </div>


                    </div>



                </form>
            </div>
        </div>



        {{-- alert add Good --}}
        <div class="d-flex justify-content-center flex-column overflow-hidden  align-items-center UserAdd goodAdd">

        </div>
        {{-- alert error  --}}
        <div class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd errorAdd">

        </div>

        {{-- ========================updateAdulte====================================== --}}

        <div class="create display-flex-center show-user  z-3">
            <div class="box-create position-relative">
                <span class="close display-flex-center" onclick="showUser();"><i class="bi bi-x-lg"></i></span>
                <form id="update" class="overflow-hidden w-100" method="POST">
                    @csrf
                    <div class="info-users h-100 sub-box-create overflow-x-scroll">

                    </div>

                    {{-- alert winrning  --}}
                    <div
                        class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd winrning">

                    </div>

                </form>
            </div>
        </div>


    </section>
@endsection

@section('linkJS')
    <script>
        function nextDiagnosticM() {
            document.querySelector('.Diagnostic').classList.toggle('active');
        }

        // ================= Read All data ====================

        function readData() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ route('List-Medecin.read') }}",
                success: function(data) {
                    $(".bodyTable").html(data);
                },
                error: function(e) {
                    console.log(e);
                    alertErorr("Not read Data (" + e.responseJSON + ")");
                }

            })
        }
        readData()

        // ================== Save Docter ==============================
        function claerData() {
            var form = $("#DonneMedecin")[0].reset();
        }
        $(document).ready(function() {
            $("#DonneMedecin").submit(function(event) {
                event.preventDefault();
                var form = $("#DonneMedecin")[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('List-Medecin.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        document.querySelector('.create-user').classList.remove('active');
                        claerData();
                        let UseName = data.nom + " " + data.Prenom;
                        alertUser(UseName, data.CINE, 'this Medecin is create good');
                        readData();
                    },
                    error: function(e) {

                        alertErorr("Cany back in form is error (" + e.responseJSON.message +
                            ")");
                    }
                })
            })
        })

        // ================ search Data for Table users =============
        $(document).ready(function() {
            $("#search").on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: '{{ route('List-Medecin.search') }}',
                    type: 'GET',
                    data: {
                        'search': value
                    },
                    success: function(readData) {
                        if(readData.NumberSearch == 0){
                            data = `
                            <tr class="not-found d-flex justify-content-center align-items-center">
                            <td colspan="8"> 
                                <img src="storage/images/noun-not-found-2157340.svg" alt="" >
                                <div>pas trouvé de <span class="gree">${value}</span> </div>
                            </td>
                        </tr>
                            `;
                        $(".bodyTable").html(data);
                        }else{
                            $(".bodyTable").html(readData.htmlCode);
                        }
                        $('.selectSearch').html(readData.NumberSearch + ' Sélectionner')
                    },
                    error: function(error) {
                        alertErorr("Cany back in form is error (" + e.responseJSON.message +
                            ")");
                    }
                })
            })
        });

        // ============== to show data user =========================
        function showData(id) {
            $.ajax({
                type: 'get',
                dataType: "json",
                url: "/List-Medecin/show/" + id,
                success: function(data) {
                    // var data = data.show;
                    $('.info-users').html(data);
                }
            });
        }

        // =============== update inforamtion in users ==============
        $(document).ready(function() {
            $("form#update").submit(function(event) {
                event.preventDefault();
                var form = $("form#update")[0];
                var data = new FormData(form);
                var id = $(".buttonUpdata").attr('id');
                $.ajax({
                    type: "POST",
                    url: `/List-Medecin/update/` + id,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alertUser(data.UserName, data.CINE, 'the user is update good');
                        console.log(data);
                    },
                    error: function(e, request) {
                        alertErorr("this not udadte data becouse : " + e.responseJSON.message);
                    }
                });
            });
        });

   // ===================Delet Users==========================
   $("#update").on("click", ".deletButton", function() {
            var id = $(this).attr("data-id");
            var cine = $('.deletUsers').attr('data-cine');
            var userName = $('.deletUsers').attr('data-userName');
            var obj = $(`.item${id}`);
            $.ajax({
                type: "GET",
                url: `/List-Medecin/destroy/${id}`,
                success: function(delet) {
                    document.querySelector('.show-user').classList.remove('active');
                    alertUser(userName, cine, 'the user is update good');
                    readData()
                    // console.log(delet);
                },
                error: function(e) {
                    alertErorr("this not Delet User becouse : " + e.responseJSON.message);
                }
            });
        })
    </script>
@endsection
