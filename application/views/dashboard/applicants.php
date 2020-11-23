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
            <div class="col-12 col-sm-10 offset-sm-1 mb-5">
                <div class="row">
                    <?php
                    $applicant_list = $this->db->get('applicants');
                    foreach ($applicant_list->result() as $applicant) {
                    ?>
                        <div class="col-12 col-sm-4 mb-5">
                            <div class="card">
                                <div class="card-header text-center"><?php echo $applicant->f_name; ?></div>
                                <img src="<?php echo base_url(); ?>uploads/applicants/<?php echo $applicant->image; ?>" class="card-img-top" alt="<?php echo $applicant->f_name; ?>">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $applicant->f_name; ?></h5>
                                    <p class="card-text text-center"><?php echo $applicant->email; ?></p>
                                    <p class="card-text text-center"><?php echo $applicant->phone; ?></p>
                                </div>
                                <div class="card-footer m-0">
                                    <span><a href="<?php echo site_url(); ?>applicants/single_applicant/<?php echo $applicant->id ?>" class="btn btn-primary btn-sm">Details</a></span>
                                    <span><a href="<?php echo site_url(); ?>applicants/applicant_update/<?php echo $applicant->id ?>" class="btn btn-info btn-sm">Update</a></span>
                                    <span><button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#deleteModal">Delete</button></span>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Applicant?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the Applicant?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo site_url(); ?>applicants/applicant_delete/<?php echo $applicant->id ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-sm-4 offset-sm-4">
                <a href="<?php echo site_url(); ?>applicants/add_applicant" class="btn btn-success btn-lg btn-block" role="button">Add New Applicant</a>
            </div>
        </div>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>