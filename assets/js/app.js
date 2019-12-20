/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('bootstrap');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

function shuffle() {
    let container1 = document.getElementById("mainShuffle1");
    let container2 = document.getElementById("mainShuffle2");
    let container3 = document.getElementById("mainShuffle3");
    let container4 = document.getElementById("mainShuffle4");
    let container5 = document.getElementById("mainShuffle5");

    let elementsArray1 = Array.prototype.slice.call(container1.getElementsByClassName('shuffle'));
    elementsArray1.forEach(function(element){
        container1.removeChild(element);
    });
    shuffleArray(elementsArray1);
    elementsArray1.forEach(function(element){
        container1.appendChild(element);
    })

    let elementsArray2 = Array.prototype.slice.call(container2.getElementsByClassName('shuffle'));
    elementsArray2.forEach(function(element){
        container2.removeChild(element);
    });
    shuffleArray(elementsArray2);
    elementsArray2.forEach(function(element){
        container2.appendChild(element);
    })

    let elementsArray3 = Array.prototype.slice.call(container3.getElementsByClassName('shuffle'));
    elementsArray3.forEach(function(element){
        container3.removeChild(element);
    });
    shuffleArray(elementsArray3);
    elementsArray3.forEach(function(element){
        container3.appendChild(element);
    })
    let elementsArray4 = Array.prototype.slice.call(container4.getElementsByClassName('shuffle'));
    elementsArray4.forEach(function(element){
        container4.removeChild(element);
    });
    shuffleArray(elementsArray4);
    elementsArray4.forEach(function(element){
        container4.appendChild(element);
    })
    let elementsArray5 = Array.prototype.slice.call(container5.getElementsByClassName('shuffle'));
    elementsArray5.forEach(function(element){
        container5.removeChild(element);
    });
    shuffleArray(elementsArray5);
    elementsArray5.forEach(function(element){
        container5.appendChild(element);
    })
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        let temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

shuffleArray(shuffle());