<!-- PERSONAL INFORMATION AREA -->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    HR information
                </div>
            </div><!--/panel heading -->

            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('FULL_NAME'); ?></label>
                    <input type="text" class="form-control" id="fullname" placeholder="<?php echo load_message('FULL_NAME'); ?>">
                </div><!-- /Full name -->

                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('DESIGNATION'); ?></label>

                    <select class="form-control" id="designation">
                        <option>Select Designation</option>
                    </select>
                </div><!--/Designation -->

                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('PHONE'); ?></label>
                    <input type="text" class="form-control number-only" maxlength="11" id="phone" placeholder="<?php echo load_message('PHONE'); ?>">
                </div>

                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('HR_ID'); ?></label>
                    <input type="text" class="form-control" id="hrid" placeholder="<?php echo load_message('HR_ID'); ?>">
                </div>

                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('N_ID'); ?></label>
                    <input type="text" class="form-control" id="national_id" placeholder="<?php echo load_message('N_ID'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('OFFICE'); ?></label>
                    <input type="text" class="form-control" id="office" placeholder="<?php echo load_message('OFFICE'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="" class="control-label sr-only"><?php echo load_message('CATEGORY'); ?></label>
                    <select  class="form-control" id="category">
                        <option>Regular</option>
                    </select>
                </div>


            </div><!--/panel body -->
        </div><!--/panel -->
    </div><!-- /col-md-4-->
</div> <!-- /row -->