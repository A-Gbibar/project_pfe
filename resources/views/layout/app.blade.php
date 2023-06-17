<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- link bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- link minAll -->
    <link rel="stylesheet" href="../css/mainAll.css">
    <!-- link Dashbord css page -->
    <link rel="stylesheet" href="../css/Dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('linkCss')
</head>

<body>

    <div class="perant d-grid">

        <aside class="d-grid row-cols-3 align-items-center">
            <div class="logo d-flex ps-3  align-items-center  w-100">
                <img src="../img/loginLogo.png" alt="">
                <span><b>R</b>acine</span>
            </div>

            <div class="menu d-flex justify-content-center flex-column w-100">
                <a href="{{route('Home.index')}}" class=@yield('Home')>
                    <i class="bi bi-house-door-fill"></i>
                    <span>Home</span>
                </a>
                <a href="{{route('horaire.index')}}" class=@yield('horaire')>
                    <i class="bi bi-calendar-check-fill"></i>
                    <span>horaire quotidien</span>
                </a>
                <a href="{{route('List-clients.index')}}" class=@yield('clients')>
                    <i class="bi bi-people-fill"></i>
                    <span>Liste de clients</span>
                </a>
                <a href="{{route('List-Medecin.index')}}" class=@yield('medecins')>
                    <i class="bi bi-file-person-fill"></i>
                    <span>Liste des médecins</span>
                </a>
                <a href="#" class=@yield('Faire')>
                    <i class="bi bi-calendar3"></i>
                    <span>Faire des rendez-vous</span>
                </a>
                <a href="#" class=@yield('messages')>
                    <i class="bi bi-envelope-fill"></i>
                    <span>messages</span>
                </a>
                <a href="#" class=@yield('Demande')>
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Demande de formation</span>
                </a>
                <a href="#" class=@yield('Settings')>
                    <i class="bi bi-gear-fill"></i>
                    <span>Settings</span>
                </a>
            </div>

            <div class="logOut d-flex justify-content-center w-100">
                <a href="#">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                </a>
            </div>

        </aside>

        <div class="body-Home d-grid">
            <nav class="display-flex-spece-between ">
                <h5 class="me-3 text-capitalize">@yield('TitleHead')</h5>
                <div class="date">
                    <span>05</span>
                    <span>/</span>
                    <span>26</span>
                    <span>/</span> 
                    <span>2023</span>
                </div>
                <div class="admin d-flex">
                    <span class="d-flex  flex-column align-items-center me-3">
                        <span><span class="gree">Hey,</span> <b>gbibar</b> </span>
                        <span class="gree ">admin</span>
                    </span>

                    <img src="../img/face1.jpg" class="image" alt="">
                </div>
            </nav>


            @yield('container')

        </div>

    </div>


    {{-- <!-- scrip bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script> --}}

    <script src="../js/listUser.js" ></script>

    
    <!-- scrip bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    @yield('linkJS')

</body>

</html>