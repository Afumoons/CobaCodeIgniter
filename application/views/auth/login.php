<div class="form-container">
    <h1 class="judul">Login Page</h1>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('auth'); ?>" method="POST" class="form">
        <input type="text" class="input-text" id="input" name="input" placeholder="Enter Email Address or Username..." value="<?= set_value('input'); ?>">
        <?= form_error('input', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>

        <input type="password" class="input-text" id="password" name="password" placeholder="Password">
        <?= form_error('password', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
        <div class="flex">
            <a href="<?= base_url(); ?>" class="input-tombol tombol-back half">

                Back

            </a>
            <button type="submit" class="input-tombol tombol-login half">
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