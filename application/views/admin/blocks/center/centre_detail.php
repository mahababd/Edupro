<?php $data = $data[0];//var_dump(); ?>
<div class="col-md-12">
    <!-- Default box -->

    <div class="row">
        <div class="col-md-3 text-right  text-bold">Center Code:</div>
        <div class="col-md-8 "><?= $data->center_code;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Center Name:</div>
        <div class="col-md-8"><?= $data->center_name;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Leason Office Name:</div>
        <div class="col-md-8"><?= $data->leason_office_name;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Leason Office Email:</div>
        <div class="col-md-8"><?= $data->leason_office_email;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Project Manager Name:</div>
        <div class="col-md-8"><?= $data->project_managers_name;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Project Manager Email:</div>
        <div class="col-md-8"><?= $data->project_managers_email;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Date of Approval:</div>
        <div class="col-md-8"><?= $data->date_of_approval;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Date of review:</div>
        <div class="col-md-8"><?= $data->date_of_review;?></div>
    </div>

    <div class="row">
        <div class="col-md-3 text-right  text-bold">Agreed Minimum Invoice:</div>
        <div class="col-md-8"><?= $data->agreed_minimum_invoice;?></div>
    </div>
    
    <div class="row">
        <div class="col-md-3 text-right  text-bold">Address:</div>
        <div class="col-md-8"><?= $data->center_address;?></div>
    </div>

</div>