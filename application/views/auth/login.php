<div class="form-container">
    <h1 class="judul">Login Page</h1>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('auth'); ?>" method="POST" class="form">
        <input type="text" class="input-text" id="input" name="input" placeholder="Enter Email Address or Username..." value="<?= set_value('input'); ?>">
        <?= form_error('input', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>

        <input type="password" class="input-text" id="password" name="password" placeholder="Password">
        <?= form_error('password', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
        <div class="flex">
            <a href="<?= base_url(); ?>">
                <button class="input-tombol tombol-back">
                    Back
                </button>
            </a>
            <button type="submit" class="input-tombol tombol-login">
                Login
            </button>
        </div>
    </form>
    <hr>
    <div class="form-text">
        <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
        <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
    </div>
</div>
<!-- <div class="container"> -->

<!-- Outer Row -->
<!-- <div class="row justify-content-center"> -->

<!-- <div class="col-lg-7"> -->

<!-- <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    Nested Row within Card Body
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="input" name="input" placeholder="Enter Email Address or Username..." value="<?= set_value('input'); ?>">
                                        <?= form_error('input', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <a href="<?= base_url(); ?>" class="btn btn-primary btn-user btn-block">
                                        Back
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div> -->