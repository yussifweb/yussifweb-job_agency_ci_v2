<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!$_SESSION['name']) {
    redirect('home', 'refresh');
}
$id = $this->uri->segment(3);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <title>Update Company | <?php echo $_SESSION['name']; ?></title>
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
                <div class="card">
                    <div class="card-header">Update Company</div>
                    <div class="card-body">
                        <?php echo form_open_multipart('companies/company_update_process/' . $id); ?>
                        <?php

                        $company_list = $this->db->get_where('companies', array('id' => $id));
                        foreach ($company_list->result() as $company) {
                        ?>
                            <div class="form-group">
                                <label for="name" id="name-label">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo $company->name; ?>" placeholder="Company Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" id="email-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $company->email; ?>" placeholder="Company Email" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="age" name="address" value="<?php echo $company->address; ?>" placeholder="Address" required>
                            </div>

                            <div class="form-group">
                                <label for="number" id="number-label">Contact</label>
                                <input type="tel" class="form-control" id="phone" min="10" name="phone" value="<?php echo $company->phone; ?>" placeholder="Company Contact Here...">
                            </div>

                            <div class="form-group">
                                <label for="industry" id="industry-label">Industry</label>
                                <input type="industry" class="form-control" id="industry" name="industry" value="<?php echo $company->industry; ?>" placeholder="Industry" required>
                            </div>

                            <div class="form-group">
                                <label for="region" id="region-label">Region</label>
                                <input type="region" class="form-control" id="region" name="region" value="<?php echo $company->region; ?>" placeholder="Region" required>
                            </div>

                            <div class="form-group">
                                <label for="district" id="district-label">District</label>
                                <input type="district" class="form-control" id="district" name="district" value="<?php echo $company->district; ?>" placeholder="District" required>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-4">
                                    <span class="img-div">
                                        <div class="text-center img-placeholder" onClick="triggerClick()">
                                            <h4>Upload image</h4>
                                        </div>
                                        <img src="<?php echo base_url(); ?>uploads/companies/<?php echo $company->image; ?>" onClick="triggerClick()" class="card-img-top" id="imageUpdate">
                                    </span>
                                    <input type="file" name="image" onChange="updatedImage(this)" id="image" style="display: none;" />
                                    <label>Upload Image</label>
                                </div>

                                <input id="submit" class="btn-block btn btn-warning" type="submit" name="update_company" value="Update" />
                            <?php } ?>
                            <?php echo form_close(); ?>

                            </div>

                    </div>
                </div>
            </div>



            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>