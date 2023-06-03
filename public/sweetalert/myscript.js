$(document).ready(function(){

    const flashDataWarning = $('.flash-data-warning').data('flashdata');
    const flashDataSuccess = $('.flash-data-success').data('flashdata');

    if (flashDataWarning) {
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashDataWarning
        });
    };

    if (flashDataSuccess) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashDataSuccess
        });
    };
});
