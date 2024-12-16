let inputField;

document.addEventListener("DOMContentLoaded", function() {

    const slider = document.getElementById("slider");
    const loginLink = document.getElementById("login-link");
    const registerLink = document.getElementById("register-link");

    // Spread operator (...) adds items from HTML collection one by one
    const errorFields = [...document.getElementsByClassName('validation-error')];

    loginLink.addEventListener("click", (e)=> {
        slider.style.animation = "slide-right 1s ease-in-out forwards";
    });
    registerLink.addEventListener("click", (e)=> {
        slider.style.animation = "slide-left 1s ease-in-out";
    });

    if (errorFields.length > 0) {
        errorFields.forEach((error)=> {
            const inputId = error.dataset.input;
            let inputField = document.getElementById(inputId);
            
            if (inputField) {
                inputField.addEventListener('keyup', () => {
                    error.textContent = '';
                    inputField.classList.remove('input-error');
                    inputField.classList.add('form-input');
                });
            }
        });
    }
});
