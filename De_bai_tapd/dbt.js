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

const comments = []; 
const defaultUser = "Người dùng 1"; 
let currentPage = 1;
const commentsPerPage = 5;

function renderComments() {
    const commentsList = document.getElementById('comments');
    commentsList.innerHTML = ''; 

    
    const startIndex = (currentPage - 1) * commentsPerPage;
    const endIndex = startIndex + commentsPerPage;
    const commentsToShow = comments.slice(startIndex, endIndex);

    commentsToShow.forEach((comment, index) => {
        const commentItem = document.createElement('li');
        commentItem.className = 'comment';
        commentItem.innerHTML = `
            <div class="name">${comment.name}</div>
            <div class="message">${comment.message}</div>
            <div>
                <button class="delete-btn" onclick="deleteComment(${startIndex + index})">Xóa</button>
            </div>
        `;
        commentsList.appendChild(commentItem);
    });

    
    document.getElementById('page-number').innerText = `Trang ${currentPage}`;
}

function addComment() {
    const messageInput = document.getElementById('message');
    const message = messageInput.value.trim();

    if (!message) {
        alert("Vui lòng nhập nội dung bình luận.");
        return;
    }

    comments.push({ name: defaultUser, message });
    messageInput.value = '';
    renderComments();
}

function deleteComment(index) {
    comments.splice(index, 1); 
    renderComments();
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        renderComments();
    }
}

function nextPage() {
    const totalPages = Math.ceil(comments.length / commentsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        renderComments();
    }
}
