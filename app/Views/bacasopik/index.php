<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid text-center text-capitalize">
    <div class="row">
        <?php foreach ($data as $row) : ?>
            <div class="col-xl-4 col-md-6 mb-3">

                <!-- Button trigger modal -->
                <button type="button" class="rounded shadow border-0 p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $row[0]; ?>" style="width: 100%;">
                    <div class="p-2 bg_hijau1 rounded-top border_bottom2 text-start">
                        <i class="fas <?= $row[2]; ?> fs-2 text-success"></i>
                        <p class="fw-bolder text-uppercase fs-5 d-inline-block mb-0 text-success text-right">sop ik</p>
                    </div>
                    <div class="rounded-bottom text-dark fw-bolder text-uppercase py-2">
                        <?= $row[3]; ?>
                    </div>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop<?= $row[0]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase" id="staticBackdropLabel"><?= $row[3]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-sm">
                                    <?php foreach ($row[1] as $ro) : ?>
                                        <tr>
                                            <td class="text-start">
                                                <a target="_blank" class="text-decoration-none text-dark" href="<?= base_url('bacasopik/details/' . $row[3] . '/' . $ro); ?>"><?= $ro; ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>