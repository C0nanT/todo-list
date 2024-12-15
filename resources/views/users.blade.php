@include('components.global')

<!DOCTYPE html>
<html lang="en">

    @include('components.head', ['title' => 'Users'])

<div id="userModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    @include('components.create-user')
</div>

@php
$users = [
    [
        'name' => 'John Doe',
        'email' => 'conan@gmail.com',
        'role' => 'Admin',
        'tasks' => 2,
        'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
    ],
    [
        'name' => 'Jane Doe',
        'email' => 'conan2@gmail.com',
        'role' => 'User',
        'tasks' => 3,
        'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
    ],
];

@endphp
<body class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex items-center justify-center antialiased p-4">
    <div class="mt-8 mx-auto w-full max-w-7xl">
        
        <div class="flex items-center justify-between mb-2">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Users</h1>
            <button id="addUserButton" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 dark:bg-green-600 rounded-md hover:bg-green-800 dark:hover:bg-green-800">
            <i class="fa-solid fa-plus mr-2"></i> Create User
            </button>
        </div>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tasks</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 flex items-center space-x-2 whitespace-nowrap">
                            <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ $user['image'] }}" alt="{{ $user['name'] }}">
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $user['name'] }}</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user['role'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user['tasks'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 dark:bg-yellow-600 rounded-md hover:bg-yellow-800 dark:hover:bg-yellow-800">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 dark:bg-red-600 rounded-md hover:bg-red-800 dark:hover:bg-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>

