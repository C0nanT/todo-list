import { toastError, toastSuccess, api } from "../utils";

$('#addUserButton').on('click', function() {
    $('#userModal').removeClass('hidden');
});

$('#closeModalButton').on('click', function(event) {
    event.preventDefault();
    $('#userModal').addClass('hidden');
});

$('#createUserForm').on('submit', async function(event) {
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
           
            // $('#todoTable tbody').append(newRow);
        } else {
            handleErrors(result.errors);
        }
        
    } catch (error) {
        toastError(error.message);
    }
});