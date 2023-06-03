<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <link href="<?= base_url(); ?>/sb-admin/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/fontawesome/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/css/templates.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/css/profil.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?= $this->include('templates/topbar'); ?>
    <?= $this->include('templates/sidebar'); ?>

    <script src="<?= base_url(); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/sb-admin/js/scripts.js"></script>

    <!-- for table database -->
    <script src="<?= base_url(); ?>/sb-admin/dataTable/simple-dataTable.js"></script>
    <script src="<?= base_url(); ?>/sb-admin/js/datatables-simple-demo.js"></script>

    <!-- for sweet alert -->
    <script src="<?= base_url(); ?>/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>/sweetalert/myscript.js"></script>

</body>

</html>