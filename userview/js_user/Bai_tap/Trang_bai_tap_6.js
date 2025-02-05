const articlesPerPage = 5;
        let currentPage = 1;
        const articles = [
    {title: "DS 0", description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"},
    {title: "DS 2", description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-2.html"},
    {title: "DS 3", description: "Đây là phần toán quan trọng để có thể ôn luyện, là nền tảng kiến thức quan trọng trong lĩnh vực công nghệ thông tin", author: "Nguyễn Chí Hào", saved: 32, url: "chi-tiet-ma-tran-3.html"}
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
                    </div>
                </div>
            `;
            articleList.appendChild(li);
        });
        updatePagination(page);
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
