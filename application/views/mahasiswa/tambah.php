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
						<div class="form-group">
							<label for="npm">NPM</label>
							<input type="text" id="npm" class="form-control" name="npm">
							<small id="helpId" class="text-danger form-text"><?= form_error('npm'); ?></small>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" id="nama" class="form-control" name="nama">
							<small id="helpId" class="text-danger form-text"><?= form_error('nama'); ?></small>
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan / Program Studi</label>
							<select class="form-control" id="jurusan" name="jurusan">
								<?php foreach ($jurusan as $j) : ?>
									<option><?= $j['nama_jurusan']; ?></option>
								<?php endforeach; ?> </select>
							<small id="helpId" class="text-danger form-text"><?= form_error('jurusan'); ?></small>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>