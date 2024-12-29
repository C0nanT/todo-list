@include('components.global')

<!DOCTYPE html>
<html lang="en">

    @include('components.head', ['title' => 'Home'])

<div id="todoModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    @include('components.create-todo')
</div>

<body class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex items-center justify-center antialiased p-4 flex-col">
    <div class="mt-20 mx-auto w-full max-w-7xl">

        @if(count($todos->todos) > 0)
            <div class="flex items-center justify-end mb-2">
                <button id="addTodoButton" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 dark:bg-green-600 rounded-md hover:bg-green-800 dark:hover:bg-green-800">
                <i class="fa-solid fa-plus mr-2"></i> Create Todo
                </button>
            </div>

            <table id="todoTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 rounded-lg shadow">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Responsible</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($todos->todos as $todo)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white truncate">{{ $todo->title }}</td>
                            <td class="px-6 py-4 text-sm text-green-700 dark:text-green-400 truncate">{{ $todo->category }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 truncate">{{ $todo->description }}</td>
                            <td class="px-6 py-4 flex items-center space-x-2">
                                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg" alt="{{ $todo->responsible_id }}">
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $todo->responsible_id }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="flex items-center justify-center flex-col">
                
                <h1 class="text-2xl font-bold text-gray-700 dark:text-gray-300">No todos found</h1>
                <button id="addTodoButton" class="flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-green-600 dark:bg-green-600 rounded-md hover:bg-green-800 dark:hover:bg-green-800">
                    <i class="fa-solid fa-plus mr-2"></i> Create Todo
                </button>
            </div>
        @endif
    </div>
    @include('components.footer')
</body>

</html>

