<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    People Data <strong><?= $this->session->flashdata('flash'); ?></strong>.
                </div>
            </div>
        </div>
    <?php endif; ?>


    <h3 class="mt-3">List of Peoples</h3>
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Peoples" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search
                        </button></div>
                </div>
            </form>
        </div>
        <div class="col-sm-3 ">
            <a href="<?= base_url(); ?>peoples/add" class="btn btn-primary">Add New Peoples</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peoples as $people) : ?>
                        <tr>
                            <th><?= $people['people_id']; ?></th>
                            <td scope="row"><?= $people['people_name']; ?></td>
                            <td><?= $people['people_email']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>peoples/delete/<?= $people['people_id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Are you sure?');">Delete</a>
                                <a href="<?= base_url(); ?>peoples/edit/<?= $people['people_id']; ?>" class="badge badge-success float-right">Edit</a>
                                <a href="<?= base_url(); ?>peoples/detail/<?= $people['people_id']; ?>" class="badge badge-primary float-right">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

</div>