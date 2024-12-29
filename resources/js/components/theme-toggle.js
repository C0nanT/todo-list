import $ from '../jquery-setup';

$('#dark-mode-toggle').on('click', function() {
    $('html').toggleClass('dark');
    localStorage.setItem('theme', $('html').hasClass('dark') ? 'dark' : 'light');
    const icon = $(this).find('i');
    icon.toggleClass('fa-sun fa-moon');
    console.log('Tema atual:', localStorage.getItem('theme'));
});

