document.addEventListener('DOMContentLoaded', function() {
    var loginInput = document.getElementById('loginInput');
    var loginStatus = document.getElementById('loginStatus');
    var form = document.getElementById('signin');
    var bouton = document.getElementById('inscrire');

    function loginCheck() {
        var login = loginInput.value;
        if (login.length > 0) {
            $.ajax({
                url: '/views/js/checkLogin.php',
                type: 'POST',
                data: { functionname: 'search', login: login },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.exists) {
                        console.log("Le login est déjà pris");
                        loginInput.style.border = "solid";
                        loginInput.style.borderColor = "red";
                        loginInput.style.color = "red";
                        loginStatus.textContent = "Ce nom d'utilisateur est déjà pris";
                        bouton.disabled = true;
                    } else {
                        console.log("Le login est libre");
                        loginInput.style = "";
                        loginStatus.textContent = "";
                        bouton.disabled = false;
                    }
                },
                error: function () {
                    console.log("Erreur lors de la requête AJAX.");
                }
            });
            
        }
    }

    if (form) {
        form.addEventListener('submit', loginCheck);
    }

    loginInput.addEventListener('input', loginCheck);

});