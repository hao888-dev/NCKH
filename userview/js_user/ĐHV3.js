function hienThiMenu() {
    var menu = document.getElementById("thanh-dieu-huong");
    var overlay = document.querySelector(".overlay");

    if (!overlay) { 
        overlay = document.createElement("div");
        overlay.classList.add("overlay");
        document.body.appendChild(overlay);
        overlay.addEventListener("click", anMenu);
    }

    if (!menu.classList.contains("show")) {
        menu.style.display = "flex";
        setTimeout(() => menu.classList.add("show"), 10);
        overlay.classList.add("show");
    } else {
        anMenu();
    }
}



function anMenu() {
    var menu = document.getElementById("thanh-dieu-huong");
    var overlay = document.querySelector(".overlay");

    menu.classList.remove("show");
    if (overlay) {
        overlay.classList.remove("show");
        setTimeout(() => {
            menu.style.display = "none";
            document.body.removeChild(overlay);
        }, 300);
    }
}


window.addEventListener("resize", function () {
    if (window.innerWidth > 1200) {
        anMenu(); 
    }
});