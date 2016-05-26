/**
 * Created by Aladin Idrissi on 24/05/2016.
 */
var password = document.getElementById("password")
var confirm_password = document.getElementById("password_confirmation");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setAttribute("style", "border: 2px solid red");
        confirm_password.setCustomValidity("Les contrassenyes no coincideixen.");
    } else {
        confirm_password.setCustomValidity('');
        confirm_password.setAttribute("style", "border: 1px solid greylight");

    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

