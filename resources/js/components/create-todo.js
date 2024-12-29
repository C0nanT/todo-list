import { toastError, toastSuccess, api } from "../utils";

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

        console.log(result)
        
    } catch (error) {
        toastError(error.message);
    }
});