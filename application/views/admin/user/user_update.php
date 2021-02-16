<?php load_js("dist/js/jsonmap.js"); ?>
<?php
foreach ($profile_details as $udetails) {
    $user_id = $udetails->id;
    $employee_id = $udetails->employee_id;
    $user_name = $udetails->user_name;
    $user_email = $udetails->user_email;
    $user_nicename = $udetails->user_nicename;
    $user_role = $udetails->user_role;
    $posting_center = $udetails->posting_center;

    $fullname = $udetails->fullname;
    $designation = $udetails->designation;
    $department = $udetails->department;
    $phone = $udetails->phone;
    $mobile = $udetails->mobile;


    $posting_district = $udetails->posting_district;
    $posting_upazella = $udetails->posting_upazella;
    $posting_village = $udetails->posting_village;
    $posting_postcode = $udetails->posting_postcode;
    $hr_id = $udetails->hr_id;
    $national_id = $udetails->national_id;
    $user_status = $udetails->user_status;
    $create_date = $udetails->create_date;
    $update_date = $udetails->update_date;

}
?>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#credential" data-toggle="tab"><?php echo load_message('USER_CREDENTIAL'); ?></a>
        </li>
        <li><a href="#timeline" data-toggle="tab"><?php echo load_message('PERSONAL_DETAILS'); ?></a></li>
        <li><a href="#settings" data-toggle="tab"><?php echo load_message('CURRENT_POSTING'); ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="credential">
            <div class="form-group" align="justify"></div>
            <!-- Credential Information -->
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('USER_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="user_name" value="<?php echo $user_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('EMPLOYEE_ID'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="employee_id" value="<?php echo $employee_id; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('NICE_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nice_name" value="<?php echo $user_nicename; ?>">
                    </div>
                </div>

                <div class="form-group" style="display:none;">
                    <label for="exampleInputPassword1"
                           class="col-sm-3 control-label"><?php echo load_message('PASSWORD'); ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="user_pass" placeholder="Password" value="abc"
                               readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label"><?php echo load_message('EMAIL'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="user_email" value="<?php echo $user_email; ?>">
                    </div>

                </div>

                <?php if($this->session->userdata('user_center')!=1){ ;?>
                    <input type="hidden" class="form-control" id="posting_center" value="<?php echo $this->session->userdata('user_center');?>">
                <?php } else{?>
                <div class="form-group">

                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('OFFICE'); ?></label>
                    <div class="col-sm-9">
                        <select class="form-control select2" id="posting_center">
                            <option value=""><?php echo load_message('SELECT_OFFICE'); ?></option>
                            <?php
                            //var_dump($role_list);
                            foreach ($office_list as $olist) {
                                $office_id = $olist->office_id;
                                $office_name = $olist->office_name;
                                if ($posting_center == $office_id) {
                                    ?>
                                    <option value="<?= $office_id; ?>"
                                            selected="selected"><?php echo $office_name; ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?= $office_id; ?>"><?php echo $office_name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <?php } ?>
                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('USER_ROLE'); ?></label>
                    <div class="col-sm-9">
                        <select class="form-control select2" id="user_role">
                            <option value=""><?php echo load_message('SELECT_USER_ROLE'); ?></option>
                            <?php
                            //var_dump($role_list);
                            foreach ($role_list as $rlist) {
                                $role_id = $rlist->role_id;
                                $role_name = $rlist->role_name;
                                if ($user_role == $role_id) {
                                    ?>
                                    <option value="<?= $role_id; ?>"
                                            selected="selected"><?php echo $role_name; ?></option>
                                    <?php
                                } else {
                                    if (get_user_role_name() == "SUPER_ADMIN") {
                                        ?>
                                        <option value="<?= $role_id; ?>"><?php echo $role_name; ?></option>
                                    <?php } elseif ($role_name != "SUPER_ADMIN") { ?>
                                        <option value="<?= $role_id; ?>"><?php echo $role_name; ?></option>
                                    <?php }
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
            <div class="form-group" align="justify"></div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('FULL_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fullname" value="<?php echo $fullname; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('DESIGNATION'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="designation" value="<?php echo $designation; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('DEPARTMENT'); ?> <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control select2" id="department">
                            <option value="0"><?php echo load_message('SELECT_DEPARTMENT'); ?></option>
                            <?php
                            //var_dump($role_list);
                            foreach ($dept_list as $deptlist) {
                                $dept_id = $deptlist->department_id;
                                $dept_name = $deptlist->department_name;
								if($department == $dept_id)
								{
								?>
                                <option value="<?= $dept_id; ?>" selected="selected"><?php echo $dept_name; ?></option>
                                <?php
								}
								else
								{
								?>
                                 <option value="<?= $dept_id; ?>"><?php echo $dept_name; ?></option>
                                <?php
								}
                                ?>
                               
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('PHONE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control number-only" maxlength="11" id="phone" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('MOBILE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control number-only" id="mobile" maxlength="11" value="<?php echo $mobile; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('HR_ID'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="hrid" value="<?php echo $hr_id; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('N_ID'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="national_id" value="<?php echo $national_id; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('USER_STATUS'); ?></label>
                    <div class="col-sm-9">
                        <select name="user_status" id="user_status" class="form-control select2">
                            <?php
                            if ($user_status == 1) {
                                ?>
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Inactive</option>
                                <?php
                            } else {
                                ?>
                                <option value="1">Active</option>
                                <option value="0" selected="selected">Inactive</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <!-- <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                     <button type="submit" class="btn btn-danger" onclick="return update_record('<?php //echo $user_id;?>','personal');">
                     Update Personal Details</button>
                    </div>
                  </div>
                 -->
            </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
            <div class="form-group" align="justify"></div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('DISTRICT'); ?></label>
                    <div class="col-sm-9">
                        <?php get_districts_list('','district','form-control select2',"Select District",$posting_district) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('UPAZELLA'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="upozella" value="<?php echo $posting_upazella; ?>">
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="inputName" class="col-sm-3 control-label"><?php echo load_message('VILLAGE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="village" value="<?php echo $posting_village; ?>">
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('POSTCODE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="postcode" value="<?php echo $posting_postcode; ?>">
                    </div>
                </div>


        </div>
        </form>
    </div>
    <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->

<div align="center">
    <div align="center">
        <button type="submit" class="btn btn-primary"
                onClick="return form_validation('user/update',user,'example1','<?php echo $user_id; ?>');"
                id="user_update"><i class="fa fa-pencil-square-o"></i>
            &nbsp; <?php echo load_message('UPDATE_USER_DETAILS') ?>
        </button>
    </div>

</div>

<!-- /.box-footer-->
<script>
    $('.select2').select2({width:'100%'});
</script>