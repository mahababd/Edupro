<div class="col-md-6">
    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit Qualification</h3>

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
                foreach ($qual_list as $qual):
                    ?>
                    <!-- Form -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Qualification Title</label>
                                <input type="text" class="form-control" id="" placeholder="Qualification Title" value="<?= $qual->qual_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">EP level</label>
                                <input type="text" class="form-control" id="" placeholder="EP level" value=" <?= $qual->ep_level; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Code</label>
                                <input type="text" class="form-control" id="" placeholder="Code" value="<?= $qual->qual_code; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </form> 
                    <!--/Form -->
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>