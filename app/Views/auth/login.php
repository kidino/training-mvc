<?php $this->layout('layout::main') ?>

<!-- main section -->
<?php $this->start('main-area') ?>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>

                    <?php if(isset($_GET['success'])) :  ?>
                        <div class="alert alert-success">Registration Successful. You may login now.</div>
                    <?php endif; ?>

                    <?php if(isset($error)) : ?>
                    <div class="border rounded border-1 border-danger text-left text-danger">
                        <div><?= $error?></div>
                    </div>
                    <?php endif; ?>
                   
                    <?php if(isset($message)) : ?>
                    <div class="border rounded border-1 border-success text-left text-success">
                        <div><?= $message?></div>
                    </div>
                    <?php endif; ?> 

                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5 shadow">
                        <div class="card-body d-flex flex-column align-items-center p-5">
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username" value="<?=($data['username'] ?? '')?>"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" value="<?=($data['password'] ?? '')?>"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                            </form><a href="/register">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $this->stop() ?>


