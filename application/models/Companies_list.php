<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Applicants_list extends CI_Model {
                        
public function insert_applicant($applicants_data){
     $this->db->insert('applicants', $applicants_data);                
                                
}                        
                        
}
                        
/* End of file Employees_list.php */
    
                        