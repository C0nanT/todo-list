import axios from 'axios';
import $ from './jquery-setup';
window.$ = $;
window.jQuery = $;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(function() {
    const theme = localStorage.getItem('theme') || 'light';
    $('html').toggleClass('dark', theme === 'dark');
});

const token = localStorage.getItem('token');
if (token) {
    console.log(token);
} else {
    console.log('No token found in cache.');
}

if (typeof $ === 'undefined') {
    console.error('jQuery is not loaded.');
} else {
    console.log('jQuery is loaded.');
}

