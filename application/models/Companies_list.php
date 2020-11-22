<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Companies_list extends CI_Model {
                        
public function insert_company($companies_data){
     $this->db->insert('companies', $companies_data);                
                                
}                        
                        
}
                        
/* End of file Employees_list.php */
    
                        