<div class="flex flex-col space-y-4 w-full max-w-md mx-auto p-8 shadow-lg rounded-lg bg-white dark:bg-gray-800">

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Create Todo</h2>
    <form action="{{ route('api/todos.store') }}" method="POST" class="flex flex-col space-y-4 text-gray-800 dark:text-gray-200">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="description" class="text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="p-2 border border-gray-300 rounded-md text-gray-800" required></textarea>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="category" class="text-sm font-medium">Category</label>
            <select name="category" id="category" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
                <option value="1">Backend</option>
                <option value="2">Frontend</option>
                <option value="3">Fullstak</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="responsible" class="text-sm font-medium">Responsible</label>
            <select name="responsible" id="responsible" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
                <option value="1">User 1</option>
                <option value="2">User 2</option>
                <option value="3">User 3</option>
            </select>
        </div>
        <button type="submit" class="p-2 bg-blue-500 text-white rounded-md"><i class="fa-solid fa-check"></i> Create</button>
        <button id="closeModalButton" class="mt-4 p-2 bg-red-500 text-white rounded-md"><i class="fa-solid fa-xmark"></i> Cancel</button>

    </form>
</div>

@vite('resources/js/components/create-todo.js')
