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
                    $company_list = $this->db->get('companies');
                    foreach ($company_list->result() as $company) {
                    ?>
                        <div class="col-12 col-sm-4 mb-5">
                            <div class="card">
                                <div class="card-header text-center"><?php echo $company->name; ?></div>
                                <img src="<?php echo site_url(); ?>uploads/companies/<?php echo $company->image; ?>" class="card-img-top" alt="<?php echo $company->name; ?>">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $company->name; ?></h5>
                                    <p class="card-text text-center"><?php echo $company->email; ?></p>
                                </div>
                                <div class="card-footer">
                                    <span><a href="<?php echo site_url(); ?>companies/single_company/<?php echo $company->id ?>" class="btn btn-primary btn-sm">Details</a></span>
                                    <span><a href="<?php echo site_url(); ?>companies/company_update/<?php echo $company->id ?>" class="btn btn-info btn-sm">Update</a></span>
                                    <span><button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#deleteModal">Delete</button></span>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Company?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the Company?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo site_url(); ?>companies/company_delete/<?php echo $company->id ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 offset-sm-4">
                <a href="<?php echo site_url(); ?>companies/add_company" class="btn btn-success btn-lg btn-block" role="button">Add New Company</a>
            </div>
        </div>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>