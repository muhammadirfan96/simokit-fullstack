<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= $this->include('templates/header'); ?>

<?= $this->include('admin/operators'); ?>
<?= $this->include('admin/chart'); ?>

<?= $this->endSection(); ?>