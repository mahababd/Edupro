<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">


    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ams-name-title hidden-xs">
                Asset Management System
            </div>
            <div class="pull-left image">
                <?php load_img("dist/img/location.png", ' class="img-responsive" alt="Office Image"'); ?>
            </div>
            <div class="pull-left info">
                <p><?php get_office_name($this->session->userdata('user_center')); ?></p>
                <a href="#"><?= get_office_address($this->session->userdata('user_center')); ?></a>
            </div>
            
        </div>
        
        <!-- search form -->
<!--        <form action="<?php echo base_url(); ?>search" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>"
                       class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php get_nav(); ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>