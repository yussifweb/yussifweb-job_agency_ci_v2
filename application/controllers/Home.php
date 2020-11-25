<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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

  public function register()
  {
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
          $this->session->set_flashdata('logged_in', 'You are now logged in');
          redirect('dashboard', 'refresh');
        } else {
          $this->session->set_flashdata('login_failed', 'Login is invalid');
          redirect('home');
        }
      }
    }
  }

  public function register_process()
  {

    if ($this->input->post('register')) {
      $name = $this->input->post('name');
      $contact = $this->input->post('contact');
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));
      $level = 50;

      $this->form_validation->set_rules('email', "email $email", 'required|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
      if ($this->form_validation->run() === FALSE) {
        $this->load->view('inc/header');
        $this->load->view('register');
        $this->load->view('inc/footer');
      } else {
        $user_data = array(
          'name' => $name,
          'contact' => $contact,
          'email' => $email,
          'password' => $password,
          'level' => $level
        );

        $this->Users->register_user($user_data);
        // Set message
        $this->session->set_flashdata('user_registered', 'You are now registered and can Log In');
        redirect('home', 'refresh');
      }
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    redirect('home', 'refresh');
    $this->session->set_flashdata('logged_out', 'You have logged out successfully');
  }

  public function forgot_pass()
  {
    $this->load->view('inc/header');
    $this->load->view('forgot_pass');
    $this->load->view('inc/footer');
  }

  public function reset_password($token)
  {
    $this->load->view('inc/header');
    $this->load->view('reset_password', $token);
    $this->load->view('inc/footer');
  }

  public function reset_password_process($token)
  {
    if ($this->input->post('reset')) {
      $new_password = md5($this->input->post('new_password'));

      $this->form_validation->set_rules('new_password', 'Password', 'required');
      $this->form_validation->set_rules('new_password2', 'Confirm Password', 'matches[new_password]');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('inc/header');
        $this->load->view('reset_password');
        $this->load->view('inc/footer');
      } else {
        $user_data = array('password' => $new_password);

        $resets = $this->db->get_where('reset', array('token' => $token));
        foreach ($resets->result() as $reset) {
          $email = $reset->email;

          $userInfos = $this->db->get_where('users', array('email' => $email));
          foreach ($userInfos->result() as $userInfo) {
            $id = $userInfo->id;

            $this->db->where('id', $id);
            $this->db->update('users', $user_data);
            $this->db->where('token', $token);
            $this->db->delete('reset');
            $this->session->set_flashdata('reset_done', "Password reset successful, You can now log in.");
            redirect('home', 'refresh');
          }
        }
      }
    }
  }

  public function reset_process()
  {
    $email = $this->input->post('email');
    $clean = $this->security->xss_clean($email);
    $userInfo = $this->db->get_where('users', array('email' => $email));
    $userInfo = $clean;

    if (!$userInfo) {
      $this->session->set_flashdata('no_email', "Email doesn't exist");
      $this->load->view('inc/header');
      $this->load->view('forgot_pass');
      $this->load->view('inc/footer');
    } else {
      //build token 				
      $token = bin2hex(random_bytes(50));
      $reset_data = array(
        'email' => $email,
        'token' => $token
      );

      $this->Users->reset_process($reset_data);

      $url = site_url() . 'home/reset_password/' . $token;
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
    $this->session->set_flashdata('mail_sent', 'Email sent. Please login into your email account and click on the link we sent to reset your password');
    $this->load->view('inc/header');
    $this->load->view('home');
    $this->load->view('inc/footer');
  }
}
