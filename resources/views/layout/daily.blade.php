@extends('layout.app')
@section('title')
    Liste de clients
@endsection
@section('linkCss')
    <!-- link materialize  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/ListClient.css">
    <!-- link lis Medecin css page  -->
    <link rel="stylesheet" href="../css/ListDocter.css">
    <!-- link daily css page -->
    <link rel="stylesheet" href="../css/daily.css">
@endsection
@section('horaire')
    active
@endsection
@section('TitleHead')
    horaire quotidien
@endsection

@section('container')
    <section>


        <div class="upBox">
            <div class="subBox horaire H-one bodySection d-grid  align-items-center">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="search"><input type="text" id="search" placeholder="Search Horaire Quotidien"></span>
            </div>
        </div>

        <div class="tools mb-4 ms-3 d-flex justify-content-between align-items-center">

            <div class="btn-create-user d-flex justify-content-end align-items-center" onclick=" showaddhoraires();">
                <a href="#" class="HoverInfo" data-info="create horaire quotidien" style="--left-var:-238px;"><i
                        class="bi bi-plus-circle-fill"></i></a>
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

        <div class="addhoraires position-relative">
            <div class="screen">
                <span class="close display-flex-center" onclick="showaddhoraires();"><i class="bi bi-x-lg"></i></span>
                <form id = "addDaily" class="mb-4 p-3 ">
                    @csrf
                    <div class="navhoraires d-flex justify-content-between align-items-center">
                        <div class="titleHoraires"> <i class="bi bi-arrow-90deg-right"></i> créer horaire quotidien </div>
                        <input type="date" name="DateHoraires" id="DateHoraires" value="">
                    </div>
                    <div class="taming mt-3 d-flex justify-content-evenly align-items-center">
                        <div class="suptime position-relative timeStar">
                            <span class="titleTime">heure de début</span>
                            <input type="text" class="timepicker" name="HoureStart">
                        </div>
                        <div class="suptime position-relative timeStar">
                            <span class="titleTime">heure de fin</span>
                            <input type="text" class="timepicker" name="HoureFin">
                        </div>
                    </div>
                    <div class="upBox mb-4 searchUD d-flex justify-content-evenly  mt-4">
                        <div class="listSearch">
                            <div class="subBox searchUser horaire d-grid H-one bodySection   ">
                                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                                <span class="searchUser"><input type="text" name="UserNameUser"  id="searchUser" class="searchInput"
                                        placeholder="search Clients" value=""> <input type="hidden"  class="idUser" name="idUser"> </span>
                            </div>
                            <div class="listUD listUser">

                            </div>
                        </div>

                        <div class="listSearch">

                            <div class="subBox searchDocter horaire d-grid H-one bodySection   ">
                                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                                <span class="search"><input type="text" name="Docter" id ="searchDocter" class="searchDocterInput"
                                        placeholder="search Médecins"> <input type="hidden" class="idDocter" name="idDocter"> </span>
                            </div>

                            <div class="listUD  listDocter">
                                
                            </div>
                        </div>

                    </div>

                    <div class="texteArea  ">
                        <div class="Address mt-4 w-100  d-flex justify-content-center align-items-center">
                            <label class="AddressText span-raedy ">
                                <textarea name="description" class="Description fild w-100" required="required"></textarea>
                                <span>Description</span>
                            </label>
                        </div>
                    </div>

                    <div class="nextButton w-100 mt-3 mb-3 pe-4 display-flex-center justify-content-end">
                        <span class="btn-button next gree me-4 gree-background  text-white"
                            onclick="showaddhoraires();">Retour</span>
                        <input type="submit" id="btn-create" class="btn-button" value="Create">
                    </div>



                </form>

          
            </div>
        </div>



              {{-- alert add Good --}}
              <div class="d-flex justify-content-center flex-column overflow-hidden  align-items-center UserAdd goodAdd">

              </div>
              {{-- alert error  --}}
              <div
                  class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd errorAdd">

              </div>

        <div class="upBoxDaily horaires">
              
        </div>
              {{-- alert winrning  --}}

        <div
        class="d-flex  winrningDeletDaily justify-content-center  flex-column overflow-hidden  align-items-center UserAdd winrning">

        </div>

        <div class="UpdateInfo">
            <div class="screen">
                <span class="close display-flex-center" onclick="UpdateInfo();"><i class="bi bi-x-lg"></i></span>
                <form id = "updateInfo"  class="mb-4 p-3 ">
                    @csrf

                </form>
            </div>

        </div>

    </section>
@endsection

@section('linkJS')
    <!-- Latest compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>

    {{-- link js add search and time --}}



    <script>

// ============subBoxDaily=========================


        function serach(nameSearch, type) {
            $(document).ready(function() {
                $(nameSearch).on('keyup', function() {
                    var value = $(this).val();
                    $.ajax({
                        url: '{{ route('horaire.search-user') }}',
                        type: 'GET',
                        data: {
                            'search': value,
                            'type': type
                        },
                        success: function(readData) {
                         if( type == 'user' && readData.count > 0 ){
                        
                                 $('.listUser').html(readData.html);
                                 let Users = document.querySelectorAll(".Users");
                                Users.forEach(function(element, index) {
                                    element.addEventListener("click", function() {
                                        let searchInput = document.querySelector(".searchInput");
                                        let userName = document.querySelectorAll(".userName");
                                        searchInput.value = userName[index].innerText;
                                        let idUser = document.querySelector('.idUser');
                                        let idU    = document.querySelectorAll('.idU');
                                        idUser.value = idU[index].innerText;
                                        document.querySelector(".listUser").classList.add("Noactive");
                                    });
                                });
                       
                            } else if(type == 'docter' && readData.count > 0  ){
                                $('.listDocter').html(readData.html)
                                let Docter = document.querySelectorAll(".Docter");
                                Docter.forEach(function (element, index) {
                                    element.addEventListener("click", function () {
                                        let searchDocter = document.querySelector(".searchDocterInput");
                                        let userNameDoctre = document.querySelectorAll(".userNameDoctre");
                                        searchDocter.value = userNameDoctre[index].innerText;
                                        let idDocter = document.querySelector('.idDocter');
                                        let idU    = document.querySelectorAll('.idD');
                                        idDocter.value = idU[index].innerText;
                                        document.querySelector(".listDocter").classList.add("Noactive");
                                    });
                                });

                            }else if( type == 'user' && readData.count <= 0 ){
                                let html = `
                            <div class = " w-100 p-2 d-flex justify-content-center align-items-center flex-column">
                                <img src="storage/images/noun-not-found-2157340.svg" alt=""  style = "width: 61px;">
                                <div>pas trouvé de <span class="gree">${value}</span> </div>
                                </div>  
                            `;
                                $('.listUser').html(html);
                            }else if( type == 'docter' && readData.count <= 0 ){
                                let html = `
                            <div class = " w-100 p-2 d-flex justify-content-center align-items-center flex-column">
                                <img src="storage/images/noun-not-found-2157340.svg" alt=""  style = "width: 61px;">
                                <div>pas trouvé de <span class="gree">${value}</span> </div>
                                </div>  
                            `;
                                $('.listDocter').html(html);
                            }
                     
                         
                   
                        },
                        error: function(error) {
                            alertErorr("Cany back in form is error (" + error.responseJSON
                                .message +
                                ")");
                        }
                    })
                })
            });
        }

        serach("#searchUser", "user");
        serach("#searchDocter", "docter");


        //====================Read===============Data===============================

        function readData(){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ route('horaire.show') }}",
                success: function(data) {
                    $(".upBoxDaily").html(data);
                 let subBoxDaily = document.querySelectorAll('.subBoxDaily');
                    subBoxDaily.forEach(function(element , index){
                        element.addEventListener('click' , function(){
                            let AddDele = document.querySelectorAll('.AddDele');
                            AddDele[index].classList.toggle('active');
                        })
                    })
                },
                error: function(e) {
                    // console.log(e);
                    alertErorr("Not read Data (" + e.responseJSON + ")");
                }

            })
        }
        readData();

        // ============================Save===============Data=======================

        function claerData() {
            var form = $("#addDaily")[0].reset();
        }
        $(document).ready(function() {
            $("#addDaily").submit(function(event) {
                event.preventDefault();
                var form = $("#addDaily")[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{route('horaire.store')}}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        document.querySelector('.addhoraires').classList.remove('active');
                        claerData();
                        alertUser(data.UserNameUser, data.idU, 'this Medecin is create good' , "id");
                        readData()
                    },
                    error: function(e) {

                        alertErorr("Cany back in form is error (" + e.responseJSON.message +
                            ")");
                    }
                })
            })
        })

        // ==========================Search============Data=========================
        $(document).ready(function() {
            $("#search").on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: '{{ route('horaire.saerch') }}',
                    type: 'GET',
                    data: {
                        'search': value
                    },
                    success: function(readData) {
                        $(".upBoxDaily").html(readData.html)
                        $('.selectSearch').html(readData.NumberSearch + ' Sélectionner')
                        let subBoxDaily = document.querySelectorAll('.subBoxDaily');
                    subBoxDaily.forEach(function(element , index){
                        element.addEventListener('click' , function(){
                            let AddDele = document.querySelectorAll('.AddDele');
                            AddDele[index].classList.toggle('active');
                        })
                    })
                    },
                    error: function(error) {
                        alertErorr("is error (" + e.responseJSON.message +
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
                url: "/horaire/single/" + id,
                success: function(data) {
                    // var data = data.show;
                    document.querySelector('.UpdateInfo').classList.toggle('active');
                    $('#updateInfo').html(data);
                    const timer = document.querySelectorAll(".timepicker");
                    M.Timepicker.init(timer, {
                        showClearBtn: true,
                        i18n: {
                            clear: "Retirer",
                            cancel: "Annuler",
                            done: "OK",
                        },
                    });
                    serach("#searchUser", "user");
                }
            });
        }

        
   // ===================Delet Users==========================

   $(".winrningDeletDaily").on("click", ".deletButton", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        type:'GET',
        dataType:'json',
        url:"/horaire/destroy/"+id,
        success:function(data){
         
            if(data.Erorr !== null){
            alertUser(data.UserName, id, 'this delet Good' , "ID");
            readData();
            }else{
            alertErorr(data.Erorr);

            }
        },
        error:function(e){
            alertErorr("is error (" + e.responseJSON.message +")");
        }
    })
});
        
    </script>

    <script src="../js/daily.js"></script>
@endsection
