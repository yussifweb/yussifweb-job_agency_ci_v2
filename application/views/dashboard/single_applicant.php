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
            <div class="col-12 col-sm-10 offset-sm-1 mb-5">
                <?php
                $applicant_list = $this->db->get_where('applicants', array('id' => $id));
                foreach ($applicant_list->result() as $applicant) {
                ?>
                    <div class="card-header text-center"><?php echo $applicant->f_name . ' ' . $applicant->l_name; ?></div>
                    <img class="details card-img-top" src="<?php echo base_url(); ?>uploads/applicants/<?php echo $applicant->image; ?>" alt="<?php echo $applicant->f_name; ?>">

                    <div class="card-body ml-3">
                        <div class="h4 mt-4">PERSONAL INFORMATION</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>First Name: </strong> <?php echo $applicant->f_name; ?>
                                    <span class="mr-3"></span><strong>Last Name: </strong><?php echo $applicant->l_name; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Date of Birth: </strong> <?php echo $applicant->dob; ?>
                                    <span class="mr-3"></span><strong>Age: </strong><?php echo $applicant->age; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Email: </strong> <?php echo $applicant->email; ?>
                                    <span class="mr-3"></span><strong>Contact: </strong><?php echo $applicant->phone; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Country: </strong> <?php echo $applicant->country; ?>
                                    <span class="mr-3"></span><strong>Language: </strong><?php echo $applicant->dialect; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Email: </strong> <?php echo $applicant->id_typeRadios; ?>
                                    <span class="mr-3"></span><strong>ID Number: </strong><?php echo $applicant->id_no; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Gender: </strong> <?php echo $applicant->genderRadios; ?>
                                    <span class="mr-3"></span><strong>Marital Status: </strong><?php echo $applicant->mar_statRadios; ?></p>
                            </div>
                        </div>

                        <div class="h4 mt-4">LOCATION DETAILS</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Spouse: </strong> <?php echo $applicant->spouse; ?>
                                    <span class="mr-3"></span><strong>Religion: </strong><?php echo $applicant->religion; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Residence: </strong> <?php echo $applicant->residence; ?>
                                    <span class="mr-3"></span><strong>Address: </strong><?php echo $applicant->box_addr; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>LandMark: </strong> <?php echo $applicant->landmark; ?>
                                    <span class="mr-3"></span><strong>Street Name: </strong><?php echo $applicant->street_nm; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Suburb: </strong> <?php echo $applicant->suburb; ?>
                                    <span class="mr-2"></span><strong>House No: </strong><?php echo $applicant->hse_no; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <p><strong>City/Town: </strong><?php echo $applicant->city_town; ?></p>

                            </div>
                        </div>

                        <div class="h4 mt-4">AREA OF INTEREST</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Area of Interest 1: </strong> <?php echo $applicant->area_of_int_1; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Area of Interest 2: </strong> <?php echo $applicant->area_of_int_2; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Area of Interest 3: </strong> <?php echo $applicant->area_of_int_3; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Area of Interest 4: </strong> <?php echo $applicant->area_of_int_4; ?></p>
                            </div>
                        </div>

                        <div class="h3 mt-4">EDUCATIONAL BACKGROUND</div>
                        <hr />
                        <div class="h5 mb-2">A. JUNIOR HIGH SCHOOL</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Name of JHS: </strong> <?php echo $applicant->jhs_nm; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Awards Recieved: </strong> <?php echo $applicant->jhs_awd; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Start Year: </strong> <?php echo $applicant->jhs_start; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Year of Completion: </strong> <?php echo $applicant->jhs_end; ?></p>
                            </div>
                        </div>

                        <div class="h5 mb-2">B. SECONDARY EDUCATION</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Name of SHS: </strong> <?php echo $applicant->shs_nm; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Course Offered: </strong> <?php echo $applicant->shs_course; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Start Year: </strong> <?php echo $applicant->shs_start; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Year of Completion: </strong> <?php echo $applicant->shs_end; ?></p>
                            </div>
                        </div>

                        <div class="h5 mb-2">C. TERTIARY EDUCATION</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Name of Tetiary Institution: </strong> <?php echo $applicant->tet_nm; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Course Offered: </strong> <?php echo $applicant->tet_course; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Start Year: </strong> <?php echo $applicant->tet_start; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Year of Completion: </strong> <?php echo $applicant->tet_end; ?></p>
                            </div>
                        </div>

                        <div class="h4 mt-2">LAST WORKING PLACE</div>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Previous Workplace: </strong> <?php echo $applicant->prev_wkplc; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Address: </strong> <?php echo $applicant->prev_wkplc_addr; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Position Held: </strong> <?php echo $applicant->position; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Start Date: </strong> <?php echo $applicant->prev_wkplc_start; ?>
                                    <span class="mr-3"></span><strong>End Date: </strong> <?php echo $applicant->prev_wkplc_end; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <p class=""><strong>Reasons For Leaving: </strong> <?php echo $applicant->reason; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Name of Refree: </strong> <?php echo $applicant->ref_nm; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Contact: </strong> <?php echo $applicant->ref_cont; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Payment: </strong> <?php echo $applicant->paymentRadios; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Status: </strong> <?php echo $applicant->statusRadios; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Job Title: </strong> <?php echo $applicant->job_title; ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class=""><strong>Company: </strong> <?php echo $applicant->company; ?></p>
                            </div>
                        </div>

                        <!-- get user Name -->
                        <?php
                        $user_name = $applicant->user_id;
                        $users_list = $this->db->get_where('users', array('name' => $user_name));
                        foreach ($users_list->result() as $user) {
                            $user_name = $user->name; ?>
                            <p class="text-center"><strong>Created By: </strong><?php echo $user_name; ?></p>
                        <?php } ?>
                        <!-- get user Name -->
                    </div>
                    <div class="card-footer">
                        <span><a href="<?php echo site_url(); ?>applicants/applicant_update/<?php echo $applicant->id ?>" class="btn btn-info btn-sm">Update</a></span>
                        <span><a href="<?php echo site_url(); ?>applicants/applicant_delete/<?php echo $applicant->id ?>" class="btn btn-danger btn-sm">Delete</a></span>
                    </div>
            </div>
        <?php
                } ?>
        </div>
    </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>