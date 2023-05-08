import './bootstrap.bundle.min';



let body = document.querySelector('body');
let menulist = document.querySelector('.kala-header-menu-togle-list-0');
let menu = document.querySelector('.kala-header-menu-togle-list');
let facke = document.querySelector('.kala-header-search-box-fackemeno');
let sopermarket = document.querySelector('.kala-header-menu-togle-sopermarket');
let navbarlogo = document.querySelector('.kala-header-box-meno');
let headerSearch = document.querySelector('.kala-header-box-meno-main-search-into');
let headerSearchFacke = document.querySelector('.kala-header-search-box-facke');
let list = document.querySelector('.kala-header-menu-togle-list');
let sopermarker = document.querySelector('.kala-header-menu-togle-sopermarket');
let much = document.querySelector('.kala-header-menu-togle-much');
let off = document.querySelector('.kala-header-menu-togle-off');
let superr = document.querySelector('.kala-header-menu-togle-super');
let seller = document.querySelector('.kala-header-menu-togle-seller');
let under = document.querySelector('.kala-header-menu-togle-under-into');
let menoBoxSize = document.querySelectorAll('.kala-header-menu-togle-list-menu-item-all');
let menoBoxSizeBackground = document.querySelector('.kala-header-menu-togle-list-0-background');
let bodyWidth = body.scrollWidth;







// toggleMeno
window.onscroll = function () {
    let menulistWidth = menulist.scrollWidth;

    if (menulistWidth>0){
        document.querySelector(".kala-header-menu-togle").style.top = "130px";
    }else{
        let lLoad = window.scrollY;
        let hed = window.ddd < lLoad;
        window.ddd = lLoad;
        if (hed === true) {
            document.querySelector(".kala-header-menu-togle").style.top = "90px";
        } else {
            document.querySelector(".kala-header-menu-togle").style.top = "130px";
        }
    }
}





// display search box
headerSearch.addEventListener('click' , function (){
    document.querySelector('.kala-header-search-box-facke').style.display='block';
    document.querySelector('.kala-header-searcher').style.display="flex";
})
headerSearchFacke.addEventListener('click' , function (){
    document.querySelector('.kala-header-search-box-facke').style.display='none';
    document.querySelector('.kala-header-searcher').style.display="none";
})

// btn close search box

setInterval(function (){
    let headerSearchBox = document.querySelector('.kala-header-searcher');
    let bodyWidth = body.scrollWidth;
    let closeBtn = document.querySelector('.kala-CloseBtn');
    if (bodyWidth<1024 && headerSearchBox.scrollWidth>0) {
        closeBtn.style.display = 'block';
    }else {
        closeBtn.style.display = 'none';

    }
},10)



let closeBtn = document.querySelector('.kala-CloseBtn');

    closeBtn.addEventListener('click' , function (){
        document.querySelector('.kala-header-search-box-facke').style.display='none';
        document.querySelector('.kala-header-searcher').style.display="none";
})





// line for under menu
list.addEventListener('mouseover' , function (){
    under.style.right="25px";
    under.style.width="105px";
})
sopermarker.addEventListener('mouseover' , function (){
    under.style.right="160px";
    under.style.width="85px";
})
much.addEventListener('mouseover' , function (){
    under.style.right="270px";
    under.style.width="100px";
})
off.addEventListener('mouseover' , function (){
    under.style.right="395px";
    under.style.width="125px";
})
superr.addEventListener('mouseover' , function (){
    under.style.right="555px";
    under.style.width="85px";
})
seller.addEventListener('mouseover' , function (){
    under.style.right="660px";
    under.style.width="115px";
})

list.addEventListener('mouseout' , function (){
    under.style.right="25px";
    under.style.width=0;
})
sopermarker.addEventListener('mouseout' , function (){
    under.style.right="165px";
    under.style.width=0;
})
much.addEventListener('mouseout' , function (){
    under.style.right="280px";
    under.style.width=0;
})
off.addEventListener('mouseout' , function (){
    under.style.right="405px";
    under.style.width=0;
})
superr.addEventListener('mouseout' , function (){
    under.style.right="565px";
    under.style.width=0;
})
seller.addEventListener('mouseout' , function (){
    under.style.right="680px";
    under.style.width=0;
})




// open & close big menu
setInterval(function (){
    // width search box
    let boxhWith = (body.scrollWidth-290)+"px";
    let boxhWithB = (body.scrollWidth-50)+"px";
    if (body.scrollWidth<601){
        document.querySelector('.kala-header-box-meno-main-search').style.width=boxhWithB;
    }else if(body.scrollWidth<882){
        document.querySelector('.kala-header-box-meno-main-search').style.width=boxhWith;
    }

    let kalaHeaderBox = document.querySelector('.kala-header-box');
    let kalaFooterMain = document.querySelector('.kala-footer-main')
    let mainBox = document.querySelector('.mainBox')

    if(document.body.scrollWidth > 1023){
        mainBox.style.minHeight = document.body.clientHeight - 130 - kalaFooterMain.scrollHeight-20  + 'px';
    }else if(document.body.scrollWidth > 600){
        mainBox.style.minHeight = document.body.clientHeight - 157 - kalaFooterMain.scrollHeight-20  + 'px';
    }else {
        mainBox.style.minHeight = document.body.clientHeight - 122 - kalaFooterMain.scrollHeight-20  + 'px';
    }
    } , 10)


// console.log(document.body.scrollHeight)




setInterval(function (){
    // width meno box
    let menoBoxWidth = menulist.scrollWidth-210;
    menoBoxSizeBackground.style.width = menoBoxWidth + 'px';

    let i;
    for (i=0 ; i<menoBoxSize.length ; i++){
        menoBoxSize[i].style.width=menoBoxWidth+'px';
    }
} , 100)




setInterval(function (){

    let menulist = document.querySelector('.kala-header-menu-togle-list-0');
    let menu = document.querySelector('.kala-header-menu-togle-list');
    let facke = document.querySelector('.kala-header-search-box-fackemeno');
    let sopermarket = document.querySelector('.kala-header-menu-togle-sopermarket');
    let much = document.querySelector('.kala-header-menu-togle-much');
    let off = document.querySelector('.kala-header-menu-togle-off');
    let superr = document.querySelector('.kala-header-menu-togle-super');
    let seller = document.querySelector('.kala-header-menu-togle-seller');
    let addres = document.querySelector('.kala-header-menu-togle-addres');
    let navbarlogo = document.querySelector('.kala-header-box-meno');


    let bodyWidth = body.scrollWidth;
    if (bodyWidth>1023){
        menulist.style.right=0;
        menu.addEventListener('mouseover' , function (){
            menulist.style.display='block';
            facke.style.display='block';
        });
        sopermarket.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        much.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        off.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        superr.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        seller.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        addres.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        });
        facke.addEventListener('click' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        })
        navbarlogo.addEventListener('mouseover' , function (){
            menulist.style.display='none';
            facke.style.display='none';
        })
    }else {
        let menuB = document.querySelector('.menuB');
        menuB.addEventListener('click' , function (){
            menulist.style.display='block';
            setTimeout(function (){
                menulist.style.right=0;
            },1)

            facke.style.display='block';
        })
        facke.addEventListener('click' , function (){
            menulist.style.right='-310px';
            setTimeout(function (){
                menulist.style.display='none';
            },200)
            facke.style.display='none';
        })

    }
} , 100)



let footerList1 = document.querySelector('.kala-footer-icon-1');
let footerList2 = document.querySelector('.kala-footer-icon-2');
let footerList3 = document.querySelector('.kala-footer-icon-3');
let footerList4 = document.querySelector('.kala-footer-icon-4');
let footerList5 = document.querySelector('.kala-footer-icon-5');

footerList2.addEventListener('click' , function (){
    menulist.style.display='block';
    setTimeout(function (){
        menulist.style.right=0;
    },1)
})

footerList1.addEventListener('click' , function (){
    menulist.style.right='-510px';
    setTimeout(function (){
        menulist.style.display='none';
    },200);
    facke.style.display='none';
})
footerList3.addEventListener('click' , function (){
    menulist.style.right='-510px';
    setTimeout(function (){
        menulist.style.display='none';
    },200);
    facke.style.display='none';
})
footerList4.addEventListener('click' , function (){
    menulist.style.right='-510px';
    setTimeout(function (){
        menulist.style.display='none';
    },200);
    facke.style.display='none';
})
footerList5.addEventListener('click' , function (){
    menulist.style.right='-510px';
    setTimeout(function (){
        menulist.style.display='none';
    },200);
    facke.style.display='none';
})



// upButten
let kalaFooterUp1 = document.querySelector('.kala-footer-up1');
kalaFooterUp1.addEventListener('click' , function (e){
    e.preventDefault();
    body.scrollTop = 0;

})

let kalaFooterUp2 = document.querySelector('.kala-footer-up2');
kalaFooterUp2.addEventListener('click' , function (e){
    e.preventDefault();
    body.scrollTop = 0;
})







