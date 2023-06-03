$(document).ready(function() {
    const d = new Date();
    const month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

    $('#unit1').click(function() {
        $('#tabel').load('/input_co/tablesatu/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    $('#unit2').click(function() {
        $('#tabel').load('/input_co/tabledua/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    $('#common').click(function() {
        $('#tabel').load('/input_co/tablecommon/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    $('#go').click(function() {
        const method = $('#method').val();
        const tahun = $('#tahun').val();
        const bulan = $('#bulan').val();
        $('#tabel').load('/input_co/' + method + '/' + tahun + '/' + bulan);
    });
});