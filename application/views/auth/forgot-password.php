<div class="form-container">
    <h1 class="judul">Forgot your password?</h1>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('auth/forgotpassword'); ?>" method="POST" class="form">
        <input type="text" class="input-text" id="input" name="input" placeholder="Enter Email Address..." value="<?= set_value('input'); ?>">
        <?= form_error('input', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>

        <input type="password" class="input-text" id="password" name="password" placeholder="Password">
        <?= form_error('password', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
        <div class="flex">
            <a href="<?= base_url('auth/'); ?>" class="input-tombol tombol-back half">
                Back
            </a>
            <button type="submit" class="input-tombol tombol-login half">
                Reset Password
            </button>
        </div>
    </form>
    <hr>
</div>