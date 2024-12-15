@include('components.theme-toggle')

<!DOCTYPE html>
<html lang="en">

    @include('components.head', ['title' => 'Register'])

    <body class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex items-center justify-center antialiased">
        
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-6">Register</h2>
            
            <form class="space-y-4" id="register-form" action="{{ route('api/register') }}" method="POST">
                @csrf
                <div>
                    <label for="company-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Company name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-300 text-gray-700"
                    >
                </div>

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
                            minlength="3"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-300 text-gray-700"
                        >
                        <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600 ">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items center">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">I accept the terms and conditions</label>
                </div>
    
                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register
                    </button>
                </div>
                {{-- já tem uma conta ? va para o login --}}
                <div class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">
                    Already have an account? 
                    <a href="/" class="text-blue-500 dark:text-blue-300 hover:underline">Login</a>
                </div>
            </form>
        </div>

    </body>
</html>

@vite('resources/js/pages/register.js')
