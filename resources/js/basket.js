



setInterval(function (){
    let body = document.querySelector('body');
    let basketBox = document.querySelector('.basket-box');
    let basketBoxProducts = document.querySelector('.basket-box-products');
    let basketBoxSumBuy = document.querySelector('.basket-box-sumBuy');
    if(body.scrollWidth > 1023){
    basketBoxProducts.style.width = basketBox.scrollWidth - basketBoxSumBuy.scrollWidth + 'px';
}else {
    basketBoxProducts.style.width = 100 + '%';
}

} , 10)
