<!-- button ribbon -->
<div class="col-md-12">

    <div style="display: inline-block; float: right;">
        <button class="btn btn-app">
            <i class="fas fa-download"></i> CV
        </button>
        <button class="btn btn-app">
            <i class="fas fa-list"></i> List
        </button>
        <button class="btn btn-app" id="add-new-learner">
            <i class="fas fa-save"></i> Save
        </button>
    </div>

</div>
<!-- /button ribbon -->


    <div class="col-md-5">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="first-name" placeholder="First Name">
                </div>

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" id="last-name" placeholder="last Name">
                </div>

                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" id="gender">
                        <option selected="selected">....</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="text" class="form-control datepicker" id="dob" placeholder="Date of Birth (Y-M-D)">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="email" class="form-control" id="mobile" placeholder="Mobile Number">
                </div>

                <div class="form-group">
                    <label for="">Home/Office Phone</label>
                    <input type="text" class="form-control" id="home-phone" placeholder="Home/Office Phone">
                </div>

                <div class="form-group">
                    <label for="">NID (National ID)</label>
                    <input type="text" class="form-control" id="nid" placeholder="NID (National ID)">
                </div>

                <div class="form-group">
                    <label for="">Passport Number</label>
                    <input type="text" class="form-control" id="passport-number" placeholder="Passport Number">
                </div>

            </div>
            <!-- /.card-body -->


        </div>
        <!-- /.card -->
    </div>
    <!--/ personnel information -->

    <!-- Academic information -->
    <div class="col-md-7">
        <!-- Mailing Address -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Mailing Address</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" id="address" placeholder="Address"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Line 1</label>
                    <input type="text" class="form-control" id="line1" placeholder="Line 1">
                </div>

                <div class="form-group">
                    <label for="">Line 2</label>
                    <input type="text" class="form-control" id="line2" placeholder="Line 2">
                </div>

                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City">
                </div>

                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Country">
                </div>

            </div>

            <!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Latest Qualification</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Qualification Name</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Institute</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Passing Year</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Result</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

        <!-- Employment information -->
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Employment Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Organization Name</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Designation</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">From Date</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="center-name">Address</label>
                            <input type="text" class="form-control" id="center-name" placeholder="Center Name">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </div><!--/ col -7-->