<?php
/** @var $exception \Exception */

?>
<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold"><?= $exception->getCode() ?></h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Sorry</p>
        <p class="lead">
            <?= $exception->getMessage() ?>
        </p>
        <a href="/" class="btn btn-primary">Go Home</a>
    </div>
</div>
</body>
