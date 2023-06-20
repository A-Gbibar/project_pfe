window.addEventListener("scroll", function () {
  this.document
    .querySelector("nav")
    .classList.toggle("active", this.window.scrollY > 0);
  this.document
    .getElementById("uphome")
    .classList.toggle("active", this.window.scrollY > 500);
});

let list = document.querySelector(".list");
list.onclick = function () {
  document.querySelector(".get_started").classList.toggle("active");
  document.querySelector(".bi-list").classList.toggle("bi-x");
};

let click = document.querySelector(".click");
function clickshow() {
  document.querySelector(".perant").classList.toggle("active");
}
let click1 = document.querySelector(".click1");
function clickremove() {
  document.querySelector(".perant").classList.remove("active");
}



let docs = document.querySelectorAll(".docs");
if (docs.length > 3) {
  let team = document.querySelector(".team");
  team.classList.toggle("show");
  let plus = document.querySelector(".plus");
  plus.innerHTML = "Montre plus..." + ` (+ ${docs.length - 3}) `;
  plus.onclick = function () {
    document.querySelector(".team").classList.toggle("active");
    if (plus.classList.toggle("changeText")) {
      plus.innerHTML = "cacher" + ` (- ${docs.length - 3}) `;
    } else {
      plus.innerHTML = "Montre plus..." + ` (+ ${docs.length - 3}) `;
    }
  };
}

// let user = document.querySelectorAll(".user");

// if (user.length > 6) {
//   let comment = document.querySelector(".comment");
//   comment.classList.toggle("show");
//   let plusMore = document.querySelector(".plusMore");
//   plusMore.innerHTML = "Montre plus..." + ` (+ ${user.length - 6}) `;
//   plusMore.onclick = function () {
//      comment.classList.toggle("active");
//     if (plusMore.classList.toggle("changeText")) {
//       plusMore.innerHTML = "cacher" +    ` (- ${user.length - 6}) `;
//     } else {
//       plusMore.innerHTML = "Montre plus..." + ` (+ ${user.length - 6}) `;
//     }
//   };
// }


let stars = document.querySelectorAll(".clickstart span");

stars.forEach((item , index1) => {
  item.addEventListener('click' , ()=>{
    stars.forEach((star , index2)  =>{
      index1 >= index2 ? star.classList.add("active") : star.classList.remove("active") ;
      document.getElementById('hear').setAttribute('value' , index1 + 1)
      document.querySelector(".number .hearshow").innerHTML = index1 + 1;

    })
  })
})

let image_uplode = document.querySelector(".image-uplode");
let input_image = document.querySelector(".input-image");
input_image.onchange = function () {
    image_uplode.src = URL.createObjectURL(input_image.files[0]);
};

// ====================================show Alert Add User ======================

function alertUser(UserNmae, cine, message) {
  document.querySelector(".goodAdd").classList.add("active");
  var alert = `
  <div class="box d-flex justify-content-center  align-items-center flex-column">
  <div class="icon"></div>
  <h5 class="UserName title">${UserNmae}</h5>
  <div class="CIN"><span class="gree">Evaluation : </span> <span>${cine} / 10 </span></div>
  <p>${message}</p>
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

  setTimeout(() => {
      document.querySelector(".goodAdd").classList.remove("active");
  }, 4000);
}

function alertErorr(massge) {
  document.querySelector(".errorAdd").classList.add("active");
  var alert = `
  <div class="box position-relative d-flex mt-4 justify-content-center  align-items-center flex-column">
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
  <span class="close alterClose display-flex-center" onclick="closeError();"><i
  class="bi bi-x-lg"></i></span>
</div>
  `;
  $(".errorAdd").html(alert);
}
function closeError() {
  document.querySelector(".errorAdd").classList.remove("active");
}