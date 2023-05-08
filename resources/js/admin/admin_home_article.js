


setInterval(function (){
    let logoBox = document.querySelector('.logoBox');
    logoBox.style.height = logoBox.scrollWidth * 0.623 + 'px';

    let fileBox = document.querySelector('.fileBox');
    fileBox.style.height = fileBox.scrollWidth * 0.623 + 'px';

} , 10)



function hasLogo(logo){
    if (logo.files && logo.files[0]){
        let rearLogo = new FileReader();
        rearLogo.readAsDataURL(logo.files[0]);
        rearLogo.onload = function (e){
            document.getElementById('logo').setAttribute('src' , e.target.result)
            document.querySelector('.progress-bar1').style.width = '100%';
        }
    }
}

let logoInput = document.querySelector('.logoInput');
logoInput.onchange = function (){
    hasLogo(this);
}


function hasFile(file){
    if (file.files && file.files[0]){
        let rearFile = new FileReader();
        rearFile.readAsDataURL(file.files[0]);
        rearFile.onload = function (e){
            document.getElementById('file').setAttribute('src' , e.target.result)
            document.querySelector('.progress-bar2').style.width = '100%';
        }
    }
}

let fileInput = document.querySelector('.fileInput');
fileInput.onchange = function (){
    hasFile(this);
}
