<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Userame</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="name" class="form-control" value="<?= $user['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" value="<?= $user['user_email']; ?>">
                </div>
                <?= form_error('email', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Picture</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?= base_url('assets/img/profile/') . $user['user_image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-8">

                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose File </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->