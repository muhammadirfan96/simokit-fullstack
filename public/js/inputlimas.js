$(document).ready(function() {
    const d = new Date();
    const month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    // event ketika tombol boiler di tekan
    $('#boiler').click(function() {
        $('#tabel').load('/input_limas/boiler/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    // event ketika tombol turbin di tekan
    $('#turbin').click(function() {
        $('#tabel').load('/input_limas/turbin/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    // event ketika tombol alba di tekan
    $('#alba').click(function() {
        $('#tabel').load('/input_limas/alba/' + d.getFullYear() + '/' + month[d.getMonth()]);
    });

    $('#go').click(function() {
        const method = $('#method').val();
        const tahun = $('#tahun').val();
        const bulan = $('#bulan').val();
        $('#tabel').load('/input_limas/' + method + '/' + tahun + '/' + bulan);
    });
});