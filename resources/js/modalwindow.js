'use strict';

const modal = document.querySelector('.modal.login');
const modalReg = document.querySelector('.modal.register');
const overlay = document.querySelector('.overlay');
const btnCloseModal = document.querySelectorAll('.close-modal');
const btnsOpenModal = document.querySelector('.login');
const register = document.querySelector('.modal p a');

btnsOpenModal.addEventListener('click',function () {
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');
});

btnCloseModal.forEach(function (e) {
    e.addEventListener('click', function () {  
        modal.classList.add('hidden');
        modalReg.classList.add('hidden');
        overlay.classList.add('hidden');
       
    });  
});

overlay.addEventListener('click', function () {
    modal.classList.add('hidden');
    modalReg.classList.add('hidden');
    overlay.classList.add('hidden');
});

document.addEventListener('keydown', function (e) {

  if (e.key === 'Escape' && (!modal.classList.contains('hidden') || !modalReg.classList.contains('hidden'))) {
    modal.classList.add('hidden');
    modalReg.classList.add('hidden');
    overlay.classList.add('hidden');
  }
});

register.addEventListener('click', ()=>{
    modalReg.classList.remove('hidden');
});