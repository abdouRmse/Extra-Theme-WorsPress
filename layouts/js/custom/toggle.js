
menu = document.getElementById("menu");
toggle = document.getElementById("button-toggle");

toggle.onclick = function(e){
    e.stopPropagation();
    menu.classList.toggle("open"); // show the menu
    toggle.classList.toggle("active-toggle"); // show the botton flech
}

menu.onclick = function(e){
    e.stopPropagation(); // stop probagation that it means whene i click in the ul dont make in conidiration the ul, even i click in the li it concider the ul (it work with this )
}

document.addEventListener("click",function(e){
   if(toggle.classList.contains('active-toggle') && (e.target !== menu)){
        menu.classList.toggle("open"); // show the menu
        toggle.classList.toggle("active-toggle"); // show the botton flech
    }
});
