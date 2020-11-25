<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">Hi, <?php echo $_SESSION['name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>applicants">Applicants</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>companies">Companies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>jobs/view_jobs">Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <a class="btn btn-sm btn-danger" href="<?php echo site_url('home/logout'); ?>" role="button">Log Out</a>
      <a class="btn btn-sm btn-primary" href="register.php" role="button">Register</a>
    </div>

  </div>
</nav>
<script type="text/javascript">
  setTimeout(function() {
    // Closing the alert 
    $('#alert').alert('close');
  }, 3000);
</script>

<!-- Flash messages -->
<?php if ($this->session->flashdata('logged_in')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('logged_in') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('applicant_created')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('applicant_created') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('applicant_updated')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('applicant_updated') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('applicant_deleted')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('applicant_deleted') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('company_created')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('company_created') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('company_updated')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('company_updated') . '</p>'; ?>
<?php endif; ?>

<?php if ($this->session->flashdata('company_deleted')) : ?>
  <?php echo '<p id="alert" class="alert alert-success text-center">' . $this->session->flashdata('company_deleted') . '</p>'; ?>
<?php endif; ?>