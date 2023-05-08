
// specialBrands
let kalaSimilarBox = document.querySelector('.kala-Similar-Box');
let kalaSimilarBtnLeft = document.querySelector('.kala-Similar-btnLeft');
let kalaSimilarBtnRight = document.querySelector('.kala-Similar-btnRight');
let kalaSimilar = document.querySelector('.kala-Similar');

let letsBrands = false;
let pageXBrands;
let scrollLeftBrands;
const scrollStartBrands = (e) => {
    letsBrands = true;
    e.preventDefault();
    pageXBrands = e.pageX;
    scrollLeftBrands = kalaSimilarBox.scrollLeft;
}
let scrollingBrands = (e) => {
    if(!letsBrands) return;
    let locationBrands = e.pageX - pageXBrands;
    kalaSimilarBox.scrollLeft = scrollLeftBrands -locationBrands;
}
let scrollStopBrands = () => {
    letsBrands = false;
}

kalaSimilarBox.addEventListener('mousedown' , scrollStartBrands);
kalaSimilarBox.addEventListener('mousemove' , scrollingBrands);
kalaSimilarBox.addEventListener('mouseup' , scrollStopBrands);

kalaSimilarBtnLeft.addEventListener('mousedown' , function (){
    kalaSimilarBox.scrollLeft -=200;
})
kalaSimilarBtnRight.addEventListener('mousedown' , function (){
    kalaSimilarBox.scrollLeft +=200;
})

kalaSimilarBox.onscroll = function (){
    if (kalaSimilarBox.scrollLeft === 0){
        kalaSimilarBtnRight.style.display = 'none';

    }else {
        kalaSimilarBtnRight.style.display = 'flex';
    }
    if ((kalaSimilarBox.scrollWidth - kalaSimilar.scrollWidth) - ((kalaSimilarBox.scrollLeft*-1)-11) === 0){
        kalaSimilarBtnLeft.style.display = 'none';
    }
    else {
        kalaSimilarBtnLeft.style.display = 'flex';
    }
}


setInterval(function (){
    let kalaCommentBox = document.querySelector('.kala-comment-box');
    let kalaCommentBoxAdd = document.querySelector('.kala-comment-box-add');
    let kalaCommentView = document.querySelector('.kala-comment-view');
    let kalaCommentBoxBuy = document.querySelector('.kala-comment-box-buy');
    kalaCommentView.style.width = kalaCommentBox.scrollWidth - kalaCommentBoxAdd.scrollWidth - kalaCommentBoxBuy.scrollWidth + 'px'


} , 10)
