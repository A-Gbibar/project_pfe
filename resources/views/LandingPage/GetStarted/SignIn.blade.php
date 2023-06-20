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
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>


    <section class="display-flex-center justify-content-evenly ">

<div class="images position-relative">
    <div class="imageSign up  w-100 display-flex-center p-2">
        <img src="../img/undraw_sign_up_n6im.svg" alt="">
    </div>
    <div class="imageSign in w-100 display-flex-center position-absolute  p-2">
        <img src="../img/undraw_sign_in_re_o58h.svg" alt="">
    </div>
</div>

        <div class="container pearnt">

            <div class="switch mb-4 display-flex-center ">
                <div class="btn-button" onclick="inscrit();" >première fois</div>
                <div class="btn-button" onclick="inscrit();">j'étais inscrit</div>
            </div>
    <div class="allForms position-relative ">
        <form action="{{route('connexion.forstTime')}}" class="OneTime active " method="POST">
            @csrf
            <div class="FirstTime">
                <div class="titleFirst text-capitalize text-center mb-4 gree">pour la première fois</div>
                <label class="UserName span-raedy mb-3 ">
                    <input type="text" name="UserName" class="fild w-100" required>
                    <span>Nom d'utilisateur</span>
                </label> 
                <label class="UserName span-raedy mt-3 ">
                    <input type="text" name="connexion" class="fild w-100" required>
                    <span>Connexion</span>
                </label> 
                <div class="form-check form-switch bg-transparent mt-2 mb-0">
                    <input class="form-check-input" type="checkbox" value="memberMe" name="member" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Souviens-toi de moi</label>
                 </div>
                 @error('error')
                     <p class="text-danger" >{{$message}}</p>
                 @enderror
                 <div class="createBtn">
                    <button type="submit" class="btn-button w-100" >Créer</button>
                 </div>
            </div>
        </form>

        <form action="" class="inscrit position-absolute" method="POST">
            @csrf
            <div class="FirstTime">
                <div class="titleFirst text-capitalize text-center mb-4 gree">j'étais inscrit</div>
                <label class="UserName span-raedy mb-3 ">
                    <input type="text" name="UserName" class="fild w-100" required>
                    <span>Nom d'utilisateur</span>
                </label> 
                <label class="UserName span-raedy mt-3 ">
                    <input type="password" name="password" class="fild w-100" required>
                    <span>Password</span>
                </label> 
                <div class="atherInfo d-flex justify-content-between align-items-center">
                <div class="form-check form-switch bg-transparent mt-2 mb-0">
                    <input class="form-check-input" type="checkbox" value="memberMe" name="member" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Souviens-toi de moi</label>
                 </div>
                 <a href="#">Mot de passe oublié?</a>
                </div>
                 <div class="createBtn">
                    <button type="submit" class="btn-button w-100" >Connexion</button>
                 </div>
            </div>
        </form>
    </div>
        </div>

    </section>

    <script>

            function inscrit(){
                document.querySelector('.inscrit').classList.toggle('active');
                document.querySelector('.inscrit').classList.remove('noActive');
                document.querySelector('.OneTime').classList.remove('noActive');
                document.querySelector('.switch').classList.toggle('active');
                document.querySelector('.images').classList.toggle('active');
            }

    </script>

</body>
</html>