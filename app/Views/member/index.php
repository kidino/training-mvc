<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h3>Welcome <?= $user['username'] ?></h3>
        </div>
    </div>
</div>
<?php $this->stop() ?>