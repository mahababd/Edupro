/* user Managment */

$(document).ready(function (event) {
    $("#add-user").click(function () {
        user_email = $("#user_email").val();
        user_pass = $("#user_pass").val();
        user_nicename = $("#full_name").val();
        user_role = $("#user_role").val();
        user_status = $("#user_status").val();
        

        $.ajax({
            type: "POST",
            data: {
                form_submit: '200',
                user_email: user_email,
                user_pass: user_pass,
                user_role: user_role,
                user_status: user_status,
                user_nicename:user_nicename
            },
            url: base_url + 'user/adduser',
            success: function (res)
            {
                alert(res);
            },
            beforeSend: function () {
                // $("#ajax-return").html("Loading Data. Please Wait.................");
            }

        });
    });
});