var current_learner_id = null;

$(document).ready(function () {
    $("#add-new-learner").click(function () {
        post_data = learner_form_data_process();
        console.log(post_data);

        $.ajax({
            type: "POST",
            data: {learner_data: post_data},
            url: base_url + 'learners/add_new',
            success: function (result)
            {
                if (result == 1)
                    alert('success');
                else
                    alert('Failed');
            }
        });
    });


    //Show Qualification Moal
    $(".assign-qual").click(function () {
        $(".modal-dialog").css({"max-width": "600px"});
        $("#modal-body").html("").css({"max-height": "500px", "overflow": "scroll"});

        current_learner_id = $(this).data("id");
        // alert(learner_id);
        $.ajax({
            type: "POST",
            data: {learner_id: current_learner_id},
            url: base_url + 'learners/assign_qualification',
            success: function (result)
            {
                if (result != 0)
                {

                    var qualJson = JSON.parse(result);
                    var checked = "";
                    var style = "font-weight:400";

                    $.each(qualJson.qual, function (key, val) {
                        //console.log(val);

                        $.each(qualJson.assign, function (k, v) {

                            if (v.qual_id == parseInt(val.id)) {
                                console.log(v.qual_id);
                                checked = " checked ";
                                style = "font-weight:700";
                            }

                        });


                        chk = '<div class="checkbox" ><label style="' + style + '" class="qula-check"> <input type="checkbox" class="qual_check" value="' + val.id + '" ' + checked + '> ' + val.qual_name + '</label></div>';
                        $("#modal-body").append(chk);

                        checked = "";
                        style = "font-weight:400";
                    });

                } else
                    alert('Failed');
            }
        });

        $("#modal-title").html("Qualificaiton");

        $('#modal').modal('show');
    });


    //Modal Save button click
    $(document).on("click", "#modal-save-button", function () {
        //submit qual assign form
        //
        //
        var qual_list = $(".qual_check:checked").map(function () {
            return this.value;
        }).get();


        // console.log(qual_list);
        var post_data = {
            'learner_id': current_learner_id,
            'qual_list': qual_list
        };

        $.ajax({
            type: "POST",
            data: {post_data: post_data},
            url: base_url + 'learners/assign_qualification_save',
            success: function (result)
            {
                if (result == 1){
                    alert('Qualification Added Successfully');
                    $('#modal').modal('hide');
                }
                    
                else
                    alert('Some error occured. Please select any qualification');
            }
        });

    });
    
    $(document).on("click",".del-learner",function(){
       if(confirm("Do you want to remove this learner") == true){
           remove_learner($(".del-learner").data("id"));
       }
    });

});


function remove_learner(id){
        
        $.ajax({
            type: "POST",
            data: {'learner_id': id},
            url: base_url + 'learners/remove',
            success: function (result)
            {
                if (result == 1){
                    //alert('Successfully removed');
                    $("#rec-"+id).remove();                   
                }
                    
                else
                    alert('Some error occured.');
            }
        });
}




function learner_form_data_process() {
    first_name = $("#first-name").val();
    last_name = $("#last-name").val();
    gender = $("#gender").val();
    dob = $("#dob").val();
    email = $("#email").val();
    mobile = $("#mobile").val();
    home_phone = $("#home-phone").val();
    nid = $("#nid").val();
    passport_number = $("#passport-number").val();
    address = $("#address").val();
    line1 = $("#line1").val();
    line2 = $("#line2").val();
    city = $("#city").val();
    country = $("#country").val();

    var learner = {
        'center_id': 1,
        'first_name': first_name,
        'last_name': last_name,
        'gender': gender,
        'dob': dob,
        'email': email,
        'mobile': mobile,
        'home_phone': home_phone,
        'nid': nid,
        'passport_number': passport_number,
        'mailing_address': address,
        'line1': line1,
        'line2': line2,
        'city': city,
        'country': country
    };

    return learner;

}









