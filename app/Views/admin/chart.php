<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="shadow mb-3 p-3 rounded">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">data kwh</span>
                <canvas class="" id="kwh"></canvas>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="shadow mb-3 p-3 rounded" style="min-height: 296px;">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">data kpi</span>
                <?php if ($jmlhDataKpi == [0, 0, 0]) : ?>
                    <p class="text-center fw-bolder"><i class="fas fa-triangle-exclamation text_merah" style="font-size: 120px;"></i><br>anda belum menurunkan kpi apapun</p>
                <?php endif ?>
                <?php if ($jmlhDataKpi != [0, 0, 0]) : ?>
                    <div class="d-flex align-items-center">
                        <div class="" style="width: 50%;">
                            <canvas class="" id="kpi"></canvas>
                        </div>
                        <div class="ms-3">
                            <div class="d-inline-block border border-2" style="width: 40px; height:14px;border-color:rgb(186, 0, 0) !important;background-color:rgba(186, 0, 0, 0.2) !important;"></div><span class="ms-1 size12">belum ada evidence</span><br>
                            <div class="d-inline-block border border-2" style="width: 40px; height:14px;border-color:rgb(16, 11, 112) !important;background-color:rgba(16, 11, 112, 0.2) !important;"></div><span class="ms-1 size12">belum diapprove</span><br>
                            <div class="d-inline-block border border-2" style="width: 40px; height:14px;border-color:rgb(0, 186, 29) !important;background-color:rgba(0, 186, 29, 0.2) !important;"></div><span class="ms-1 size12">sudah diapprove</span>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="shadow mb-3 p-3 rounded">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">data laporan</span>
                <canvas class="" id="laporan"></canvas>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="shadow mb-3 p-3 rounded">
                <span class="fw-bold text-light text-uppercase px-2 rounded bg_orange0">data user</span>
                <canvas class="" id="user"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/chart/chart.js"></script>

<script>
    // kwh
    const kwh = document.getElementById('kwh').getContext('2d');
    const labelsKwh = [];
    const dataKwhKit1 = [];
    const dataKwhKit2 = [];
    const dataKwhPs1 = [];
    const dataKwhPs2 = [];
    const dataKwhEt1 = [];
    const dataKwhEt2 = [];
    <?php foreach ($dataKwh[0] as $row) : ?>
        labelsKwh.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[1] as $row) : ?>
        dataKwhKit1.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[2] as $row) : ?>
        dataKwhKit2.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[3] as $row) : ?>
        dataKwhPs1.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[4] as $row) : ?>
        dataKwhPs2.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[5] as $row) : ?>
        dataKwhEt1.push('<?= $row; ?>')
    <?php endforeach ?>
    <?php foreach ($dataKwh[6] as $row) : ?>
        dataKwhEt2.push('<?= $row; ?>')
    <?php endforeach ?>

    const barVertical = new Chart(kwh, {
        type: 'bar',
        data: {
            // labels: ['01-07-2022', '02-07-2022', '03-07-2022', '04-07-2022', '05-07-2022'],
            labels: labelsKwh,
            datasets: [{
                    label: 'kwh KIT #1',
                    data: dataKwhKit1,
                    // data: [12287.97, 12290.97, 12292.25, 12294.61, 12296.99],
                    backgroundColor: [
                        'rgba(186, 0, 0, 0.2)', // merah
                    ],
                    borderColor: [
                        'rgb(186, 0, 0)', // merah
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                },
                {
                    label: 'kwh KIT #2',
                    data: dataKwhKit2,
                    // data: [11811.70, 11813.92, 11814.89, 11816.19, 11818.70],
                    backgroundColor: [
                        'rgba(0, 186, 29, 0.2)', // hijau
                    ],
                    borderColor: [
                        'rgb(0, 186, 29)', // hijau
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                },
                {
                    label: 'kwh PS #1',
                    // data: [7472.54, 7474.14, 7474.82, 7475.76, 7477.35],
                    data: dataKwhPs1,
                    backgroundColor: [
                        'rgba(16, 11, 112, 0.2)', // biru
                    ],
                    borderColor: [
                        'rgb(16, 11, 112)', // biru
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                },
                {
                    label: 'kwh PS #2',
                    // data: [7090.05, 7097.57, 7098.22, 7099.73, 7100.74],
                    data: dataKwhPs2,
                    backgroundColor: [
                        'rgba(4, 223, 252, 0.2)',
                    ],
                    borderColor: [
                        'rgb(4, 223, 252)',
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                },
                {
                    label: 'exitaci #1',
                    // data: [1746.40, 1746.78, 1746.95, 1747.19, 1747.60],
                    data: dataKwhEt1,
                    backgroundColor: [
                        'rgba(252, 139, 5, 0.2)',
                    ],
                    borderColor: [
                        'rgb(252, 139, 5)',
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                },
                {
                    label: 'exitaci #2',
                    // data: [1704.72, 1705.01, 1705.14, 1705.39, 1705.69],
                    data: dataKwhEt2,
                    backgroundColor: [
                        'rgba(196, 0, 176, 0.2)',
                    ],
                    borderColor: [
                        'rgb(196, 0, 176)',
                    ],
                    borderWidth: 1,
                    borderRadius: 3
                }
            ]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'daya listrik (kwh)'
                    },
                    display: false
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
        }
    });

    // kpi
    const kpi = document.getElementById('kpi').getContext('2d');
    const jmlhDataKpi = [];
    <?php foreach ($jmlhDataKpi as $item) : ?>
        jmlhDataKpi.push('<?= $item; ?>')
    <?php endforeach ?>
    const doughnut = new Chart(kpi, {
        type: 'doughnut',
        data: {
            labels: ['belum ada evidence', 'belum diapprove', 'sudah diapprove'],
            datasets: [{
                label: 'key performance indicator',
                data: jmlhDataKpi,
                // data: [1, 1, 2],
                backgroundColor: [
                    'rgba(186, 0, 0, 0.2)',
                    'rgba(16, 11, 112, 0.2)',
                    'rgba(0, 186, 29, 0.2)',
                ],
                borderColor: [
                    'rgb(186, 0, 0)',
                    'rgb(16, 11, 112)',
                    'rgb(0, 186, 29)',
                ],
                borderWidth: 1,
                hoverOffset: 4,
            }]

        },
        options: {
            plugins: {
                legend: {
                    // position: 'right'
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: true,
                    }
                },
                y: {
                    grid: {
                        display: true
                    }
                },
            }
        }
    });

    // laporan
    const laporan = document.getElementById('laporan').getContext('2d');
    const labelsLaporan = [];
    const dataChecklist = [];
    const dataLimas = [];
    const dataServiceRequest = [];

    <?php foreach ($dataLaporan[0] as $row) : ?>
        labelsLaporan.push('<?= $row; ?>')
    <?php endforeach ?>

    <?php foreach ($dataLaporan[1] as $row) : ?>
        dataChecklist.push(<?= $row; ?>)
    <?php endforeach ?>

    <?php foreach ($dataLaporan[2] as $row) : ?>
        dataLimas.push(<?= $row; ?>)
    <?php endforeach ?>

    <?php foreach ($dataLaporan[3] as $row) : ?>
        dataServiceRequest.push(<?= $row; ?>)
    <?php endforeach ?>

    const line = new Chart(laporan, {
        type: 'line',
        data: {
            labels: labelsLaporan,
            // labels: ['01-07-2022', '02-07-2022', '03-07-2022', '04-07-2022', '05-07-2022', '06-07-2022', '07-07-2022', '08-07-2022', '09-07-2022', '10-07-2022'],
            datasets: [{
                    label: 'checklist',
                    // data: ['35', '37', '42', '43', '48', '51', '55', '56', '57', '60'],
                    data: dataChecklist,
                    fill: false,
                    borderColor: 'rgba(186, 0, 0, 0.5)',
                    tension: 0.1
                },
                {
                    label: 'sr',
                    data: dataServiceRequest,
                    // data: ['27', '29', '35', '37', '38', '39', '44', '47', '48', '51'],
                    fill: false,
                    borderColor: 'rgba(0, 186, 29, 0.5)',
                    tension: 0.1
                },
                {
                    label: '5s',
                    data: dataLimas,
                    // data: ['33', '35', '38', '41', '44', '47', '49', '53', '58', '64'],
                    fill: false,
                    borderColor: 'rgba(16, 11, 112, 0.5)',
                    tension: 0.1,
                    yAxisID: 'kanan'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'jumlah laporan'
                    }
                },
                kanan: {
                    position: 'right'
                }
            }
        }
    })

    const user = document.getElementById('user').getContext('2d');
    const dataUsers = [];
    <?php foreach ($jmlhDataUsers as $row) : ?>
        dataUsers.push(<?= $row; ?>)
    <?php endforeach ?>
    const barHorizontal = new Chart(user, {
        type: 'bar',
        data: {
            labels: ['shift a', 'shift b', 'shift c', 'shift d', ],
            datasets: [{
                label: 'user',
                data: dataUsers,
                // data: ['17', '16', '16', '18'],
                backgroundColor: [
                    'rgba(186, 0, 0, 0.2)',
                    'rgba(0, 186, 29, 0.2)',
                    'rgba(16, 11, 112, 0.2)',
                    'rgba(4, 223, 252, 0.2)',
                ],
                borderColor: [
                    'rgb(186, 0, 0)',
                    'rgb(0, 186, 29)',
                    'rgb(16, 11, 112)',
                    'rgb(4, 223, 252)',
                ],
                borderWidth: 1,
                borderRadius: 5
            }],
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'jumlah pengguna'
                    }
                }
            },
            plugins: {
                legend: {
                    // position: 'right'
                    display: false
                }
            },
        }
    })
</script>