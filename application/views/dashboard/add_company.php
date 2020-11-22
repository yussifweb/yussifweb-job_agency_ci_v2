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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <title>Add Job | <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <!-- dashboard nav -->
    <?php $this->load->view('dashboard/inc/nav'); ?>
    <!-- dashboard nav -->

    <div class="container mt-5 mb-5">
        <div class="col-12 col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-header">Add New Company</div>
                <div class="card-body">
                    
                    <?php echo form_open_multipart('companies/add_company'); ?>

                    <div class="form-group">
                        <label for="name" id="name-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Company Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" id="email-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Company Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="age" name="address" placeholder="Address" required>
                    </div>

                    <div class="form-group">
                        <label for="number" id="number-label">Contact</label>
                        <input type="tel" class="form-control" id="phone" min="10" name="phone" placeholder="Company Contact Here..." required>
                    </div>

                    <div class="form-group">
                        <label for="industry" id="industry-label">Industry</label>
                        <input type="industry" class="form-control" id="industry" name="industry" placeholder="Industry" required>
                    </div>

                    <div class="form-group">
                        <label for="region" id="region-label">Region</label>
                        <input type="region" class="form-control" id="region" name="region" placeholder="Region" required>
                    </div>

                    <div class="form-group">
                        <label for="district" id="district-label">District</label>
                        <input type="district" class="form-control" id="district" name="district" placeholder="District" required>
                    </div>

                    <!-- get user ID -->
                    <?php
                    $users_list = $this->db->get_where('users', array('name' => $_SESSION['name']));
                    foreach ($users_list->result() as $user) { ?>
                        <input type="text" id="user_id" class="form-control" name="user_id" value="<?php echo $user->id; ?>" hidden>
                    <?php } ?>
                    <!-- get user ID -->

                    <div class="form-row">
                        <div class="col-12 col-sm-4">
                            <span class="img-div">
                                <div class="text-center img-placeholder" onClick="triggerClick()">
                                    <h4>Upload image</h4>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/images/avatar.png" onClick="triggerClick()" class="card-img-top" id="imageUpdate">
                            </span>
                            <input type="file" name="image" onChange="updatedImage(this)" id="image" style="display: none;">
                            <label>Upload Image</label>
                        </div>
                        <input id="submit" class="btn-block btn btn-success" type="submit" name="add_company" value="Add Company" />
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