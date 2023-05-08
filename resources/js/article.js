setInterval(function (){
    let kalaArticlePageBox = document.querySelector('.kala-articlePage-box');
    let kalaArticlePageBoxRight = document.querySelector('.kala-articlePage-box-right');
    let kalaArticlePageBoxLeft = document.querySelector('.kala-articlePage-box-left');
    kalaArticlePageBoxRight.style.width = kalaArticlePageBox.scrollWidth - kalaArticlePageBoxLeft.scrollWidth - 10 + 'px';
    kalaArticlePageBox.style.height = kalaArticlePageBoxRight.scrollHeight + 'px';
} , 10)

