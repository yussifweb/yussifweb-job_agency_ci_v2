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

    <title>Welcome | <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <!-- dashboard nav -->
    <?php $this->load->view('dashboard/inc/nav'); ?>
    <!-- dashboard nav -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 mb-5">
                <?php
                $company_list = $this->db->get_where('companies', array('id' => $id));
                foreach ($company_list->result() as $company) {
                ?>
                    <div class="card">
                        <div class="card-header text-center"><?php echo $company->name; ?></div>
                        <img class="details card-img-top" src="<?php echo base_url(); ?>uploads/companies/<?php echo $company->image; ?>" alt="<?php echo $company->name; ?>">

                        <div class="card-body">
                            <p class="text-center"><strong>Name: </strong> <?php echo $company->name; ?>
                                <span class="mr-5"></span><strong>Email: </strong><?php echo $company->email; ?></p>
                            <p class="text-center"><strong>Address: </strong><?php echo $company->address; ?>
                                <span class="mr-5"></span><strong>Contact: </strong><?php echo $company->phone; ?>
                                <span class="mr-5"></span><strong>Industry: </strong><?php echo $company->industry; ?></p>
                            <p class="text-center"><strong>Region: </strong><?php echo $company->region; ?>
                                <span class="mr-5"></span><strong>District: </strong><?php echo $company->district; ?></p>

                            <!-- get user Name -->
                            <?php
                            $user_name = $company->user_id;
                            $users_list = $this->db->get_where('users', array('name' => $user_name));
                            foreach ($users_list->result() as $user) {
                                $user_name = $user->name; ?>
                                <p class="text-center"><strong>Created By: </strong><?php echo $user_name; ?></p>
                            <?php } ?>
                            <!-- get user Name -->
                        </div>
                        <div class="card-footer">
                            <span><a href="<?php echo site_url(); ?>companies/company_update/<?php echo $company->id ?>" class="btn btn-info btn-sm">Update</a></span>
                            <span><a href="<?php echo site_url(); ?>companies/company_delete/<?php echo $company->id ?>" class="btn btn-danger btn-sm">Delete</a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>