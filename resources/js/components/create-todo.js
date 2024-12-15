import { toastError, toastSuccess, api } from "../utils";

document.getElementById('addTodoButton').addEventListener('click', function() {
    document.getElementById('todoModal').classList.remove('hidden');
});

document.getElementById('closeModalButton').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('todoModal').classList.add('hidden');
});