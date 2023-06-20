<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre Racine</title>
    <!-- link bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- link minAll -->
    <link rel="stylesheet" href="../css/mainAll.css">
    <link rel="stylesheet" href="../css/ListClient.css">
    <!-- link signin -->
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/gardPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>

    <nav >
        <div class="container h-100 d-flex justify-content-between align-items-center">
            <div class="logCenter">
                <img src="../img/loginLogo.png"  alt="">
    
            </div>
            <ul class="d-flex list-unstyled h-100 "> 
                <li class="display-flex-center "><i class="bi bi-calendar-fill"></i></li>
                <li class="display-flex-center"><i class="bi bi-calendar-date"></i></li>
                <li  class="display-flex-center" >  <i class="bi bi-chat-left-text-fill"></i> </li>
                <li class="display-flex-center"><i class="bi bi-gear-fill"></i></li>
            </ul>
            <div class="imageClient d-flex align-items-center">
                <span class="d-flex flex-column ">
                    <span class="gree text-center">Bonjour Mr </span>
                   <span class="fw-bolder">{{$UserName}}</span> 
                </span>
                <div class="imgae">
                    @if (isset($photo))
                    <img src="storage/{{$photo}}" class="" alt=""> 
                    @else
                    <img src="../img/person-fill.svg" class="" alt=""> 
                    @endif
            </div>
            
            </div>
        </div>
    </nav>

    <section class="display-flex-center">
        <div class="container createConte display-flex-center ">
            <div class="box-profile position-relative">
            <div class="infoUsers">
                <div class="photo text-center mt-3 mb-3">
                @if (isset($photo))
                <img src="storage/{{$photo}}" class="" alt=""> 
                @else
                <img src="../img/person-fill.svg" class="" alt=""> 
                @endif
                </div>
                <div class="info w-100 d-flex justify-content-center align-items-center mb-3">
                    <h4 class="title fw-bolder">{{$UserName}}</h4>
                </div>
                <div class="info w-100">
                    <div class="subtitle"> <i class="bi bi-arrow-90deg-right me-2"></i> information Pérssonel </div>
                    {{-- // hear --}}
                    
                    <div class="subInfo d-grid Type">
                        <span>Type Client</span>
                        <span>{{$type }}</span>
                    </div>
                    <div class="subInfo d-grid Sexe">
                        <span>Sexe</span>
                        <span>{{$Sexe }}</span>
                    </div>
                    <div class="subInfo d-grid CNIE">
                        <span>CNIE</span>
                        <span>{{$CINE }}</span>
                    </div>
                    <div class="subInfo d-grid UserName">
                        <span>Data de Naissance</span>
                        <span>{{$DateNaissance }}</span>
                    </div>
                    <div class="subInfo d-grid UserName">
                        <span>Tel</span>
                        <span>{{$tel }}</span>
                    </div>
                    <div class="subInfo d-grid UserName">
                        <span>Address</span>
                        <span>{{$Address }}</span>
                    </div>
                    <div class="subInfo d-grid UserName">
                        <span>created {{$type }}</span>
                        <span>{{$created_at }}</span>
                    </div>
                   
                    
                </div>
               <div class="btn-next text-center "> 
                <button type="button" class="btn-button text-center "  onclick="nextStap();" style="width: 90%;" >Next</button>
               </div>
            </div>
            <div class="createNewLogin  position-absolute ">
                <form id = "NewAccount" class="display-flex-center flex-column ">
                    @csrf
                    <div class="subtitle">   Créer une nouvelle connexion</div>

                    <label class="UserName span-raedy mb-4 w-75">
                        <input type="email" name="email" class="fild w-100" required>
                        <span>E-mail</span>
                    </label> 
                    <label class="UserName span-raedy mb-4 w-75">
                        <input type="email" name="confirmEmail" class="fild w-100" required>
                        <span>Confirmez votre email</span>
                    </label> 
                    <label class="UserName span-raedy mb-4 w-75">
                        <input type="password" name="password" class="fild w-100" required>
                        <span>Mot de passe</span>
                    </label> 
                    <label class="UserName span-raedy mb-4 w-75">
                        <input type="password" name="confirmPassword" class="fild w-100" required>
                        <span>Confirmez le mot de passe</span>
                    </label> 
                    <div class="form-check form-switch bg-transparent  w-75">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" name ='accsept' for="flexSwitchCheckDefault">Accepter les termes</label>
                     </div>
                     <div class="createBtn w-75 d-flex ">
                         <button type="button" class="btn-button pe-3 gree-background" style="width: 45%;" onclick="nextStap();" >Routeur</button>
                        <button type="submit" class="btn-button ms-4" style="width: 45%;" >Créer</button>
                     </div>
                </form>
            </div>
            </div>
        </div>
    </section>


           {{-- alert add Good --}}
           <div class="d-flex justify-content-center flex-column overflow-hidden  align-items-center UserAdd goodAdd">

           </div>
           {{-- alert error  --}}
           <div class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd errorAdd">
   
           </div>


           <script src="../js/listUser.js" ></script>

    <script>
        function nextStap() {
            document.querySelector('.createNewLogin').classList.toggle('active');
            document.querySelector('.infoUsers').classList.toggle('noActive');
        }

          //============== save data in ajax ==========================
          $(document).ready(function() {
            $("#NewAccount").submit(function(event) {
                event.preventDefault();
                var form = $("#NewAccount")[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('createAccount.newAccounr') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(e) {

                        alertErorr("Cany back in form is error (" + e.responseJSON.message +
                            ")");
                    }
                })
            })
        })

    </script>

</body>
</html>