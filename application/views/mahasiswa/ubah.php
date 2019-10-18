<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<strong><?= validation_errors(); ?></strong>
						</div>
					<?php endif; ?> -->
                    <!-- jika action kosong = data dikirim kembali ke halaman ini (controller tambah) -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mahasiswa['NPM']; ?>">
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" id="npm" class="form-control" name="npm" value="<?= $mahasiswa['NPM']; ?>">
                            <small id="helpId" class="text-danger form-text"><?= form_error('npm'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" name="nama" value="<?= $mahasiswa['nama_mahasiswa']; ?>">
                            <small id="helpId" class="text-danger form-text"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan / Program Studi</label>
                            <select class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa['jurusan']; ?>">
                                <?php foreach ($jurusan as $j) : ?>
                                    <?php if ($j['nama_jurusan'] == $mahasiswa['jurusan_mahasiswa']) : ?>
                                        <option value="<?= $j['nama_jurusan']; ?>" selected><?= $j['nama_jurusan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j['nama_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?> </select>
                            </select>
                            <small id="helpId" class="text-danger form-text"><?= form_error('jurusan'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>