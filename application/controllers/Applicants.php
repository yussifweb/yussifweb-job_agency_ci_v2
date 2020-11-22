<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Applicants extends CI_Controller {


public function __construct()
{
    parent::__construct();
    $this->load->model('Applicants_list');
}


public function index()
{
  $this->load->view('dashboard/applicants');             
}

    public function single_applicant($id)
    {
        $this->load->view('dashboard/single_applicant', $id);
    }

    public function add_applicant()
    {
      $this->load->view('dashboard/add_applicant');
    }

    public function applicant_update($id)
    {
      $this->load->view('dashboard/applicant_update', $id);
    }

    public function update_applicant_process($id)
    {
        if ($this->input->post('update_applicant')) {

            $f_name = $this->input->post('f_name');
            $l_name = $this->input->post('l_name');
            $dob = $this->input->post('dob');
            $age = $this->input->post('age');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $country = $this->input->post('country');
            $dialect = $this->input->post('dialect');
            $id_typeRadios = $this->input->post('id_typeRadios');
            $id_no = $this->input->post('id_no');
            $genderRadios = $this->input->post('genderRadios');
            $mar_statRadios = $this->input->post('mar_statRadios');
            $spouse = $this->input->post('spouse');
            $religion = $this->input->post('religion');
            $residence = $this->input->post('residence');

            $box_addr = $this->input->post('box_addr');
            $landmark = $this->input->post('landmark');
            $street_nm = $this->input->post('street_nm');
            $suburb = $this->input->post('suburb');
            $hse_no = $this->input->post('hse_no');
            $city_town = $this->input->post('city_town');

            $area_of_int_1 = $this->input->post('area_of_int_1');
            $area_of_int_2 = $this->input->post('area_of_int_2');
            $area_of_int_3 = $this->input->post('area_of_int_3');
            $area_of_int_4 = $this->input->post('area_of_int_4');

            $jhs_nm = $this->input->post('jhs_nm');
            $jhs_awd = $this->input->post('jhs_awd');
            $jhs_start = $this->input->post('jhs_start');
            $jhs_end = $this->input->post('jhs_end');

            $shs_nm = $this->input->post('shs_nm');
            $shs_course = $this->input->post('shs_course');
            $shs_start = $this->input->post('shs_start');
            $shs_end = $this->input->post('shs_end');

            $tet_nm = $this->input->post('tet_nm');
            $tet_course = $this->input->post('tet_course');
            $tet_start = $this->input->post('tet_start');
            $tet_end = $this->input->post('tet_end');

            $prev_wkplc = $this->input->post('prev_wkplc');
            $prev_wkplc_addr = $this->input->post('prev_wkplc_addr');
            $prev_wkplc_cont = $this->input->post('prev_wkplc_cont');
            $position = $this->input->post('position');
            $prev_wkplc_start = $this->input->post('prev_wkplc_start');
            $prev_wkplc_end = $this->input->post('prev_wkplc_end');
            $reason = $this->input->post('reason');
            $ref_nm = $this->input->post('ref_nm');
            $ref_cont = $this->input->post('ref_cont');
            $paymentRadios = $this->input->post('paymentRadios');
            $job_title = $this->input->post('job_title');
            $statusRadios = $this->input->post('statusRadios');
            $company = $this->input->post('company');
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path']          = './uploads/applicants/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 300;
                $config['max_width']            = 720;
                $config['max_height']           = 720;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('update_applicant', $error);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image = $_FILES['image']['name'];
                }
            } elseif (!$image) {
                $applicant_list = $this->db->get_where('applicants', array('id' => $id));
                foreach ($applicant_list->result() as $applicant) {
                    $image = $applicant->image;
                }
            }

            $applicant_data = array(
                'f_name' => $f_name,
                'l_name' => $l_name,
                'dob' => $dob,
                'age' => $age,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'dialect' => $dialect,
                'id_typeRadios' => $id_typeRadios,
                'id_no' => $id_no,
                'genderRadios' => $genderRadios,
                'mar_statRadios' => $mar_statRadios,
                'spouse' => $spouse,
                'religion' => $religion,

                'residence' => $residence,
                'box_addr' => $box_addr,
                'landmark' => $landmark,
                'street_nm' => $street_nm,
                'suburb' => $suburb,
                'hse_no' => $hse_no,
                'city_town' => $city_town,

                'area_of_int_1' => $area_of_int_1,
                'area_of_int_2' => $area_of_int_2,
                'area_of_int_3' => $area_of_int_3,
                'area_of_int_4' => $area_of_int_4,

                'jhs_nm' => $jhs_nm,
                'jhs_awd' => $jhs_awd,
                'jhs_start' => $jhs_start,
                'jhs_end' => $jhs_end,

                'shs_nm' => $shs_nm,
                'shs_course' => $shs_course,
                'shs_start' => $shs_start,
                'shs_end' => $shs_end,

                'tet_nm' => $tet_nm,
                'tet_course' => $tet_course,
                'tet_start' => $tet_start,
                'tet_end' => $tet_end,

                'prev_wkplc' => $prev_wkplc,
                'prev_wkplc_addr' => $prev_wkplc_addr,
                'prev_wkplc_cont' => $prev_wkplc_cont,
                'position' => $position,
                'prev_wkplc_start' => $prev_wkplc_start,
                'prev_wkplc_end' => $prev_wkplc_end,
                'reason' => $reason,
                'ref_nm' => $ref_nm,
                'ref_cont' => $ref_cont,
                'paymentRadios' => $paymentRadios,
                'statusRadios' => $statusRadios,
                'job_title' => $job_title,
                'company' => $company,
                'image' => $image
            );

            $this->db->where('id', $id);
            $this->db->update('applicants', $applicant_data);
            redirect('applicants', 'refresh');
        }
    }

    public function add_applicant_process()
    {
        if ($this->input->post('add_applicant')) {
            $f_name = $this->input->post('f_name');
            $l_name = $this->input->post('l_name');
            $dob = $this->input->post('dob');
            $age = $this->input->post('age');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $country = $this->input->post('country');
            $dialect = $this->input->post('dialect');
            $id_typeRadios = $this->input->post('id_typeRadios');
            $id_no = $this->input->post('id_no');
            $genderRadios = $this->input->post('genderRadios');
            $mar_statRadios = $this->input->post('mar_statRadios');
            $spouse = $this->input->post('spouse');
            $religion = $this->input->post('religion');
            $residence = $this->input->post('residence');

            $box_addr = $this->input->post('box_addr');
            $landmark = $this->input->post('landmark');
            $street_nm = $this->input->post('street_nm');
            $suburb = $this->input->post('suburb');
            $hse_no = $this->input->post('hse_no');
            $city_town = $this->input->post('city_town');

            $area_of_int_1 = $this->input->post('area_of_int_1');
            $area_of_int_2 = $this->input->post('area_of_int_2');
            $area_of_int_3 = $this->input->post('area_of_int_3');
            $area_of_int_4 = $this->input->post('area_of_int_4');

            $jhs_nm = $this->input->post('jhs_nm');
            $jhs_awd = $this->input->post('jhs_awd');
            $jhs_start = $this->input->post('jhs_start');
            $jhs_end = $this->input->post('jhs_end');

            $shs_nm = $this->input->post('shs_nm');
            $shs_course = $this->input->post('shs_course');
            $shs_start = $this->input->post('shs_start');
            $shs_end = $this->input->post('shs_end');

            $tet_nm = $this->input->post('tet_nm');
            $tet_course = $this->input->post('tet_course');
            $tet_start = $this->input->post('tet_start');
            $tet_end = $this->input->post('tet_end');

            $prev_wkplc = $this->input->post('prev_wkplc');
            $prev_wkplc_addr = $this->input->post('prev_wkplc_addr');
            $prev_wkplc_cont = $this->input->post('prev_wkplc_cont');
            $position = $this->input->post('position');
            $prev_wkplc_start = $this->input->post('prev_wkplc_start');
            $prev_wkplc_end = $this->input->post('prev_wkplc_end');
            $reason = $this->input->post('reason');
            $ref_nm = $this->input->post('ref_nm');
            $ref_cont = $this->input->post('ref_cont');
            $paymentRadios = $this->input->post('paymentRadios');
            $job_title = $this->input->post('job_title');
            $statusRadios = $this->input->post('statusRadios');
            $company = $this->input->post('company');
            $user_id = $this->input->post('user_id');

            $config['upload_path']          = './uploads/applicants/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 300;
            $config['max_width']            = 720;
            $config['max_height']           = 720;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('add_applicant', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['image']['name'];
            }


            $applicant_data = array(
                'f_name' => $f_name,
                'l_name' => $l_name,
                'dob' => $dob,
                'age' => $age,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'dialect' => $dialect,
                'id_typeRadios' => $id_typeRadios,
                'id_no' => $id_no,
                'genderRadios' => $genderRadios,
                'mar_statRadios' => $mar_statRadios,
                'spouse' => $spouse,
                'religion' => $religion,

                'residence' => $residence,
                'box_addr' => $box_addr,
                'landmark' => $landmark,
                'street_nm' => $street_nm,
                'suburb' => $suburb,
                'hse_no' => $hse_no,
                'city_town' => $city_town,

                'area_of_int_1' => $area_of_int_1,
                'area_of_int_2' => $area_of_int_2,
                'area_of_int_3' => $area_of_int_3,
                'area_of_int_4' => $area_of_int_4,

                'jhs_nm' => $jhs_nm,
                'jhs_awd' => $jhs_awd,
                'jhs_start' => $jhs_start,
                'jhs_end' => $jhs_end,

                'shs_nm' => $shs_nm,
                'shs_course' => $shs_course,
                'shs_start' => $shs_start,
                'shs_end' => $shs_end,

                'tet_nm' => $tet_nm,
                'tet_course' => $tet_course,
                'tet_start' => $tet_start,
                'tet_end' => $tet_end,

                'prev_wkplc' => $prev_wkplc,
                'prev_wkplc_addr' => $prev_wkplc_addr,
                'prev_wkplc_cont' => $prev_wkplc_cont,
                'position' => $position,
                'prev_wkplc_start' => $prev_wkplc_start,
                'prev_wkplc_end' => $prev_wkplc_end,
                'reason' => $reason,
                'ref_nm' => $ref_nm,
                'ref_cont,' => $ref_cont,
                'paymentRadios' => $paymentRadios,
                'statusRadios' => $statusRadios,
                'job_title' => $job_title,
                'company' => $company,
                'user_id' => $user_id,
                'image' => $image
            );

            $this->Applicants_list->insert_applicant($applicant_data);
            redirect('applicants', 'refresh');
        }
    }

    public function applicant_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('applicants');
        redirect('applicants', 'refresh');
    }
        
}        
    /* End of file Applicants.php */                          