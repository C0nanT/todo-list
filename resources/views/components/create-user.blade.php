<div class="flex flex-col space-y-4 w-full max-w-md mx-auto p-8 shadow-lg rounded-lg bg-white dark:bg-gray-800">

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Create User</h2>
    <form id="createUserForm" action="{{ route('api/user.store') }}" method="POST" class="flex flex-col space-y-4 text-gray-800 dark:text-gray-200">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="email" class="text-sm font-medium">Email</label>
            <input name="email" id="email" class="p-2 border border-gray-300 rounded-md text-gray-800" required></input>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="password" class="text-sm font-medium">Password</label>
            <input type="text" name="password" id="password" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="permission" class="text-sm font-medium">Role</label>
            <select name="permission" id="permission" class="p-2 border border-gray-300 rounded-md text-gray-800" required>
                <option value="admin">Admin</option>
                <option value="common">Common</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="image" class="text-sm font-medium">Image</label>
            <input type="text" name="image" id="image" class="p-2 border border-gray-300 rounded-md text-gray-800">
        </div>      

        <button type="submit" class="p-2 bg-blue-500 text-white rounded-md"><i class="fa-solid fa-check"></i> Create</button>
        <button id="closeModalButton" class="mt-4 p-2 bg-red-500 text-white rounded-md"><i class="fa-solid fa-xmark"></i> Cancel</button>

    </form>
</div>

@vite('resources/js/components/create-user.js')
