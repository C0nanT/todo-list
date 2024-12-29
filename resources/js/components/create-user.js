import { toastError, toastSuccess, api } from "../utils";

$('#addUserButton').on('click', function() {
    $('#userModal').removeClass('hidden');
});

$('#closeModalButton').on('click', function(event) {
    event.preventDefault();
    $('#userModal').addClass('hidden');
});