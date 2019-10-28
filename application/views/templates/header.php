<!doctype html>
<html lang="en">

<head>
    <title><?= $judul; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">


    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link href="<?= base_url('assets/'); ?>css/stylish-portfolio.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/landing-page.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light shadow bg-light" id="pagetop">
        <div class="container">
            <a class="navbar-brand" href="#">Coba CI</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>about">About</a>
                    </li>
                    <?php if ($this->session->userdata('username')) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="<?= base_url(); ?>mahasiswa">Mahasiswa</a>
                                <a class="dropdown-item" href="<?= base_url(); ?>peoples">Peoples</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="form-inline my-2 my-lg-0">
                        <form>
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success mr-sm-2 my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <?php if (!$this->session->userdata('username')) : ?>
                            <button class="btn btn-outline-info my-2  my-sm-0">
                                <a href="<?= base_url(); ?>auth">Login</a>
                            </button>
                        <?php endif; ?>
                    </li>
                    <?php if ($this->session->userdata('username')) : ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown my-2 my-sm-0">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-top:0px;padding-bottom:0px;">
                                <button class="btn btn-outline-primary mr-2 text-gray-600 small">
                                    <?= $user['username']; ?>
                                </button>
                            </a>
                            <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['user_image']; ?>" style="width:25px;"> -->
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    User Menu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
    </nav>