document.addEventListener('DOMContentLoaded', function() {
    var passwordInput = document.getElementById('passwordInput');
    var passwordInputBis = document.getElementById('passwordInputBis');
    var errorMessage1 = document.getElementById('errorMessage1');
    var errorMessage2 = document.getElementById('errorMessage2');
    var bouton = document.getElementById('inscrire');

    function checkPassword() {
        var password = passwordInput.value;

        var minLength = 7;
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);
        var hasSpecialChars = /[^a-zA-Z0-9]/.test(password);
        var hasNumericChar = /\d/.test(password);

        if (password.length > minLength && hasLowerCase && hasUpperCase && hasSpecialChars && hasNumericChar) {
            console.log("Mot de passe OK");
            passwordInput.style = "";
            errorMessage1.textContent = "";
            bouton.disabled = false;
        } else {
            console.log("Le mot de passe ne répond pas aux critères.");
            passwordInput.style.border = "solid";
            passwordInput.style.borderColor = "red";
            passwordInput.style.color = "red";
            errorMessage1.textContent = "Le mot de passe ne répond pas aux critères.";
            bouton.disabled = true;
        }
    }

    passwordInput.addEventListener('input', checkPassword);

    function samePassword() {
        var passwordBis = passwordInputBis.value;
        var password = passwordInput.value;

        if (passwordBis === password) {
            console.log("Les mots de passe correspondent.");
            passwordInputBis.style = "";
            errorMessage2.textContent = "";
            bouton.disabled = false;
        } else {
            console.log("Le mot de passe n'est pas le même");
            passwordInputBis.style.border = "solid";
            passwordInputBis.style.borderColor = "red";
            passwordInputBis.style.color = "red";
            errorMessage2.textContent = "Les mots de passe ne correspondent pas.";
            bouton.disabled = true;
        }
    }

    passwordInputBis.addEventListener('input', samePassword);
});