<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    People Data Detail
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $peoples['people_id']; ?></h5>
                    <p class="card-text"><?= $peoples['people_name']; ?></p>
                    <p class="card-text"><?= $peoples['people_address']; ?></p>
                    <p class="card-text"><?= $peoples['people_email']; ?></p>
                    <a href="<?= base_url(); ?>peoples" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>