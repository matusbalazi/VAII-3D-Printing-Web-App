'use strict';

// skript - posuvanie navigacie pocas scrollovania po stranke

const hamburger = document.getElementById("hamburger-btn");
const mainHeader = document.getElementById("id-main-header");
hamburger.addEventListener("click", openCloseMenu);

// otvorenie alebo zatvorenie hamburger menu 
function openCloseMenu() {
    if (!mainHeader.classList.contains("header-blue")) {
        mainHeader.classList.toggle("header-blue");
    }
    mainHeader.classList.toggle("expand");
}

const isBlueVariant = mainHeader.classList.contains("header-blue");

// podfarbenie alebo odfarbenie navigacie od urcitej vysky
window.addEventListener('scroll', function() 
{
    if (!isBlueVariant) {
        mainHeader.classList.remove("header-blue");
    }
    
    // pri otvorenom menu a zascrollovani nadol sa menu zabali
    mainHeader.classList.remove("expand");

    if (window.scrollY > 300) 
    {
        mainHeader.style.backgroundColor = '#033D67';
    }
    else {
        mainHeader.style.backgroundColor = null;
    }
});