



//super
let kalaSuperDragable = document.querySelector('.kala-super-dragable');
let kalaSuperDragableLeft = document.querySelector('.kala-super-dragable-left');
let kalaSuperDragableRight = document.querySelector('.kala-super-dragable-right')

setInterval(function (){
    kalaSuperDragableLeft.style.width = kalaSuperDragable.scrollWidth-kalaSuperDragableRight.scrollWidth-25 + 'px';

} , 10);


let kalaSuperDragableLeftMain = document.querySelector('.kala-super-dragable-left-main');
let iconLeft = document.querySelector('.icon-left');
let iconRight = document.querySelector('.icon-right');
let lets1 = false;
let pageX1;
let scrollLeft1;
const scrollStart1 = (e) => {
    lets1 = true;
    e.preventDefault();
    pageX1 = e.pageX;
    scrollLeft1 = kalaSuperDragableLeftMain.scrollLeft;

}
let scrolling1 = (e) => {
    if(!lets1) return;
    let location1 = e.pageX - pageX1;
    kalaSuperDragableLeftMain.scrollLeft = scrollLeft1 -location1;
}
let scrollStop1 = () => {
    lets1 = false;
}

kalaSuperDragableLeftMain.addEventListener('mousedown' , scrollStart1);
kalaSuperDragableLeftMain.addEventListener('mousemove' , scrolling1);
kalaSuperDragableLeftMain.addEventListener('mouseup' , scrollStop1);

iconLeft.addEventListener('mousedown' , function (){
    kalaSuperDragableLeftMain.scrollLeft -=200;
})
iconRight.addEventListener('mousedown' , function (){
    kalaSuperDragableLeftMain.scrollLeft +=200;
})
kalaSuperDragableLeftMain.onscroll = function (){
    if (kalaSuperDragableLeftMain.scrollLeft === 0){
        iconRight.style.display = 'none';

    }else {
        iconRight.style.display = 'flex';
    }
    if (Math.abs(kalaSuperDragableLeftMain.scrollLeft) === kalaSuperDragableLeftMain.scrollWidth-kalaSuperDragableLeft.scrollWidth+23){
        iconLeft.style.display = 'none';
    }
    else {
        iconLeft.style.display = 'flex';
    }
}










// setInterval(function (){
//     let body = document.querySelector('body');
//     let bodyWidth = body.scrollWidth;
//     let kalaSuperDragable = document.querySelector('.kala-super-dragable');
//     let kalaHeaderBoxMeno = document.querySelector('.kala-header-box-meno');
//     let kalaHeaderMenuTogleBox = document.querySelector('.kala-header-menu-togle-box');
//     if (bodyWidth>1600){
//         kalaSuperDragable.style.width = 1550 + 'px';
//         kalaHeaderBoxMeno.style.width = 1600 + 'px';
//         kalaHeaderMenuTogleBox.style.width = 1550 + 'px';
//     }else if(bodyWidth>1023){
//         kalaSuperDragable.style.width = 95 + '%';
//         kalaHeaderBoxMeno.style.width =bodyWidth + 'px';
//         kalaHeaderMenuTogleBox.style.width = bodyWidth + 'px';
//     }else{
//         kalaSuperDragable.style.width = 100 + '%';
//         kalaHeaderBoxMeno.style.width =bodyWidth + 'px';
//         kalaHeaderMenuTogleBox.style.width = bodyWidth + 'px';
//     }
// } , 10)
//



// category 4Pic
setInterval(function (){
    let body = document.querySelector('body');
    let child = document.querySelector('.kala-category-fourItem');
    let childHeight = child.scrollHeight;
    let bodyWidth = body.scrollWidth;
    if (bodyWidth > 1200){
        document.querySelector('.kala-category-fourItem-box').style.height = childHeight + 'px';
    }else {
        document.querySelector('.kala-category-fourItem-box').style.height = (childHeight*2) + 'px';
    }
},10)










// specialCategory
let kalaSpecialCategory = document.querySelector('.kala-specialCategory');
let kalaSCategoryBtnLeft = document.querySelector('.kala-SCategory-btnLeft');
let kalaSCategoryBtnRight = document.querySelector('.kala-SCategory-btnRight');
let kalaSpecialCategoryMain = document.querySelector('.kala-specialCategory-main');
let lets = false;
let pageX;
let scrollLeft;
const scrollStart = (e) => {
    lets = true;
    e.preventDefault();
    pageX = e.pageX;
    scrollLeft = kalaSpecialCategory.scrollLeft;
}
let scrolling = (e) => {
    if(!lets) return;
    let location = e.pageX - pageX;
    kalaSpecialCategory.scrollLeft = scrollLeft -location;
}
let scrollStop = () => {
    lets = false;
}

kalaSpecialCategory.addEventListener('mousedown' , scrollStart);
kalaSpecialCategory.addEventListener('mousemove' , scrolling);
kalaSpecialCategory.addEventListener('mouseup' , scrollStop);

kalaSCategoryBtnLeft.addEventListener('mousedown' , function (){
    kalaSpecialCategory.scrollLeft -=200;
})
kalaSCategoryBtnRight.addEventListener('mousedown' , function (){
    kalaSpecialCategory.scrollLeft +=200;
})
kalaSpecialCategory.onscroll = function (){
    if (kalaSpecialCategory.scrollLeft === 0){
        kalaSCategoryBtnRight.style.display = 'none';

    }else {
        kalaSCategoryBtnRight.style.display = 'flex';
    }
    if ((kalaSpecialCategory.scrollWidth - kalaSpecialCategoryMain.scrollWidth) - ((kalaSpecialCategory.scrollLeft*-1)-12) === 0){
        kalaSCategoryBtnLeft.style.display = 'none';
    }
    else {
        kalaSCategoryBtnLeft.style.display = 'flex';
    }
}











// specialBrands
let kalaSpecialBrands = document.querySelector('.kala-specialBrands');
let kalaSBrandsBtnLeft = document.querySelector('.kala-SBrands-btnLeft');
let kalaSBrandsBtnRight = document.querySelector('.kala-SBrands-btnRight');
let kalaSpecialBrandsMain = document.querySelector('.kala-specialBrands-main');

let letsBrands = false;
let pageXBrands;
let scrollLeftBrands;
const scrollStartBrands = (e) => {
    letsBrands = true;
    e.preventDefault();
    pageXBrands = e.pageX;
    scrollLeftBrands = kalaSpecialBrands.scrollLeft;
}
let scrollingBrands = (e) => {
    if(!letsBrands) return;
    let locationBrands = e.pageX - pageXBrands;
    kalaSpecialBrands.scrollLeft = scrollLeftBrands -locationBrands;
}
let scrollStopBrands = () => {
    letsBrands = false;
}

kalaSpecialBrands.addEventListener('mousedown' , scrollStartBrands);
kalaSpecialBrands.addEventListener('mousemove' , scrollingBrands);
kalaSpecialBrands.addEventListener('mouseup' , scrollStopBrands);

kalaSBrandsBtnLeft.addEventListener('mousedown' , function (){
    kalaSpecialBrands.scrollLeft -=200;
})
kalaSBrandsBtnRight.addEventListener('mousedown' , function (){
    kalaSpecialBrands.scrollLeft +=200;
})
kalaSpecialBrands.onscroll = function (){
    if (kalaSpecialBrands.scrollLeft === 0){
        kalaSBrandsBtnRight.style.display = 'none';

    }else {
        kalaSBrandsBtnRight.style.display = 'flex';
    }
    if ((kalaSpecialBrands.scrollWidth - kalaSpecialBrandsMain.scrollWidth) - ((kalaSpecialBrands.scrollLeft*-1)-10) === 0){
        kalaSBrandsBtnLeft.style.display = 'none';
    }
    else {
        kalaSBrandsBtnLeft.style.display = 'flex';
    }
}



// moewSell
let kalaMoreSell = document.querySelector('.kala-moreSell');
let kalaMoreSellBtnLeft = document.querySelector('.kala-moreSell-btnLeft');
let kalaMoreSellBtnRight = document.querySelector('.kala-moreSell-btnRight');
let kalaMoreSellBox = document.querySelector('.kala-moreSell-box');
let letsMoresell = false;
let pageXMoresell;
let scrollLeftMoresell;
const scrollStartMoresell = (e) => {
    letsMoresell = true;
    e.preventDefault();
    pageXMoresell = e.pageX;
    scrollLeftMoresell = kalaMoreSell.scrollLeft;
}
let scrollingMoresell = (e) => {
    if(!letsMoresell) return;
    let locationMoresell = e.pageX - pageXMoresell;
    kalaMoreSell.scrollLeft = scrollLeftMoresell -locationMoresell;
}
let scrollStopMoresell = () => {
    letsMoresell = false;
}

kalaMoreSell.addEventListener('mousedown' , scrollStartMoresell);
kalaMoreSell.addEventListener('mousemove' , scrollingMoresell);
kalaMoreSell.addEventListener('mouseup' , scrollStopMoresell);

kalaMoreSellBtnLeft.addEventListener('mousedown' , function (){
    kalaMoreSell.scrollLeft -=200;
})
kalaMoreSellBtnRight.addEventListener('mousedown' , function (){
    kalaMoreSell.scrollLeft +=200;
})
kalaMoreSell.onscroll = function (){
    if (kalaMoreSell.scrollLeft === 0){
        kalaMoreSellBtnRight.style.display = 'none';

    }else {
        kalaMoreSellBtnRight.style.display = 'flex';
    }
    if ((kalaMoreSell.scrollWidth - kalaMoreSellBox.scrollWidth) - ((kalaMoreSell.scrollLeft*-1)-11) === 0){
        kalaMoreSellBtnLeft.style.display = 'none';

    }
    else {
        kalaMoreSellBtnLeft.style.display = 'flex';
    }
}






setInterval(function (){
    let body = document.querySelector('body');
    let childArticle = document.querySelector('.kala-article-fourItem');
    let childHeightArticle = childArticle.scrollHeight;
    let bodyWidth = body.scrollWidth;
    if (bodyWidth > 1200){
        document.querySelector('.kala-article-fourItem-box').style.height = childHeightArticle+50 + 'px';
    }else {
        document.querySelector('.kala-article-fourItem-box').style.height = (childHeightArticle*4)+50 + 'px';
    }
},1000)


