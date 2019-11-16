<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



</div>
<!-- /.container-fluid -->

<div class="row">
    <div class="col-lg ml-3 mr-3">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">ADD NEW MEMBERS</a>

        <?= $this->session->flashdata('message'); ?>

        <table class="table table-striped table-dark table-hover  table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Full Name</th>
                    <th scope="col" class="text-center">Member Email</th>
                    <th scope="col" class="text-center">Profile Image</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dataMember as $sm) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i ?></th>
                        <td><?= $sm['name'] ?></td>
                        <td class="text-center"><?= $sm['email'] ?></td>
                        <td class="text-center"><?= $sm['image'] ?></td>
                        <?php if ($sm['role_id'] == '1') : ?>
                            <td class="text-center">ADMIN</td>
                        <?php elseif ($sm['role_id'] == '2') : ?>
                            <td class="text-center">MEMBER</td>
                        <?php endif; ?>
                        <?php if ($sm['is_active'] == '1') : ?>
                            <td class="text-center">ACTIVE</td>
                        <?php elseif ($sm['role_id'] == '0') : ?>
                            <td class="text-center">NOT ACTIVATED></td>
                        <?php endif; ?>

                        <td>
                            <a href="<?= base_url(); ?>admin/updateMember/<?= $sm['id']; ?>" class="badge badge-primary mb-3" data-toggle="modal" data-target="#editSubMenuModal">EDIT</a>
                            <a href="<?= base_url(); ?>admin/hapusMember/<?= $sm['id']; ?>" class="badge badge-danger mb-3">DELETE</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="#newSubMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModal">Add New Cars</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/configuser'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Member">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="passsword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="role_id" id="role_id">
                            <option value=''>ROLE</option>
                            <option value="1">ADMIN</option>
                            <option value="2" selected>USER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="is_active" id="is_active">
                            <option value=''>Active This User ?</option>
                            <option value="1" selected>ACTIVE</option>
                            <option value="0">BAN USER</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($dataMember as $sm) : ?>
    <!-- Modal edit -->
    <div class="modal fade" id="editSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="#editSubMenuModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubMenuModal">Edit Cars</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/updateMobilAdmin/<?= $sm['id']; ?>" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden type="text" class="form-control" value="<?= $sm['id']; ?>" id="id" name="id" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $sm['name']; ?>" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="merk" id="merk" placeholder="Name Car">
                                <?php if ($sm['merk'] == 'Lamborghini Sián') : ?>
                                    <option value=''>Cars Model</option>
                                    <option value="Lamborghini Sián" selected>Lamborghini Sián</option>
                                    <option value="McLaren">McLaren</option>
                                    <option value="Ferrari">Ferrari</option>
                                <?php elseif ($sm['merk'] == 'McLaren') : ?>
                                    <option value=''>Cars Model</option>
                                    <option value="Lamborghini Sián">Lamborghini Sián</option>
                                    <option value="McLaren" selected>McLaren</option>
                                    <option value="Ferrari">Ferrari</option>
                                <?php elseif ($sm['merk'] == 'Ferrari') : ?>
                                    <option value=''>Cars Model</option>
                                    <option value="Lamborghini Sián">Lamborghini Sián</option>
                                    <option value="McLaren">McLaren</option>
                                    <option value="Ferrari" selected>Ferrari</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type" id="type" placeholder="Name Car">
                                <?php if ($sm['type'] == 'FKP 37') : ?>
                                    <option value=''>Cars Type</option>
                                    <option value="FKP 37" selected>FKP 37</option>
                                    <option value="MCL34">MCL34</option>
                                    <option value="812 GTS">812 GTS</option>
                                <?php elseif ($sm['type'] == 'MCL34') : ?>
                                    <option value=''>Cars Type</option>
                                    <option value="FKP 37">FKP 37</option>
                                    <option value="MCL34" selected>MCL34</option>
                                    <option value="812 GTS">812 GTS</option>
                                <?php elseif ($sm['type'] == '812 GTS') : ?>
                                    <option value=''>Cars Type</option>
                                    <option value="FKP 37">FKP 37</option>
                                    <option value="MCL34">MCL34</option>
                                    <option value="812 GTS" selected>812 GTS</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $sm['harga']; ?>" id="harga" name="harga" placeholder="Price Deal">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $sm['nomorhp']; ?>" id="nomorhp" name="nomorhp" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>