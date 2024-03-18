$(document).ready(function() {

    var passwordInput = $('#passwordInput');
    var passwordInputConfirm = $('#passwordInputConfirm');
    var userCreation = $('#userCreation');

    function passwordInputTest() {
        var password = passwordInput.val();

        var minLength = 7;
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);
        var hasSpecialChars = /[^a-zA-Z0-9]/.test(password);
        var hasNumericChar = /\d/.test(password);
        
        console.log("Caractères dans l'input :", password);

        if(password.length > minLength && hasLowerCase && hasUpperCase && hasSpecialChars && hasNumericChar) {
            console.log("Mot de passe OK");
            $('#passwordErrorTooltip').css('display', 'none');
            passwordInput.css({
                border: "",
                color: ""
            });
        } else {
            console.log("Le mot de passe ne répond pas aux critères.");
            $('#passwordErrorTooltip').css('display', 'block');
            passwordInput.css({
                border: "1px solid red",
                color: "red"
            });
        }
    }

    function passwordMatch() {
        if (passwordInput.val() === passwordInputConfirm.val()) {
            console.log('Les mots de passe matchent');
            return true;
        } else {
            console.log('Les mots de passe ne matchent pas');
            return false;
        }
    }

    function passwordMatchCheck(event) {
        if (!passwordMatch()) {
            event.preventDefault();
        }
    }

    passwordInput.on('input', passwordInputTest);
    passwordInputConfirm.on('input', passwordMatch);
    userCreation.on('submit', passwordMatchCheck);
});