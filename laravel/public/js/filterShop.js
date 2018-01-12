const selected = document.getElementById('houses');

// let houses = $('.houses');
// let vikings = $('.house1');
// let dragons = $('.house2');
// let ravens = $('.house3');
// let serpents = $('.house4');

const vikings = document.querySelectorAll('.house1');
const dragons = document.querySelectorAll('.house2');
const ravens = document.querySelectorAll('.house3');
const serpents = document.querySelectorAll('.house4');
//
// const vikings = document.getElementsByClassName('house1');
// const dragons = document.getElementsByClassName('house1');
// const ravens = document.getElementsByClassName('house1');
// const serpents = document.getElementsByClassName('house1');

let countVikings = document.getElementsByClassName('house1').length;
let countDragons = document.getElementsByClassName('house1').length;
let countRavens = document.getElementsByClassName('house1').length;
let countSerpents = document.getElementsByClassName('house1').length;

selected.addEventListener('change', () => {
    if(selected.value == 0){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add("display-block");
            vikings[i].classList.remove("display-none");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-block');
            dragons[i].classList.remove("display-none");
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-block');
            ravens[i].classList.remove("display-none");
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-block');
            serpents[i].classList.remove("display-none");
        }
    }
    else if(selected.value == 1){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add("display-block");
            vikings[i].classList.remove("display-none");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-none');
            dragons[i].classList.remove("display-block");
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-none');
            ravens[i].classList.remove("display-block");
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-none');
            serpents[i].classList.remove("display-block");
        }

    }
    else if(selected.value == 2){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add("display-none");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-block');
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-none');
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-none');
        }
    }
    else if(selected.value == 3){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add("display-none");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-none');
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-block');
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-none');
        }
    }
    else if(selected.value == 4){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add("display-none");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-none');
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-none');
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-block');
        }
    }
});
$(function(){
    $(".cbx-cap").change(function() {
    }).change();
        caps.toggleClass("show-hide", !this.checked)

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
    }).change();
        shirts.toggleClass("show-hide", !this.checked)
});

//USB's
$(function(){
    $(".cbx-usb").change( function() {
        usbs.toggleClass("show-hide", !this.checked)
    }).change();
});
//Caps
//Change Category