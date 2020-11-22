<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Companies extends CI_Controller {


public function __construct()
{
    parent::__construct();
    $this->load->model('Companies_list');
}


public function index()
{
  $this->load->view('dashboard/companies');             
}

    public function single_company($id)
    {
        $this->load->view('dashboard/single_company', $id);
    }

    public function add_company()
    {
      $this->load->view('dashboard/add_company');
    }

    public function company_update($id)
    {
      $this->load->view('dashboard/company_update', $id);
    }

    public function company_update_process($id)
    {
        if ($this->input->post('update_company')) {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $industry = $this->input->post('industry');
            $region = $this->input->post('region');
            $district = $this->input->post('district');

            $image = $_FILES['image']['name'];
            if ($image) {
                $newimg = str_replace(' ', '', $name);
                $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = $newimg . '_' . $phone . '.' . $ext;
                $config['upload_path']          = './uploads/companies/';
                $config['allowed_types']        = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
                $config['max_size']             = 300;
                $config['max_width']            = 720;
                $config['max_height']           = 720;
                $config['overwrite']           = TRUE;
                $config['file_name']  = $image;
                

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('dashboard/update_company', $error);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image = $image;
                }
            } elseif (!$image) {
                $company_list = $this->db->get_where('companies', array('id' => $id));
                foreach ($company_list->result() as $company) {
                    $image = $company->image;
                }
            }

            $company_data = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'industry' => $industry,
                'region' => $region,
                'district' => $district,
                'image' => $image
            );

            $this->db->where('id', $id);
            $this->db->update('companies', $company_data);
            redirect('companies', 'refresh');
        }
    }

    public function add_company_process()
    {
        if ($this->input->post('add_company')) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $industry = $this->input->post('industry');
            $region = $this->input->post('region');
            $district = $this->input->post('district');
            $user_id = $this->input->post('user_id');

            $image = $_FILES["image"]['name'];
            $newimg = str_replace(' ', '', $name);
            $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $image = $newimg .'_'. $phone . '.'.$ext;
            $config['upload_path']          = './uploads/companies/';
            $config['allowed_types']        = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
            $config['max_size']             = 300;
            $config['max_width']            = 720;
            $config['max_height']           = 720;
            $config['file_name']  = $image;            

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('dashboard/add_company', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $image;
            }

            $company_data = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'industry' => $industry,
                'region' => $region,
                'district' => $district,
                'user_id' => $user_id,
                'image' => $image
            );

            $this->Companies_list->insert_company($company_data);
            redirect('companies', 'refresh');
        }
    }

    public function company_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('companies');
        redirect('companies', 'refresh');
    }
        
}        
    /* End of file Companies.php */                          