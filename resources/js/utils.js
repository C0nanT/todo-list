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