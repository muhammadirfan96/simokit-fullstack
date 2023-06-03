$(document).ready(function() {
    // var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    // sig.signature('disable');

    $('#edit').click(function() {
        $('#inputUsername').removeAttr('disabled');
        $('#iconUsername').removeClass('fa-lock');
        $('#iconUsername').addClass('fa-lock-open');

        $('#inputFullname').removeAttr('disabled');
        $('#iconFullname').removeClass('fa-lock');
        $('#iconFullname').addClass('fa-lock-open');

        $('#inputEmail').removeAttr('disabled');
        $('#iconEmail').removeClass('fa-lock');
        $('#iconEmail').addClass('fa-lock-open');

        $('#inputActive').removeAttr('disabled');
        $('#iconActive').removeClass('fa-lock');
        $('#iconActive').addClass('fa-lock-open');

        // $('#clear').removeAttr('disabled');
        $('#save').removeAttr('disabled');
        $('#reset').removeAttr('disabled');

        // sig.signature('enable');
    });

    // $('#clear').click(function(e) {
    //     e.preventDefault();
    //     sig.signature('clear');
    //     $("#signature64").val('');
    // });
});

function previewImg() {
    const picture = document.querySelector('#picture');
    const logo = document.querySelector('.logo');

    const filePicture = new FileReader();
    filePicture.readAsDataURL(picture.files[0]);
    filePicture.onload = function(e) {
        logo.src = e.target.result;
    }
}
