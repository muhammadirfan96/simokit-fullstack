<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?php if (in_groups('admin') || in_groups('supervisor operasi shift a') || in_groups('supervisor operasi shift b') || in_groups('supervisor operasi shift c') || in_groups('supervisor operasi shift d') || in_groups('operator shift a') || in_groups('operator shift b') || in_groups('operator shift c') || in_groups('operator shift d')) : ?>
    <?= $this->include('home/schedule'); ?>
    <?= $this->include('home/notice'); ?>
<?php endif ?>

<?php if (in_groups('manager bagian operasi') || in_groups('supervisor logistic') || in_groups('logistic')) : ?>
    <?= $this->include('home/wellcome'); ?>
<?php endif ?>

<?= $this->endSection(); ?>