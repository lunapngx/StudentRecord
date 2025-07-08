<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Student Dashboard') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css') ?>">
</head>
<body>
<div class="page-wrapper" id="main-wrapper">
    <?= $this->include('partials/sidebar') ?>
    <div class="body-wrapper">
        <?= $this->include('partials/header') ?>
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.min.js') ?>"></script>
</body>
</html>
