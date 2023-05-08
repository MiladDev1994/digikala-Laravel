import '../bootstrap.bundle.min';

let run = true;
setInterval(function (){
    let adminBox = document.querySelector('.admin-box');
    let adminBoxMeno = document.querySelector('.admin-box-meno');
    let adminBoxData = document.querySelector('.admin-box-data');
    let adminMenuFake = document.querySelector('.adminMenuFake');

    let adminListIcon = document.querySelector('.adminListIcon');
    adminListIcon.addEventListener('click' , function (){
        run = false;
        adminBoxMeno.childNodes[1].style.right = 0;
        adminMenuFake.style.display = 'block'
    });

    let adminBoxMenoChildWidth = adminBoxMeno.childNodes[1].scrollWidth;
    function mmm(){
        if(run === true){
            adminBoxMeno.childNodes[1].style.right = -adminBoxMenoChildWidth-20 + 'px';
        }
    }
    mmm();


    if (document.body.scrollWidth > 1000){
        adminBoxData.style.width = adminBox.scrollWidth - adminBoxMeno.scrollWidth + 'px'
    }else {
        adminBoxData.style.width = '99%'
    }


    let adminBoxMenoChildClose = document.querySelector('.admin-box-meno-child-close');
    adminBoxMenoChildClose.addEventListener('click' , function (){
        // adminBoxMeno.childNodes[1].style.right = '-250px';
        adminMenuFake.style.display = 'none'
        run = true;
    })


    adminMenuFake.addEventListener('click' , function (){
        // adminBoxMeno.childNodes[1].style.right = '-250px';
        adminMenuFake.style.display = 'none'
        run = true;
    })


} , 10)
