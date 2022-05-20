</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Wedding</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/admin/dashboard') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/admin/guest/index') ?>">Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">RSVP</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('are you sure?')" href="<?php echo site_url('/admin/auth/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 mb-5">