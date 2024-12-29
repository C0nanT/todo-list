import { toastError, toastSuccess, api, getCurrentTheme } from "../utils";

const theme = getCurrentTheme();
$('html').addClass(theme);

if (localStorage.getItem('token')) {
    window.location = '/home';
}

$('#toggle-password').on('click', function() {
    const passwordField = $('#password');
    const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);

    const icon = $(this).find('i');
    icon.toggleClass('fa-eye fa-eye-slash');
});

$('#login-form').on('submit', async function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const result = await api(form.action, form.method, data);

        if (result.status === 'success' && result.token) {
            localStorage.setItem('token', result.token);
            toastSuccess('Login successful');
            setTimeout(() => {
                window.location = '/home';
            }, 1000);
        } else {
            toastError(result.message);
        }
    } catch (error) {
        toastError(error.message);
    }
});
