'use strict';

// skript - postupne nacitavanie obsahu na Home page pocas scrollovania

window.addEventListener('scroll', reveal);

// nacitanie obsahu
function reveal() {
    // pole objektov, ktore sa maju postupne nacitat
    var reveals = document.querySelectorAll('.reveal');

    // prechadzanie pola reveal objektov
    for (var i = 0; i < reveals.length; i++) {

        // vyska okna
        var windowHeight = window.innerHeight;

        // pozicia na stranke vzhladom k aktualnemu viewportu
        var revealTop = reveals[i].getBoundingClientRect().top;

        // bod, od ktoreho sa ma dana sekcia nacitat
        var revealPoint = 150;

        // obsah stranky sa nacita az od konkretnej vysky, na ktorej sa pouzivatel nachadza
        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add('active');
        }
        else {
            reveals[i].classList.remove('active');
        }
    }
}