<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add People Data Form
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<strong><?= validation_errors(); ?></strong>
						</div>
					<?php endif; ?> -->
                    <!-- jika action kosong = data dikirim kembali ke halaman ini (controller tambah) -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" id="id" class="form-control" name="id">
                            <small id="helpId" class="text-danger form-text"><?= form_error('id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name">
                            <small id="helpId" class="text-danger form-text"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address">
                            <small id="helpId" class="text-danger form-text"><?= form_error('address'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email">
                            <small id="helpId" class="text-danger form-text"><?= form_error('email'); ?></small>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary float-right">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>