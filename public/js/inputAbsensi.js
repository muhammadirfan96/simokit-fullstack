$(document).ready(function() {
    $('#a').click(function() {
        $('#table').load('/input_absensi/shiftA');
    });
    
    $('#b').click(function() {
        $('#table').load('/input_absensi/shiftB');
    });
    
    $('#c').click(function() {
        $('#table').load('/input_absensi/shiftC');
    });
    
    $('#d').click(function() {
        $('#table').load('/input_absensi/shiftD');
    });
});