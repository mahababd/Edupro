<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Login information
                </div>
            </div><!--/panel heading -->

            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('EMAIL'); ?></label>
                    <input type="email" class="form-control" id="user_email" placeholder="<?php echo load_message('EMAIL'); ?>">
                </div><!--/Email -->

                <div class="form-group">
                    <label for="" class="control-label  sr-only"><?php echo load_message('PASSWORD'); ?>
                        <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" autocomplete="off" id="user_pass" placeholder="<?php echo load_message('PASSWORD'); ?>">
                </div><!--/password -->

                <div class="form-group">
                    <label for="" class="control-label  sr-only"><?php echo load_message('FULL_NAME'); ?>
                        <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" autocomplete="off" id="full_name" placeholder="<?php echo load_message('FULL_NAME'); ?>">
                </div><!--/password -->

                <div class="form-group">
                    <label class="control-label  sr-only"><?php echo load_message('USER_ROLE'); ?> <span class="text-danger">*</span></label>
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
                    </select>
                </div><!-- Status -->
                
                <button type="button" id="add-user" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add new user</button>
            </div><!--/panel body -->
        </div><!--/panel -->
    </div><!-- /col-md-6-->