@extends('admin.admin_app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('admin')

    <style>
        .userBox{
            height: 100px;
            margin-top: 10px;
            background-color: #2f2f2f;
            border: 2px solid #2e2e2e;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }
    </style>

    <h4 class="text-center opacity-50 py-2">کاربران</h4>



    <div class="d-flex align-items-center justify-content-center pt-3 serachBox">
        <form class="d-flex align-items-center justify-content-center" style="width: 400px">
            <button class="bi-search text-light h4 mt-1 px-2" style="background-color: transparent ; border: none ; outline: none"></button>
            <input type="text" class="input-group-text bg-dark text-light text-start" style="border: none ; outline: none" placeholder="جستوجو شماره کاربر....">
        </form>
    </div>


    <div class="px-3 bg-dark">
        <div class="d-flex w-100 align-items-center justify-content-between bg-dark mt-4 px-4" style="height: 40px">
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 60px"> کد کاربر</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 90px"> نام کاربر</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 180px">ایمیل</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 110px"> دسترسی </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 60px"> فروشنده </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 120px"> نام فروشگاه </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 50px"> </div>
        </div>
    </div>






    <div class="box px-4 pb-4"></div>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        let firestusers = @php echo $users ; @endphp;
        console.log(firestusers)

        let Box = document.querySelector('.box')

        let idSearch = '' ;
        let serachBox = document.querySelector('.serachBox');

        serachBox.childNodes[1].childNodes[1].addEventListener('click' , function (e){
            e.preventDefault()
            idSearch = serachBox.childNodes[1].childNodes[3].value ;
            idFilter(idSearch)
            serachBox.childNodes[1].childNodes[3].value = '' ;
        })




        idFilter(idSearch)
        function idFilter(a){
            Box.innerText = '' ;
            users = firestusers.filter(function (e){
                let user ; if (a == ''){user = e.id}else {user = idSearch}
                return e.id == user;
            })


            users.forEach(function (element){

                let userBox = document.createElement('div');
                userBox.classList.add('userBox');
                Box.appendChild(userBox);

                userBox.innerHTML = '' +
                    '<div class="bg-dark input-group-text text-light d-flex align-items-center justify-content-center shadow" style="width: 60px ; border: none ; outline: none">'+element.id+'</div>'+
                    '<div class="bg-dark input-group-text text-light d-flex align-items-center justify-content-center shadow" style="width: 90px ; border: none ; outline: none">'+element.name+'</div>'+
                    '<div class="bg-dark input-group-text text-light d-flex align-items-center justify-content-center shadow" style="width: 180px ; border: none ; outline: none">'+element.email+'</div>' +
                    '<select class="form-select bg-dark text-center text-light shadow" style="width: 110px ; border: none ; outline: none">' +
                        '<option value="developer">مدیر‌کل</option>' +
                        '<option value="normal">کاربر‌عادی</option>' +
                    '</select>'+
                    '<div class=" text-light d-flex align-items-center justify-content-center ms-2 opacity-75" style="height: 36px ; border: none ; outline: none ; width: 60px">' +
                        '<div class="position-relative togleBoxOne shadow" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ; transition: 0.2s ">' +
                            '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px; transition: 0.2s"></div>' +
                            '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                            '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                        '</div>' +
                    '</div>'+
                    '<div class="bg-dark input-group-text text-light d-flex align-items-center justify-content-center shadow" style="width: 120px ; border: none ; outline: none"></div>' +
                    '<div class=" text-light d-flex align-items-center justify-content-center flex-column p-0" style="width: 50px ; border: none ; outline: none">' +
                        '<i class="bi-check-lg h4  w-100 mt-2 text-center border border-dark opacity-50 rounded-3 shadow" style="background-color: grey ; cursor: pointer"></i>' +
                        '<i class="bi-x h4  w-100 text-center border border-dark opacity-50 rounded-3 shadow " style="background-color: grey ; cursor: pointer"></i>' +
                    '</div>'



                let rolValue = userBox.childNodes[3];
                rolValue.value = element.role;

                let sentBtn = userBox.childNodes[6].childNodes[0];
                let CantBtn = userBox.childNodes[6].childNodes[1];

                if(element.seller_name != ''){
                    userBox.childNodes[5].innerText = element.seller_name;
                }else {
                    userBox.childNodes[5].innerText = '-----';
                    userBox.childNodes[5].classList.add('opacity-50')
                }

                rolValue.childNodes[0].addEventListener('click' , function (e){
                    sentBtn.style.backgroundColor = '#01c394';
                    CantBtn.style.backgroundColor = '#ff5454';
                    console.log(e)
                })
                rolValue.childNodes[1].addEventListener('click' , function (e){
                    sentBtn.style.backgroundColor = '#01c394';
                    CantBtn.style.backgroundColor = '#ff5454';
                    console.log(e)
                })

                sentBtn.addEventListener('click' , function (e){
                    element.role = rolValue.value;
                    sentBtn.style.backgroundColor = 'gray';
                    CantBtn.style.backgroundColor = 'gray';

                    $.ajax({
                        url: '{{route('admin.users.roleUpdate')}}',
                        method: 'POST',
                        data: {
                            userId: element.id,
                            roleValue: rolValue.value,
                        },
                        success: function (data) {
                        },
                    });

                })

                CantBtn.addEventListener('click' , function (e){
                    rolValue.value = element.role;
                    sentBtn.style.backgroundColor = 'gray';
                    CantBtn.style.backgroundColor = 'gray';
                })

                let isSeller = userBox.childNodes[4].childNodes[0];

                if (element.isSeller == 1){
                    isSeller.childNodes[2].style.zIndex = 1;
                    isSeller.childNodes[1].style.zIndex = 2;
                    isSeller.style.backgroundColor = '#01c394';
                    isSeller.childNodes[0].style.left = '3px'
                }else {
                    isSeller.childNodes[1].style.zIndex = 1;
                    isSeller.childNodes[2].style.zIndex = 2;
                    isSeller.style.backgroundColor = '#b0b0b0';
                    isSeller.childNodes[0].style.left = '18px'
                }


                isSeller.childNodes[2].addEventListener('click' , function (e){
                    element.isSeller = 1;
                    this.style.zIndex = 1;
                    isSeller.childNodes[1].style.zIndex = 2;
                    isSeller.style.backgroundColor = '#01c394';
                    isSeller.childNodes[0].style.left = '3px'

                    $.ajax({
                        url: '{{route('admin.users.sellerUpdate')}}',
                        method: 'POST',
                        data: {
                            userId: element.id,
                            sellerIs: 1,
                        },
                        success: function (data) {
                        },
                    });
                })

                isSeller.childNodes[1].addEventListener('click' , function (e){
                    element.isSeller = 0;
                    this.style.zIndex = 1;
                    isSeller.childNodes[2].style.zIndex = 2;
                    isSeller.style.backgroundColor = '#b0b0b0';
                    isSeller.childNodes[0].style.left = '18px'

                    $.ajax({
                        url: '{{route('admin.users.sellerUpdate')}}',
                        method: 'POST',
                        data: {
                            userId: element.id,
                            sellerIs: 0,
                        },
                        success: function (data) {
                        },
                    });
                })


            })



        }

    </script>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
