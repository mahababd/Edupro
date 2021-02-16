<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>List of Registered Learners</b></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>

            </div>
        </div>
        <div class="card-body p-0" style="padding: 15px;">
            <table class="table table-striped projects dataTable-show">
                <thead>
                    <tr>

                        <th >
                            Learner's ID
                        </th>
                        <th >
                            First Name
                        </th>
                        <th >
                            Last Name
                        </th>
                        <th >
                            Qualification
                        </th>
                        <th >
                            Registration Date
                        </th>
                        <th >
                            Gender
                        </th>
                        <th >
                            Date of Birth
                        </th>

                        <th >
                            Email
                        </th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data) && is_array($data)):
                        foreach ($data as $datum):
                            ?>
                            <tr id="rec-<?= $datum->id; ?>">
                                <td>                              
                                </td>
                                <td>
        <?= $datum->first_name; ?>
                                </td>
                                <td>
        <?= $datum->last_name; ?>
                                </td>
                                <td align="center">
                                    <a class="btn btn-success btn-sm assign-qual" href="#" id="assign-qual" title="Assign Qualification" data-id="<?= $datum->id; ?>">
                                        <i class="fas fa-paperclip">
                                        </i>
                                    </a>
                                </td>
                                <td>
        <?= $datum->create_date; ?>
                                </td>
                                <td>
        <?= $datum->gender; ?>
                                </td>

                                <td>
        <?= $datum->dob; ?>
                                </td>
                                <td>
        <?= $datum->email; ?>
                                </td>




                                <td class="project-actions text-right">

                                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>learners?id=<?= $datum->id; ?>" title="Detail">
                                        <i class="fas fa-list">
                                        </i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#" title="Edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>

                                    </a>
                                    <a class="btn btn-danger btn-sm del-learner" href="#" title="Delete" data-id="<?= $datum->id; ?>">
                                        <i class="fas fa-trash">
                                        </i>

                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    endif;
                    ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>