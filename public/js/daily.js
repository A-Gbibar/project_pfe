


const timer = document.querySelectorAll(".timepicker");
M.Timepicker.init(timer, {
    showClearBtn: true,
    i18n: {
        clear: "Retirer",
        cancel: "Annuler",
        done: "OK",
    },
});

document.querySelector(".searchInput").onclick = function () {
    document.querySelector(".listUser").classList.remove("Noactive");
};
document.querySelector(".searchDocterInput").onclick = function () {
    document.querySelector(".listDocter").classList.remove("Noactive");
};
function UpdateInfo(){
    document.querySelector('.UpdateInfo').classList.remove('active');
}


function showaddhoraires() {
    let addhoraires = document.querySelector(".addhoraires");
    addhoraires.classList.toggle("active");
}


var d = new Date();
var year = d.getFullYear();
var month = d.getMonth()+1;
if( month < 10 ){
    month = '0'+month;
}
var date = d.getDate();
if(date < 10){
    date = '0'+date;
}
var c_date = year + "-" + month + '-' + date;

document.getElementById('DateHoraires').value = c_date;
