function updateCharCount() {
    const description = document.getElementById('n-description');
    const charCount = document.getElementById('charCount');
    const currentLength = description.value.length;
    charCount.textContent = `${currentLength}/170`;
}

function displayFileInfo(type) {
    let fileInput = document.getElementById(`${type}-file`);
    let fileName = document.getElementById(`${type}-file-name`);
    let fileInfo = document.getElementById(`${type}-file-info`);
    let fileButton = document.getElementById(`${type}-btn`);
    let file = fileInput.files[0];

    if (file) {
        
        fileButton.classList.add("hidden");
        fileName.textContent = file.name;
        fileInfo.style.display = "block";
    }
}

function removeFile(type) {
    let fileInput = document.getElementById(`${type}-file`);
    let fileInfo = document.getElementById(`${type}-file-info`);
    let fileButton = document.getElementById(`${type}-btn`);

    
    fileInput.value = "";
    fileInfo.style.display = "none";

    
    fileButton.classList.remove("hidden");
}
function xet() {
let dk = ['n-name', 'n-reason', 'n-lesson', 'n-content', 'n-description'];
let isValid = true; 
let error = document.getElementById("error");

dk.forEach(id => {
let inputField = document.getElementById(id);
let label = inputField.previousElementSibling;

if (!inputField.value.trim()) {
    label.style.color = "red"; 
    isValid = false;
} else {
    label.style.color = "black"; 
}
});

let wordFile = document.getElementById('word-file').files.length > 0;
let pdfFile = document.getElementById('pdf-file').files.length > 0;
let wordLabel = document.querySelector('label[for="word-file"]');
let pdfLabel = document.querySelector('label[for="pdf-file"]');

if (!wordFile && !pdfFile) {
wordLabel.style.color = "red"; 
pdfLabel.style.color = "red"; 
isValid = false;
} else {
wordLabel.style.color = "black"; 
pdfLabel.style.color = "black"; 
}

if (!isValid) {
error.style.display = "block";
error.textContent = "Vui lòng nhập đầy đủ thông tin trước khi đăng!";
} else {
error.style.display = "none"; 

}
}



document.querySelector(".x_t").onclick = function () {
let container4= document.querySelector(".container4")
let container3 = document.querySelector(".container3");
let container2 = document.querySelector(".container2");
let tac_gia = document.getElementById("n-name");
let phan_loai = document.getElementById("n-reason");
let bai=document.getElementById("n-lesson");
let noi_dung=document.getElementById("n-content");
let link_xem=document.getElementById("n-video").value.trim();
let tep_word=document.getElementById("word-file");
let tep_pdf=document.getElementById("pdf-file");
let tep_ppt=document.getElementById("ppt-file");
let mo_ta_f=document.getElementById("n-description");


let ngaydang = document.querySelector(".tt_1");
let ten = document.querySelector(".tt_2");
let dang = document.querySelector(".tt_4");
let nuts= document.querySelector(".x_t");
let chu_chinh=document.querySelector(".h1_1");
let noi_dung_m=document.querySelector(".content1");
let video=document.querySelector(".hien_thi");
let ten_file_word=document.getElementById("view-word");
let tai_word=document.getElementById("t_w");
let ten_file_pdf=document.getElementById("view-pdf");
let tai_pdf=document.getElementById("t_pdf");
let ten_file_ppt=document.getElementById("view-ppt");
let tai_ppt=document.getElementById("t_ppt");
let mo_ta=document.getElementById("description1");
let n_d=document.querySelector(".n_d");
let t_g=document.querySelector(".m_t2");
let m_t=document.querySelector(".m_t1");


if(tep_ppt.files.length>0){
let f_ppt=tep_ppt.files[0];
ten_file_ppt.textContent= "File word: " + tep_ppt.files[0].name;

let a_c=URL.createObjectURL(f_ppt);
tai_ppt.href=a_c;
tai_ppt.download=tep_ppt.files[0].name;
}else{
ten_file_ppt.textContent= "File word: Không có" ;
}

if(tep_word.files.length>0){
let f_w=tep_word.files[0];
ten_file_word.textContent= "File word: " + tep_word.files[0].name;

let a_a=URL.createObjectURL(f_w);
tai_word.href=a_a;
tai_word.download=tep_word.files[0].name;
}else{
ten_file_word.textContent= "File word: Không có" ;
}

if(tep_pdf.files.length>0){
let f_pdf=tep_pdf.files[0];
ten_file_pdf.textContent= "File pdf: " + tep_pdf.files[0].name;

let a_b=URL.createObjectURL(f_pdf);
tai_pdf.href=a_b;
tai_pdf.download=tep_pdf.files[0].name;
}else{
ten_file_pdf.textContent= "File pdf: Không có" ;
}

if (container4.style.display === "none" || container4.style.display === "" ) {
container4.style.display = "flex"; 
container4.classList.add("fade-in");
nuts.textContent="Đóng";

let today = new Date();
let ngay = String(today.getDate()).padStart(2, '0'); 
let thang = String(today.getMonth() + 1).padStart(2, '0'); 
let nam = today.getFullYear(); 

ngaydang.textContent = `${ngay}/${thang}/${nam}`; 
ten.textContent = tac_gia.value || "Chưa có tác giả"; 
t_g.textContent = tac_gia.value || "không có";
noi_dung_m.textContent=noi_dung.value || "Không có";
n_d.textContent=noi_dung.value || "Nội dung: Không có";
mo_ta.textContent=mo_ta_f.value || "Không có";
m_t.textContent=mo_ta_f.value || "Không có";
if (phan_loai && phan_loai.selectedIndex > 0) {
    dang.textContent = phan_loai.options[phan_loai.selectedIndex].text || "Không xác định"; 
} else {
    dang.textContent = "Không xác định"; 
}

if(bai && bai.selectedIndex>0){
    chu_chinh.textContent=bai.options[bai.selectedIndex].text || "Không có";
}
else{
    chu_chinh.textContent="Không có";
}
} else {
container4.style.display = "none"; 

nuts.textContent="Xem trước";
}

if (link_xem) {
    video.src = link_xem;
    video.style.display = "flex";
} else {
    video.style.display = "none";
}

};

