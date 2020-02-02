<div class="form-container">
    <h1 class="judul">Change your password for?</h1>
    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
    <?= $this->session->flashdata('message'); ?>
    <form class="form" method="post" action="<?= base_url('auth/changepassword'); ?>">
        <input type="password" class="input-text" id="password1" name="password1" placeholder="Enter New Password...">
        <!-- <?= form_error('password1', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?> -->
        <input type="password" class="input-text" id="password2" name="password2" placeholder="Reenter New Password...">
        <!-- <?= form_error('password2', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?> -->
        <div class="flex">
            <a href="<?= base_url(); ?>">
                <button class="input-tombol tombol-back">
                    Back
                </button>
            </a>
            <button type="submit" class="input-tombol tombol-login">
                Change Password
            </button>
        </div>
    </form>
    <hr>

</div>