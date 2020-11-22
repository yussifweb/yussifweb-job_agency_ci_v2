<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Users extends CI_Model {

public function register_user($user_data){
$this->db->insert('users', $user_data);                                
}
                        
public function login(){
                        
                                
}
                        
                            
                        
}
                        
/* End of file Users.php */
    
                        