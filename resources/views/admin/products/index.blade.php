@extends('admin.admin_app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('admin')


    <style>
        @foreach($products as $key=>$product)

.addProductBox{{$key}}{
            width: 97%;
            height: 100px;
            margin: auto;
            margin-top: 10px;
            border: 2px solid #2e2e2e;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            background-color: #2f2f2f;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.47);*/
        }
        .addElementNameToDiv{{$key}}{
            text-decoration: none;
            color: #ffffff;
            width: 250px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            transition: 0.3s;
        }
        .addElementNameToDiv{{$key}}:hover{
            color: #0b95a2;

        }
        .addElementActiveToDiv{{$key}}{
            color: #ffffff;
            width: 70px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }
        .addElementVarietyToDiv{{$key}}{
            color: #ffffff;
            width: 70px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }

        @endforeach

        .addElementCategoryToDiv{
            color: #ffffff;
            width: 150px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }

        .addElementToDiv{
            width: 70px;
            border-radius: 5px;
            border: 2px solid #434343;
        }
        .addElementBrandToDiv{
            color: #ffffff;
            width: 100px;
            font-size: 13px;
            padding: 0 10px;
            opacity: 70%;
            text-align: center;
        }

        .addVar:hover{
            color: #0b95a2!important;
            transition: 0.3s;
        }
        .addPic:hover{
            color: #0b95a2!important;
            transition: 0.3s;
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
    </style>



    <div class="-100">
        <h4 class="text-center py-2 opacity-50">محصولات</h4>

        <a href="{{route('admin.products.create')}}" class="text-center  opacity-75 text-success d-inline-block align-items-center justify-content-start px-3 h5" style="text-decoration: none">
            <i class="bi-plus h2  float-start"></i>
            <div class="float-start">افزودن محصول</div>
        </a>

        <div class="row  mt-1">

            <div class="col-12 col-md-4 px-4 py-2 mt-1">
                <form class="w-100 m-auto d-flex align-items-center justify-content-center ">
                    <button type="submit"  class="formSearchInputbutton bg-transparent text-light border-0"  value="Submit"><i type="submit" class="bi-search h4 mt-1  p-2" style=""></i></button>
                    <input type="text" class="input-group-text bg-dark text-light p-2 w-100 text-start searchInput" style="border: none ; outline: none" placeholder="جستوجو....">
                </form>
            </div>


            <div class="col-12 col-md-3 px-4 py-2 d-flex align-items-center justify-content-center">
                <button class="w-100 form-select  bg-dark text-light text-center  dropdown-toggle dorpInnetText " style="border: none ; outline: none"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    انتخاب گروه ....
                </button>
                <ul class="dropdown-menu selectCategory bg-dark text-light" style="color: white!important">

                </ul>
            </div>
            <div class="col-12 col-md-3 px-4 py-2 d-flex align-items-center justify-content-center">
                <button class="w-100 form-select  bg-dark text-light text-center  dropdown-toggle dorpInnetTextB " style="border: none ; outline: none"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    انتخاب برند ....
                </button>
                <ul class="dropdown-menu selectBrand bg-dark text-light" style="color: white!important">

                </ul>
            </div>





            <div class="col-12 col-md-2 px-4 py-2 d-flex align-items-center justify-content-center flex-column">
                <div class="opacity-50 " style="font-size: 11px"> فیلتر وضعیت</div>

                <div class="position-relative togleDeActive mt-2" style="width: 40px ; height: 25px ; background-color: #b0b0b0 ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                    <div class="position-absolute  bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                    <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>
                    <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>
                </div>
            </div>
        </div>






        <div class="w-100 bg-dark" style="height: 50px;margin-top: 5px;display: flex;align-items: center;justify-content: space-between;padding: 0 10px;">
            <div class="m-auto d-flex align-items-center justify-content-between" style="width: 97%">
                <div class="" style="width: 70px"></div>
                <div class="addElementNameToDiv0 text-center" style="font-size: 15px ; font-weight: 1000"> نام محصول</div>
                <div class="addElementCategoryToDiv text-center" style="font-size: 15px ; font-weight: 1000">دسته</div>
                <div class="addElementBrandToDiv text-center" style="font-size: 15px ; font-weight: 1000"> برند </div>
                <div class="addElementActiveToDiv0 text-center" style="font-size: 15px ; font-weight: 1000"> وضعیت </div>
                <div class="addElementVarietyToDiv0 text-center" style="font-size: 15px ; font-weight: 1000">  تنوع</div>
            </div>

        </div>


        <div class="w-100 productBox pb-4">

        </div>




    </div>















<script>

</script>




























    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let products = @php echo $ttt ; @endphp ;




        let categoryAct = 0;
        let brandAct = 0;
        let status = 1;
        let searchAct = null;
        let filterAct = false;


        // وضعیت
        let togleDeActive = document.querySelector('.togleDeActive');
        togleDeActive.childNodes[5].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            togleDeActive.childNodes[3].style.zIndex = 2;
            togleDeActive.childNodes[1].style.left = '18px';
            togleDeActive.style.backgroundColor = '#fb5b5b';

            status = 0;
            categoryAct = categoryAct;
            brandAct = brandAct;
            searchAct = null;
            filterAct = true

            defeult(categoryAct , brandAct , status , searchAct)
        })


        togleDeActive.childNodes[3].addEventListener('click' , function (e){
            this.style.zIndex = 1;
            togleDeActive.childNodes[5].style.zIndex = 2;
            togleDeActive.childNodes[1].style.left = '3px';
            togleDeActive.style.backgroundColor = '#b0b0b0';

            status = 1;
            categoryAct = categoryAct;
            brandAct = brandAct;
            searchAct = null;
            filterAct = true
            defeult(categoryAct , brandAct , status , searchAct)
        })




        // دسته بندی
        let dorpInnetText = document.querySelector('.dorpInnetText');
        let dorpInnetTextB = document.querySelector('.dorpInnetTextB');


        const uniqueProducts = [];
        const createUniqueProducts = products.filter(function (element){
            if (!uniqueProducts.includes(element.category_id)) {
                uniqueProducts.push(element.category_id);
                return true;
            }
            return false;
        });
        let selectCategory = document.querySelector('.selectCategory');
        let addOptionCategoryFirest = document.createElement('li');
        addOptionCategoryFirest.classList.add('dropdown-item');
        addOptionCategoryFirest.classList.add('text-light');
        addOptionCategoryFirest.classList.add('selectCategoryFirstChild');
        addOptionCategoryFirest.innerText = 'انتخاب گروه ....';
        selectCategory.appendChild(addOptionCategoryFirest);
        for (i = 0 ; i < createUniqueProducts.length ; i++){
            let addOptionCategory = document.createElement('li');
            addOptionCategory.classList.add('dropdown-item');
            addOptionCategory.classList.add('text-light');
            addOptionCategory.classList.add('selectCategory' + createUniqueProducts[i].category_id);

            addOptionCategory.innerText = createUniqueProducts[i].category_name;
            selectCategory.appendChild(addOptionCategory);



            addOptionCategory.addEventListener('click' , function (e){

                dorpInnetText.innerText = addOptionCategory.innerText
                status = status;
                categoryAct = Number(e.target.className.split('').splice(39).toString().replace(',' , ''));
                brandAct = brandAct;
                searchAct = null;
                filterAct = true


                defeult(categoryAct , brandAct , status , searchAct)
            })
        }





        // برند
        const uniqueBrands = [];
        const createUniqueBrands = products.filter(function (element){
            if (!uniqueBrands.includes(element.brand_id)) {
                uniqueBrands.push(element.brand_id);
                return true;
            }
            return false;
        });
        let selectBrand = document.querySelector('.selectBrand');
        let addOptionBrandFirest = document.createElement('li');
        addOptionBrandFirest.classList.add('dropdown-item');
        addOptionBrandFirest.classList.add('text-light');
        addOptionBrandFirest.classList.add('selectBrandFirstChild');
        addOptionBrandFirest.innerText = 'انتخاب برند ....';
        selectBrand.appendChild(addOptionBrandFirest);
        for (i = 0 ; i < createUniqueBrands.length ; i++){
            let addOptionBrand = document.createElement('li');
            addOptionBrand.classList.add('dropdown-item');
            addOptionBrand.classList.add('text-light');
            addOptionBrand.classList.add('selectBrand' + createUniqueBrands[i].brand_id);
            addOptionBrand.innerText = createUniqueBrands[i].brand_name;
            selectBrand.appendChild(addOptionBrand);
            addOptionBrand.addEventListener('click' , function (e){

                dorpInnetTextB.innerText = addOptionBrand.innerText
                status = status;
                categoryAct = categoryAct;
                brandAct = Number(e.target.className.split('').splice(36).toString().replace(',' , ''));
                searchAct = null;
                filterAct = true


                defeult(categoryAct , brandAct , status , searchAct)
            })
        }




        let selectCategoryFirstChild = document.querySelector('.selectCategoryFirstChild');
        selectCategoryFirstChild.addEventListener('click' , function (){
            dorpInnetText.innerText = selectCategoryFirstChild.innerText
            status = status;
            categoryAct = 0;
            brandAct = brandAct;
            searchAct = null;
            filterAct = true
            defeult(categoryAct , brandAct , status , searchAct)
        })

        let selectBrandFirstChild = document.querySelector('.selectBrandFirstChild');
        selectBrandFirstChild.addEventListener('click' , function (){
            dorpInnetTextB.innerText = selectBrandFirstChild.innerText
            status = status;
            categoryAct = categoryAct;
            brandAct = 0;
            searchAct = null;
            filterAct = true
            defeult(categoryAct , brandAct , status , searchAct)
        })





        // جستوجو
        let formSearchInputbutton = document.querySelector('.formSearchInputbutton');
        let searchInput = document.querySelector('.searchInput');

        formSearchInputbutton.addEventListener('click' , function (e){
            e.preventDefault();
            dorpInnetText.innerText = 'انتخاب گروه ....'
            dorpInnetTextB.innerText = 'انتخاب برند ....'


            togleDeActive.childNodes[3].style.zIndex = 1;
            togleDeActive.childNodes[5].style.zIndex = 2;
            togleDeActive.childNodes[1].style.left = '3px';
            togleDeActive.style.backgroundColor = '#b0b0b0';


            categoryAct = 0;
            brandAct = 0;
            status = 1;
            filterAct = true;
            if (searchInput.value == ''){
                searchAct = null;
            }else {
                searchAct = Number(searchInput.value);
            }

            defeult(categoryAct , brandAct , status , searchAct)
            searchInput.value = '';
        })




        defeult(0 , 0 , 0 , null)
        // باکس کالاها
        function defeult(a , b , c , s){

            // console.log(s !== null)
                // فیلتر کردن ارایه
            if (filterAct){
                if (a > 0 && b === 0 && c === 1 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.category_id === a
                    });
                }else if(a > 0 && b > 0 && c === 1 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.category_id === a && el.brand_id === b
                    });
                }else if(a > 0 && b > 0 && c === 0 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.category_id === a && el.brand_id === b && el.active === c
                    });
                }else if(a > 0 && b === 0 && c === 0 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.category_id === a && el.active === c
                    });
                }else if(a === 0 && b > 0 && c === 1 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.brand_id === b
                    });
                }else if(a === 0 && b > 0 && c === 0 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.brand_id === b && el.active === c
                    });
                }else if(a === 0 && b === 0 && c === 0 && s == null){
                    var newArray = products.filter(function (el) {
                        return  el.active === c
                    });
                }else if(a === 0 && b === 0 && c === 1 && s == null){
                    newArray = products;
                }else if(s !== null){
                    var newArray = products.filter(function (el) {
                        return  el.id === s
                    });
                }
            }else {
                newArray = products;
            }


            let box = document.querySelector('.productBox');
            box.innerText='';

            for (i = 0 ; i < newArray.length ; i++){

                let addProductBox = document.createElement('div');
                addProductBox.classList.add('addProductBox' + i);
                box.appendChild(addProductBox);


                let baseURL = 'http://127.0.0.1:8000'

                    // addImage
                    let image = `${baseURL}/images/${newArray[i].image}`.split(',');
                    // let h = Number(box.childNodes[i].className.split('').splice(13).toString().replace(',' , ''));
                    let addElementToDiv = document.createElement('img');
                    addElementToDiv.classList.add('addElementToDiv');
                    addElementToDiv.classList.add('shadow')
                    addElementToDiv.setAttribute('src' , image[0]);
                    addProductBox.appendChild(addElementToDiv);

                    // addName
                    let addElementNameToDiv = document.createElement('a');
                    addElementNameToDiv.classList.add('addElementNameToDiv' + i);
                    addElementNameToDiv.innerText = newArray[i].name;
                    addElementNameToDiv.setAttribute('href' , `${baseURL}/products/dkp-` + newArray[i].id);
                    addElementNameToDiv.setAttribute('target' , 'blank');
                    addProductBox.appendChild(addElementNameToDiv);

                    // addId
                    let addElementIdToDiv = document.createElement('div');
                    addElementIdToDiv.classList.add('addElementIdToDiv');
                    addElementIdToDiv.innerText = 'dkp : ' + newArray[i].id;
                    addElementNameToDiv.appendChild(addElementIdToDiv);


                    // addCategory
                    let addElementCategoryToDiv = document.createElement('div');
                    addElementCategoryToDiv.classList.add('addElementCategoryToDiv');
                    addElementCategoryToDiv.innerText = newArray[i].category_name;
                    addProductBox.appendChild(addElementCategoryToDiv);


                    // addBrand
                    let addElementBrandToDiv = document.createElement('div');
                    addElementBrandToDiv.classList.add('addElementBrandToDiv');
                    addElementBrandToDiv.innerText = newArray[i].brand_name;
                    addProductBox.appendChild(addElementBrandToDiv);


                    // addActive
                    let addElementActiveToDiv = document.createElement('div');
                    addElementActiveToDiv.classList.add('addElementActiveToDiv' + i);
                    addElementActiveToDiv.innerHTML ='' +
                        '<div class="position-relative togleBoxOne" style="width: 40px ; height: 25px ; background-color: #01c394 ; border-radius: 15px ; cursor: pointer ">' +
                        '<div class="position-absolute animTogle bg-dark" style="left: 3px ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px"></div>' +
                        ' <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: 1"></div>' +
                        '<div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: 2"></div>' +
                        ' </div>';

                    addProductBox.appendChild(addElementActiveToDiv);
                    box.childNodes[i].childNodes[4].childNodes[0].classList.add('togleBox' + i);
                    box.childNodes[i].childNodes[4].childNodes[0].childNodes[0].classList.add('togle' + i);
                    box.childNodes[i].childNodes[4].childNodes[0].childNodes[3].classList.add('deactive' + i);
                    box.childNodes[i].childNodes[4].childNodes[0].childNodes[2].classList.add('active' + i);

                    // addVariety
                    let addElementVarietyToDiv = document.createElement('div');
                    addElementVarietyToDiv.classList.add('addElementVarietyToDiv' + i);
                    addElementVarietyToDiv.innerHTML = '<a  href="' + `${baseURL}` + '/admin/products/addPic-' + `${newArray[i].id}` + '"  style="text-decoration: none"> <i title="افزودن عکس" class="bi-images h5 text-light opacity-50 p-1 addPic" style="cursor: pointer"></i></a>' +
                        ' <a href="' + `${baseURL}` + '/admin/products/addVar-' + `${newArray[i].id}` + '"  style="text-decoration: none" > <i title="افزودن تنوع" class="bi-stack h4 text-light opacity-50 p-1 addVar" style="cursor: pointer"></i></a> ';
                    addProductBox.appendChild(addElementVarietyToDiv);

                    let productId = newArray[i].id;
                    let productAvtive = newArray[i].active;

                    let togleBox = box.childNodes[i].childNodes[4].childNodes[0];
                    let togle = box.childNodes[i].childNodes[4].childNodes[0].childNodes[0];
                    let deactive = box.childNodes[i].childNodes[4].childNodes[0].childNodes[3];
                    let active = box.childNodes[i].childNodes[4].childNodes[0].childNodes[2];

                    if (productAvtive == 0){
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

                    deactive.addEventListener('click' , function (){
                        active.style.zIndex = 2;
                        deactive.style.zIndex = 1;
                        togle.style.left = '18px';
                        togleBox.style.backgroundColor = '#fb5b5b';

                        $.ajax({
                            url:'{{route('admin.products.update')}}',
                            method:'POST',
                            data:{
                                product : productId,
                                active : 0,
                            },
                            success:function(data){
                            },
                        });
                    })

                    active.addEventListener('click' , function (){
                        active.style.zIndex = 1;
                        deactive.style.zIndex = 2;
                        togle.style.left = '3px';
                        togleBox.style.backgroundColor = '#01c394';

                        $.ajax({
                            url:'{{route('admin.products.update')}}',
                            method:'POST',
                            data:{
                                product : productId,
                                active : 1,
                            },
                            success:function(data){
                            },
                        });
                    })
                    // break;
                // }
            }
        }






// سورت کردن آرایه
        // console.log("Original Products are:")
        // console.log(products)
        // let sortedProducts = products.sort(function (a , b ){
        //     console.log(b.Weight)
        //     if(p1.width < p2.width){
        //         return 1 ;
        //     }else if(p1.width > p2.width){
        //         return -1 ;
        //     }else {
        //         return 0 ;
        //     }
        // });


        // (p1, p2) => (p1.width < p2.width) ? 1 : (p1.width > p2.width) ? -1 : 0
        // console.log("Products sorted based on descending order of their prices are:")
        // console.log(sortedProducts);




    </script>





@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
