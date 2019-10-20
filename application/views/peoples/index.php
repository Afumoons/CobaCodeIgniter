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
            <form action="<?= base_url('peoples'); ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search keyword" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-outline-primary" type="submit" name="submit">
                        </inp>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3 ">
            <a href="<?= base_url(); ?>peoples/add" class="btn btn-primary">Add New Peoples</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <h5>Results : <?= $total_rows; ?></h5>
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
                    <?php if (empty($peoples)) :  ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    <strong>data not found!</strong>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
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