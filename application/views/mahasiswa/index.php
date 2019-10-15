<div class="container">
    <div class="row">
        <div class="col-mt-3">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item"><?= $mhs['NPM']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>