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

let war1 = false;

$('#task1').click(function (){
    if(war1){
        $('#dis1').hide();
        war1 = false;
    }else{
        $('#dis1').show();
        war1 = true;
    }
})
let war2 = false;

$('#task2').click(function (){
    if(war2){
        $('#dis2').hide();
        war2 = false;
    }else{
        $('#dis2').show();
        war2 = true;
    }
})
let war3 = false;

$('#task3').click(function (){
    if(war3){
        $('#dis3').hide();
        war3 = false;
    }else{
        $('#dis3').show();
        war3 = true;
    }
})

$('#fold1').click(function(){
    $('#task-con').show();
    $('#shop-con').hide();
    $('#eq-con').hide();
})

$('#fold2').click(function(){
    $('#task-con').hide();
    $('#shop-con').hide();
    $('#eq-con').show();
})

$('#fold3').click(function(){
    $('#task-con').hide();
    $('#eq-con').hide();
    $('#shop-con').show();
})