<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Jobs extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('Employee_Jobs');
}

public function index()
{
  $this->load->view('dashboard/add_job');
}

public function view_jobs()
{
  $this->load->view('dashboard/jobs');
}

public function add_job()
{
    if ($this->input->post('add_job')) {
        $user_id = $this->input->post('user_id');
        $title = $this->input->post('title');
        $industry = $this->input->post('industry');
        $body = $this->input->post('body');
        $location = $this->input->post('location');

            $config['upload_path']          = './uploads/jobs/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 300;
            $config['max_width']            = 720;
            $config['max_height']           = 720;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('add_job', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['image']['name'];
            }
            $jobs_data = array(
                'user_id' => $user_id,
                'title' => $title,
                'industry' => $industry,
                'body' => $body,
                'location' => $location,
                'image' => $image
            );

    $this->Employee_Jobs->add_job($jobs_data);
    redirect('jobs/view_jobs', 'refresh');
    }
}

    public function job_update($id)
    {
        $this->load->view('dashboard/job_update', $id);
    }

    public function job_update_process($id)
    {
        if ($this->input->post('update_job')) {
            $title = $this->input->post('title');
            $industry = $this->input->post('industry');
            $body = $this->input->post('body');
            $location = $this->input->post('location');
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path']          = './uploads/jobs/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 300;
                $config['max_width']            = 720;
                $config['max_height']           = 720;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('add_job', $error);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image = $_FILES['image']['name'];
                } 
            }else{
                $job_list = $this->db->get_where('jobs', array('id' => $id));
                foreach ($job_list->result() as $job) {
                    $image = $job->image;
                 }
            }
            $job_details = array(
                'title' => $title,
                'industry' => $industry,
                'body' => $body,
                'location' => $location,
                'image' => $image
            );

            $this->db->where('id', $id);
            $this->db->update('jobs', $job_details);
            redirect('jobs/view_jobs', 'refresh');
        }
    }

    public function job_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jobs');
        redirect('jobs/view_jobs', 'refresh'); 
    }
        
}
        
    /* End of file  Jobs.php */
        
                            