let loader = document.getElementById('loading');
let left = document.getElementById('left-content');
let mid = document.getElementById('mid-content');
let right = document.getElementById('right-content');

window.addEventListener("load", function (){
    loader.style.transition = "opacity 1000ms";
    loader.style.opacity = 0;
    setTimeout(loaderHide, 1000);
})
function loaderHide(){
    loader.style.display = `none`;
    left.style.transition = "opacity 500ms";
    left.style.opacity = 1;

    mid.style.transition = "opacity 500ms";
    mid.style.opacity = 1;

    right.style.transition = "opacity 500ms";
    right.style.opacity = 1;
}