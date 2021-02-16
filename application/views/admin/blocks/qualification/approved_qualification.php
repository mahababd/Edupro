<div class="col-md-12">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Approved Qualification List</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <?php
            if ($qual_list):
                //var_dump($qual_list);
                ?>
                <table class="table table-striped table-head-fixed projects table-hover dataTable-show">
                    <thead>
                        <tr>
                            <th >
                                Qualification Title
                            </th>
                            <th >
                                Code
                            </th>
                            <th >
                                EP Level
                            </th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($qual_list as $qual): ?>
                            <tr>
                                <td>
                                    <a>
                                        <?= $qual->qual_name; ?>
                                    </a>

                                </td>
                                <td>
                                    <?= $qual->qual_code; ?>
                                </td>
                                <td>
                                    <?= $qual->ep_level; ?>
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>qualification?qualid=<?= $qual->id; ?>">
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
    <?php endif; ?>
</div>