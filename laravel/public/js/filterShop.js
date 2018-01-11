const selected = document.getElementById('houses');

let houses = $('.houses');
let vikings = $('.house1');
let dragons = $('.house2');
let ravens = $('.house3');
let serpents = $('.house4');

selected.addEventListener('change', () =>{
    if(selected.value == 0){
        vikings.addClass('display-block');
        dragons.addClass('display-block');
        ravens.addClass('display-block');
        serpents.addClass('display-block');
    }
    else if(selected.value == 1){
        console.log("clicked")
        vikings.addClass('display-block');
        dragons.addClass('display-none');
        ravens.addClass('display-none');
        serpents.addClass('display-none');
    }
    else if(selected.value == 2){
        vikings.addClass('display-none');
        dragons.addClass('display-block');
        ravens.addClass('display-none');
        serpents.addClass('display-none');
    }
    else if(selected.value == 3){
        vikings.addClass('display-none');
        dragons.addClass('display-none');
        ravens.addClass('display-block');
        serpents.addClass('display-none');
    }
    else if(selected.value == 4){
        vikings.addClass('display-none');
        dragons.addClass('display-none');
        ravens.addClass('display-none');
        serpents.addClass('display-block');
    }
})