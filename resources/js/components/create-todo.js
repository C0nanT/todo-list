import { toastError, toastSuccess, api, handleErrors } from "../utils";

$('#addTodoButton').on('click', function() {
    $('#todoModal').removeClass('hidden');
});

$('#closeModalButton').on('click', function(event) {
    event.preventDefault();
    $('#todoModal').addClass('hidden');
});

$('#createTodoForm').on('submit', async function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const result = await api(form.action, form.method, data);

        if (result.status === 'success') {
            toastSuccess('Todo created successfully');
            $('#todoModal').addClass('hidden');
            form.reset();

            const newRow = `
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white truncate">${result.title}</td>
                    <td class="px-6 py-4 text-sm text-green-700 dark:text-green-400 truncate">${result.category}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 truncate">${result.description}</td>
                    <td class="px-6 py-4 flex items-center space-x-2">
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://www.shutterstock.com/image-photo/happy-puppy-welsh-corgi-14-600nw-2270841247.jpg" alt="${result.responsible_id}">
                        <span class="text-sm text-gray-700 dark:text-gray-300">${result.responsible_id}</span>
                    </td>
                </tr>
            `;
            $('#todoTable tbody').append(newRow);
        } else {
            handleErrors(result.errors);
        }
        
    } catch (error) {
        toastError(error.message);
    }
});