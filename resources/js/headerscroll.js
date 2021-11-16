const hamburger = document.getElementById("hamburger-btn");
const mainHeader = document.getElementById("id-main-header");
hamburger.addEventListener("click", openCloseMenu);


function openCloseMenu() {
    if (!mainHeader.classList.contains("header-blue")) {
        mainHeader.classList.toggle("header-blue");
    }
    mainHeader.classList.toggle("expand");
}

const isBlueVariant = mainHeader.classList.contains("header-blue");
window.addEventListener('scroll', function() 
{
    if (!isBlueVariant) {
        mainHeader.classList.remove("header-blue");
    }

    mainHeader.classList.remove("expand");

    if (window.scrollY > 300) 
    {
        mainHeader.style.backgroundColor = '#033D67';
    }
    else {
        mainHeader.style.backgroundColor = null;
    }
});