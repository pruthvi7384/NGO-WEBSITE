const toggle = document.querySelector('.navbar nav .toggle');
const nav_top = document.querySelectorAll('.navbar .nav-collapas');
toggle.addEventListener('click',function(){
   nav_top.forEach(col=>col.classList.toggle('nav-collapas-show'))
})
  
