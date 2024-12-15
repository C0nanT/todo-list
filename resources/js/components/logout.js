import { confirmDialog } from "../utils";

document.getElementById('logout-btn').addEventListener('click', function() {
    console.log(this);
    confirmDialog('Logout', 'Are you sure you want to logout?', 'Yes', 'No', function() {
        localStorage.removeItem('token');
        window.location = '/';
    });


});