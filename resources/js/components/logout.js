import { confirmDialog } from "../utils";

document.getElementById('logout-btn').addEventListener('click', function() {
    confirmDialog('Logout', 'Are you sure you want to logout?', 'Yes', 'No', function() {
        localStorage.removeItem('token');
        window.location = '/';
    });


});