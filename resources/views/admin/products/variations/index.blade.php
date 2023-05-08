@extends('admin.admin_app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('admin')



    <style>
        @foreach($variaties as $key=>$product)

        .addProductBoxmain{{$key}}{
            width: 97%;
            height: 200px;
            margin: auto;
            margin-top: 10px;
            border: 2px solid #2e2e2e;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            background-color: #2f2f2f;
        }
        .addProductBoxmainTop{{$key}}{
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            position: relative;
            border-bottom: 1px solid #272727;
        }
        .addProductBoxmainBottom{{$key}}{
            width: 100%;
            height: 100px;
            padding: 10px 10px;
            position: relative;
        }
        .addElementNameToDiv{{$key}}{
            width: 300px;
            height: 100px;

        }
        .addElementAccessToDiv{{$key}}{
            color: #ffffff;
            width: 70px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }

        .formBottomBox{{$key}}{
            width: 100%;
            height: 75%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .formBottomBoxNon{{$key}}{
            width: 100%;
            height: 75%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .addElementSpecialToDiv{{$key}}{
            color: #ffffff;
            width: 60px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }
        .addElementMoreSellToDiv{{$key}}{
            color: #ffffff;
            width: 60px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }

        @endforeach

        .addElementDkpToDiv{
            width: 70px;
            text-decoration: none;
            color: #0dcaf0;
            transition: 0.2s;
            text-align: center;
        }
        .addElementDkpToDiv:hover{
            color: #ff8383;
        }
        .addElementToDiv{
            width: 70px;
            border-radius: 5px;
            border: 2px solid #434343;
        }
        .addElementNameToDiv{
            width: 400px;
            height: 100px;
            font-size: 13px;
            opacity: 70%;
        }
        .addElementCategoryToDiv{
            color: #ffffff;
            width: 60px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }


        .animTogle{
            transition: 0.2s;
        }
        .togleBoxOne{
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset;
        }
        .dropdown-toggle::after {
            display: none;
        }
        li:hover{
            background-color: #4f4f4f !important;
            cursor: pointer;
            transition: 0.3s;
        }
        .userIdBox{
            position: absolute;
            top: 5px;
            left: 10px;
            opacity: 50%;
            font-size: 12px;
        }





        .menoBottomBox{
            width: 100%;
            height: 25%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /*.sentTime{*/
        /*    border: none;*/
        /*    outline: none;*/
        /*}*/
    </style>





<style>
    .dropdown-toggle::after {
        display: none;
    }
    li:hover{
        background-color: #4f4f4f !important;
        cursor: pointer;
        transition: 0.3s;
    }
</style>
    <h4 class="text-center py-2 opacity-50">تنوع‌ها</h4>

    <div class="row mt-4 px-4">

        <div class="col-12 col-md-3 px-2 py-4">
            <div class="d-flex align-items-center justify-content-center">
                <form class="d-flex align-items-center justify-content-center serachBox">
                    <button class="px-2 bi-search h4 mt-2 text-light" style="border: none ; background-color: transparent ; outline: none">
                    </button>

                    <input type="text" class="input-group-text bg-dark text-light w-100 text-start" style="border: none ; outline: none" placeholder="جستوجو ....">
                </form>

            </div>
        </div>

        <div class="col-12 col-md-3 px-2 py-4">
            <div class="form-select bg-dark text-light text-center dropdown-toggle w-100 px-2 dorpInnetText" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none ; outline: none"> فیلتر گروه ....</div>
            <ul class="dropdown-menu bg-dark text-light selectCategory">
            </ul>
        </div>
        <div class="col-6 col-md-2 px-2 py-4">
            <div class="form-select bg-dark text-light text-center dropdown-toggle w-100 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none ; outline: none"> بازه ارسال ....</div>
            <ul class="dropdown-menu bg-dark text-light sendingTime">
                <li class="dropdown-item text-light opacity-50" value="0">بازه ارسال ....</li>
                <li class="dropdown-item text-light" value="1">1 روزه</li>
                <li class="dropdown-item text-light" value="2">2 روزه</li>
                <li class="dropdown-item text-light" value="3">3 روزه</li>
                <li class="dropdown-item text-light" value="4">4 روزه</li>
                <li class="dropdown-item text-light" value="5">5 روزه</li>
            </ul>
        </div>
        <div class="col-6 col-md-1 d-flex justify-content-center p-0 position-relative  py-3 adminFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: 0">ادمین</p>
            <div class="position-relative togleDeActive mt-3" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>
        <div class="col-4 col-md-1 d-flex justify-content-center p-0 position-relative  py-3 remainFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: 0">ناموجود</p>
            <div class="position-relative togleDeActive mt-3" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>
        <div class="col-4 col-md-1 d-flex justify-content-center p-0 position-relative  py-3 deactiveFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: 0">غیر‌غعال</p>
            <div class="position-relative togleDeActive mt-3" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>
        <div class="col-4 col-md-1 d-flex justify-content-center p-0 position-relative  py-3 accessFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: 0">سلب‌دسترسی</p>
            <div class="position-relative togleDeActive mt-3" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-dark" style="height: 50px;margin-top: 5px;display: flex;align-items: center;justify-content: space-between;padding: 0 10px;">
        <div class="m-auto d-flex align-items-center justify-content-between px-2" style="width: 97%">
            <div class="" style="width: 70px"></div>
            <div class=" text-center" style="width: 70px ; font-size: 15px ; font-weight: 1000"> کدمحصول</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 300px"> ناممحصول</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 60px">پرفروش</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 60px"> شگفت </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 65px"> دسترسی </div>
        </div>

    </div>

    <div class="productBox pb-4"></div>




<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let dorpInnetText = document.querySelector('.dorpInnetText');
    let newArray = @php echo $varJson ; @endphp;

    let codeMain = '';
    let catMain = null;
    let timeMain = 0;
    let admieMain = null;
    let remeMain = null;
    let deeMain = null;
    let oueMain = null;





    const uniqueVariety = [];
    const createUniqueVariety = newArray.filter(function (element){
        if (!uniqueVariety.includes(element.category_id)) {
            uniqueVariety.push(element.category_id);
            return true;
        }
        return false;
    });


    let serachBox = document.querySelector('.serachBox');


    let submit = serachBox.childNodes[1];
    // console.log(submit)
    submit.addEventListener('click' , function (e){
        e.preventDefault()

        console.log(e.target.nextElementSibling.value)
        let codSearch;
        if(e.target.nextElementSibling.value == ''){
            codSearch = e.target.nextElementSibling.value
        }else {
            codSearch = Number(e.target.nextElementSibling.value)
        }

        codeMain = codSearch;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
        e.target.nextElementSibling.value = '';
    })








    let selectCategory = document.querySelector('.selectCategory');
    let addOptionCategoryFirest = document.createElement('li');
    addOptionCategoryFirest.classList.add('dropdown-item');
    addOptionCategoryFirest.classList.add('text-light');
    addOptionCategoryFirest.classList.add('selectCategoryFirstChild');
    addOptionCategoryFirest.innerText = 'انتخاب گروه ....';
    selectCategory.appendChild(addOptionCategoryFirest);
    for (i = 0 ; i < createUniqueVariety.length ; i++){
        let addOptionCategory = document.createElement('li');
        addOptionCategory.classList.add('dropdown-item');
        addOptionCategory.classList.add('text-light');
        addOptionCategory.classList.add('selectCategory' + createUniqueVariety[i].category_id);

        addOptionCategory.innerText = createUniqueVariety[i].category_name;
        selectCategory.appendChild(addOptionCategory);

        addOptionCategory.addEventListener('click' , function (e){
            dorpInnetText.innerText = addOptionCategory.innerText

            codeMain = codeMain;
            catMain = Number(e.target.className.split('').splice(39).toString().replace(',' , '')) ;
            timeMain = timeMain;
            admieMain = admieMain;
            remeMain = remeMain;
            deeMain = deeMain;
            oueMain = oueMain;

            addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
        })
    }
    let selectCategoryFirstChild = document.querySelector('.selectCategoryFirstChild');
    selectCategoryFirstChild.addEventListener('click' , function (){
        dorpInnetText.innerText = selectCategoryFirstChild.innerText

        codeMain = codeMain;
        catMain = null ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })


    let sendingTime = document.querySelector('.sendingTime');
    sendingTime.addEventListener('click' , function (e){

        e.target.parentNode.parentNode.childNodes[1].innerText = e.target.innerText
        codeMain = codeMain;
        catMain = catMain ;
        timeMain = e.target.value;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })

    let adminFilterBox = document.querySelector('.adminFilterBox')
    adminFilterBoxTogle = adminFilterBox.childNodes[3]
    adminFilterBoxTogleAct = adminFilterBox.childNodes[3].childNodes[5]
    adminFilterBoxTogleDeact = adminFilterBox.childNodes[3].childNodes[3]
    adminFilterBoxTogleIn = adminFilterBox.childNodes[3].childNodes[1]


    adminFilterBoxTogleAct.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        adminFilterBoxTogleDeact.style.zIndex = 2;
        adminFilterBoxTogle.style.backgroundColor = '#01c394';
        adminFilterBoxTogleIn.style.left = '18px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = 'developer';
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })
    adminFilterBoxTogleDeact.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        adminFilterBoxTogleAct.style.zIndex = 2;
        adminFilterBoxTogle.style.backgroundColor = '#b0b0b0';
        adminFilterBoxTogleIn.style.left = '3px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = null;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })





    let remainFilterBox = document.querySelector('.remainFilterBox')
    remainFilterBoxTogle = remainFilterBox.childNodes[3]
    remainFilterBoxTogleAct = remainFilterBox.childNodes[3].childNodes[5]
    remainFilterBoxTogleDeact = remainFilterBox.childNodes[3].childNodes[3]
    remainFilterBoxTogleIn = remainFilterBox.childNodes[3].childNodes[1]

    remainFilterBoxTogleAct.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        remainFilterBoxTogleDeact.style.zIndex = 2;
        remainFilterBoxTogle.style.backgroundColor = '#01c394';
        remainFilterBoxTogleIn.style.left = '18px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = 0;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })
    remainFilterBoxTogleDeact.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        remainFilterBoxTogleAct.style.zIndex = 2;
        remainFilterBoxTogle.style.backgroundColor = '#b0b0b0';
        remainFilterBoxTogleIn.style.left = '3px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = null;
        deeMain = deeMain;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })





    let deactiveFilterBox = document.querySelector('.deactiveFilterBox')
    deactiveFilterBoxTogle = deactiveFilterBox.childNodes[3]
    deactiveFilterBoxTogleAct = deactiveFilterBox.childNodes[3].childNodes[5]
    deactiveFilterBoxTogleDeact = deactiveFilterBox.childNodes[3].childNodes[3]
    deactiveFilterBoxTogleIn = deactiveFilterBox.childNodes[3].childNodes[1]

    deactiveFilterBoxTogleAct.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        deactiveFilterBoxTogleDeact.style.zIndex = 2;
        deactiveFilterBoxTogle.style.backgroundColor = '#01c394';
        deactiveFilterBoxTogleIn.style.left = '18px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = 0;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })
    deactiveFilterBoxTogleDeact.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        deactiveFilterBoxTogleAct.style.zIndex = 2;
        deactiveFilterBoxTogle.style.backgroundColor = '#b0b0b0';
        deactiveFilterBoxTogleIn.style.left = '3px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = null;
        oueMain = oueMain;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })






    let accessFilterBox = document.querySelector('.accessFilterBox')
    accessFilterBoxTogle = accessFilterBox.childNodes[3]
    accessFilterBoxTogleAct = accessFilterBox.childNodes[3].childNodes[5]
    accessFilterBoxTogleDeact = accessFilterBox.childNodes[3].childNodes[3]
    accessFilterBoxTogleIn = accessFilterBox.childNodes[3].childNodes[1]

    accessFilterBoxTogleAct.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        accessFilterBoxTogleDeact.style.zIndex = 2;
        accessFilterBoxTogle.style.backgroundColor = '#01c394';
        accessFilterBoxTogleIn.style.left = '18px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = 0;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })
    accessFilterBoxTogleDeact.addEventListener('click' , function (e){
        this.style.zIndex = 1;
        accessFilterBoxTogleAct.style.zIndex = 2;
        accessFilterBoxTogle.style.backgroundColor = '#b0b0b0';
        accessFilterBoxTogleIn.style.left = '3px'

        codeMain = codeMain;
        catMain = catMain ;
        timeMain = timeMain;
        admieMain = admieMain;
        remeMain = remeMain;
        deeMain = deeMain;
        oueMain = null;

        addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    })




    addFilter(codeMain,catMain,timeMain,admieMain,remeMain,deeMain,oueMain)
    function addFilter(s,c,t,a,n,d,o){


        var varJson = newArray.filter(function (e) {
            let codeFil , codeFilD; if (s === ''){codeFil = e.id; codeFilD = e.product_id}else {codeFil = s ; codeFilD = s}
            let catFil; if (c === null){catFil = e.category_id}else {catFil = c}
            let timeFil; if (t === 0){timeFil = e.shipping_time}else {timeFil = t}
            let adminFil; if (a === null){adminFil = e.role}else {adminFil = a}
            let remNFil; if (n === null){remNFil = e.remain}else {remNFil = n}
            let deAFil; if (d === null){deAFil = e.active}else {deAFil = d}
            let outFil; if (o === null){outFil = e.access}else {outFil = o}

            return (e.id === codeFil || e.product_id === codeFilD) &&
                e.category_id === catFil &&
                e.shipping_time == timeFil &&
                e.role === adminFil &&
                e.remain === remNFil &&
                e.active === deAFil &&
                e.access === outFil ;
        });

        // console.log(newArray)


        let box = document.querySelector('.productBox');
        box.innerText='';

        for (i = 0 ; i < varJson.length ; i++){

            let addProductBoxmain = document.createElement('div');
            addProductBoxmain.classList.add('addProductBoxmain' + i);
            box.appendChild(addProductBoxmain);

            let addProductBoxmainTop = document.createElement('div');
            addProductBoxmainTop.classList.add('addProductBoxmainTop' + i);
            addProductBoxmain.appendChild(addProductBoxmainTop);

            let addProductBoxmainBottom = document.createElement('div');
            addProductBoxmainBottom.classList.add('addProductBoxmainBottom' + i);
            addProductBoxmain.appendChild(addProductBoxmainBottom);


            let baseURL = 'http://127.0.0.1:8000'
            // addImage
            let image = `${baseURL}/images/${varJson[i].image}`.split(',');
            // let h = Number(box.childNodes[i].className.split('').splice(13).toString().replace(',' , ''));
            let addElementToDiv = document.createElement('img');
            addElementToDiv.classList.add('addElementToDiv');
            addElementToDiv.classList.add('shadow')
            addElementToDiv.setAttribute('src' , image[0]);
            addProductBoxmainTop.appendChild(addElementToDiv);


            {{--// addDKP--}}
            let addElementDkpToDiv = document.createElement('a');
            addElementDkpToDiv.classList.add('addElementDkpToDiv');
            addElementDkpToDiv.innerText = varJson[i].products.id;
            addElementDkpToDiv.setAttribute('href' , `${baseURL}/products/dkp-` + varJson[i].products.id);
            addElementDkpToDiv.setAttribute('target' , 'blank');
            addProductBoxmainTop.appendChild(addElementDkpToDiv);






            // addName
            let addElementNameToDiv = document.createElement('div');
            addElementNameToDiv.classList.add('addElementNameToDiv' + i);
            addElementNameToDiv.innerHTML = '<div class="w-100  py-2 overflow-hidden opacity-75" style="height: 70% ; overflow=hidden ; font-size: 12px"> ' +
                varJson[i].name + ' | ' + varJson[i].var_name + ' | ' + 'گارانتی' + ' ' + varJson[i].warranty_name + ' ' + varJson[i].warranty_time + ' | ' + varJson[i].category_name
                + '</div>' +
                ' <div class="w-100 d-flex align-items-center justify-content-around py-1 opacity-75" style="height: 25% ; overflow=hidden ; font-size: 13px">' +
                '<div class=""> ' + 'dkpc : ' + varJson[i].id + '</div>' +
                '</div>'
            addProductBoxmainTop.appendChild(addElementNameToDiv);



            // addMoreSell
            let addElementmoreSellToDiv = document.createElement('div');
            addElementmoreSellToDiv.classList.add('addElementMoreSellToDiv' + i);
            addElementmoreSellToDiv.innerHTML ='' +
                '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ">' +
                    '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                    '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                    '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                ' </div>';
            addProductBoxmainTop.appendChild(addElementmoreSellToDiv);


            // addSpecial
            let addElementSpecialToDiv = document.createElement('div');
            addElementSpecialToDiv.classList.add('addElementSpecialToDiv' + i);
            addElementSpecialToDiv.innerHTML ='' +
                '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ">' +
                    '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                    '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                    '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                ' </div>';
            addProductBoxmainTop.appendChild(addElementSpecialToDiv);


            // addAccess
            let addElementAccessToDiv = document.createElement('div');
            addElementAccessToDiv.classList.add('addElementAccessToDiv' + i);
            addElementAccessToDiv.innerHTML ='' +
                '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ">' +
                    '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                    ' <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                    '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                ' </div>';
            addProductBoxmainTop.appendChild(addElementAccessToDiv);

            box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].classList.add('togleBox' + i);
            box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[0].classList.add('togle' + i);
            box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[3].classList.add('deactive' + i);
            box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[2].classList.add('active' + i);

            let togleBox = box.childNodes[i].childNodes[0].childNodes[5].childNodes[0];
            let togle = box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[0];
            let deactive = box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[3];
            let active = box.childNodes[i].childNodes[0].childNodes[5].childNodes[0].childNodes[2];

            let varietytId = varJson[i].id;
            let productActive = varJson[i].access;

            if (productActive === 0){
                active.style.zIndex = 2;
                deactive.style.zIndex = 1;
                togle.style.left = '18px';
                togleBox.style.backgroundColor = '#fb5b5b';
            }else {
                active.style.zIndex = 1;
                deactive.style.zIndex = 2;
                togle.style.left = '3px';
                togleBox.style.backgroundColor = '#01c394';
            }

            deactive.addEventListener('click' , function (e){
                active.style.zIndex = 2;
                deactive.style.zIndex = 1;
                togle.style.left = '18px';
                    togleBox.style.backgroundColor = '#fb5b5b';


                let changeArray = e.target.className.split('').splice(59).toString().replace(',' , '')

                varJson[changeArray].access = 0;
                $.ajax({
                    url:'{{route('admin.varieties.access')}}',
                    method:'POST',
                    data:{
                        variety : varietytId,
                        active : 0,
                    },
                    success:function(data){
                    },
                });
            })

            active.addEventListener('click' , function (e){
                active.style.zIndex = 1;
                deactive.style.zIndex = 2;
                togle.style.left = '3px';
                togleBox.style.backgroundColor = '#01c394';

                let changeArrayB = e.target.className.split('').splice(57).toString().replace(',' , '')

                varJson[changeArrayB].access = 1;
                $.ajax({
                    url:'{{route('admin.varieties.access')}}',
                    method:'POST',
                    data:{
                        variety : varietytId,
                        active : 1,
                    },
                    success:function(data){
                    },
                });
            })





            if (varJson[i].moreSell === 0){
                addElementmoreSellToDiv.childNodes[0].childNodes[2].style.zIndex = 1;
                addElementmoreSellToDiv.childNodes[0].childNodes[1].style.zIndex = 2;
                addElementmoreSellToDiv.childNodes[0].style.backgroundColor = '#fb5b5b';
                addElementmoreSellToDiv.childNodes[0].childNodes[0].style.left = '18px';
            }else {
                addElementmoreSellToDiv.childNodes[0].childNodes[1].style.zIndex = 1;
                addElementmoreSellToDiv.childNodes[0].childNodes[2].style.zIndex = 2;
                addElementmoreSellToDiv.childNodes[0].style.backgroundColor = '#01c394';
                addElementmoreSellToDiv.childNodes[0].childNodes[0].style.left = '3px';
            }
            addElementmoreSellToDiv.childNodes[0].childNodes[1].addEventListener('click' , function (e){
                let num1 = Number(e.target.parentNode.parentNode.className.split('').splice(23).toString().replace(',' , ''));
                varJson[num1].moreSell = 1;
                this.style.zIndex = 1;
                addElementmoreSellToDiv.childNodes[0].childNodes[2].style.zIndex = 2;
                addElementmoreSellToDiv.childNodes[0].style.backgroundColor = '#01c394';
                addElementmoreSellToDiv.childNodes[0].childNodes[0].style.left = '3px';
                $.ajax({
                    url:'{{route('admin.varieties.MSell')}}',
                    method:'POST',
                    data:{
                        variety : varJson[num1].id,
                        active : 1,
                    },
                    success:function(data){
                    },
                });
            })

            addElementmoreSellToDiv.childNodes[0].childNodes[2].addEventListener('click' , function (e){
                let num1 = Number(e.target.parentNode.parentNode.className.split('').splice(23).toString().replace(',' , ''));
                varJson[num1].moreSell = 0;
                this.style.zIndex = 1;
                addElementmoreSellToDiv.childNodes[0].childNodes[1].style.zIndex = 2;
                addElementmoreSellToDiv.childNodes[0].style.backgroundColor = '#fb5b5b';
                addElementmoreSellToDiv.childNodes[0].childNodes[0].style.left = '18px';
                $.ajax({
                    url:'{{route('admin.varieties.MSell')}}',
                    method:'POST',
                    data:{
                        variety : varJson[num1].id,
                        active : 0,
                    },
                    success:function(data){
                    },
                });
            })











            if (varJson[i].special === 0){
                addElementSpecialToDiv.childNodes[0].childNodes[2].style.zIndex = 1;
                addElementSpecialToDiv.childNodes[0].childNodes[1].style.zIndex = 2;
                addElementSpecialToDiv.childNodes[0].style.backgroundColor = '#fb5b5b';
                addElementSpecialToDiv.childNodes[0].childNodes[0].style.left = '18px';
            }else {
                addElementSpecialToDiv.childNodes[0].childNodes[1].style.zIndex = 1;
                addElementSpecialToDiv.childNodes[0].childNodes[2].style.zIndex = 2;
                addElementSpecialToDiv.childNodes[0].style.backgroundColor = '#01c394';
                addElementSpecialToDiv.childNodes[0].childNodes[0].style.left = '3px';
            }
            addElementSpecialToDiv.childNodes[0].childNodes[1].addEventListener('click' , function (e){
                let num2 = Number(e.target.parentNode.parentNode.className.split('').splice(22).toString().replace(',' , ''));
                varJson[num2].special = 1;
                this.style.zIndex = 1;
                addElementSpecialToDiv.childNodes[0].childNodes[2].style.zIndex = 2;
                addElementSpecialToDiv.childNodes[0].style.backgroundColor = '#01c394';
                addElementSpecialToDiv.childNodes[0].childNodes[0].style.left = '3px';
                $.ajax({
                    url:'{{route('admin.varieties.special')}}',
                    method:'POST',
                    data:{
                        variety : varJson[num2].id,
                        active : 1,
                    },
                    success:function(data){
                    },
                });
            })

            addElementSpecialToDiv.childNodes[0].childNodes[2].addEventListener('click' , function (e){
                let num2 = Number(e.target.parentNode.parentNode.className.split('').splice(22).toString().replace(',' , ''));
                varJson[num2].special = 0;
                this.style.zIndex = 1;
                addElementSpecialToDiv.childNodes[0].childNodes[1].style.zIndex = 2;
                addElementSpecialToDiv.childNodes[0].style.backgroundColor = '#fb5b5b';
                addElementSpecialToDiv.childNodes[0].childNodes[0].style.left = '18px';
                $.ajax({
                    url:'{{route('admin.varieties.special')}}',
                    method:'POST',
                    data:{
                        variety : varJson[num2].id,
                        active : 0,
                    },
                    success:function(data){
                    },
                });
            })



            // addElementSpecialToDiv.childNodes[0].childNodes[2].addEventListener('click' , function (e){
            //     console.log(e)
            // });
            // console.log(addElementmoreSellToDiv)




            let userIdBox = document.createElement('div');
            userIdBox.classList.add('userIdBox');
            userIdBox.innerText = 'Seller : ' + varJson[i].user_id;
            addProductBoxmainTop.appendChild(userIdBox);



            let menoBottomBox = document.createElement('div');
            menoBottomBox.classList.add('menoBottomBox');
            menoBottomBox.innerHTML =
                '<div class="text-center opacity-50" style="width: 55px ; font-size: 12px">بازه ارسال</div>'+
                '<div class="text-center opacity-50" style="width: 130px ; font-size: 14px">قیمت</div>'+
                '<div class="text-center opacity-50" style="width: 130px ; font-size: 14px">تخفیف</div>'+
                '<div class="text-center opacity-50" style="width: 60px ; font-size: 14px">موجودی</div>'+
                '<div class="text-center opacity-50" style="width: 40px ; font-size: 14px">رزرو</div>'+
                '<div class="text-center opacity-50" style="width: 60px ; font-size: 14px">مانده</div>'+
                '<div class="text-center opacity-50" style="width: 60px ; font-size: 14px">فعال</div>'+
                '<div class="text-center opacity-50" style="width: 50px ; font-size: 14px"></div>';
            addProductBoxmainBottom.appendChild(menoBottomBox);










            if (varJson[i].auth_id === varJson[i].user_id){

                let formBottomBox = document.createElement('div');
                formBottomBox.classList.add('formBottomBox'+i);
                formBottomBox.innerHTML =
                    '<form class="d-flex align-items-center justify-content-between w-100">' +
                        '<select name="sentTime" class="form-select bg-dark text-light sentTime" style="border: none ; outline: none ; width: 55px">' +
                            '<option value="1">1</option>'+
                            '<option value="2">2</option>'+
                            '<option value="3">3</option>'+
                            '<option value="4">4</option>'+
                            '<option value="5">5</option>'+
                        '</select>'+
                        '<input type="text" class="input-group-text bg-dark text-light text-center ms-2 priceBox" style="height: 36px ; border: none ; outline: none ; width: 130px">'+
                        '<input type="text" class="input-group-text bg-dark text-light text-center ms-2 priceOffBox" style="height: 36px ; border: none ; outline: none ; width: 130px">'+
                        '<input type="text" class="input-group-text bg-dark text-light text-center ms-2 NumberBox" style="height: 36px ; border: none ; outline: none ; width: 60px">'+
                        '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center ms-2 opacity-75 reserveBox" style="height: 36px ; border: none ; outline: none ; width: 40px">3</div>'+
                        '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center ms-2 opacity-75 remainBox" style="height: 36px ; border: none ; outline: none ; width: 60px">9999</div>'+
                        '<div class=" text-light d-flex align-items-center justify-content-center ms-2 opacity-75" style="height: 36px ; border: none ; outline: none ; width: 60px">' +
                            '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ">' +
                                '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                                '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                                '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                            '</div>' +
                        '</div>'+
                        '<div class=" text-light d-flex align-items-center justify-content-center flex-column ms-2 p-0" style="height: 55px ; border: none ; outline: none ; width: 50px">' +
                            '<i class="bi-check-lg h4  w-100 mt-2 text-center border border-dark opacity-50 rounded-3 shadow" style="background-color: grey ; cursor: pointer"></i>' +
                            '<i class="bi-x h4  w-100 text-center border border-dark opacity-50 rounded-3 shadow " style="background-color: grey ; cursor: pointer"></i>' +
                        '</div>'+
                    '</form>'
                addProductBoxmainBottom.appendChild(formBottomBox);




                // addActive
                formBottomBox.childNodes[0].childNodes[6].childNodes[0].classList.add('togleBoxB' + i);
                formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[0].classList.add('togleB' + i);
                formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[1].classList.add('deactiveB' + i);
                formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[2].classList.add('activeB' + i);

                let togleBoxB = formBottomBox.childNodes[0].childNodes[6].childNodes[0];
                let togleB = formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[0];
                let deactiveB = formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[1];
                let activeB = formBottomBox.childNodes[0].childNodes[6].childNodes[0].childNodes[2];


                let productActiveB = varJson[i].active;

                if (productActiveB === 0){
                    activeB.style.zIndex = 2;
                    deactiveB.style.zIndex = 1;
                    togleB.style.left = '18px';
                    togleBoxB.style.backgroundColor = '#fb5b5b';
                }else {
                    activeB.style.zIndex = 1;
                    deactiveB.style.zIndex = 2;
                    togleB.style.left = '3px';
                    togleBoxB.style.backgroundColor = '#01c394';
                }

                deactiveB.addEventListener('click' , function (e){
                    activeB.style.zIndex = 2;
                    deactiveB.style.zIndex = 1;
                    togleB.style.left = '18px';
                    togleBoxB.style.backgroundColor = '#fb5b5b';


                    let togleIndex = e.target.className.split('').splice(60).toString().replace(',' , '');
                    varJson[togleIndex].active = 0;


                    $.ajax({
                        url:'{{route('admin.varieties.active')}}',
                        method:'POST',
                        data:{
                            variety : varietytId,
                            active : 0,
                        },
                        success:function(data){
                        },
                    });
                })

                activeB.addEventListener('click' , function (e){
                    activeB.style.zIndex = 1;
                    deactiveB.style.zIndex = 2;
                    togleB.style.left = '3px';
                    togleBoxB.style.backgroundColor = '#01c394';

                    let togleIndexB = e.target.className.split('').splice(58).toString().replace(',' , '');
                    varJson[togleIndexB].active = 1;


                    $.ajax({
                        url:'{{route('admin.varieties.active')}}',
                        method:'POST',
                        data:{
                            variety : varietytId,
                            active : 1,
                        },
                        success:function(data){
                        },
                    });
                })




                let sentButton = formBottomBox.childNodes[0].childNodes[7].childNodes[0];
                let cancleButton = formBottomBox.childNodes[0].childNodes[7].childNodes[1];
                let sentTime = formBottomBox.childNodes[0].childNodes[0];
                let priceBox = formBottomBox.childNodes[0].childNodes[1];
                let priceOffBox = formBottomBox.childNodes[0].childNodes[2];
                let NumberBox = formBottomBox.childNodes[0].childNodes[3];
                let reserveBox = formBottomBox.childNodes[0].childNodes[4];
                let remainBox = formBottomBox.childNodes[0].childNodes[5];

                sentButton.classList.add('sentButton'+i);
                cancleButton.classList.add('cancleButton'+i);




                // inputsDefeultValue
                let priceArray = [];
                let pricethree = 0 ;
                for (g=varJson[i].price.toString().length-1 ; g>-1 ; g--){
                    pricethree += 1;
                    priceArray.unshift(varJson[i].price.toString()[g]) ;
                    if (pricethree % 3 === 0){
                        priceArray.unshift(',') ;
                    }
                }
                if (priceArray[0] === ','){
                    priceArray.shift();
                }
                let priceLast = '';
                for (j=0 ; j<priceArray.length ; j++){
                    priceLast += priceArray[j];
                }

                let priceOffArray = [];
                let priceOffthree = 0 ;
                for (g=varJson[i].price_off.toString().length-1 ; g>-1 ; g--){
                    priceOffthree += 1;
                    priceOffArray.unshift(varJson[i].price_off.toString()[g]) ;
                    if (priceOffthree % 3 === 0){
                        priceOffArray.unshift(',') ;
                    }
                }
                if (priceOffArray[0] === ','){
                    priceOffArray.shift();
                }
                let priceOffLast = '';
                for (j=0 ; j<priceOffArray.length ; j++){
                    priceOffLast += priceOffArray[j];
                }
                sentTime.value =  varJson[i].shipping_time
                priceBox.value = priceLast
                priceOffBox.value = priceOffLast
                NumberBox.value = varJson[i].number
                reserveBox.innerText = varJson[i].reserve_num
                remainBox.innerText = varJson[i].remain



                for (s=0 ; s<sentTime.childNodes.length ; s++){
                    sentTime.childNodes[s].addEventListener('click' , function (e){
                        sentButton.style.backgroundColor = '#00c5a3';
                        cancleButton.style.backgroundColor = '#ff5454';
                    })
                }
                priceBox.addEventListener('keyup' , function (){
                    sentButton.style.backgroundColor = '#00c5a3';
                    cancleButton.style.backgroundColor = '#ff5454';
                })

                priceOffBox.addEventListener('keyup' , function (){
                    sentButton.style.backgroundColor = '#00c5a3';
                    cancleButton.style.backgroundColor = '#ff5454';
                })

                NumberBox.addEventListener('keyup' , function (){
                    sentButton.style.backgroundColor = '#00c5a3';
                    cancleButton.style.backgroundColor = '#ff5454';
                })



                sentButton.addEventListener('click' , function (e){
                    sentButton.style.backgroundColor = 'grey';
                    cancleButton.style.backgroundColor = 'grey';

                    if (priceBox.value == 0){
                        alert('قیمت باید بزرگتر از صفر باشد')
                    }else if( NumberBox.value - reserveBox.innerText < 0) {
                        alert('مانده کالا نباید منفی شود')
                    }else {
                        remainBox.innerText = NumberBox.value - reserveBox.innerText;

                        let varIndexB = Number(e.target.className.split('').splice(95).toString().replace(',' , ''));

                        varJson[varIndexB].shipping_time = sentTime.value;
                        varJson[varIndexB].price = priceBox.value.split(',').toString().replace(',' , '').replace(',' , '');
                        varJson[varIndexB].price_off = priceOffBox.value.split(',').toString().replace(',' , '').replace(',' , '');
                        varJson[varIndexB].number = NumberBox.value;
                        varJson[varIndexB].remain = NumberBox.value - reserveBox.innerText;



                        let pppppp = priceBox.value.split(',').toString().replace(',' , '').replace(',' , '')
                        let priceArrayB = [];
                        let pricethreeB = 0 ;
                        for (g=pppppp.length-1 ; g>-1 ; g--){
                            pricethreeB += 1;
                            priceArrayB.unshift(pppppp.toString()[g]) ;
                            if (pricethreeB % 3 === 0){
                                priceArrayB.unshift(',') ;
                            }
                        }
                        if (priceArrayB[0] === ','){
                            priceArrayB.shift();
                        }
                        let priceLastB = '';
                        for (j=0 ; j<priceArrayB.length ; j++){
                            priceLastB += priceArrayB[j];
                        }
                        priceBox.value = priceLastB




                        let poooooo = priceOffBox.value.split(',').toString().replace(',' , '').replace(',' , '')
                        let priceOffArrayB = [];
                        let priceOffthreeB = 0 ;
                        for (g=poooooo.length-1 ; g>-1 ; g--){
                            priceOffthreeB += 1;
                            priceOffArrayB.unshift(poooooo.toString()[g]) ;
                            if (priceOffthreeB % 3 === 0){
                                priceOffArrayB.unshift(',') ;
                            }
                        }
                        if (priceOffArrayB[0] === ','){
                            priceOffArrayB.shift();
                        }
                        let priceOffLastB = '';
                        for (j=0 ; j<priceOffArrayB.length ; j++){
                            priceOffLastB += priceOffArrayB[j];
                        }
                        priceOffBox.value = priceOffLastB

                        $.ajax({
                            url:'{{route('admin.varieties.values')}}',
                            method:'POST',
                            data:{
                                variety : varietytId,
                                AjaxsentTime : sentTime.value,
                                AjaxpriceBox : priceBox.value,
                                AjaxpriceOffBox : priceOffBox.value,
                                AjaxNumberBox : NumberBox.value,
                            },
                            success:function(data){
                            },
                        });

                    }
                })
                // class="input-group-text bg-dark text-light text-center ms-2 priceBox" style="height: 36px ; border: none ; outline: none ; width: 130px"

                cancleButton.addEventListener('click' , function (e){
                    sentButton.style.backgroundColor = 'grey';
                    cancleButton.style.backgroundColor = 'grey';

                    let varIndex = Number(e.target.className.split('').splice(85).toString().replace(',' , ''))
                    sentTime.value =  varJson[varIndex].shipping_time;


                    let priceArrayC = [];
                    let pricethreeC = 0 ;
                    for (g=varJson[varIndex].price.toString().length-1 ; g>-1 ; g--){
                        pricethreeC += 1;
                        priceArrayC.unshift(varJson[varIndex].price.toString()[g]) ;
                        if (pricethreeC % 3 === 0){
                            priceArrayC.unshift(',') ;
                        }
                    }
                    if (priceArrayC[0] === ','){
                        priceArrayC.shift();
                    }
                    let priceLastC = '';
                    for (j=0 ; j<priceArrayC.length ; j++){
                        priceLastC += priceArrayC[j];
                    }
                    priceBox.value = priceLastC;

                    let priceOffArrayC = [];
                    let priceOffthreeC = 0 ;
                    for (g=varJson[varIndex].price_off.toString().length-1 ; g>-1 ; g--){
                        priceOffthreeC += 1;
                        priceOffArrayC.unshift(varJson[varIndex].price_off.toString()[g]) ;
                        if (priceOffthreeC % 3 === 0){
                            priceOffArrayC.unshift(',') ;
                        }
                    }
                    if (priceOffArrayC[0] === ','){
                        priceOffArrayC.shift();
                    }
                    let priceOffLastC = '';
                    for (j=0 ; j<priceOffArrayC.length ; j++){
                        priceOffLastC += priceOffArrayC[j];
                    }
                    priceOffBox.value = priceOffLastC;

                    NumberBox.value = varJson[varIndex].number;
                })

            }else {
                let formBottomBoxNon = document.createElement('div');
                formBottomBoxNon.classList.add('formBottomBoxNon'+i);

                let priceFake = varJson[i].price
                let priceFakeArray = [];
                let priceFakethree = 0 ;
                for (g=priceFake.toString().length-1 ; g>-1 ; g--){
                    priceFakethree += 1;
                    priceFakeArray.unshift(priceFake.toString()[g]) ;
                    if (priceFakethree % 3 === 0){
                        priceFakeArray.unshift(',') ;
                    }
                }
                if (priceFakeArray[0] === ','){
                    priceFakeArray.shift();
                }
                let priceFakeLast = '';
                for (j=0 ; j<priceFakeArray.length ; j++){
                    priceFakeLast += priceFakeArray[j];
                }





                let priceOffFake = varJson[i].price_off
                let priceOffFakeArray = [];
                let priceOffFakethree = 0 ;
                for (g=priceOffFake.toString().length-1 ; g>-1 ; g--){
                    priceOffFakethree += 1;
                    priceOffFakeArray.unshift(priceOffFake.toString()[g]) ;
                    if (priceOffFakethree % 3 === 0){
                        priceOffFakeArray.unshift(',') ;
                    }
                }
                if (priceOffFakeArray[0] === ','){
                    priceOffFakeArray.shift();
                }
                let priceOffFakeLast = '';
                for (j=0 ; j<priceOffFakeArray.length ; j++){
                    priceOffFakeLast += priceOffFakeArray[j];
                }


                formBottomBoxNon.innerHTML =
                    '<div class="opacity-50 input-group-text bg-dark text-light" style="height: 36px ;width: 55px ; border: none ; outline: none"> ' + varJson[i].shipping_time + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25 input-group-text bg-dark text-light" style="height: 36px ;width: 130px ; border: none ; outline: none"> ' + priceFakeLast + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25 input-group-text bg-dark text-light" style="height: 36px ;width: 130px ; border: none ; outline: none"> ' + priceOffFakeLast + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25 input-group-text bg-dark text-light" style="height: 36px ;width: 60px ; border: none ; outline: none"> ' + varJson[i].number + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25 input-group-text bg-dark text-light" style="height: 36px ;width: 40px ; border: none ; outline: none"> ' + varJson[i].reserve_num + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25 input-group-text bg-dark text-light" style="height: 36px ;width: 60px ; border: none ; outline: none"> ' + varJson[i].remain + ' </div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-25  text-light" style="height: 36px ;width: 60px; border: none ; outline: none"> ' +
                        '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ">' +
                        '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                        '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                        '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                    '</div>' +
                    '</div>'+
                    '<div class="d-flex align-items-center justify-content-center text-center opacity-0 input-group-text bg-dark text-light" style="height: 36px ;width: 50px ; border: none ; outline: none"></div>';




                addProductBoxmainBottom.appendChild(formBottomBoxNon);



                // addActive
                formBottomBoxNon.childNodes[6].childNodes[1].classList.add('togleBoxFake' + i);
                formBottomBoxNon.childNodes[6].childNodes[1].childNodes[0].classList.add('togleFake' + i);
                formBottomBoxNon.childNodes[6].childNodes[1].childNodes[1].classList.add('deactiveFake' + i);
                formBottomBoxNon.childNodes[6].childNodes[1].childNodes[2].classList.add('activeFake' + i);

                let togleBoxFake = formBottomBoxNon.childNodes[6].childNodes[1];
                let togleFake = formBottomBoxNon.childNodes[6].childNodes[1].childNodes[0];
                let deactiveFake = formBottomBoxNon.childNodes[6].childNodes[1].childNodes[1];
                let activeFake = formBottomBoxNon.childNodes[6].childNodes[1].childNodes[2];

                let productActiveFake = varJson[i].active;

                if (productActiveFake === 0){
                    activeFake.style.zIndex = 2;
                    deactiveFake.style.zIndex = 1;
                    togleFake.style.left = '18px';
                    togleBoxFake.style.backgroundColor = '#fb5b5b';
                }else {
                    activeFake.style.zIndex = 1;
                    deactiveFake.style.zIndex = 2;
                    togleFake.style.left = '3px';
                    togleBoxFake.style.backgroundColor = '#01c394';
                }
            }
        }
    }

</script>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
