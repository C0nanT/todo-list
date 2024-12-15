import { toastError, toastSuccess, api } from "../utils";

if (localStorage.getItem('token')) {
    window.location = '/home';
}

document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    const icon = this.querySelector('i');
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});

document.getElementById('login-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const result = await api(form.action, form.method, data);

        if (result.token) {
            localStorage.setItem('token', result.token);
            toastSuccess('Login successful');
            window.location = '/home';
        } else {
            console.log(result);
            toastError(result.message);
        }
    } catch (error) {
        toastError(error.message);
    }
});