/**
 * Created by Youri on 12/22/2017.
 */

const imgFrontChoice = document.getElementById('img-front-choice');
const imgBackChoice = document.getElementById('img-back-choice');
const imgFront = document.getElementById('img-front');
const imgBack = document.getElementById('img-back');

imgFrontChoice.addEventListener('click', () => {
    imgFront.style.display = 'block';
    imgBack.style.display = 'none';
});

imgBackChoice.addEventListener('click', () => {
    imgFront.style.display = 'none';
    imgBack.style.display = 'block';
});