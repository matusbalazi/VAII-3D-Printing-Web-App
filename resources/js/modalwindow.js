'use strict';

// skript - modalne okno, ktore pouzivatelovi ponukne moznost prihlasit sa alebo zaregistrovat

const modal = document.querySelector('.modal.login');
const modalReg = document.querySelector('.modal.register');
const overlay = document.querySelector('.overlay');
const btnCloseModal = document.querySelectorAll('.close-modal');
const btnsOpenModal = document.querySelector('.login');
const register = document.querySelector('.modal p a');

// otvorenie modalneho okna Prihlasenie po kliknuti na tlacidlo Login
btnsOpenModal.addEventListener('click',function () {
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');
});

// zatvorenie modalneho okna po kliknuti na krizik
btnCloseModal.forEach(function (e) {
    e.addEventListener('click', function () {  
        modal.classList.add('hidden');
        modalReg.classList.add('hidden');
        overlay.classList.add('hidden');    
    });  
});

// zatvorenie modalneho okna po kliknuti mimo priestoru modalneho okna
overlay.addEventListener('click', function () {
    modal.classList.add('hidden');
    modalReg.classList.add('hidden');
    overlay.classList.add('hidden');
});

document.addEventListener('keydown', function (e) {

    // zatvorenie modalneho okna po stlaceni tlacidla Esc
    if (e.key === 'Escape' && (!modal.classList.contains('hidden') || !modalReg.classList.contains('hidden'))) {
        modal.classList.add('hidden');
        modalReg.classList.add('hidden');
        overlay.classList.add('hidden');
    }
});

// otvorenie modalneho okna Registracia po kliknuti na odkaz "register"
register.addEventListener('click', ()=>{
    modalReg.classList.remove('hidden');
});