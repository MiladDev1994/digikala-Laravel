let kalaProductsBoxRight = document.querySelector('.kala-products-box-right');
let kalaProductsBoxLeft = document.querySelector('.kala-products-box-left');
kalaProductsBoxRight.style.height = kalaProductsBoxLeft.scrollHeight + 'px';
setInterval(function (){
    let kalaProductsBox = document.querySelector('.kala-products-box');
    let kalaProductsBoxLeft = document.querySelector('.kala-products-box-left');
    let kalaProductsBoxRight = document.querySelector('.kala-products-box-right');
    kalaProductsBoxLeft.style.width = kalaProductsBox.scrollWidth - kalaProductsBoxRight.scrollWidth-7 + 'px';
    if(kalaProductsBoxLeft.scrollHeight <= 550){
        kalaProductsBox.style.height = 640 + 'px'
    }else{
       kalaProductsBox.style.height = kalaProductsBoxLeft.scrollHeight+20 + 'px';
    }
} , 10);



