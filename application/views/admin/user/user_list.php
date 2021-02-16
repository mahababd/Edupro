<!-- Small boxes (Stat box) -->
<!-- /.row -->
<!-- Main row --><!-- /.row (main row) -->
<!-- Main content -->
<style>

</style>
<section class="content">

    <!-- Default box -->
    <div class="box box-success">
        <!-- <div class="box-header">
          <h3 class="box-title">Data Table of All User</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover dataTable-full-functional">
                <thead>
                <tr>
                    <th width="10">#</th>
                    <th width="160"><?php echo load_message('FULL_NAME'); ?></th>
                    <th width="100"><?php echo load_message('USER_NAME'); ?></th>
                    <th width="120"><?php echo load_message('DESIGNATION'); ?></th>
                    <th width="140"><?php echo load_message('DEPARTMENT'); ?></th>
                    <th width="100"><?php echo load_message('POSTING_CENTER'); ?></th>
                    <th width="130"><?php echo load_message('EMAIL'); ?></th>
                    <th width="80"><?php echo load_message('PHONE'); ?></th>
                    <th width="80"><?php echo load_message('MOBILE'); ?></th>
                    <th width="140"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
				if($user_list<>"")
				{
                foreach ($user_list as $ulist) {
                    $profileid = $ulist->profileid;
                    $userid = $ulist->userid;
                    $user_name = $ulist->user_name;
                    $employee_id = $ulist->employee_id;
                    $fullname = $ulist->fullname;
                    $designation = $ulist->designation;
                    $department = $ulist->department;
                    $email = $ulist->user_email;
                    $phone = $ulist->phone;
                    $mobile = $ulist->mobile;
                    $user_posting = $ulist->posting_center;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $fullname; ?>
                        </td>
                        <td><?php echo $user_name;?></td>
                        <td><?php echo $designation; ?></td>
                        <td><?php echo get_department_name($department); ?></td>
                        <td><?php  get_office_name($user_posting);?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $mobile; ?></td>
                        <td>
                            <?php if (permission_check('user/userlist')) { ?>
                                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-default"
                                   title="Show Profile" onclick="profile_details('<?php echo $userid; ?>');"><i
                                            class="fa fa-list-alt fa-x"></i></a>
                            <?php }
                            if (permission_check('user/update')) { ?>
                                &nbsp;<a href="#" class="btn btn-primary btn-xs" data-toggle="modal"
                                         data-target="#modal-default" title="Edit Profile"
                                         onclick="profile_edit('<?php echo $userid; ?>');"><i
                                            class="fa fa-pencil fa-x"></i></a>
                            <?php }
                            if (permission_check('user/delete')) { ?>
                                &nbsp;<a href="#" title="Delete Profile"
                                         onclick="return profile_delete('<?php echo $userid; ?>');"
                                         class="btn btn-danger btn-xs">
                                 <i class="fa fa-trash fa-x" aria-hidden="true"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
				}
                ?>
                </tbody>
            </table>
        </div>

        <!-- /.box-body -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo load_message('USER_PROFILE_DETAILS'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div id="profile_details"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal"><?php echo load_message('CLOSE') ?></button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!--    Modal end here -->
    <!-- /.box -->


</section>
<!-- /.content -->