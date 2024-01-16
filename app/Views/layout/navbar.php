<?php 
function is_active($path) {
    $fullUrl = "http";
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") {
        $fullUrl .= "s";
    }
    $fullUrl .= "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    
    // Parse the URL
    $urlParts = parse_url($fullUrl);

    if($path == $urlParts['path']) {
        return 'active';
    }
}

?>

    <nav class="navbar navbar-expand-md fixed-top bg-body border-bottom">
        <div class="container-fluid"><a class="navbar-brand" href="#">My App</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">

                <?php if (!isset($_SESSION['user'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?= is_active('/about') ?>" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link  <?= is_active('/login') ?>" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link <?= is_active('/register') ?>" href="/register">Register</a></li>
                </ul>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?= is_active('/member') ?>" href="/member">Member</a></li>

                    <?php if($_SESSION['user']['role'] == 'admin') : ?>
                        <li class="nav-item"><a class="nav-link <?= is_active('/user') ?>" href="/user">Users</a></li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>