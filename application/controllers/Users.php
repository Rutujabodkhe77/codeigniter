<?php
class Users extends CI_Controller
{

  // public function show()
  // {

    // $this->load->model('User_Model');
   
    // $data['results']=  $this->user_model->get_users();
    //  $this->load->view('user_view',$data   );


    // ####### Processing a result from model in a controller ###########3
       
    // $result = $this->User_Model->get_users();

    //     foreach($result as $object)
    //     {
    //         // echo $object->id;
    //         echo $object->id. "<br>";
    //         echo $object->user_name. "<br>";
    //         echo $object->password. "<br>";
    //     }
 
       
       
      // ####### Transferring data to views ##########
 
      // 1)
      //  $result = $this->User_Model->get_users();
         
       //    $data['welcome'] = "Welcome to my page";

      // $this->load->view('user_view',$data);

      //2)
    //   $data['results'] = $this->User_Model->get_users();
    //   $this->load->view('user_view',$data);
    // }

      // 3)
//       public function show($user_id)
//   {
//       $data['results'] = $this->User_Model->get_users($user_id,'rutuja');
//       $this->load->view('user_view',$data);
//   }
//   public function insert()
//   {
//     $user_name = "peter";
//     $password = "secret";

//     $this->User_Model->create_users([
//       'user_name' => $user_name,
//       'password' => $password
//     ]);
//   }
//   public function update()
//   {
//      $id = 3;

//     $user_name = "William";
//     $password = "not so secret";

//     $this->User_Model->update_users([
//       'user_name' => $user_name,
//       'password' => $password
//     ],$id);

//   }

//   public function delete()
//   {
   
//    $id = 2;
//     $this->User_Model->delete_users($id);
//   }

// }

// public function login()
//   {
   
//    echo "this work";
      // $_POST['username'];
//   }


public function register()
{
  $this->form_validation->set_rules('first_name','First Name','trim|required|min_length[3]');
  $this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[3]');
  $this->form_validation->set_rules('email','Email','trim|required|min_length[3]');
  $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
  $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
  $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');
  
  if ($this->form_validation->run() ==False)
  {

    $data['main']='users/register_view';
    $this->load->view('layouts/main',$data);
  }
  else
  {
    if($this->user_model->create_user())
    {
    redirect('home/index');
  }
  else
  {

  }

 }
}

public function login()
{
$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');

 if($this->form_validation->run()==FALSE){
    $data=array(
      'errors'=>validation_errors()
    );
    $this->session->set_flashdata($data);
   
    redirect('home'); 
 }

 else {
  $username=$this->input->post('username');
  $password=$this->input->post('password');

 $user_id = $this->user_model->login_user( $username, $password);

 if( $user_id){
  $user_data=array(
    'user_id'=>$user_id,
    'username'=>$username,
    'logged_in'=>true 
  );
 
  $this->session->set_userdata($user_data);
  $this->session->set_flashdata('login_success','you are now logged in');
            $data ['main_view']="admin_view";
          $this->load->view('layouts/main',$data);
  $this->session->set_flashdata('user_registered', 'Users has been registered');
    redirect('home/index');
  }
  else{ 
    $this->session->set_flashdata('login_failed',' sorry you are not logged in');
    redirect('home/index');
  }

  }
    // echo $this->input->post('username'); 
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect('home/index');
  }

 }

?>