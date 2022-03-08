const menuToggle = document.querySelector('.menu-toggle button');
const nav = document.querySelector('.sidebar');

menuToggle.addEventListener('click', function( ){
    nav.classList.toggle('slider');
})

document.querySelector('.custom-file-input').addEventListener('change',function(e){
    var fileName = document.getElementById("company_photo").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
})  