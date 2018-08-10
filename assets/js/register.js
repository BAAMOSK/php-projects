const login = document.getElementsByClassName('hide-register')[0];
const register = document.getElementsByClassName('hide-login')[0];
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

login.onclick = () => {
    registerForm.classList.add('hide');
    loginForm.classList.remove('hide');
};

register.onclick = () => {
    loginForm.classList.add('hide');
    registerForm.classList.remove('hide');
};

