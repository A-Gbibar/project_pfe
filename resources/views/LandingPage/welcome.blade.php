<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre Racine</title>
    <!-- link bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- link main all css -->
    <link rel="stylesheet" href="css/mainAll.css">
    <!-- link main css page -->
    <link rel="stylesheet" href="css/main.css">
    {{-- ================Link================Ajax============== --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <!-- the start naviction -->
    <nav>
        <div class="container display-flex-spece-between">
            <div class="log"><img src="img/loginLogo.png" alt=""></div>

            <div class="get_started display-flex-spece-between">
                <ul>
                    <li><a href="#home">Maison</a></li>
                    <li><a href="#service">Service</a></li>
                    <li><a href="#team">Équipe</a></li>
                    <li><a href="#commants">Commentaire</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <button class="btn-button"><a href="{{route('connexion.index')}}">Get Started</a></button>
            </div>
            <div class="list">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </nav>
    <!-- the end naviction -->

    <div class="up" id="uphome">
        <a href="#up"><i class="bi bi-arrow-up-circle-fill"></i></a>
    </div>

    <!--_________________________________the start home___________________________________________-->

    <div class="home display-flex-center" id="home">
        <!-- start identi -->

        <div class="identi container display-flex-center" id="up">
            <div class="info display-flex-center">
                <h1>Centre Racine</h1>
                <span class="mb-4">Rééducation Pluridisciplinaire</span>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum neque ullam est quidem
                    ducimus tempora debitis saepe, nobis facilis! Quis eos molestiae id animi! Facilis animi voluptate
                    molestiae optio consequuntur!</p>
                <div class="button display-flex-center">
                    <button class="btn-button me-4"><a href="{{route('connexion.index')}}">Get Started</a></button>
                    <a href="#play" class="display-flex-center"><span><i class="bi bi-play-fill fs-3"></i></span> <span
                            class="ms-3">regarder la vidéo</span></a>
                </div>
            </div>
            <div class="img display-flex-center">
                <img src="img/undraw_medicine_b-1-ol.svg" alt="">
            </div>
            <a href="#down"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>

        <!-- end identi -->

        <div class="react_use mb-4 " id="down">
            <div class="container ">
                <div class="reacts display-flex-spece-between">
                    <h4 class="fw-bold text-center w-100 ">Site stats</h4>
                    <div class="react users">
                        <span><i class="bi bi-people-fill"></i></span>
                        <span id = "ContUser" ></span>
                        <span>User</span>
                    </div>
                    <div class="react visit">
                        <span><i class="bi bi-eye-fill"></i></span>
                        <span>1</span>
                        <span>Number of Visitors</span>
                    </div>
                    <div class="react happy">
                        <span><i class="bi bi-emoji-laughing-fill"></i></span>
                        <span id='happy'></span>
                        <span>Happy customers</span>
                    </div>
                    <div class="react star">
                        <span><i class="bi bi-star-fill"></i></span>
                        <span id="stars"></span>
                        <span>Five stars</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="information mb-4">
            <div class="container">
                <h3 class="fw-bold text-center w-100 p-4">Informations sur Centre Racine</h3>
                <div class="gid-info mt-4 mb-4">
                    <div class="imag display-flex-center"> <img src="img/undraw_online_information_re_erks.svg" alt="">
                    </div>
                    <div class="info display-flex-center flex-column">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ut sint reprehenderit, ex
                            accusantium, quos molestias maiores optio corporis, repellendus est veniam commodi illum
                            beatae ea error in autem nam.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ut sint reprehenderit,
                        </p>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <span class="mt-2 mb-2 w-100"> <button class="btn-button"><a href="#"> <i
                                        class="bi bi-geo-alt-fill"></i> emplacement</a></button> </span>
                    </div>
                </div>
                <div class="video mt-5  ">
                    <h4 class="fw-bold text-center w-100 mb-3 " id="play">Qui sommes-nous</h4>
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/UJKNpJszrhI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>
    <!--_________________________________the end home___________________________________________-->


    <!--_________________________________the start Service___________________________________________-->

    <div class="Services mt-4" id="service">

        <div class="Service">
            <div class="container">
                <h3 class="fw-bold text-center w-100 p-4 mb-4">Services</h3>
                <div class="tool">

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-physical-therapy-4580491.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">kinésithérapie</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem1"
                            role="button" aria-expanded="false" aria-controls="lorem1"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-physical-therapy-4666602.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Psychomotricité</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem2"
                            role="button" aria-expanded="false" aria-controls="lorem2"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-speech-1789181.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Orthophonie</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem3"
                            role="button" aria-expanded="false" aria-controls="lorem3"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-eyesight-5240352.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Orthoptice</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem4"
                            role="button" aria-expanded="false" aria-controls="lorem4"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-cognitive-3216367.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Remédiation Cognitive</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem5"
                            role="button" aria-expanded="false" aria-controls="lorem5"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-special-education-teacher-5220671.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Education Spécialisée</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem6"
                            role="button" aria-expanded="false" aria-controls="lorem6"
                            onclick="clickshow();">lorem...</button>
                    </div>

                    <div class="kin display-flex-center flex-column">
                        <div class="icon mb-2"> <img src="img/noun-training-4829165.svg" alt=""></div>
                        <h4 class="text-capitalize mb-3">Formation Continue</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit dolore
                            mollitia cumque aspernatur.</p>
                        <button class="btn-button click collapsed" data-bs-toggle="collapse" href="#lorem7"
                            role="button" aria-expanded="false" aria-controls="lorem7"
                            onclick="clickshow();">lorem...</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="sub_services mt-4 mb-4 display-flex-center">
            <div class="container">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner w-100 h-100">
                        <div class="carousel-item active position-relative" data-bs-interval="10000">
                            <img src="img/n4.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block ">
                                <h5 class="fw-bolder">First slide label</h5>
                                <p class="text-center">Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" ata-bs-interval="2000">
                            <img src="img/n1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block ">
                                <h5 class="fw-bolder">Second slide label</h5>
                                <p class="text-center">Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="img/n2.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="fw-bolder">Third slide label</h5>
                                <p class="text-center">Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="img/n3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="fw-bolder">Third slide label</h5>
                                <p class="text-center">Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">

                        <i class="bi bi-caret-left-fill " aria-hidden="true"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <i class="bi bi-caret-right-fill " aria-hidden="true"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

    </div>


    <!--_________________________________the end Service___________________________________________-->

    <!-- __________________________________start_lorem_servise________________________________ -->


    <div class="perant  display-flex-center">
        <div class="container display-flex-center flex-column">

            <div class="lorem collapse" id="lorem1">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem1"
                    aria-expanded="false" aria-controls="lorem1" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2 mt-4"> <img src="img/noun-physical-therapy-4580491.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">kinésithérapie</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem2">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem2"
                    aria-expanded="false" aria-controls="lorem2" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-physical-therapy-4666602.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Psychomotricité</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem3">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem3"
                    aria-expanded="false" aria-controls="lorem3" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-speech-1789181.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Orthophonie</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem4">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem4"
                    aria-expanded="false" aria-controls="lorem4" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-eyesight-5240352.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Orthoptice</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem5">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem5"
                    aria-expanded="false" aria-controls="lorem5" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-cognitive-3216367.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Remédiation Cognitive</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem6">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem6"
                    aria-expanded="false" aria-controls="lorem6" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-special-education-teacher-5220671.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Education Spécialisée</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                        </div>

                    </div>
                </div>

            </div>

            <div class="lorem collapse" id="lorem7">

                <a class="click1 display-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#lorem7"
                    aria-expanded="false" aria-controls="lorem7" onclick="clickremove();"><i
                        class="bi bi-x-circle-fill"></i></a>

                <div class="all display-flex-center flex-column">

                    <div class="icon mb-2"> <img src="img/noun-training-4829165.svg" alt=""></div>
                    <h4 class="text-capitalize mb-3">Formation Continue</h4>
                    <div class="def display-flex-center flex-column">
                        <span class="mb-2 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>Qu'est-ce kinésithérapie :
                        </span>
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora
                            quasi magnam unde illo sapiente praesentium, error libero repellat inventore aliquam qui,
                            expedita officia fugit autem blanditiis placeat dolor?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt tempora quasi magnam
                            unde illo sapiente praesentium, error libero repellat inventore aliquam qui, expedita
                            officia fugit autem blanditiis placeat dolor?
                        </p>

                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. </span></span>
                        <span class="w-100 text-center p-3 mt-2 mb-2"><span> Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</span></span>

                        <div class="etap mt-4">
                            <span class="mb-4 w-100"><i class="bi bi-arrow-90deg-right me-2 "></i>quelques étapes :
                            </span>
                            <div class="image mt-4">
                                <div>
                                    <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="img/b.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                                <div> <img src="img/c.jpg" alt="">
                                    <div class="info display-flex-center flex-column">
                                        <h4>kinésithérapie</h4>
                                        <p>orem ipsum dolor sit amet, consectetur dipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="video mt-4 w-100 display-flex-center flex-column p-0">
                            <span class="mb-4 w-100 "><i class="bi bi-arrow-90deg-right me-2 "></i>Les 6 conseils
                            </span>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SCl2U8llPbQ"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- __________________________________end_lorem_servise________________________________ -->



    <!-- __________________________________start_Équipe________________________________ -->

    <div class="teams" id="team">
        <div class="container ">
            <h3 class="fw-bold text-center w-100 p-4 mb-4">Équipe</h3>

            <div class="team position-relative">
              <button class="btn-button plus"></button>
                <div class="docs doc-left display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="docs doc-right display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="docs doc-left display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="docs doc-right display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>


                <div class="docs doc-left display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>



                <div class="docs doc-right display-flex-center">
                    <div class="doc display-flex-center flex-column ">
                        <div class="image display-flex-center"><img src="img/doctor.png" alt=""></div>
                        <h4 class="mt-2">Doctor Name</h4>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> spécialité :
                            <span>kinésithérapie</span></span>
                        <span> <i class="bi bi-arrow-90deg-right me-2 "></i> Date : <span> 03/08/1999 </span></span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quidem autem eos laborum
                            mollitia delectus explicabo architecto porro hic rerum consequatur perspiciatis.</p>
                        <button class="btn-button w-75">lorem...</button>
                        <div class="socila w-75 mt-2 display-flex-spece-between justify-content-around ">
                            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>



            </div>
        </div>


        </div>
    </div>

    <!-- __________________________________end_Équipe________________________________ -->

    <!-- __________________________________start_Équipe________________________________ -->


    <!-- __________________________________start_Commentaire________________________________ -->

    <div class="comments mb-4" id = "commants">
        <div class="container">
            <h3 class="fw-bold text-center w-100 p-4 mb-4">Commentaire</h3>
            <h4 class="fw-bold text-center w-100 ">Quelques commentaires pour moi Utilisateurs</h4>

            <div class="comment mt-4">
              
                

            </div>

            <h4 class="fw-bold text-center w-100 mt-4 mb-4 ">Vous pouvez noter ici</h4>

            <div class="review display-flex-center">
                    <form  id = "CommentForm"   enctype="multipart/form-data"  method="POST" class="display-flex flex-column">
                        @csrf
                    <div class="perantImage w-100 display-flex-center" >
                        <label for="click" class="upload-imag  mt-3 display-flex-center position-relative">
                            <input type="file" Id='click' name='imageUsers'  accept="image/*" class="input-image">
                            <div class="imag-show display-flex-center">
                                <img src="/img/user.png" alt="" class="image-uplode">
                            </div>
                        </label>
                    </div>

                        <label class="UserName">
                            <input type="text" name="UserName" class="fild w-100" required>
                            <span>Nom d'utilisateur</span>
                        </label>
                        <label class="CommentText">
                            <textarea name="CommentText"  class="fild w-100" required = "required"></textarea>
                            <span>commentaire</span>
                        </label>
                        <label class="stars pt-2 display-flex-center flex-column w-100">
                            <span >Evaluation</span>
                            <div class="star display-flex-spece-between w-100 pe-4">
                            <div class="clickstart">
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                                <span class="bi-star-fill"></span>
                            </div>
                                <div class="number">
                                    <input type="text" readonly  name="number" id="hear" >
                                    <span class="hearshow"></span>
                                    <span>/</span>
                                    <span>10</span>
                                </div>
                            </div>
                        </label>

                        <button class="btn-button" type="submit">Add review</button>
                        
                        
                    </form>
            </div>

        </div>
    </div>

    <!-- __________________________________end_Commentaire________________________________ -->


    <!-- __________________________________start_Localition________________________________ -->

    <div class="location">
        <div class="container">
            <h3 class="fw-bold text-center w-100 p-4 mb-4 mt-4">location</h3>
            <div class="local p-1 mb-4 w-100">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1360.5228585244538!2d-7.525656933956966!3d33.40482896869458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scenter%20racine!5e0!3m2!1sen!2sma!4v1684020484682!5m2!1sen!2sma" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
    <!-- __________________________________end_Localition________________________________ -->

    
    <!-- __________________________________start_footer________________________________ -->

        <footer>
            <div class="container">
                
            </div>
        </footer>
    <!-- __________________________________end_footer________________________________ -->




       {{-- alert add Good --}}
       <div class="d-flex justify-content-center flex-column overflow-hidden  align-items-center UserAdd goodAdd">

       </div>
       {{-- alert error  --}}
       <div class="d-flex  justify-content-center  flex-column overflow-hidden  align-items-center UserAdd errorAdd">

       </div>





    <!-- main JS script -->
    <script src="js/mian.js"></script>


    {{-- ///script Ajax --}}

    <script>


      // ===================read===========Data=================

      function readData() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '{{ route('showComment.show') }}',
                success: function(readData) {
                    $('.comment').html(readData);
                    let user = document.querySelectorAll(".user");

                            if (user.length > 6) {
                            let comment = document.querySelector(".comment");
                            comment.classList.toggle("show");
                            let plusMore = document.querySelector(".plusMore");
                            plusMore.innerHTML = "Montre plus..." + ` (+ ${user.length - 6}) `;
                            plusMore.onclick = function () {
                                comment.classList.toggle("active");
                                if (plusMore.classList.toggle("changeText")) {
                                plusMore.innerHTML = "cacher" +    ` (- ${user.length - 6}) `;
                                } else {
                                plusMore.innerHTML = "Montre plus..." + ` (+ ${user.length - 6}) `;
                                }
                            };
                            }
                },
                error: function(e) {
                    alertErorr(" is error (" + e.responseJSON.message +
                            ")");
                }

            })
        }
        readData();

         // ========================Site stats=========================

                function stats(){
            $.ajax({
                type: "get",
                dataType: 'json',
                url: "{{route('SiteStats.Stats')}}",
                success:function(data){
                    $('#ContUser').html(data.count);
                    $('#happy').html(data.Happy);
                    $('#stars').html(data.stars);
                },
                error: function(e) {
                    alertErorr(" is error (" + e.responseJSON.message +
                            ")");
                }
            })
        }
        stats();

        /// ============Sava==============Data====================
        function claerData() {
            var form = $("#CommentForm")[0].reset();
        }
        $(document).ready(function() {
            $("#CommentForm").submit(function(event) {
                event.preventDefault();
                var form = $("#CommentForm")[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{route('Comment.store')}}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        claerData();
                        let UseName = data.UserName;
                        alertUser(UseName, data.Evale, 'Merci pour cet avis, je connais votre temps');
                        readData();
                        stats();
                    },
                    error: function(e) {

                        alertErorr(" is error (" + e.responseJSON.message +
                            ")");
                    }
                })
            })
        })


         
      

  

    </script>

    <!-- scrip bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>