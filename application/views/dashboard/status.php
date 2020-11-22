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
        <div class="row mb-5">
            <div class="col-12 col-sm-10 offset-sm-1 mb-5">
                <div class="mt-5 pb-5">
                    <div class="head text-center h2">PENDING APPLICANTS</div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">NAME</th>
                                <th scope="col">CONTACT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">COMPANY</th>
                            </tr>
                        </thead>

                        <?php
                        $applicant_list = $this->db->get_where('applicants', array('statusRadios' => 'Pending'));
                        foreach ($applicant_list->result() as $applicant) {
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $applicant->id; ?></th>
                                    <td><?php echo $applicant->f_name . ' ' . $applicant->l_name; ?></td>
                                    <td><?php echo $applicant->phone; ?></td>
                                    <td><?php echo $applicant->statusRadios; ?></td>
                                    <td><?php echo $applicant->company; ?></td>
                                </tr>
                            </tbody>

                        <?php } ?>
                    </table>
                </div>


                <div class="mt-5">
                    <div class="head text-center h2">POSTED APPLICANTS</div>

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">NAME</th>
                                <th scope="col">CONTACT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">COMPANY</th>
                            </tr>
                        </thead>

                        <?php
                        $applicant_list = $this->db->get_where('applicants', array('statusRadios' => 'Posted'));
                        foreach ($applicant_list->result() as $applicant) {
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $applicant->id; ?></th>
                                    <td><?php echo $applicant->f_name . ' ' . $applicant->l_name; ?></td>
                                    <td><?php echo $applicant->phone; ?></td>
                                    <td><?php echo $applicant->statusRadios; ?></td>
                                    <td><?php echo $applicant->company; ?></td>
                                </tr>
                            </tbody>

                        <?php } ?>

                    </table>
                </div>


                <!-- get number of applicants -->
                <?php
                $applicant_list = $this->db->count_all('applicants', 'name');
                ?>
                <div class="m-auto pt-5">
                    <button class="btn btn-secondary btn-lg text-center"><strong>TOTAL APPLICANT(S) IS <?php echo $this->db->count_all('applicants', 'name'); ?> </strong></button>
                </div>
                <!-- get number of applicants -->

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