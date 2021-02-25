<?php 

class home extends CI_Controller{

 public function index()
 {
    //  echo "this is the home controller";
     
    $data['main_view']="home_view";
    $this->load->view('layouts/main',$data);
 }

}

?>