import Swal from 'sweetalert2';

export function getCurrentTheme() {
    return document.documentElement.classList.contains('dark') ? 'dark' : 'light';
}

export function toastError(message) {
    const theme = getCurrentTheme();

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: 'swal2-popup-' + theme,
        },
        background: theme === 'dark' ? '#1a253d' : '#fff',
        color: theme === 'dark' ? '#fff' : '#000',
    });
}

export function toastSuccess(message) {
    const theme = getCurrentTheme();

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: 'swal2-popup-' + theme,
        },
        background: theme === 'dark' ? '#1a253d' : '#fff',
        color: theme === 'dark' ? '#fff' : '#000',
    });
}

export function confirmDialog(title, text, confirmButtonText, cancelButtonText, callback) {
    const theme = getCurrentTheme();

    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText,
        customClass: {
            popup: 'swal2-popup-' + theme,
        },
        background: theme === 'dark' ? '#1a253d' : '#fff',
        color: theme === 'dark' ? '#fff' : '#000',
    }).then((result) => {
        if (result.isConfirmed) {
            callback();
        }
    });
}

export async function api(url, method, data) {
    try {
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        return result;
    } catch (error) {
        console.error(error);
        throw new Error('An error occurred. Please try again later.');
    }
}

export async function checkLogin() {
    const token = localStorage.getItem('token');
    if (!token) {
        window.location = '/';
    }
}