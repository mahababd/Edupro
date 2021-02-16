<?php load_js("dist/js/jsonmap.js"); ?>
<?php
foreach ($profile_details as $udetails) {

    $fullname = $udetails->fullname;
    $designation = $udetails->designation;
    $department = $udetails->department;
    $phone = $udetails->phone;
    $mobile = $udetails->mobile;
    $email = $udetails->user_email;
    $national_id = $udetails->national_id;
    $update_date = $udetails->update_date;

}
?>
<form class="form-horizontal" id="user_update">
    <div class="">
        <div class="">
            <div class="form-group" align="justify"></div>
            <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label"><?php echo load_message('FULL_NAME'); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fullname" id="fullname"
                           value="<?php echo $fullname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputExperience" class="col-sm-3 control-label"><?php echo load_message('EMAIL'); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="user_email" id="user_email"
                           value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputExperience" class="col-sm-3 control-label"><?php echo load_message('PHONE'); ?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="+88" disabled>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control number-only" maxlength="11" name="phone" id="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('MOBILE'); ?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="+88" disabled>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control number-only" maxlength="11" name="mobile" id="mobile" value="<?php echo $mobile; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('N_ID'); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="national_id" id="national_id"
                           value="<?php echo $national_id; ?>">
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.nav-tabs-custom -->

    <div align="center">
        <div align="center">
            <button type="submit" class="btn btn-primary"
                    onClick="handle_form('user_update',user_update_json,'user/details_edit',<?php echo $this->session->userdata('user_db_id'); ?>);"
                    id="user_update"><?php echo load_message('UPDATE_MY_DETAILS'); ?>
            </button>
        </div>

    </div>
</form>
<!-- /.box-footer-->

