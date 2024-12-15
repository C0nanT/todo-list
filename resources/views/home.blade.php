@include('components.global')

<!DOCTYPE html>
<html lang="en" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

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

    @php $todos = [
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'work',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'personal',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'work',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'personal',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'work',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
        [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Consectetur adipiscing elit. Integer nec odio. Praesent libero.',
            'category' => 'personal',
            'image' => 'https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg',
            'responsible' => 'John Doe',
        ],
    ]
    @endphp

<body class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex items-center justify-center antialiased p-4">
    <div class="mt-8 mx-auto w-full max-w-7xl">
        <div class="flex items-center justify-end mb-2">
            <button id="addTodoButton" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 dark:bg-green-600 rounded-md hover:bg-green-800 dark:hover:bg-green-800">
            <i class="fa-solid fa-plus mr-2"></i> Create
            </button>
        </div>

        <div id="todoModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                @include('components.create-todo')
        </div>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Responsible</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($todos as $todo)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white truncate">{{ $todo['title'] }}</td>
                        <td class="px-6 py-4 text-sm text-green-700 dark:text-green-400 truncate">{{ $todo['category'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 truncate">{{ $todo['description'] }}</td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ $todo['image'] }}" alt="{{ $todo['responsible'] }}">
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $todo['responsible'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

