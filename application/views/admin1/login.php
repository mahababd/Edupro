<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Codeignier 3 Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <?php load_css("vendor/bootstrap/css/bootstrap.min.css"); ?>
    
    <!-- MetisMenu CSS -->
    <?php load_css("vendor/metisMenu/metisMenu.min.css"); ?>
    
    <!-- Custom CSS -->
    <?php load_css("dist/css/sb-admin-2.css"); ?>
    
    <!-- Morris Charts CSS -->
    <?php load_css("vendor/morrisjs/morris.css"); ?>
    
    <!-- Custom Fonts -->
    <?php load_css("vendor/font-awesome/css/font-awesome.min.css"); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?= base_url(); ?>login/process" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="em" type="text" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                        <a href="#">Forgot Password</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <?php load_js("vendor/jquery/jquery.min.js"); ?>
    
    <!-- Bootstrap Core JavaScript -->
    <?php load_js("vendor/bootstrap/js/bootstrap.min.js"); ?>
    
    <!-- Metis Menu Plugin JavaScript -->
    <?php load_js("vendor/metisMenu/metisMenu.min.js"); ?>
    
    <!-- Custom Theme JavaScript -->
    <?php load_js("dist/js/sb-admin-2.js"); ?>

</body>

</html>
