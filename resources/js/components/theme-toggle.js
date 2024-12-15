
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    const icon = this.querySelector('i');
    icon.classList.toggle('fa-sun');
    icon.classList.toggle('fa-moon');
    console.log('Tema atual:', localStorage.getItem('theme'));
});

