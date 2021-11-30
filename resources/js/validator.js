'use strict'

window.validateContactForm = function() {
    let name = document.forms["contactForm"]["name"].value;
    let surname = document.forms["contactForm"]["surname"].value;
    let subject = document.forms["contactForm"]["subject"].value;
    let email = document.forms["contactForm"]["email"].value;
    let message = document.forms["contactForm"]["message"].value;
    if (name == "") {
      alert("Name must be filled out!");
      return false;
    }
    if (surname == "") {
        alert("Surname must be filled out!");
        return false;
    }
    if (subject == "") {
        alert("Subject must be filled out!");
        return false;
    }
    if (email == "") {
        alert("Email must be filled out!");
        return false;
    }
    if (message == "") {
        alert("Message must be filled out!");
        return false;
    }
}

window.validateShopForm = function(isCreateForm) {
    let heading;
    let price;
    let image;
    let description;
    if (isCreateForm == true) {
        heading = document.forms["shopCreateForm"]["heading"].value;
        price = document.forms["shopCreateForm"]["price"].value;
        image = document.forms["shopCreateForm"]["image"].value;
        description = document.forms["shopCreateForm"]["description"].value;
        if (heading == "") {
            alert("Heading must be filled out!");
            return false;
        }
        if (price == "") {
            alert("Price must be filled out!");
            return false;
        }
        if (image == "") {
            alert("Image must be chosen!");
            return false;
        }
        if (description == "") {
            alert("Description must be filled out!");
            return false;
        }
    } else {
        heading = document.forms["shopEditForm"]["heading"].value;
        price = document.forms["shopEditForm"]["price"].value;
        description = document.forms["shopEditForm"]["description"].value;
        if (heading == "") {
            alert("Heading must be filled out!");
            return false;
        }
        if (price == "") {
            alert("Price must be filled out!");
            return false;
        }
        if (description == "") {
            alert("Description must be filled out!");
            return false;
        }
    }
}

window.validateAuthForm = function(isRegisterForm) {
    let name;
    let email;
    let password;
    let password_confirmation;
    if (isRegisterForm == true) {
        name = document.forms["authRegisterForm"]["name"].value;
        email = document.forms["authRegisterForm"]["email"].value;
        password = document.forms["authRegisterForm"]["password"].value;
        password_confirmation = document.forms["authRegisterForm"]["password_confirmation"].value;
        if (name == "") {
            alert("Name must be filled out!");
            return false;
        }
        if (email == "") {
            alert("Email must be filled out!");
            return false;
        }
        if (password == "") {
            alert("Password must be filled out!");
            return false;
        }
        if (password_confirmation == "") {
            alert("Password confirmation must be filled out!");
            return false;
        }
    } else {
        email = document.forms["authLoginForm"]["email"].value;
        password = document.forms["authLoginForm"]["password"].value;
        if (email == "") {
            alert("Email must be filled out!");
            return false;
        }
        if (password == "") {
            alert("Password must be filled out!");
            return false;
        }
    }
}
    
