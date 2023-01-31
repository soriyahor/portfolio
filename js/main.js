let btn = document.querySelector(".btn1");
let list_nav = document.querySelector(".navUl");
let bye = document.querySelectorAll(".bye");

btn.addEventListener("click", (e) => {
  let nav = document.getElementById("navbar");
  console.log("nav", nav);
  nav.classList.toggle("active");

  btn.classList.toggle("active");
  console.log("bye", bye);
  bye.forEach((element) => {
    element.classList.toggle("smallScreen");
  });
});
