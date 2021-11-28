'use strict';

// skript - zobrazenie miesta posobenia firmy v Contact page prostrednictvom Google mapy

let map;

// API key - vygenerovany Googlom
let key = "AIzaSyCQ279zqmonSYCmwd5s-0ePPP-6DDDrXko";

document.addEventListener("DOMContentLoaded", () => {
    let s = document.createElement("script");
    document.head.appendChild(s);

    // nacitanie skriptu z externej API
    s.addEventListener("load", () => {
        // skript bol nacitany
        console.log("script has loaded");
        map = new google.maps.Map(document.getElementById("map"), {
            // nastavenie defaultneho miesta zobrazenia (Spisska Nova Ves)
            center: {
                lat: 48.94550331646864,
                lng: 20.56362623210377 
            },
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    });
    
    // skript z externej API umoznujuci pouzivat Google mapy na zaklade vygenerovaneho API key
    s.src = `https://maps.googleapis.com/maps/api/js?key=${"AIzaSyCQ279zqmonSYCmwd5s-0ePPP-6DDDrXko"}`;
});