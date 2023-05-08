@extends('seller.seller_app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('seller')
    <style>
        .acarB{
            border-radius: 8px 8px 0 0;
            height: 50px;
            position: relative;
        }
    </style>

    <h4 class="text-center py-2 opacity-50"> پیام‌ها </h4>



<div class="Box p-4"></div>




    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let massage = @php echo $massage ; @endphp;

        let Box = document.querySelector('.Box');

        console.log(massage);

        massage.forEach(function (element){
            let addMBox = document.createElement('div');
            addMBox.setAttribute('data-bs-toggle' , 'collapse')
            addMBox.setAttribute('data-bs-target' , '#flush-collapseOne' + element.id)
            addMBox.setAttribute('aria-expanded' , 'false')
            addMBox.setAttribute('aria-controls' , 'flush-collapseOne' + element.id);
            addMBox.classList.add('accordion-button');
            addMBox.classList.add('collapsed');
            addMBox.classList.add('bg-dark');
            addMBox.classList.add('acarB');
            addMBox.innerHTML = '<i class="bi-envelope h5 me-3 mt-2"></i>' + element.sentYear + '/' + element.sentMonth + '/' + element.sentDay;
            addMBox.style.marginTop = '10px'
            Box.appendChild(addMBox);


            let innerNass = document.createElement('div');
            innerNass.setAttribute('id' , 'flush-collapseOne' + element.id)
            innerNass.setAttribute('aria-labelledby' , 'flush-headingOne' + element.id)
            innerNass.setAttribute('data-bs-parent' , '#accordionFlushExample' + element.id)
            innerNass.classList.add('accordion-collapse');
            innerNass.classList.add('collapse');
            innerNass.classList.add('bg-dark');
            innerNass.classList.add('text-light');
            innerNass.innerHTML = '<div class="w-100 p-4 ccordion-body">'+ element.about +'</div>'
            Box.appendChild(innerNass);

            if (element.seen == 0){
                addMBox.style.color = '#ff8484';
            }else {
                addMBox.style.color = 'white';
            }

            addMBox.addEventListener('click' , function (){
                addMBox.style.color = 'white';

                $.ajax({
                    url:'{{route('seller.massages.seen')}}',
                    method:'POST',
                    data:{
                        variety : element.id,
                        active : 1,
                    },
                    success:function(data){
                    },
                });
            })
        })

    </script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@vite(['resources/js/admin/products/create.js'])
