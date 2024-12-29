import { toastError, toastSuccess, api, handleErrors } from "../utils";

document.getElementById('addTodoButton').addEventListener('click', function() {
    document.getElementById('todoModal').classList.remove('hidden');
});

document.getElementById('closeModalButton').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('todoModal').classList.add('hidden');
});

document.getElementById('createTodoForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const result = await api(form.action, form.method, data);

        if (result.status === 'success') {
            toastSuccess('Todo created successfully');
            document.getElementById('todoModal').classList.add('hidden');
            form.reset();

            // Adicionar novo todo à tabela
            const todoTable = document.getElementById('todoTable').getElementsByTagName('tbody')[0];
            const newRow = todoTable.insertRow();
            newRow.innerHTML = `
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
        } else {
            handleErrors(result.errors);
        }
        
    } catch (error) {
        toastError(error.message);
    }
});