<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>

            <!-- <form action="<?= base_url('user/changepassword'); ?>" method="post"> -->
            <?= form_open_multipart(base_url() . 'user/changepassword'); ?>
            <div class="form-group">
                <label for="current_Password">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
                <?= form_error('current_password', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="new_password1">New Password</label>
                <input type="password" name="new_password1" id="new_password1" class="form-control">
                <?= form_error('new_password1', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="new_password2">Confirm Password</label>
                <input type="password" name="new_password2" id="new_password2" class="form-control">
                <?= form_error('new_password2', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Change Password
                </button>
            </div>
            </!-->
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->