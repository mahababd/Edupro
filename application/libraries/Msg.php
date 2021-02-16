<?php
/**
 * Description of msg
 * This class will display alert message to the user using sweet alert
 * @author shahed.chaklader
 */
class msg {
    //put your code here
    
    private $msg_title ="";
    private $msg_txt ="";
    private $type = "alert";


    public  function load_msg(){
        
        echo $msg_view =
        '<div class = "sh_alert">
        <div class = "modal fade" tabindex = "-1" role = "dialog" id = "shMsg">
        <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
        <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
        </span></button>
        <h4 class = "modal-title" id="msgTitle"></h4>
        </div>
        <div class = "modal-body">
        <p id="msgTxt"></p>
        </div>
        <div class = "modal-footer">
        <button type = "button" class = "btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
        </div><!--/.modal-content -->
        </div><!--/.modal-dialog -->
        </div><!--/.modal -->

        </div><!-- end of sh_alert -->'. 
        
       "<script>
            
            function sci_alert(title, disc){
                $('#msgTitle').html(title);
                $('#msgTxt').html(disc);
                $('#shMsg').modal('show')
            }


        </script>";
        
    }

    
    
}
