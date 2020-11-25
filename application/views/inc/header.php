<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>

  <title>JobCenterGh</title>
</head>

<body>

  <script type="text/javascript">
    setTimeout(function() {
      // Closing the alert 
      $('#alert').alert('close');
    }, 3000);
  </script>

  <?php if ($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p id="alert" class="alert alert-danger text-center">' . $this->session->flashdata('logged_out') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p id="alert" class="alert alert-danger text-center">' . $this->session->flashdata('login_failed') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('user_registered')) : ?>
    <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('user_registered') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('no_email')) : ?>
    <?php echo '<p id="alert" class="alert alert-danger text-center">' . $this->session->flashdata('no_email') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('mail_sent')) : ?>
    <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('mail_sent') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('reset_done')) : ?>
    <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('reset_done') . '</p>'; ?>
  <?php endif; ?>

  <?php if ($this->session->flashdata('no_token')) : ?>
    <?php echo '<p id="alert" class="alert alert-danger text-center">' . $this->session->flashdata('no_token') . '</p>'; ?>
  <?php endif; ?>