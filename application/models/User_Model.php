<?php 
 
 class User_Model extends CI_Model
 {   

     // 5)########### Selecting data in our DB table based on parameter ###################################3
  //   public function get_users($user_id, $user_name)
  //   {
  //         $this->db->where([
  //             'id'=>$user_id,
  //             'user_name' => $user_name
  //         ]);

  //         $query = $this->db->get('Users');
  //         return $query->result();
  //   }

  //  public function create_users($data)
  //   {
  //     $this->db->insert('users', $data );
  //   }

  //  public function update_users($data,$id)
  //   {
  //     $this->db->where(['id'=>$id]);
      
  //     $this->db->update('users', $data );
  //   }

  //  public function delete_users($id)
  //     {
  //       $this->db->where(['id'=> $id]);
  //       $this->db->delete('users'); 
      
  //     }




    // public function get_users()
//{
    
      // 1)
        //$this->load->view("home_view");
                 
       //4) ########## Helper function example ##################################################################
        //****/ the num_rows() will gives us the number/count of rows
        // $query = $this->db->query("SELECT * FROM users");
        // return $query->num_rows();

        // ***** the num_fields() will gives us the coloumns count/number
        // $query = $this->db->query("SELECT * FROM users");
        // return $query->num_fields(); 

   // 3) ######################################################################################################
    // $query = $this->db->get('Users');
    // return $query->result();
    
   //  2)#############################################################################################33

   //      $config ['hostname']= "localhost";
   //      $config ['username']= "root";
   //      $config ['password']= "";
   //      $config ['database']= "errand_db";
        
   //      $config_2 ['hostname']= "localhost";
   //      $config_2 ['username']= "root";
   //      $config_2 ['password']= "";
   //      $config_2 ['database']= "errand_db";
   
   
   // $connection=this->load->database($config);   
   // $connection_2=this->load->database($config_2);
   
//}
  
  // }


  public function create_user()
  {
    $options=['cost'=>12];
  $encripted_pass=password_hash($this->input->post('password'),PASSWORD_BCRYPT);
    $data=array
    (
      'first_name'      => $this->input->post('first_name'),
      'last_name'       => $this->input->post('last_name'),
      'email'           => $this->input->post('email'),
      'username'        => $this->input->post('username'),
      'password'        => $encripted_pass
    );
  $insert_data=$this->db->insert('users',$data);
   return $insert_data;
  }
  
  
  
  
  
  public function login_user($username,$password)
    {
    $this->db->where('username',$username);
   
    $result=$this->db->get('users');
  
    $db_password=$result->row(2)->password;
    
    if (password_verify($password, $db_password))
    {
   return $result->row(0)->id;
    }
    else
    {
      return false;
    }
  
  } 
  }
  
 ?>