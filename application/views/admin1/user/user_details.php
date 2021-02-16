<?php
foreach ($profile_details as $udetails) {
    $employee_id = $udetails->employee_id;
    $user_name = $udetails->user_name;
    $user_email = $udetails->user_email;
    $user_nicename = $udetails->user_nicename;
    $user_role = $udetails->user_role;
    $role_name = $udetails->role_name;
    $office_name = $udetails->office_name;


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
            <div class="form-group"></div>
            <!-- Credential Information -->
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('EMPLOYEE_ID'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $employee_id; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('USER_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $user_name; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label"><?php echo load_message('EMAIL'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $user_email; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('NICE_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $user_nicename; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('OFFICE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $office_name; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('USER_ROLE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $role_name; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('USER_STATUS'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php if ($user_status == 1) {
                            echo "Active";
                        } else {
                            echo "Inactive";
                        } ?>" readonly="readonly" style="background-color:white;">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
            <div class="form-group"></div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('FULL_NAME'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $fullname; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('DESIGNATION'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $designation; ?>"
                        readonly="readonly" style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('DEPARTMENT'); ?></label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputName" value=" <?php echo get_department_name($department);?>"
                         readonly="readonly" style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('PHONE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $phone; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('MOBILE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $mobile; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>

                </div>

                <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('HR_ID'); ?></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputName" value=" <?php echo $hr_id; ?>"
                       readonly="readonly" style="background-color:white;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label"><?php echo load_message('N_ID'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $national_id; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>

            </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
            <div class="form-group"></div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputName"
                           class="col-sm-3 control-label"><?php echo load_message('DISTRICT'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value="<?php if($posting_district<0){ echo""; }else {echo $posting_district;} ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail"
                           class="col-sm-3 control-label"><?php echo load_message('UPAZELLA'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $posting_upazella; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="inputName" class="col-sm-3 control-label"><?php echo load_message('VILLAGE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $posting_village; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="inputExperience"
                           class="col-sm-3 control-label"><?php echo load_message('POSTCODE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $posting_postcode; ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('CREATE_DATE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php echo get_format_date($create_date); ?>"
                               readonly="readonly"
                               style="background-color:white;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSkills"
                           class="col-sm-3 control-label"><?php echo load_message('UPDATE_DATE'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" value=" <?php if($update_date <> NULL){echo get_format_date($update_date);}?>"
                               readonly="readonly"
                               style="background-color:white;">
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
        
             