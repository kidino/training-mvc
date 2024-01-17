<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>User List</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $users as $user) : ?>
            <tr>
                <td><?= $user['id']?></td>
                <td><?= $user['username']?></td>
                <td><?= $user['email']?></td>
                <td><?= $user['role']?></td>
                <td><a class="btn btn-sm btn-secondary" href="/user/<?= $user['id']?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>
    </div>
</div>

<?php $this->stop() ?>
