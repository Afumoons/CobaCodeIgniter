<div class="container">
    <!-- flash data disimpan di data supaya mudah diambil di jquery -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- notifikasi -->
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Data Mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                </div>
            </div>
        </div> -->

    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>


    <!-- <div class="col-sm-3"> -->
    <h3>Daftar Mahasiswa</h3>
    <!-- </div> -->
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari
                        </button></div>
                </div>
            </form>
        </div>
        <div class="col-sm-3 ">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>
    <div class="row" style="">
        <div class="col-sm-8">
            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Data Mahasiswa Tidak Ditemukan.</strong>
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item"><?= $mhs['NPM']; ?>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['NPM']; ?>" class="badge badge-danger float-right tombol-hapus">Hapus</a>
                        <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['NPM']; ?>" class="badge badge-success float-right">Ubah</a>
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['NPM']; ?>" class="badge badge-primary float-right">Detail</a>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>


    </div>
</div>