<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>

<div class="container mt-5 mb-5 ">
    <div class="row">
        <div class="col">
            <h1>User Details</h1>

            <?php if(isset($_GET['saved'])) : ?>
                <div class="alert alert-success">Update has been saved</div>
            <?php endif; ?>

            <?php if(isset($errors)) : ?>
                <div class="border rounded border-1 border-danger text-left text-danger my-3 p-3">
                    <?php foreach($errors as $e) :?>
                    <div><?= $e?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="/user/<?=$user['id']?>" method="post">

                <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username"
                        value="<?= ($data['username'] ?? $user['username']) ?>"></div>
                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"
                        value="<?= ($data['email'] ?? $user['email']) ?>"></div>
                <div class="mb-3">
                    <small class="text-muted mb-2 d-block">Only update the password below to change it.</small>        
                <input class="form-control" type="password" name="password" placeholder="Password"
                        value="<?= ($data['password'] ?? '') ?>"></div>
                <div class="mb-3"><input class="form-control" type="password" name="confirm_password"
                        placeholder="Confirm Password" value="<?= ($data['confirm_password'] ?? '') ?>"></div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Save</button></div>

            </form>

        </div>
    </div>
</div>

<?php $this->stop() ?>