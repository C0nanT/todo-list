import { toastError, toastSuccess, api } from "../utils";

document.getElementById('addUserButton').addEventListener('click', function() {
    document.getElementById('userModal').classList.remove('hidden');
});

document.getElementById('closeModalButton').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('userModal').classList.add('hidden');
});