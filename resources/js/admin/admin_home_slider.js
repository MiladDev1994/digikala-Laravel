function readURL(input) {

    var reader = new FileReader();
    reader.readAsDataURL(input.files[0]);
    reader.onload = function (e) {
        document.getElementById('ax').setAttribute('src', e.target.result);
        document.querySelector('.progress-bar').style.width = '100%';
    }
}

let inputFile = document.querySelector('.inputFile');
inputFile.onchange = function () {
    readURL(this)
}






setInterval(function (){
    let picBox = document.querySelector('.picBox');
    picBox.style.height = picBox.scrollWidth*0.2084 + 'px';



} , 10)







//
// let pppppp = document.querySelector('.pppppp');
//
// console.log(picBox)
// // picBox.style.height = picBox.scrollWidth*0.2 + 'px';
//
// window.onresize = function (){
//
//     // console.log(picBox.scrollWidth)
//
// }
