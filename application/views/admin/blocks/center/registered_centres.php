<?php //var_dump($data);?>
<div class="col-md-12">
    <!-- Default box -->
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
                            Center Code
                        </th>
                        <th >
                            Center Name
                        </th>
                        <th >
                            Leason Office Name
                        </th>
                        <th >
                            Leason Office Email
                        </th>
                        <th >
                            Project Manager Name
                        </th>
                        <th >
                            Date of Approval
                        </th>
                       

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $datum): ?>
                        <tr>
                            <td>   <?= $datum->center_code; ?> </td>                          
                            
                            <td>
                                <?= $datum->center_name; ?><br>
                                 <small><?= $datum->center_address; ?></small>
                            </td>
                            <td>
                                <?= $datum->leason_office_name; ?>
                            </td>
                           
                            <td>
                                <?= $datum->leason_office_email; ?>
                            </td>
                            <td>
                                <?= $datum->project_managers_name; ?>
                            </td>

                            <td>
                                <?= $datum->date_of_approval; ?>
                            </td>

                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>center?id=<?= $datum->id; ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>