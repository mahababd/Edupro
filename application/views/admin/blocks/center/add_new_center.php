<!-- button ribbon -->
<div class="col-md-12">

    <div style="display: inline-block; float: right;">
        <button class="btn btn-app">
            <i class="fas fa-download"></i> CV
        </button>
        <a href="<?=base_url();?>center" class="btn btn-app">
            <i class="fas fa-list"></i> List
        </a>
        <button class="btn btn-app" id="add-new-center">
            <i class="fas fa-save"></i> Save
        </button>
    </div>

</div>
<!-- /button ribbon -->

<div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add new center</h3>
            </div>
            <!-- /.card-header -->
            <div class="col-md-6">
                <!-- form start -->
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="center-name">Center Name</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>

                        <div class="form-group">
                            <label for="center-address">Center Address</label>
                            <textarea class="form-control" id="center-address" placeholder="Center Address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Leason Office Name</label>
                            <input type="text" class="form-control" id="leason-office" placeholder="Leason Office">
                        </div>

                        <div class="form-group">
                            <label for="">Leason Office Email</label>
                            <input type="email" class="form-control" id="leason-office-email" placeholder="Email">
                        </div>


                        <div class="form-group">
                            <label for="">Project Manager's Name</label>
                            <input type="text" class="form-control" id="project-man-name" placeholder="Project Manager's Name">
                        </div>

                        <div class="form-group">
                            <label for="">Project Manager's Email</label>
                            <input type="email" class="form-control" id="project-man-email" placeholder="Project Manager's Email">
                        </div>

                        <div class="form-group">
                            <label for="">Center Code</label>
                            <input type="text" class="form-control" id="center-code" placeholder="Center Code">
                        </div>

                        <div class="form-group">
                            <label for="">Date of Approval</label>
                            <input type="text" class="form-control" id="date-of-approval" placeholder="Date of Approval">
                        </div>

                        <div class="form-group">
                            <label for="">Date of Review</label>
                            <input type="text" class="form-control" id="date-of-review" placeholder="Date of Review">
                        </div>


                        <div class="form-group">
                            <label for="center-name">Agreed Minimum Invoice</label>
                            <input type="text" class="form-control" id="agreed-min-invoice" placeholder="Agreed Minimum Invoice">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div><!-- /.card -->
</div>