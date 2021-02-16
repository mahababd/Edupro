<div class="col-md-12">
    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registration Information</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>

            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="" class="control-label">E-mail/ID</label>
                <input type="email" class="form-control" id="user_email" placeholder="<?php echo load_message('EMAIL'); ?>">
            </div><!--/Email -->

            <div class="form-group">
                <label for="" class="control-label">Password
                    <span class="text-danger">*</span></label>
                <input type="password" class="form-control" autocomplete="off" id="user_pass" placeholder="<?php echo load_message('PASSWORD'); ?>">
            </div><!--/password -->

            <div class="form-group">
                <label for="" class="control-label">Full Name
                    <span class="text-danger">*</span></label>
                <input type="text" class="form-control" autocomplete="off" id="full_name" placeholder="<?php echo load_message('FULL_NAME'); ?>">
            </div><!--/password -->

            <div class="form-group">
                <label class="control-label">User Center <span class="text-danger">*</span></label>
                <?php //var_dump($center_list); ?>
                <select class="form-control select2" id="user_role">

                    <?php
                    //var_dump($role_list);
                    if (isset($center_list) && is_array($center_list)):

                        foreach ($center_list as $center):
                            $center_id = $center->id;
                            $center_name = $center->center_name;
                            ?>
                            <option value="<?= $center_id; ?>"><?php echo $center_name; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div><!-- /Role -->

            <div class="form-group">
                <label class="control-label">User Role <span class="text-danger">*</span></label>
                <select class="form-control select2" id="user_role">
                    <option value=""><?php echo load_message('SELECT_USER_ROLE'); ?></option>
                    <?php
                    //var_dump($role_list);
                    foreach ($role_list as $rlist):
                        $role_id = $rlist->role_id;
                        $role_name = $rlist->role_name;
                        ?>
                        <option value="<?= $role_id; ?>"><?php echo $role_name; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div><!-- /Role -->

            <div class="form-group">
                <select name="user_status" id="user_status" class="form-control">
                    <option value="1" selected="selected">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div><!-- Status -->

            <button type="button" id="add-new-user" class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new user</button>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
