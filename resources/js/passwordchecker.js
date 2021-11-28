'use strict';

// skript - kontrola sily hesla pri registracii

// casovy limit pred zavolanim spatneho volania
let delay;

let password = document.getElementById('enter-password')
let strengthInfo = document.getElementById('display-strength')

// kontrola hesla pomocou regularnych vyrazov
// silne heslo - min. 8 znakov, min. 1 velke pismeno, min. 1 male pismeno, min. 1 cislica, min. 1 specialny znak
// priemerne heslo - ak ma heslo aspon 6 znakov a splna vsetky ostatne poziadavky, alebo nema ziadnu cislicu, 
//                      ale splna ostatne poziadavky
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

// vyhodnotenie sily hesla
function StrengthChecker(PasswordParameter){

    // zmeni sa farba a text informacneho pola na zaklade sily hesla
    if(strongPassword.test(PasswordParameter)) {
        strengthInfo.style.backgroundColor = "#2FCB96"
        strengthInfo.textContent = 'Strong'
    } else if(mediumPassword.test(PasswordParameter)){
        strengthInfo.style.backgroundColor = '#337ab7'
        strengthInfo.textContent = 'Medium'
    } else{
        strengthInfo.style.backgroundColor = '#FE888A'
        strengthInfo.textContent = 'Weak'
    }
}

// kontrola, ked pouzivatel zada heslo
password.addEventListener("input", () => {

    // informacne pole je predvolene skryte, tak ho zobrazi
    strengthInfo.style.display= 'block'
    clearTimeout(delay);

    // zavolanie funkcie na vyhodnotenie sily po 0,5s
    delay = setTimeout(() => StrengthChecker(password.value), 500);

    // ked pouzivatel vymaze text, informacne pole sa opat skryje
    if(password.value.length !== 0){
        strengthInfo.style.display != 'block'
    } else{
        strengthInfo.style.display = 'none'
    }
});
