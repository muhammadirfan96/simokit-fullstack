<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col mb-3">
            <form action="/profil/edit" method="post" enctype="multipart/form-data">
                <div class="card rounded shadow">
                    <input type="hidden" name="id" value="<?= user()->id; ?>">
                    <div class="card-header bg_hijau1">
                        <div>
                            <?php if (user()->picture == '') : ?>
                                <img class="logo img-thumbnail rounded-circle" src="<?= base_url('img-dev/default.png'); ?>">
                            <?php endif ?>
                            <?php if (user()->picture != '') : ?>
                                <img class="logo img-thumbnail rounded-circle" src="<?= base_url('img-profile/' . user()->picture); ?>">
                            <?php endif ?>
                        </div>
                        <div>
                            <label for="picture">
                                <i class="fas fa-camera fs-3 <?= ($validation->hasError('picture')) ? 'text-danger' : ''; ?>"></i>
                            </label>
                            <input class="d-none" type="file" name="picture" id="picture" onchange="previewImg()">
                            <div style="font-size: 12px; color:red">
                                <?= $validation->getError('picture'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input id="inputUsername" name="username" type="text" class="form-control" value="<?= user()->username; ?>" disabled>
                            <span id="btnUsername" class="btn btn-secondary" type="button"><i class="fas fa-lock"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input id="inputFullname" name="fullname" type="text" class="form-control" value="<?= user()->fullname; ?>" disabled>
                            <span id="btnFullname" class="btn btn-secondary" type="button"><i id="iconFullname" class="fas fa-lock"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input id="inputBidang" name="bidang" type="text" class="form-control" value="<?= user()->bidang; ?>" disabled>
                            <span id="btnBidang" class="btn btn-secondary" type="button"><i class="fas fa-lock"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input id="inputEmail" name="email" type="text" class="form-control" value="<?= user()->email; ?>" disabled>
                            <span id="btnEmail" class="btn btn-secondary" type="button"><i id="iconEmail" class="fas fa-lock"></i></span>
                        </div>


                        <label class="" for="signature">
                            <i class="fas fa-file-signature fs-3 <?= ($validation->hasError('signature')) ? 'text-danger' : ''; ?>"></i><a href="<?= base_url('img-ttd/' . user()->signature); ?>" class="ms-2 text-danger" target="_blank"><?= (user()->signature != "") ? "You already have a signature" : "You don't have a signature"; ?></a>
                        </label>
                        <input class="d-none" type="file" name="signature" id="signature">
                        <div style="font-size: 12px; color:red">
                            <?= $validation->getError('signature'); ?>
                        </div>

                        <div class="mt-3">
                            <button id="edit" class="btn-sm btn btn-danger " type="button">edit</button>
                            <button disabled id="reset" class="btn-sm btn btn-primary" type="reset">reset</button>
                            <button disabled id="save" class="btn-sm btn btn-success" type="submit">save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('/js/profil.js'); ?>"></script>
<?= $this->endSection(); ?>