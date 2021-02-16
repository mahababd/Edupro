$(document).ready(function () {
    $("#add-new-center").click(function () {
        post_data = form_data_process();
        console.log(post_data);
                
        $.ajax({
            type: "POST",
            data: {post_data: post_data},
            url: base_url + 'center/process',
            success: function (result)
            {
                if (result == 1)
                    alert('success');
                else if(result == 'er02')
                    alert('Center is already exists');
                else
                    alert('Failed');
            }
        });
    });
});


function form_data_process() {
    center_name = $("#center-name").val();
    leason_office_name = $("#leason-office").val();
    leason_office_email = $("#leason-office-email").val();
    project_managers_name = $("#project-man-name").val();
    project_managers_email = $("#project-man-email").val();
    center_code = $("#center-code").val();
    date_of_approval = $("#date-of-approval").val();
    date_of_review = $("#date-of-review").val();
    agreed_minimum_invoice = $("#agreed-min-invoice").val();
    center_address = $("#center-address").val();


    var data = {
        'center_name': center_name,
        'leason_office_name': leason_office_name,
        'leason_office_email': leason_office_email,
        'project_managers_name': project_managers_name,
        'project_managers_email': project_managers_email,
        'center_code': center_code,
        'date_of_approval': date_of_approval,
        'date_of_review': date_of_review,
        'agreed_minimum_invoice': agreed_minimum_invoice,
        'center_address': center_address,
       
    };

    return data;

}





