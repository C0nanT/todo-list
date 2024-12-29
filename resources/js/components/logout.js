import { confirmDialog } from "../utils";
import $ from '../jquery-setup';

$('#logout-btn').on('click', function() {
    confirmDialog('Logout', 'Are you sure you want to logout?', 'Yes', 'No', function() {
        localStorage.removeItem('token');
        window.location = '/';
    });
});