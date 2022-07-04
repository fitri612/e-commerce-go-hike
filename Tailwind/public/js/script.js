// reload page when resize
window.onresize = function(){
    location.reload();
}

// hamburg menu js
function addClass(e, classes){
    e.classList && e.classList.add(...classes.split(" "));
}    
function removeClass(e, classes){
    e.classList && e.classList.remove(...classes.split(" "));
}

const menuToggleId = document.getElementById("menu-toggler");
menuToggleId.addEventListener("click", function(){
    const menuId = document.getElementById("menu");
    if(menuId.className.indexOf("opacity-0")>-1){
        addClass(menuToggleId, "fixed right-0 top-0");
        addClass(menuId, "opacity-100 z-30 mt-6 bg-slate-300 rounded-lg w-full -translate-x-4 transition duration-500");
        removeClass(menuId, "opacity-0 invisible");
    } else{
        removeClass(menuToggleId, "fixed right-0");
        addClass(menuToggleId, "relative");
        removeClass(menuId, "opacity-100 z-30 bg-slate-300 rounded-lg -translate-x-4 transition duration-500");
        addClass(menuId, "opacity-0 invisible");
    }
})

window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav){
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
}

// btn sidebar
let btnprof = document.getElementById("btneditprofil");
let btnhist = document.getElementById("btnhistory");

let prof = document.getElementById("profile");
let hist = document.getElementById("history");

btnprof.onclick = function (){
    hist.style.display = "none";
    prof.style.display = "block";
}

btnhist.onclick = function (){
    prof.style.display = "none";
    hist.style.display = "block";
}
        

function incrementValue(){
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decrementValue(){
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    document.getElementById('number').value = value;
}

function increment() {
    var num = document.getElementById('num');
    var number = num.innerHTML;
    number++;
    num.innerHTML = number;
}

function decrement() {
    var num = document.getElementById('num');
    var number = num.innerHTML;
    number--;
    num.innerHTML = number;
}