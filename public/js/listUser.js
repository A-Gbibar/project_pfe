
let image_uplode = document.querySelector(".image-uplode");
let input_image = document.querySelector('.input-image');
input_image.onchange = function () {
    image_uplode.src = URL.createObjectURL(input_image.files[0])
}
let image_uplode1 = document.querySelector(".image-uplode1");
let input_image1 = document.querySelector('.input-image1');
input_image1.onchange = function () {
    image_uplode1.src = URL.createObjectURL(input_image1.files[0])
}



    function showCreateBox(){
        document.querySelector('.create-user').classList.toggle('active');
    }
    function showUser(){
        document.querySelector('.show-user').classList.toggle('active');
    }

    let TypeUser = document.querySelector('.TypeUser');
    let info =  document.querySelector('.info-user');
    let str ;
     function nextInfoAdulte(){
        TypeUser.classList.toggle('noActive');
        info.classList.toggle('active');
        str = "adulte";
    }
    let enfant = document.querySelector(".fatherMather")
    function nextInfoEnfant(){
        TypeUser.classList.toggle('noActive');
        enfant.classList.toggle('active');
        str = "Enfant";
    }
    let infoChild = document.querySelector(".info-child");

    function nextEnfant(){
        enfant.classList.remove('active');
        infoChild.classList.toggle("active");
    }
    function Retour(){
        enfant.classList.add('active');
        infoChild.classList.remove("active");
    }

    let Diagnostic = document.querySelector('.Diagnostic');
    function nextDiagnostic(){
        if( str == "Enfant" ){
            enfant.classList.remove('active');
            infoChild.classList.remove("active");
        }else{
            info.classList.remove('active');
        }
        Diagnostic.classList.toggle('active');
    }
    function RetourDiagnostic(){
        if(str == "Enfant"){
            infoChild.classList.add("active");
        }else{
            info.classList.add('active');
        }
        Diagnostic.classList.remove('active');
    }
    let Medecins = document.querySelector(".Medecins");
    function nextMedecin(){
        Medecins.classList.toggle('active');
    }

