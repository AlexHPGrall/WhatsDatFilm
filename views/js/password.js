document.addEventListener('DOMContentLoaded', function() {

    var passwordInput = document.getElementById('passwordInput');

    passwordInput.addEventListener('input', function() {
    var password = passwordInput.value;

    var minLength = 7;
    var hasUpperCase = /[A-Z]/.test(password);
    var hasLowerCase = /[a-z]/.test(password);
    var hasSpecialChars = /[^a-zA-Z0-9]/.test(password);
    var hasNumericChar = /\d/.test(password);
        
    console.log("Caractères dans l'input :", password);

    if(password.length > minLength && hasLowerCase && hasUpperCase && hasSpecialChars && hasNumericChar) {
        console.log("Mot de passe OK");
        passwordInput.style.border = "solid";
        passwordInput.style.borderColor = "green";
        passwordInput.style.color = "green";
    } else {
        console.log("Le mot de passe ne répond pas aux critères.");
        passwordInput.style.border = "solid";
        passwordInput.style.borderColor = "red";
        passwordInput.style.color = "red";
    }

    });
});