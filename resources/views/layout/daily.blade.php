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
            <span class="search"><input type="text" placeholder="search Liste de clients"></span>
        </div>
    </div>

    <div class="tools mb-4 ms-3 d-flex justify-content-between align-items-center">     

        <div class="btn-create-user d-flex justify-content-end align-items-center" onclick=" showaddhoraires();">
            <a href="#" class="HoverInfo" data-info="create horaire quotidien" style="--left-var:-238px;"><i
                    class="bi bi-plus-circle-fill"></i></a>
        </div>
        
        <div class="dropdown gree-background " style="border-radius: var(--border-radius);">
            <button class="btn gree-background text-white dropdown-toggle" type="button"
                data-bs-toggle="dropdown">
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
        <form action="" class="mb-4 p-3 ">
            <div class="navhoraires d-flex justify-content-between align-items-center">
                <div class="titleHoraires" > <i class="bi bi-arrow-90deg-right"></i> créer horaire quotidien </div>
                <input type="date" name="DateHoraires" id="DateHoraires" value="" >
            </div>
        <div class="taming mt-3 d-flex justify-content-evenly align-items-center">
            <div class="suptime position-relative timeStar">
                <span class="titleTime">heure de début</span>
                <input type="text" class="timepicker">
            </div>
            <div class="suptime position-relative timeStar">
                <span class="titleTime">heure de fin</span>
                <input type="text" class="timepicker">
            </div>
        </div>
        <div class="upBox searchUD d-flex justify-content-evenly  mt-4">
        <div class="listSearch">
            <div class="subBox searchUser horaire d-grid H-one bodySection   ">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="searchUser"  ><input type="text" id="searchUser"  class="searchInput" placeholder="search Clients" value=""></span>
            </div>
            <div class="listUD listUser">

            </div>
        </div>

        <div class="listSearch">

            <div class="subBox searchDocter horaire d-grid H-one bodySection   ">
                <span class="time s-time"> <b><i class="bi bi-search"></i></b></span>
                <span class="search" ><input type="text"  class="searchDocterInput" placeholder="search Médecins"></span>
            </div>

            <div class="listUD listDocter">
                <ul>
                    <li   class="Docter" > 
                        <span > <img src="../img/face1.jpg" alt="" class="image"> </span>   
                        <span class="id">2</span>
                        <span class="userNameDoctre">Aissa Gbibar</span> 
                    </li>
                    <li  class="Docter"> 
                        <span  > <img src="../img/face2.jpg" alt="" class="image"> </span>   
                        <span class="id">3</span>
                        <span class="userNameDoctre">Oussama Al more</span> 
                    </li>
                    <li  class="Docter"> 
                        <span    > <img src="../img/face3.jpg" alt="" class="image"> </span>   
                        <span class="id">4</span>
                        <span class="userNameDoctre">anour Gbibar</span> 
                    </li>
                </ul>
            </div>
        </div>

        </div>

        <div class="texteArea  ">
            <div class="Address mt-4 w-100  d-flex justify-content-center align-items-center">
                <label class="AddressText span-raedy ">
                    <textarea name="description" class="fild w-100" required="required"></textarea>
                    <span>Description</span>
                </label>
            </div>
        </div>

          
       

        </form>

               {{-- alert add Good --}}
               <div class="d-flex justify-content-center flex-column overflow-hidden  align-items-center UserAdd goodAdd">

               </div>
               {{-- alert error  --}}
               <div class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd errorAdd">
       
               </div>
    </div>
    </div>

    <div class="upBoxDaily horaires"> 



        <div class="subBoxDaily horaire H-one bodySection d-grid  align-items-center">
            <span class="time s-time"> <b> 7:00</b></span>
            <span class="name name-user">Aissa gbibar</span>
            <span class="name name-doctor">Amine doctor</span>
            <span class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
            <span class="time e-time"><b> 8:00</b></span>
        </div>
        <div class="subBoxDaily horaire H-tow bodySection d-grid  align-items-center">
            <span class="time s-time"> <b> 8:10</b></span>
            <span class="name name-user">Aissa gbibar</span>
            <span class="name name-doctor">Amine doctor</span>
            <span class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
            <span class="time e-time"><b>9:10</b> </span>
        </div>
      
    </div>

</section>
@endsection

@section('linkJS')
<!-- Latest compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>

 {{-- link js add search and time --}}



 <script>


$(document).ready(function() {
            $("#searchUser").on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: '{{ route('horaire.search-user') }}',
                    type: 'GET',
                    data: {
                        'search': value
                    },
                    success: function(readData) {
                        $('.listUser').html(readData)
                        let Users = document.querySelectorAll(".Users");
                        Users.forEach(function (element, index) {
                            element.addEventListener("click", function () {
                                let searchInput = document.querySelector(".searchInput");
                                let userName = document.querySelectorAll(".userName");
                                searchInput.value = userName[index].innerText;
                                document.querySelector(".listUser").classList.add("Noactive");
                            });
                        });
                    },
                    error: function(error) {
                        alertErorr("Cany back in form is error (" + error.responseJSON.message +
                            ")");
                    }
                })
            })
        });

 </script>

<script src="../js/daily.js" > </script>


 @endsection

