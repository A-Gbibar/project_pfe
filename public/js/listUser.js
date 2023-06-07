let image_uplode = document.querySelector(".image-uplode");
let input_image = document.querySelector(".input-image");
input_image.onchange = function () {
    image_uplode.src = URL.createObjectURL(input_image.files[0]);
};
let image_uplode1 = document.querySelector(".image-uplode1");
let input_image1 = document.querySelector(".input-image1");
input_image1.onchange = function () {
    image_uplode1.src = URL.createObjectURL(input_image1.files[0]);
};

function showCreateBox() {
    document.querySelector(".create-user").classList.toggle("active");
}
function showUser() {
    document.querySelector(".show-user").classList.toggle("active");
}

let TypeUser = document.querySelector(".TypeUser");
let info = document.querySelector(".info-user");
let str;
function nextInfoAdulte() {
    TypeUser.classList.toggle("noActive");
    info.classList.toggle("active");
    str = "adulte";
}
let enfant = document.querySelector(".fatherMather");
function nextInfoEnfant() {
    TypeUser.classList.toggle("noActive");
    enfant.classList.toggle("active");
    str = "Enfant";
}
let infoChild = document.querySelector(".info-child");

function nextEnfant() {
    enfant.classList.remove("active");
    infoChild.classList.toggle("active");
}
function Retour() {
    enfant.classList.add("active");
    infoChild.classList.remove("active");
}

let Diagnostic = document.querySelector(".Diagnostic");
function nextDiagnostic() {
    if (str == "Enfant") {
        enfant.classList.remove("active");
        infoChild.classList.remove("active");
    } else {
        info.classList.remove("active");
    }
    Diagnostic.classList.toggle("active");
}
function RetourDiagnostic() {
    if (str == "Enfant") {
        infoChild.classList.add("active");
    } else {
        info.classList.add("active");
    }
    Diagnostic.classList.remove("active");
}
let Medecins = document.querySelector(".Medecins");
function nextMedecin() {
    Medecins.classList.toggle("active");
}

// create  pagination

function pagination(totalPage, currentpage) {
    if (totalPage > 1) {
        var pageList = "";
        currentpage = parseInt(currentpage);
        pageList += `<ul class="Pagination list-unstyled d-flex justify-content-center align-items-center">`;
        const leftClass = currentpage == 1 ? "disabled" : "";
        pageList += `<li class = "page-item${leftClass}"  >
                <a class="page-link" href = "#"  data-page = "${
                    currentpage - 1
                }" ><i class="bi bi-arrow-bar-left"></i></a></li>`;
        for (let p = 1; p <= totalPage; p++) {
            const activeClass = currentpage == p ? "active" : "";
            pageList += `<li class = "page-item${activeClass}"  > <a class="page-link" href = "#" data-page = "${p}" >${p}</a></li>`;
        }
        const rightClass = currentpage == totalPage ? "disabled" : "";
        pageList += `<li class = "page-item${rightClass}" >
                <a class="page-link" href = "#"  data-page = "${
                    currentpage + 1
                }" ><i class="bi bi-arrow-bar-right"></i></a></li>`;

        pageList += `</ul>`;
    }
    $(".pageList").html(pageList);
}

// ====================================show Alert Add User ======================

function alertUser(UserNmae, cine) {
    document.querySelector(".goodAdd").classList.add('active');
    var alert = `
    <div class="box d-flex justify-content-center  align-items-center flex-column">
    <div class="icon"></div>
    <h5 class="UserName title">${UserNmae}</h5>
    <div class="CIN"><span class="gree">CINE : </span> <span>${cine}</span></div>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit</p>
    <div class="stop d-flex w-100 ">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
    `;
    $(".goodAdd").html(alert);
    var i = 0;
    setTimeout(()=>{
        document.querySelector(".goodAdd").classList.remove('active');
        document.querySelector(".goodAdd").classList.add('d-none');
    } , 4000 );
}

function alertErorr(massge) {
    document.querySelector(".errorAdd").classList.add('active');
    var alert = `

    <div class="box d-flex mt-4 justify-content-center  align-items-center flex-column">
    <div class="icon Eroor"></div>
    <p>${massge}</p>
    <div class="stop d-flex w-100 ">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
    `;
    $(".errorAdd").html(alert);
    var i = 0;
    setTimeout(()=>{
        document.querySelector(".errorAdd").classList.remove('active');
        document.querySelector(".errorAdd").classList.add('d-none');
    } , 4000 );
}

