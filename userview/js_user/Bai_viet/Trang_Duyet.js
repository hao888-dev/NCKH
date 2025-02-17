const articlesPerPage = 5;
        let currentPage = 1;
        const articles = [
    {title: "Ma trận 0", status:"pending", description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"},
    {title: "Ma trận 2", status:"success",description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-2.html"},
    {title: "Ma trận 3", status:"error",description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"},
    {title: "Ma trận 0", status:"pending", description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"},
    {title: "Ma trận 2", status:"success",description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-2.html"},
    {title: "Ma trận 3", status:"error",description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"}
];

function displayArticles(page = 1) {
        const start = (page - 1) * articlesPerPage;
        const end = page * articlesPerPage;
        const articlesToShow = articles.slice(start, end);

        const articleList = document.getElementById("article-list");
        articleList.innerHTML = ''; 

        articlesToShow.forEach((article, index) => {
            const li = document.createElement('li');
            li.style.cursor = 'pointer'; 
            li.setAttribute('onclick', `window.location.href='${article.url}'`); 
            li.style.animationDelay = `${index * 0.2}s`; 
            li.innerHTML = `
                <a  style="text-decoration:none;">${article.title}</a>
                <div class="article-details">
                    <p><strong>Mô tả:</strong> ${article.description}</p>
                    <div class="the1">
                        <p><strong>Tác giả:</strong> ${article.author}</p>
                        <p><strong>Số lượt lưu:</strong> ${article.saved}</p>
                        <div class="status-container">
                            ${getStatusHTML(article.status)}
                        </div>
                    </div>
                </div>
            `;
            articleList.appendChild(li);
        });
        updatePagination(page);
    }

    function getStatusHTML(status) {
            if (status === "pending") {
                return `<div class="spinner"></div><span class="status-text">Chờ duyệt</span>`;
            } else if (status === "success") {
                return `<img src="../../picure_user/Duyet_html/check.png" alt="Thành công"><span class="status-text">Thành công</span>`;
            } else if (status === "error") {
                return `<img src="../../picure_user/Duyet_html/do-not-dry-clean.png" alt="Thất bại"><span class="status-text">Thất bại</span>`;
            }
        }

        function updatePagination(currentPage) {
    const totalPages = Math.ceil(articles.length / articlesPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; 

 
    const prevLink = document.createElement('a');
    prevLink.href = "#";
    prevLink.classList.add('arrow');
    prevLink.textContent = '←';
    prevLink.addEventListener('click', (e) => {
        e.preventDefault();
        if (currentPage > 1) {
            displayArticles(currentPage - 1);
            window.scrollTo({ top: 0, behavior: 'smooth' }); 
        }
    });
    pagination.appendChild(prevLink);

    
    const pageNumber = document.createElement('span');
    pageNumber.classList.add('page-number');
    pageNumber.textContent = currentPage;
    pagination.appendChild(pageNumber);

    
    const nextLink = document.createElement('a');
    nextLink.href = "#";
    nextLink.classList.add('arrow');
    nextLink.textContent = '→';
    nextLink.addEventListener('click', (e) => {
        e.preventDefault();
        if (currentPage < totalPages) {
            displayArticles(currentPage + 1);
            window.scrollTo({ top: 0, behavior: 'smooth' }); 
        }
    });
    pagination.appendChild(nextLink);
}


        window.onload = function() {
            displayArticles(currentPage);
        };