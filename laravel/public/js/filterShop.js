const selected = document.getElementById('houses');
const filterCaps = document.getElementById('filter-cap');
const filterKeycord = document.getElementById('filter-keycord');
const filterMug = document.getElementById('filter-mug');
const filterPhonecase = document.getElementById('filter-phonecase');
const filterShirt = document.getElementById('filter-shirt');
const filterUsb = document.getElementById('filter-usb');

const vikings = document.querySelectorAll('.house1');
const dragons = document.querySelectorAll('.house2');
const ravens = document.querySelectorAll('.house3');
const serpents = document.querySelectorAll('.house4');

const cap = document.querySelectorAll('.category1');
const keycord = document.querySelectorAll('.category2');
const mug = document.querySelectorAll('.category3');
const phonecase = document.querySelectorAll('.category4');
const shirt = document.querySelectorAll('.category5');
const usb = document.querySelectorAll('.category6');

let countCap = document.getElementsByClassName('category1').length;
let countKeycord = document.getElementsByClassName('category2').length;
let countMug = document.getElementsByClassName('category3').length;
let countPhonecase = document.getElementsByClassName('category4').length;
let countShirt = document.getElementsByClassName('category5').length;
let countUsb = document.getElementsByClassName('category6').length;

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
            vikings[i].classList.add('display-none');
            vikings[i].classList.remove("display-block");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-block');
            dragons[i].classList.remove("display-none");
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
    else if(selected.value == 3){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add('display-none');
            vikings[i].classList.remove("display-block");
        }
        for(let i = 0; i < countDragons; i++){
            dragons[i].classList.add('display-none');
            dragons[i].classList.remove("display-block");
        }
        for(let i = 0; i < countRavens; i++){
            ravens[i].classList.add('display-block');
            ravens[i].classList.remove("display-none");
        }
        for(let i = 0; i < countSerpents; i++){
            serpents[i].classList.add('display-none');
            serpents[i].classList.remove("display-block");
        }
    }
    else if(selected.value == 4){
        for(let i = 0; i < countVikings; i++){
            console.log(vikings);
            vikings[i].classList.add('display-none');
            vikings[i].classList.remove("display-block");
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
            serpents[i].classList.add('display-block');
            serpents[i].classList.remove("display-none");
        }
    }
});


filterCaps.addEventListener('change', () => {
    filterCategory(cap, filterCaps, countCap);
});

filterKeycord.addEventListener('change', () => {
    filterCategory(keycord, filterKeycord, countKeycord);
});

filterMug.addEventListener('change', () => {
    filterCategory(mug, filterMug, countMug)
});

filterPhonecase.addEventListener('change', () => {
    filterCategory(phonecase, filterPhonecase, countPhonecase)
});

filterShirt.addEventListener('change', () => {
    filterCategory(shirt, filterShirt, countShirt)
});

filterUsb.addEventListener('change', () => {
    filterCategory(usb, filterUsb, countUsb)
});

function filterCategory(category, filter, count){
    if(filter.checked){
        for(let i = 0; i < count; i++){
            category[i].classList.add('display-block');
            category[i].classList.remove('display-none');
        }
    }
    else{
        for(let i = 0; i < count; i++){
            category[i].classList.add('display-none');
            category[i].classList.remove('display-block');
        }
    }
}