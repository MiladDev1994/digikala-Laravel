@extends('admin.admin_app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('admin')

    <style>
        .formMain{
            width: 100%;
            background-color: rgba(44, 44, 44, 0.84);
            margin-top: 10px;
            border-radius: 10px;
            border: 1px solid #282828;

        }
    </style>

    <h4 class="text-center opacity-50 py-2">کامنت‌ها</h4>

    <div class="d-flex align-items-center justify-content-center py-3">

        <form class="d-flex p-2 searchBox" style="width: 300px">
            <button type="submit" class="bi-search h3 me-2 mt-1 text-light" style="background-color: transparent ; border: none ; outline: none"></button>
            <input type="text" class="input-group-text bg-dark text-light shadow" style="border: none ; outline: none" placeholder="جستوجوی کد‌محصول....">
        </form>



        <div class="d-flex justify-content-center p-2 position-relative accessFilterBox">
            <p class="position-absolute opacity-50" style="font-size: 12px ; top: -20px">غیر‌فعال</p>
            <div class="position-relative ActFilter" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                <div class="position-absolute  bg-dark" style="left: 18px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
            </div>
        </div>

    </div>




    <div class="px-4 bg-dark">
        <div class="d-flex w-100 align-items-center justify-content-between bg-dark mt-4 px-4" style="height: 40px">
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 65px"> کد‌کاربر</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 65px"> کد‌‌محصول</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000 ; width: 40px">امتیاز</div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 40px"> توصیه </div>
            <div class=" text-center" style="font-size: 15px ; font-weight: 1000; width: 50px"> فعال </div>
            <div class=" text-center me-5" style="font-size: 15px ; font-weight: 1000; width: 50px"></div>
        </div>
    </div>



    <div class="Box px-4 pb-4"></div>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });


        let ProductId = '';
        let active = null;

        let searchBox = document.querySelector('.searchBox');
        searchBox.childNodes[1].addEventListener('click' , function (e){
            e.preventDefault()

            ProductId = e.target.nextElementSibling.value;
            active = active;
            ComFilter(ProductId , active);

            e.target.nextElementSibling.value = '';
        })


        let ActFilter = document.querySelector('.ActFilter')
        ActFilter.childNodes[5].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            ActFilter.childNodes[3].style.zIndex = 2;
            ActFilter.style.backgroundColor = '#01c394';
            ActFilter.childNodes[1].style.left = '3px'

            ProductId = ProductId;
            active = 0;
            ComFilter(ProductId , active);
        })
        ActFilter.childNodes[3].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            ActFilter.childNodes[5].style.zIndex = 2;
            ActFilter.style.backgroundColor = '#b0b0b0';
            ActFilter.childNodes[1].style.left = '18px'

            ProductId = ProductId;
            active = null;
            ComFilter(ProductId , active);

        })


        let getCom = @php echo $comments ; @endphp;

        // getCom.splice(0 , 1)
        console.log(getCom)
        ComFilter(ProductId , active);
        function ComFilter(i , a){


            let Box = document.querySelector('.Box');

            Box.innerHTML = ''

            let comment = getCom.filter(function (e){
                let isId; if (i === ''){isId = e.product_id}else {isId = i}
                let isDeAct; if (a == null){isDeAct = e.active}else {isDeAct = a}
                return e.product_id == isId && e.active == isDeAct;
            })

            let index = 0;
            comment.forEach(function (element){
                index += 1;



                let form = document.createElement('form');
                form.classList.add('formMain');

                Box.appendChild(form)

                form.innerHTML =
                    '<div class="w-100 p-3 d-flex align-items-center justify-content-between position-relative">' +
                        '<div class="input-group-text bg-dark text-center shadow text-light d-flex align-items-center justify-content-center" style="width: 65px ; border: none ; outline: none">'+ element.user_id +'</div>'+
                        '<a class="input-group-text bg-dark  text-center shadow text-info d-flex align-items-center justify-content-center" style="width: 65px ; border: none ; outline: none ;text-decoration: none ">'+ element.product_id +'</a>'+
                        '<div class="input-group-text bg-dark text-center shadow text-light d-flex align-items-center justify-content-center" style="width: 40px ; border: none ; outline: none">'+ element.score +'</div>'+
                        '<div class="text-center h5 mt-2 d-flex align-items-center justify-content-center" style="width: 40px ; border: none ; outline: none">'+ element.score +'</div>'+
                        '<div class="" style="width: 50px ; border: none ; outline: none">' +
                            '<div class="position-relative ActFilter" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">' +
                                '<div class="position-absolute  bg-dark" style="left: 18px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>' +
                                '<div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                                '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                            '</div>' +
                        '</div>'+
                        '<div class="text-center text-light d-flex align-items-center flex-column p-0 justify-content-center me-5" style="width: 50px ; border: none ; outline: none">' +
                            '<i class="bi-check-lg h4  w-100  text-center border border-dark opacity-50 rounded-3 shadow" style="background-color: grey ; cursor: pointer"></i>' +
                            '<i class="bi-x h4  w-100 text-center border border-dark opacity-50 rounded-3 shadow " style="background-color: grey ; cursor: pointer"></i>' +
                        '</div>'+
                        '<div class="bi-x h1 text-center  text-dark d-flex align-items-center justify-content-center position-absolute"  style="width: 30px ; border: none ; outline: none ; left: 5px ; top: 0 ; cursor: pointer"></div>'+
                    '</div>'+
                    '<div class="w-100 p-3 " style="">' +
                        '<div class="w-100 d-flex">' +
                            '<div class="px-2 opacity-50" style="white-space: nowrap ; width: 65px" >عنوان : </div>' +
                            '<input type="text" class="w-100 input-group-text bg-dark text-light shadow" style="border: none ; outline: none">' +
                        '</div>' +
                        '<div class="w-100 d-flex mt-2">' +
                            '<div class="px-2 opacity-50" style="white-space: nowrap ; width: 65px" >متن : </div>' +
                            '<textarea type="text" class="w-100 rounded-3 p-2 bg-dark text-light shadow" style="border: none ; outline: none"></textarea>' +
                        '</div>' +
                    '</div>'


                form.childNodes[0].childNodes[1].setAttribute('href' , 'http://127.0.0.1:8000/products/dkp-' + element.product_id);
                form.childNodes[0].childNodes[1].setAttribute('target' , 'blank');

                let title = form.childNodes[1].childNodes[0].childNodes[1];
                let text = form.childNodes[1].childNodes[1].childNodes[1];
                title.value = element.titr;
                text.value = element.text;


                let proposal = form.childNodes[0].childNodes[3];
                if (element.proposal == 1){
                    proposal.innerHTML = '<i class="bi-hand-thumbs-up"></i>';
                    proposal.style.color = '#00a06e';
                }else {
                    proposal.innerHTML = '<i class="bi-hand-thumbs-down"></i>';
                    proposal.style.color = '#ff5b5b';
                }



                let actTogle = form.childNodes[0].childNodes[4].childNodes[0];
                if (element.active == 1){
                    actTogle.childNodes[1].style.zIndex = 1;
                    actTogle.childNodes[2].style.zIndex = 2;
                    actTogle.style.backgroundColor = '#00a070';
                    actTogle.childNodes[0].style.left = '3px'
                }else {
                    actTogle.childNodes[2].style.zIndex = 1;
                    actTogle.childNodes[1].style.zIndex = 2;
                    actTogle.style.backgroundColor = '#f66666';
                    actTogle.childNodes[0].style.left = '18px'
                }


                actTogle.childNodes[1].addEventListener('click' , function (e){
                    element.action = 1;
                    this.style.zIndex = 1;
                    actTogle.childNodes[2].style.zIndex = 2;
                    actTogle.style.backgroundColor = '#00a070';
                    actTogle.childNodes[0].style.left = '3px'

                    $.ajax({
                        url : '{{route('admin.comments.active')}}',
                        method : 'post',
                        data : {
                            commentId : element.id,
                            Act : 1,
                        },
                        success : function (date){

                        }
                    })
                })

                actTogle.childNodes[2].addEventListener('click' , function (e){
                    element.action = 0;
                    this.style.zIndex = 1;
                    actTogle.childNodes[1].style.zIndex = 2;
                    actTogle.style.backgroundColor = '#f66666';
                    actTogle.childNodes[0].style.left = '18px'

                    $.ajax({
                        url : '{{route('admin.comments.active')}}',
                        method : 'post',
                        data : {
                            commentId : element.id,
                            Act : 0,
                        },
                        success : function (date){

                        }
                    })

                })

                let sendBtn = form.childNodes[0].childNodes[5].childNodes[0];
                let CanBtn = form.childNodes[0].childNodes[5].childNodes[1];


                title.addEventListener('keyup' , function (){
                    sendBtn.style.backgroundColor = '#00d180'
                    CanBtn.style.backgroundColor = '#ff4f4f'
                })

                text.addEventListener('keyup' , function (){
                    sendBtn.style.backgroundColor = '#00d180'
                    CanBtn.style.backgroundColor = '#ff4f4f'
                })

                sendBtn.addEventListener('click' , function (){
                    element.titr = title.value;
                    element.text = text.value;
                    sendBtn.style.backgroundColor = 'gray'
                    CanBtn.style.backgroundColor = 'gray'

                    $.ajax({
                        url : '{{route('admin.comments.update')}}',
                        method : 'post',
                        data : {
                            commentId : element.id,
                            titleVal : title.value,
                            textVal : text.value,
                        },
                        success : function (date){

                        }
                    })
                })

                CanBtn.addEventListener('click' , function (){
                    title.value = element.titr;
                    text.value = element.text;
                    sendBtn.style.backgroundColor = 'gray'
                    CanBtn.style.backgroundColor = 'gray'
                })



                let delet = form.childNodes[0].childNodes[6];

                delet.addEventListener('click' , function (){
                    form.style.display = 'none'

                    getCom.splice(getCom.indexOf(element) , getCom.indexOf(element)+1);
                    // console.log(comment.indexOf(element))

                    $.ajax({
                        url : '{{route('admin.comments.destroy')}}',
                        method : 'post',
                        data : {
                            commentId : element.id,
                        },
                        success : function (date){

                        }
                    })
                })


            })
        }
    </script>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
