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

    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <title>Add Job | <?php echo $_SESSION['name']; ?></title>
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
                    <div class="card-header">Add New Job</div>
                    <div class="card-body">
                        <?php echo form_open_multipart('jobs/add_job'); ?>
                        <!-- get user ID -->
                        <?php
                        $users_list = $this->db->get_where('users', array('name' => $_SESSION['name']));
                        foreach ($users_list->result() as $user) { ?>
                            <input type="text" id="user_id" class="form-control" name="user_id" value="<?php echo $user->id; ?>" required hidden>
                        <?php } ?>
                        <!-- get user ID -->
                        <div class="form-group">
                            <label id="name-label">Title</label>
                            <input type="text" id="name" class="form-control" name="title" placeholder="Please Enter Job Title" required>
                        </div>

                        <!-- get company names -->
                        <!-- <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" id="dropdown" name="company">
                                <option selected>Select</option>
                                <?php
                                $sql = "SELECT * FROM companies";
                                $result = mysqli_query($connect, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($companies = mysqli_fetch_assoc($result)) {
                                        $company = $companies['name'] ?>
                                        <option><?php echo $company; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
 -->
                        <div class="form-group">
                            <label for="industry">Industry</label>
                            <select class="form-control" name="industry" id="dropdown">
                                <option selected>Select</option>
                                <option>Agriculture</option>
                                <option>Information Technology</option>
                                <option>Bussiness</option>
                                <option>Construction</option>
                                <option>Food</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea class="form-control" id="jobFormControlTextarea" rows="3" name="body" placeholder="Enter Job Description" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="location" required placeholder="Job Location">
                        </div>

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

                            <input id="submit" class="btn-block btn btn-success" type="submit" name="add_job" value="Submit" />
                            <?php echo form_close(); ?>
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