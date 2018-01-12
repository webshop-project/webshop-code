const selected = document.getElementById('houses');

//houses
let houses = $('.houses');
let vikings = $('.house1');
let dragons = $('.house2');
let ravens = $('.house3');
let serpents = $('.house4');

//categories
let all = $('.category');
let caps = $('.category1');
let keycords = $('.category2');
let mugs = $('.category3');
let phonecases = $('.category4');
let shirts = $('.category5');
let usbs = $('.category6');

//Change Houses
selected.addEventListener('change', () =>{
    if(selected.value == 0){
        vikings.removeClass('display-none').addClass('display-block');
        dragons.removeClass('display-none').addClass('display-block');
        ravens.removeClass('display-none').addClass('display-block');
        serpents.removeClass('display-none').addClass('display-block');
    }
    else if(selected.value == 1){
        vikings.removeClass('display-none').addClass('display-block');
        dragons.removeClass('display-block').addClass('display-none');
        ravens.removeClass('display-block').addClass('display-none');
        serpents.removeClass('display-block').addClass('display-none');
    }
    else if(selected.value == 2){
        vikings.removeClass('display-block').addClass('display-none');
        dragons.removeClass('display-none').addClass('display-block');
        ravens.removeClass('display-block').addClass('display-none');
        serpents.removeClass('display-block').addClass('display-none');
    }
    else if(selected.value == 3){
        vikings.removeClass('display-block').addClass('display-none');
        dragons.removeClass('display-block').addClass('display-none');
        ravens.removeClass('display-none').addClass('display-block');
        serpents.removeClass('display-block').addClass('display-none');
    }
    else if(selected.value == 4){
        vikings.removeClass('display-block').addClass('display-none');
        dragons.removeClass('display-block').addClass('display-none');
        ravens.removeClass('display-block').addClass('display-none');
        serpents.removeClass('display-none').addClass('display-block');
    }
});

//Change Category
//Caps
$(function(){
    $(".cbx-cap").change(function() {
        caps.toggleClass("show-hide", !this.checked)
    }).change();
});

//Keycords
$(function(){
    $(".cbx-keycord").change( function() {
        keycords.toggleClass("show-hide", !this.checked)
    }).change();
});

//Mugs
$(function(){
    $(".cbx-mug").change( function() {
        mugs.toggleClass("show-hide", !this.checked)
    }).change();
});

//Phonecases
$(function(){
    $(".cbx-phonecase").change( function() {
        phonecases.toggleClass("show-hide", !this.checked)
    }).change();
});

//Shirts
$(function(){
    $(".cbx-shirt").change( function() {
        shirts.toggleClass("show-hide", !this.checked)
    }).change();
});

//USB's
$(function(){
    $(".cbx-usb").change( function() {
        usbs.toggleClass("show-hide", !this.checked)
    }).change();
});
