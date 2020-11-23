<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
{
    parent::__construct();
    $this->load->model('Users');
}

	public function index()
	{
        $this->load->view('inc/header');
        $this->load->view('home');
        $this->load->view('inc/footer');
  }

    public function register(){
      $this->load->view('inc/header');
      $this->load->view('register');
      $this->load->view('inc/footer');
    }

    public function login()
    {
      if ($this->input->post('login')) {
        $name = $this->input->post('name');
        $password = md5($this->input->post('password'));

        $user_data = array(
          'name' => $name,
          'password' => $password
        );
      
        $users = $this->db->get_where('users', array('name' => $user_data['name']));
        foreach ($users->result() as $user) {
          if ($user_data['name'] == $user->name && $user_data['password'] == $user->password) {
            $_SESSION['name'] = $user_data['name'];
            redirect('dashboard', 'refresh');
          } else {
            echo "<script>alert('Incorrect Name or Password')</script>";
            redirect('home', 'refresh');
          }
          
        }
      }else {
        redirect('home', 'refresh');
      }
    }

    public function register_process(){
      if ($this->input->post('register')) {
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        if ($this->input->post('password') == $this->input->post('password_2')) {
          $password = md5($this->input->post('password'));
        }else {
          echo "Password doesn't match";
        }      

        $user_data = array(
          'name' => $name,
          'contact' => $contact,
          'email' => $email,
          'password' => $password
        );

        $this->Users->register_user($user_data);
        redirect('home', 'refresh');
      
      }else {
        redirect('home', 'refresh');
      }
    }

    public function logout(){
      session_unset();
      session_destroy();
      redirect('home', 'refresh');
    }

  public function forgot_pass()
  {
    $this->load->view('inc/header');
    $this->load->view('forgot_pass');
    $this->load->view('inc/footer');
  }

  public function reset_password()
        {
            $token = $this->uri->segment(4);         
            $cleanToken = $this->security->xss_clean($token);
            $email = $this->db->get_where('reset', array('email' => $token));
            $userInfo = $this->db->get_where('users', array('email' => $email));

            $userInfo = $cleanToken; //either false or array();               
            
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'main/login');
            }            
            $data = array(
                'email'=>$userInfo->email,                
                'token'=>$token
            );
                       
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('reset_password', $data);
                $this->load->view('footer');
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['user_id'] = $user_info->id;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
                }else{
                    $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                }
                redirect(site_url().'main/login');                
            }
        }
  // public function reset_pass_process()
  // {
  //   $this->load->view('inc/header');
  //   $this->load->view('reset_pass_process/token');
  //   $this->load->view('inc/footer');
  // }

    public function reset_process(){
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->db->get_where('users', array('email' => $email));
                $userInfo= $clean;
                
                if(!$userInfo){
                 $this->session->set_flashdata('flash_message', 'We cant find your email address');
                  redirect('home', 'refresh');
                }else{
                //build token 				
                $token = bin2hex(random_bytes(50));
                $reset_data = array(
                'email' => $email,
                'token' => $token
                );

                $this->Users->reset_process($reset_data);

                $url = site_url() . 'home/reset_password/token/' . $token;
                $link = "<html>
                <head>
                  <title>Password Reset</title>
                </head>
                <body>
                  <p><strong>Click on the link below to reset your password</strong></p>
                  <br/>
                  <div style='padding-top: 1rem;'></div>
                  <div style='background-color: #33d6b3; border: none; 
                  padding: 20px 32px; text-align: center; display: inline-block; border-radius: 15px; margin: 0 auto;'>
                  <a style='text-decoration: none; color: rgb(253, 235, 235); font-size: 16px; font-weight: 500;' href=" . $url . "><strong>Reset Password</strong></a></div>      
                </body>
                </html>";
                // Send email to user with the token in a link they can click on
                $to = $email;
                $subject = "Reset your password on Jobcenter.";
                $message = $link;
                $message = wordwrap($message, 70);
                $headers = "From: djiceman.gh@gmail.com";
                $headers .= "MIME-Version: JobCenterGh\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to, $subject, $message, $headers);
              }
              $this->session->set_flashdata('flash_message', 'Email sent. Please login into your email account and click on the link we sent to reset your password');
              redirect('home', 'refresh');
            }
            
}