<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>

<div class="container mt-5 mb-5 ">
    <div class="row">
        <div class="col">
            <h1>User Details</h1>


    <form action="">

    <label for="">Username</label>
        <input type="text" name="" id="" class="form-control" value="<?= $user['username'] ?>">

<label for="">Email</label>
<input type="text" name="" id="" class="form-control" value="<?= $user['email'] ?>">

<label for="">Role</label>
<input type="text" name="" id="" class="form-control" value="<?= $user['role'] ?>">


    </form>

        </div>
    </div>
</div>

<?php $this->stop() ?>
