<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?= $this->include('manage_users/bidang_regis'); ?>
        </div>
        <div class="col-md-6">
            <?= $this->include('manage_users/aktivasi_user'); ?>
        </div>
        <div class="col">
            <?= $this->include('manage_users/bidang'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>