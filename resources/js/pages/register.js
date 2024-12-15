import { toastError, toastSuccess, api, getCurrentTheme } from "../utils";

const theme = getCurrentTheme();
document.documentElement.classList.add(theme);

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

document.getElementById('register-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const result = await api(form.action, form.method, data);
        
        if (result.status === 'success') {
            toastSuccess('Register successful');
        }else{
            toastError(result.message);
        }
    } catch (error) {
        toastError(error.message);
    }
});
