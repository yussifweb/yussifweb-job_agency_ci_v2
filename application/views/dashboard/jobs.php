<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!$_SESSION['name']) {
    redirect('home', 'refresh');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <title>Welcome | <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <!-- dashboard nav -->
    <?php $this->load->view('dashboard/inc/nav'); ?>
    <!-- dashboard nav -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-3">
                <!-- sidebar -->
                <?php $this->load->view('dashboard/inc/sidebar'); ?>
                <!-- sidebar -->
            </div>
            <div class="col-12 col-sm-9">
                <div class="row">
                    <?php
                    $job_list = $this->db->get('jobs');
                    foreach ($job_list->result() as $job) {
                    ?>
                        <div class="col-12 col-sm-4 mb-5">
                            <div class="card">
                                <div class="card-header text-center"><?php echo $job->title; ?></div>
                                <img class="card-img-top" src="<?php echo base_url(); ?>uploads/jobs/<?php echo $job->image; ?>" alt="<?php echo $job->title; ?>">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $job->title; ?></h5>
                                    <p class="card-text text-center"><?php echo $job->location; ?></p>
                                </div>
                                <div class="card-footer">
                                    <span><a href="<?php echo site_url(); ?>jobs/job_details/<?php echo $job->id ?>" class="btn btn-primary btn-sm">Details</a></span>
                                    <span><a href="<?php echo site_url(); ?>jobs/job_update/<?php echo $job->id ?>" class="btn btn-info btn-sm">Update</a></span>
                                    <span><a href="<?php echo site_url(); ?>jobs/job_delete/<?php echo $job->id ?>" class="btn btn-danger btn-sm">Delete</a></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>