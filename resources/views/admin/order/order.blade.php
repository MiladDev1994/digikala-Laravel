@extends('admin.admin_app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('admin')

    <style>
        @foreach($orders as $key=>$order)
    .mainBox{{$key}}{
            width: 100%;
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
        .mainBoxTop{{$key}}{
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            position: relative;
            border-bottom: 1px solid #272727;
        }
        .mainBoxBot{{$key}}{
            width: 100%;
            height: 100px;
            padding: 10px 10px;
            position: relative;

        }
        .buterBox{{$key}}{
            min-width: 200px;
            height: 180px;
            background-color: #373737;
            position: absolute;
            z-index: 999;
            top: -90px;
            border-radius: 10px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.2);
            display: none;
            right: 70px;
            padding: 10px;
            align-items: center;
            justify-content: center;
            flex-direction: column;

        }
        @endforeach

        .addElementToDiv{
            width: 70px;
            border-radius: 5px;
            border: 2px solid #434343;
        }

        .dropdown-toggle::after {
            display: none;

        }
        li:hover{
            background-color: #616161 !important;
            cursor: pointer;
            transition: 0.3s;
        }
    </style>

    <h4 class="text-center opacity-50 py-2">سفارشات</h4>

    <div class="w-100 d-flex align-items-center justify-content-end px-4">


        <div class="d-flex align-items-center justify-content-end px-4 statuseFilter">
            <div class="form-select  bg-dark text-light text-center dropdown-toggle" style="border: none ; outline: none ; white-space: nowrap ; width: 10rem"  type="button" data-bs-toggle="dropdown" aria-expanded="false">فیلتر وضعیت ....</div>
            <ul class="dropdown-menu bg-dark">
                <li class="dropdown-item text-light opacity-50" value="null">فیلتر وضعیت ....</li>
                <li class="dropdown-item text-light" value="sending">درحال‌ ارسال</li>
                <li class="dropdown-item text-light" value="sent">ارسال ‌شده</li>
                <li class="dropdown-item text-light" value="canceled">لغو‌ شده</li>
            </ul>
        </div>

        <div class=" d-flex justify-content-center p-0 position-relative  py-3 accessFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: 0">ادمین</p>
            <div class="position-relative togleDeActive mt-3" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-dark px-4" style="height: 50px;margin-top: 5px;display: flex;align-items: center;justify-content: space-between">
        <div class="m-auto d-flex align-items-center justify-content-between" style="width: 97%">
            <div class="" style="width: 70px"></div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000"> کد‌محصول</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 280px"> نام‌محصول</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 40px">تعداد</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 100px"> قیمت‌واحد </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 100px"> قیمت‌کل </div>
        </div>

    </div>



    <div class="w-100 px-4 pb-4 box"></div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let adminFil = null;
        let staFil = 'null';

        let statuseFilter = document.querySelector('.statuseFilter');

        for (f=0 ; f<8 ; f++){

            if(f % 2 == 1){
                statuseFilter.childNodes[3].childNodes[f].addEventListener('click' , function (e){
                    adminFil = adminFil;
                    staFil = e.target.attributes[1].value;
                    AddFilter(adminFil , staFil)

                    statuseFilter.childNodes[1].innerText = e.target.innerText


                })
            }
        }


        let togleDeActive = document.querySelector('.togleDeActive');

        // console.log(togleDeActive.childNodes)

        togleDeActive.childNodes[5].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            togleDeActive.childNodes[3].style.zIndex = 2;
            togleDeActive.style.backgroundColor = '#01c394';
            togleDeActive.childNodes[1].style.left = '18px'

            adminFil = 1;
            staFil = staFil;
            AddFilter(adminFil , staFil)
        })
        togleDeActive.childNodes[3].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            togleDeActive.childNodes[5].style.zIndex = 2;
            togleDeActive.style.backgroundColor = '#b0b0b0';
            togleDeActive.childNodes[1].style.left = '3px'

            adminFil = null;
            staFil = staFil;
            AddFilter(adminFil , staFil)
        })











        AddFilter(adminFil , staFil)

        function AddFilter(a , s) {
            let Box = document.querySelector('.box');
            Box.innerHTML = ''
            let ordersOther = @php echo $orderLast; @endphp;

            orders = ordersOther.filter(function (e){
                let adminFilter; if (a == null){adminFilter = e.seller_id}else {adminFilter = a}
                let statusFilter; if (s == 'null'){statusFilter = e.order_status}else {statusFilter = s}

                return e.seller_id === adminFilter && e.order_status === statusFilter;
            })




            let i = -1;
            orders.forEach(function (element) {
                i += 1;
                let mainBox = document.createElement('div');
                mainBox.classList.add('mainBox' + i);
                Box.appendChild(mainBox);


                let mainBoxTop = document.createElement('div');
                mainBoxTop.classList.add('mainBoxTop' + i);
                mainBox.appendChild(mainBoxTop);


                let mainBoxBot = document.createElement('div');
                mainBoxBot.classList.add('mainBoxBot' + i);
                mainBox.appendChild(mainBoxBot);


                let baseURL = 'http://127.0.0.1:8000'

                mainBoxTop.innerHTML = '' +
                    '<img class="addElementToDiv shadow">' +
                    '<div class="d-flex align-items-center justify-content-center flex-column">' +
                    '<a href="" class="text-info" style="text-decoration: none">' + 'DKP : ' + element.prodoct_id + '</a>' +
                    '<div > ' + 'DKPC : ' + element.variety_id + ' </div>' +
                    '</div>' +
                    '<div class="" style="width: 280px ; font-size: 13px">' +
                    element.name + ' | ' + element.var_name + ' | ' + 'گارانتی' + ' ' + element.warranty_period + ' ' + element.warranty_name +
                    '</div>' +
                    '<div class="input-group-text bg-dark text-light text-center shadow d-flex align-items-center justify-content-center" style="width: 40px ; border: none ; outline: none">' + element.number + '</div>' +
                    '<div class="input-group-text bg-dark text-light text-center shadow d-flex align-items-center justify-content-center" style="width: 100px ; border: none ; outline: none">' + element.price + '</div>' +
                    '<div class="input-group-text bg-dark text-light text-center shadow d-flex align-items-center justify-content-center" style="width: 100px ; border: none ; outline: none">' + element.price * element.number + '</div>' +
                    '<div class="position-absolute" style="font-size: 12px; left: 5px ; top: 0">' + 'seller : ' + element.seller_id + '</div>'


                let image = `${baseURL}/images/${element.image}`;
                mainBoxTop.childNodes[0].setAttribute('src', image);

                mainBoxTop.childNodes[1].childNodes[0].setAttribute('href', `${baseURL}/products/dkp-` + element.prodoct_id)
                mainBoxTop.childNodes[1].childNodes[0].setAttribute('target', 'blank')


                // inputsDefeultValue
                let priceArray = [];
                let pricethree = 0;
                for (g = element.price.toString().length - 1; g > -1; g--) {
                    pricethree += 1;
                    priceArray.unshift(element.price.toString()[g]);
                    if (pricethree % 3 === 0) {
                        priceArray.unshift(',');
                    }

                }
                if (priceArray[0] === ',') {
                    priceArray.shift();
                }
                let priceLast = '';
                for (j = 0; j < priceArray.length; j++) {
                    priceLast += priceArray[j];
                }
                mainBoxTop.childNodes[4].innerText = priceLast


                let priceOffArray = [];
                let priceOffthree = 0;
                for (g = (element.price * element.number).toString().length - 1; g > -1; g--) {
                    priceOffthree += 1;
                    priceOffArray.unshift((element.price * element.number).toString()[g]);
                    if (priceOffthree % 3 === 0) {
                        priceOffArray.unshift(',');
                    }
                }
                if (priceOffArray[0] === ',') {
                    priceOffArray.shift();
                }
                let priceOffLast = '';
                for (j = 0; j < priceOffArray.length; j++) {
                    priceOffLast += priceOffArray[j];
                }
                mainBoxTop.childNodes[5].innerText = priceOffLast


                mainBoxBot.innerHTML = '' +
                    '<div class="w-100 d-flex align-items-center justify-content-between text-center opacity-50 " style="height: 15px ; font-size: 12px">' +
                    '<div class="" style="width: 70px"></div> ' +
                    '<div class="" style="width: 70px">کدسفارش</div> ' +
                    '<div class="" style="width: 120px">تاریخ‌تحویل</div> ' +
                    '<div class="" style="width: 70px">بازه زمانی</div> ' +
                    '<div class="" style="width: 110px">وضعیت‌پرداخت</div> ' +
                    '<div class="" style="width: 120px">وضعیت‌سفارش</div> ' +
                    '<div class="" style="width: 57px"></div> ' +
                    '</div>' +
                    '<div class="w-100 d-flex align-items-center justify-content-between" style="height: 70px">' +
                    '<div class="bi-person-fill h2 d-flex align-items-center justify-content-center  " style="width: 70px ; cursor: pointer"></div>' +
                    '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 70px ; border: none ; outline: none">' + element.order_val + '</div>' +
                    '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 120px ; border: none ; outline: none"> ' + element.PDateYear + '/' + element.PDateMonth + '/' + element.PDateDay + ' </div>' +
                    '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 70px ; border: none ; outline: none">' + element.time + '</div>' +
                    '<div class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 110px ; border: none ; outline: none"></div>' +


                    '<div class="" style="width: 120px"></div>' +


                    '<div class="d-flex align-items-center justify-content-center flex-column" style="width: 50px"></div>' +
                    '</div>'

                let buyer = document.createElement('div');
                buyer.classList.add('buterBox' + i)
                mainBoxBot.childNodes[1].appendChild(buyer);

                mainBoxBot.childNodes[1].childNodes[0].addEventListener('mouseover', function (e) {
                    mainBoxBot.childNodes[1].childNodes[7].style.display = 'flex'
                })
                mainBoxBot.childNodes[1].childNodes[0].addEventListener('mouseout', function (e) {
                    mainBoxBot.childNodes[1].childNodes[7].style.display = 'none'
                })

                buyer.innerHTML = '' +
                    '<div class="w-100 h5 border-bottom border-dark py-2"> ' + element.user_name + ' </div>' +
                    '<div class="w-100 border-bottom border-dark py-2"> ' + element.address + ' </div>' +
                    '<div class="w-100  py-2"> ' + element.phone + ' </div>'


                if (element.pay_status == 'offline') {
                    mainBoxBot.childNodes[1].childNodes[4].innerText = 'پرداخت‌در‌محل'
                } else {
                    mainBoxBot.childNodes[1].childNodes[4].innerText = 'پرداخت‌شده'
                }

                let buyTime = Number(element.PDateYear + '' + (element.PDateMonth < 10 ? `0${element.PDateMonth}`: element.PDateMonth) + '' + (element.PDateDay < 10 ? `0${element.PDateDay}` : element.PDateDay))
                let sendTime = Number(element.nowYear + '' + (element.nowMonth < 10 ? `0${element.nowMonth}`: element.nowMonth) + '' + (element.nowDay < 10 ? `0${element.nowDay}` : element.nowDay))
                console.log(sendTime<buyTime)

                if (element.order_status == 'sending' && sendTime > buyTime) {
                    mainBox.style.border = '2px solid red'
                } else if (element.order_status == 'sending' && sendTime === buyTime) {
                    mainBox.style.border = '2px solid #ffb700'
                } else {
                    mainBox.style.border = '2px solid #2a2a2a'
                }


                let statusBox = mainBoxBot.childNodes[1].childNodes[5];
                let AjaxBtn = mainBoxBot.childNodes[1].childNodes[6];


                if (element.auth_id === element.seller_id && element.order_status == 'sending') {

                    statusBox.innerHTML = '' +
                        '<select class="form-select bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 120px ; border: none ; outline: none">' +
                        '<option value="sending">درحال‌ارسال</option>' +
                        '<option value="sent">ارسال‌شده</option>' +
                        '<option value="canceled">لغو</option>' +
                        '</select>'

                    AjaxBtn.innerHTML = '' +
                        '<i class="bi-check-lg h4  w-100 mt-2 text-center border border-dark opacity-50 rounded-3 shadow" style="background-color: grey ; cursor: pointer"></i>' +
                        '<i class="bi-x h4  w-100 text-center border border-dark opacity-50 rounded-3 shadow " style="background-color: grey ; cursor: pointer"></i>'


                    let sentBtn = AjaxBtn.childNodes[0];
                    let canBtn = AjaxBtn.childNodes[1];


                    for (h = 0; h < 3; h++) {
                        statusBox.childNodes[0].childNodes[h].addEventListener('click', function (e) {
                            sentBtn.style.backgroundColor = '#01c394'
                            canBtn.style.backgroundColor = '#ff5454'

                            if (e.target.value != 'sending'){
                                alert('در صورت تغییر وضعیت امکان برگشت وجود ندارد!')
                            }
                        })
                    }


                    sentBtn.addEventListener('click', function () {
                        element.order_status = statusBox.childNodes[0].value;
                        sentBtn.style.backgroundColor = 'gray'
                        canBtn.style.backgroundColor = 'gray'

                        $.ajax({
                            url: '{{route('admin.orders.update')}}',
                            method: 'POST',
                            data: {
                                orderId: element.id,
                                varietyId: element.variety_id,
                                status: statusBox.childNodes[0].value,
                                number: element.number,
                                action: statusBox.childNodes[0].value,
                            },
                            success: function (data) {
                            },
                        });


                        let buyTime = Number(element.PDateYear + '' + (element.PDateMonth < 10 ? `0${element.PDateMonth}`: element.PDateMonth) + '' + (element.PDateDay < 10 ? `0${element.PDateDay}` : element.PDateDay))
                        let sendTime = Number(element.nowYear + '' + (element.nowMonth < 10 ? `0${element.nowMonth}`: element.nowMonth) + '' + (element.nowDay < 10 ? `0${element.nowDay}` : element.nowDay))
                        console.log(sendTime<buyTime)

                        if (element.order_status == 'sending' && sendTime > buyTime) {
                            mainBox.style.border = '2px solid red'
                        } else if (element.order_status == 'sending' && sendTime === buyTime) {
                            mainBox.style.border = '2px solid #ffb700'
                        } else {
                            mainBox.style.border = '2px solid #2a2a2a'
                        }


                        if (statusBox.childNodes[0].value == 'canceled' || statusBox.childNodes[0].value == 'sent') {
                            statusBox.innerHTML = '<div  class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 120px ; border: none ; outline: none"></div>'

                            if (element.order_status == 'sending') {
                                statusBox.childNodes[0].innerText = 'درحال‌ارسال'
                            } else if (element.order_status == 'sent') {
                                statusBox.childNodes[0].innerText = 'ارسال‌شده'
                            } else {
                                statusBox.childNodes[0].innerText = 'لغو'
                            }

                            AjaxBtn.innerHTML = '';

                        }

                    })

                    canBtn.addEventListener('click', function () {
                        statusBox.childNodes[0].value = element.order_status;
                        sentBtn.style.backgroundColor = 'gray'
                        canBtn.style.backgroundColor = 'gray'

                    })

                } else {
                    statusBox.innerHTML = '<div  class="input-group-text bg-dark text-light d-flex align-items-center justify-content-center shadow" style="width: 120px ; border: none ; outline: none"></div>'

                    if (element.order_status == 'sending') {
                        statusBox.childNodes[0].innerText = 'درحال‌ارسال'
                    } else if (element.order_status == 'sent') {
                        statusBox.childNodes[0].innerText = 'ارسال‌شده'
                    } else {
                        statusBox.childNodes[0].innerText = 'لغو'
                    }
                }


            })
        }


    </script>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
