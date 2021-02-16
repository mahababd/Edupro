<section class="content">

    <!-- Default box -->
    <div class="box box-success">
        <div class="box-header">

        </div>
        <div class="box-body" id="registration_form">
            <form class="form-horizontal" id="user_change_password">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" align="justify"></div>
                        <div>
                            <label class="control-label"><?php echo load_message('USER_NAME'); ?><span
                                        class="text-danger">*</span></label>
                            <select class="form-control select2" id="id" name="id">
                                <option value=""><?php echo load_message('SELECT_USER'); ?>
                                </option>
                                <?php
                                foreach ($user_list as $uslist) {
                                    $userid = $uslist->userid;
                                    $name = $uslist->fullname;
                                    $designation = $uslist->designation;
                                        ?>
                                        <option value="<?php echo $userid; ?>"><?php echo $name; ?>
                                            -<?php echo $designation; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="new_pass" class="control-label"><?php echo load_message('NEW_PASSWORD'); ?></label>
                            <div class="">
                                <input type="password" class="form-control" name="new_pass" id="new_pass">
                            </div>
                        </div>
                        <div>
                            <label for="confirm_pass" class="control-label"><?php echo load_message('CONFIRM_PASSWORD'); ?></label>
                            <div class="">
                                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.nav-tabs-custom -->

                <div align="right">
                        <button type="submit" class="btn btn-success btn-lg"
                                onClick="handle_form('user_change_password',user_change_password,'user/user_change_password',0);"
                                id="user_update"><?php echo load_message('UPDATE_PASSWORD'); ?>
                        </button>

                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.box-footer-->