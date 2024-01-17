<?php use \App\Lib\Utils; ?>
    <nav class="navbar navbar-expand-md fixed-top bg-body border-bottom">
        <div class="container-fluid"><a class="navbar-brand" href="#">My App</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">

                <?php if (!isset($_SESSION['user'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?= Utils::is_active('/about') ?>" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link <?= Utils::is_active('/permohonan') ?>" href="/permohonan">Permohonan</a></li>
                    <li class="nav-item"><a class="nav-link  <?= Utils::is_active('/login') ?>" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link <?= Utils::is_active('/register') ?>" href="/register">Register</a></li>
                </ul>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?= Utils::is_active('/office/permohonan') ?>" href="/office/permohonan">Senarai Permohonan</a></li>
                    <li class="nav-item"><a class="nav-link <?= Utils::is_active('/member') ?>" href="/member">Member</a></li>

                    <?php if($_SESSION['user']['role'] == 'admin') : ?>
                        <li class="nav-item"><a class="nav-link <?= Utils::is_active('/user') ?>" href="/user">Users</a></li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>