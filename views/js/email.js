document.addEventListener('DOMContentLoaded', function() {
    var emailInput = document.getElementById('emailInput');
    var errorMessage3 = document.getElementById('errorMessage3');
    var bouton = document.getElementById('inscrire');

    function checkEmail() {
        var email = emailInput.value;
        var regex = /^\S+@\S+\.\S+$/;

        if (regex.test(email)) {
            console.log("email OK");
            emailInput.style = "";
            errorMessage3.textContent = "";
            bouton.disabled = false;
        } else {
            console.log("email KO");
            emailInput.style.border = "solid";
            emailInput.style.borderColor = "red";
            emailInput.style.color = "red";
            errorMessage3.textContent = "Adresse mail invalide";
            bouton.disabled = true;
        }
    }

    emailInput.addEventListener('input', checkEmail);

});