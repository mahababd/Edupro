<?php

class error_404 extends ADMIN_Controller
{

    public function index()
    {

        $this->set_page_title('Page Not Nound');
        $this->set_page_sub_title('Error 404 cooured');

        $this->load_view('admin/err/err_404');
    }

}
