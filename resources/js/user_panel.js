


setInterval(function (){
    let userBox = document.querySelector('.user-box');
    let userBoxRight = document.querySelector('.user-box-right');
    let userBoxLeft = document.querySelector('.user-box-left');
    if (document.body.scrollWidth > 1023){
        userBoxLeft.style.width = userBox.scrollWidth - userBoxRight.scrollWidth + 'px'
    }else {
        userBoxLeft.style.width = '95%';
    }
} , 10)

