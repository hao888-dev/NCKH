function hienThiMenu() {
    var thanhDieuHuong = document.getElementById("thanh-dieu-huong");
    var overlay = document.getElementById("overlay");

    if (window.innerWidth <= 1439) {
        thanhDieuHuong.classList.toggle("show");
        overlay.classList.toggle("show");
    }
}

document.addEventListener("click", function(event) {
    var thanhDieuHuong = document.getElementById("thanh-dieu-huong");
    var menuToggle = document.getElementsByClassName("menu")[0];
    var overlay = document.getElementById("overlay");

    if (!thanhDieuHuong.contains(event.target) && !menuToggle.contains(event.target) && overlay.contains(event.target)) {
        thanhDieuHuong.classList.remove("show");
        overlay.classList.remove("show");
    }
});

window.addEventListener("resize", function() {
    var thanhDieuHuong = document.getElementById("thanh-dieu-huong");
    var overlay = document.getElementById("overlay");

    if (window.innerWidth > 1439) {
        thanhDieuHuong.classList.remove("show");
        overlay.classList.remove("show");
    }
});
