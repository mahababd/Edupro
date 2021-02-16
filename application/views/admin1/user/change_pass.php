<?php load_js("dist/js/jsonmap.js"); ?>
<form class="form-horizontal" id="change_passw">
    <div class="">
        <div class="">
            <div class="form-group" align="justify"></div>
            <div class="form-group">
                <label for="current_pass"
                       class="col-sm-3 control-label"><?php echo load_message('CURRENT_PASSWORD'); ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="current_pass" id="current_pass">
                </div>
            </div>
            <div class="form-group">
                <label for="new_pass" class="col-sm-3 control-label"><?php echo load_message('NEW_PASSWORD'); ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="new_pass" id="new_pass">
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_pass"
                       class="col-sm-3 control-label"><?php echo load_message('CONFIRM_PASSWORD'); ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.nav-tabs-custom -->

    <div align="center">
        <div align="center">
            <button type="submit" class="btn btn-primary"
                    onClick="handle_form('change_passw',change_password,'user/change_pass',<?php echo $this->session->userdata('user_db_id'); ?>);"
                    id="user_update"><?php echo load_message('UPDATE_PASSWORD'); ?>
            </button>
        </div>

    </div>
</form>
<!-- /.box-footer-->