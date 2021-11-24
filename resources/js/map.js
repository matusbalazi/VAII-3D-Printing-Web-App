let map;
let key = "AIzaSyCQ279zqmonSYCmwd5s-0ePPP-6DDDrXko";
        document.addEventListener("DOMContentLoaded", () => {
            let s = document.createElement("script");
            document.head.appendChild(s);
            s.addEventListener("load", () => {
                //script has loaded
                console.log("script has loaded");
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 48.94550331646864,
                        lng: 20.56362623210377 
                    },
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            });
            s.src = `https://maps.googleapis.com/maps/api/js?key=${"AIzaSyCQ279zqmonSYCmwd5s-0ePPP-6DDDrXko"}`;
        });