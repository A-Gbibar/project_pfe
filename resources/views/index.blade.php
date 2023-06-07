
@extends('layout.app')

@section('title') Home @endsection
@section('Home') active @endsection
@section('TitleHead')
 Home
@endsection
@section('container')
            <section>
                <div class="miniBox d-flex justify-content-around w-100 align-items-center">
                    <a href="#" class="bodySection">
                        <div class="box TotalUser d-flex flex-column">
                            <span class="text-capitalize">dernier utilisateur</span>
                            <div class="user ms-2 d-flex">
                                <img src="../img/face16.jpg" class="image me-3" alt="">
                                <span class="d-flex  flex-column align-items-center">Aissa Gbibar <b
                                        class="gree">209</b> </span>
                            </div>
                            <div class="total mt-2 d-flex justify-content-between align-items-center w-100">
                                <div class="title text-center ">
                                    <h6>Totla User</h6>
                                    <h5 class="">340</h5>
                                </div>
                                <div class="donne position-relative display-flex-center">
                                    <svg>
                                        <circle cx="37" cy="37" r="33"></circle>
                                    </svg>
                                    <span class="position-absolute">81%</span>
                                </div>

                            </div>
                            <span class="gree">Last 12 Hours</span>
                        </div>
                    </a>
                    <a href="#" class="bodySection">
                        <div class="box TotalUser d-flex flex-column">
                            <span class="text-capitalize">dernier médecin</span>
                            <div class="user ms-2 d-flex">
                                <img src="../img/face15.jpg" class="image me-3" alt="">
                                <span class="d-flex  flex-column align-items-center">Amine kabile<b class="gree">210</b>
                                </span>
                            </div>
                            <div class="total mt-2 d-flex justify-content-between align-items-center w-100">
                                <div class="title text-center ">
                                    <h6>Totla médecin</h6>
                                    <h5 class="">20</h5>
                                </div>
                                <div class="donne position-relative display-flex-center">
                                    <svg>
                                        <circle cx="37" cy="37" r="33"></circle>
                                    </svg>
                                    <span class="position-absolute">60%</span>
                                </div>

                            </div>
                            <span class="gree">Last 24 Hours</span>
                        </div>
                    </a>
                    <a href="#" class="bodySection">
                        <div class="box TotalUser d-flex flex-column">
                            <span>last User</span>
                            <div class="user ms-2 d-flex">
                                <img src="../img/face16.jpg" class="image me-3" alt="">
                                <span class="d-flex  flex-column align-items-center">Aissa Gbibar <b
                                        class="gree">209</b> </span>
                            </div>
                            <div class="total mt-2 d-flex justify-content-between align-items-center w-100">
                                <div class="title text-center ">
                                    <h6>Totla User</h6>
                                    <h5 class="">340</h5>
                                </div>
                                <div class="donne position-relative display-flex-center">
                                    <svg>
                                        <circle cx="37" cy="37" r="33"></circle>
                                    </svg>
                                    <span class="position-absolute">81%</span>
                                </div>

                            </div>
                            <span class="gree">Last 12 Hours</span>
                        </div>
                    </a>
                </div>
                <h5 class="mt-3 mb-3 text-capitalize ms-2" > <i class="bi bi-arrow-90deg-right me-2"></i>  horaire quotidien  </h5>
                <div class="upBox horaires"> 
                    <div class="subBox horaire H-one bodySection d-grid  align-items-center">
                        <span class="time s-time"> <b> 7:00</b></span>
                        <span class="name name-user">Aissa gbibar</span>
                        <span class="name name-doctor">Amine doctor</span>
                        <span class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span class="time e-time"><b> 8:00</b></span>
                    </div>
                    <div class="subBox horaire H-tow bodySection d-grid  align-items-center">
                        <span class="time s-time"> <b> 8:10</b></span>
                        <span class="name name-user">Aissa gbibar</span>
                        <span class="name name-doctor">Amine doctor</span>
                        <span class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span class="time e-time"><b>9:10</b> </span>
                    </div>
                    <div class="show w-100 text-center">
                        <a href="#" class="">show All</a>
                    </div>
                </div>
                <h5 class="mt-3 mb-3 text-capitalize ms-2" > <i class="bi bi-arrow-90deg-right me-2"></i>  Liste de clients  </h5>

                 <table class="table bodySection text-center overflow-hidden">
                    <thead>
                        <tr class="p-2">
                            <th><i class="bi bi-image-fill"></i></th>
                            <th>Id</th>
                            <th>Type</th>
                            <th>nom et prénom</th>
                            <th>Tell</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <td><img src="../img/face2.jpg" alt="" class="image"></td>
                            <td>1</td>
                            <td>Adulte</td>
                            <td>Auspicious</td>
                            <td>+212 676571308</td>
                            <td>Sidi Rahhal Chaouia 26652</td>
                        </tr>
                        <tr>
                            <td><img src="../img/face8.jpg" alt="" class="image"></td>
                            <td>2</td>
                            <td>Adulte</td>
                            <td>Auspicious</td>
                            <td>+212 676571308</td>
                            <td>Sidi Rahhal Chaouia 26652</td>
                        </tr>
                        <tr>
                            <td><img src="../img/face20.jpg" alt="" class="image"></td>
                            <td>2</td>
                            <td>Adulte</td>
                            <td>Auspicious</td>
                            <td>+212 676571308</td>
                            <td>Sidi Rahhal Chaouia 26652</td>
                        </tr>
                        <tr>
                            <td><img src="../img/face1.jpg" alt="" class="image"></td>
                            <td>2</td>
                            <td>Adulte</td>
                            <td>Auspicious</td>
                            <td>+212 676571308</td>
                            <td>Sidi Rahhal Chaouia 26652</td>
                        </tr>
                    </tbody>
                 </table>

                 <div class="show w-100 text-center">
                    <a href="#" class="">show All</a>
                </div>

            </section>
@endsection
