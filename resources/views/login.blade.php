<!DOCTYPE html>
<html lang="pt-br" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex items-center justify-center antialiased">
        <div class="absolute top-4 right-4">
            <button id="dark-mode-toggle">
                <i class="fas fa-moon"></i>
            </button>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-6">Login</h2>
            
            <form action="{{ route('home') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">E-mail</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-300 text-gray-700"
                    >
                </div>
    
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Senha</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-300 text-gray-700"
                        >
                        <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600 ">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
    
                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Entrar
                    </button>
                </div>
            </form>
    
            <div class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
                <a href="" class="text-blue-500 dark:text-blue-300 hover:underline">Esqueceu sua senha?</a>
            </div>
            <div class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">
                Não tem uma conta? 
                <a href="" class="text-blue-500 dark:text-blue-300 hover:underline">Cadastre-se</a>
            </div>
        </div>
        <script>
            document.getElementById('dark-mode-toggle').addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-sun');
                icon.classList.toggle('fa-moon');
            });

            document.getElementById('toggle-password').addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);

                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>
