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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mdb.lite.min.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <title>Add Applicant | <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <!-- dashboard nav -->
    <?php $this->load->view('dashboard/inc/nav'); ?>
    <!-- dashboard nav -->

    <div class="container mt-5">
        <div class="col-12 col-sm-10 offset-sm-1">
            <div class="card">
                <div class="card-header">Add New applicant</div>
                <div class="card-body">
                    <?php echo form_open_multipart('applicants/add_applicant_process'); ?>

                    <div class="h3">PERSONAL INFORMATION</div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="f_name" class="form-control" name="f_name" placeholder="First Name" required>
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="l_name" class="form-control" name="l_name" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-7">
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="DD / MM / YYYY" required>
                        </div>
                        <div class="md-form col-12 col-sm-5">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="tel" id="phone" class="form-control" name="phone" placeholder="Contact Number" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="country" class="form-control" name="country" placeholder="Nationality" required>
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="dialect" class="form-control" name="dialect" placeholder="Language">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-8">
                            <div class="mt-4">
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline1" name="id_typeRadios" value="Passport">
                                    <label class="custom-control-label" for="defaultInline1">Passport</label>
                                </div>
                                <!-- Default inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline2" name="id_typeRadios" value="Drivers Licence">
                                    <label class="custom-control-label" for="defaultInline2">Drivers License</label>
                                </div>
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline3" name="id_typeRadios" value="Voters ID">
                                    <label class="custom-control-label" for="defaultInline3">Voters ID</label>
                                </div>
                                <!-- Default inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline4" name="id_typeRadios" value="National ID">
                                    <label class="custom-control-label" for="defaultInline4">National ID</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="md-form">
                                <input type="text" id="id_no" class="form-control" name="id_no" placeholder="ID Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-4">
                            <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="genderInline1" name="genderRadios" value="Male">
                                <label class="custom-control-label" for="genderInline1">Male</label>
                            </div>
                            <!-- gender inline -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="genderInline2" name="genderRadios" value="Female">
                                <label class="custom-control-label" for="genderInline2">Female</label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-8">
                            <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="marstatInline1" name="mar_statRadios" value="Single">
                                <label class="custom-control-label" for="marstatInline1">Single</label>
                            </div>
                            <!-- marstat inline -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="marstatInline2" name="mar_statRadios" value="Married">
                                <label class="custom-control-label" for="marstatInline2">Married</label>
                            </div>
                            <!-- marstat inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="marstatInline3" name="mar_statRadios" value="Divorced">
                                <label class="custom-control-label" for="marstatInline1">Divorced</label>
                            </div>
                            <!-- marstat inline -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="marstatInline4" name="mar_statRadios" value="Widowed">
                                <label class="custom-control-label" for="marstatInline2">Widowed</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="spouse" class="form-control" name="spouse" placeholder="Spouse">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="religion" class="form-control" name="religion" placeholder="Religion">
                        </div>
                    </div>

                    <div class="h3">LOCATION DETAILS</div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="residence" class="form-control" name="residence" placeholder="Residence">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="box_addr" class="form-control" name="box_addr" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="landmark" class="form-control" name="landmark" placeholder="Landmark">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="street_nm" class="form-control" name="street_nm" placeholder="Street Name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-4">
                            <input type="text" id="suburb" class="form-control" name="suburb" placeholder="Suburb">
                        </div>

                        <div class="md-form col-12 col-sm-4">
                            <input type="text" id="hse_no" class="form-control" name="hse_no" placeholder="House Number">
                        </div>
                        <div class="md-form col-12 col-sm-4">
                            <input type="text" id="city_town" class="form-control" name="city_town" placeholder="City/Town" required>
                        </div>
                    </div>

                    <div class="h3">AREA OF INTEREST(S)</div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="area_of_int_1" class="form-control" name="area_of_int_1" placeholder="Area of Interest 1" required>
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="area_of_int_2" class="form-control" name="area_of_int_2" placeholder="Area of Interest 2" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="area_of_int_3" class="form-control" name="area_of_int_3" placeholder="Area of Interest 3">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="area_of_int_4" class="form-control" name="area_of_int_4" placeholder="Area of Interest 4">
                        </div>
                    </div>


                    <div class="h3">EDUCATIONAL BACKGROUND</div>
                    <div class="h5 mt-2">A. JUNIOR HIGH SCHOOL</div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="jhs_nm" class="form-control" name="jhs_nm" placeholder="Name of Junior High School">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="jhs_awd" class="form-control" name="jhs_awd" placeholder="Awards Recieved">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-6">
                            <label for="jhs_start">From</label>
                            <input type="text" id="jhs_start" class="form-control" name="jhs_start" placeholder="MM / YY">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="jhs_end">To</label>
                            <input type="text" id="jhs_end" class="form-control" placeholder="MM / YY" name="jhs_end">
                        </div>
                    </div>

                    <div class="h5 mt-5">B. SECONDARY EDUCATION </div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="shs_nm" class="form-control" name="shs_nm" placeholder="Name of Senior High School">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="shs_course" class="form-control" name="shs_course" placeholder="Course Offered">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-6">
                            <label for="shs_start">From</label>
                            <input type="text" id="shs_start" class="form-control" placeholder="MM / YY" name="shs_start">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="shs_end">To</label>
                            <input type="text" id="shs_end" class="form-control" placeholder="MM / YY" name="shs_end">
                        </div>
                    </div>

                    <div class="h5 mt-5">C. TERTIARY EDUCATION</div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="tet_nm" class="form-control" name="tet_nm" placeholder="Name of Tetiary ">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="tet_course" class="form-control" name="tet_course" placeholder="Course Offered">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-6">
                            <label for="tet_start">From</label>
                            <input type="text" id="tet_start" class="form-control" placeholder="MM / YY" name="tet_start">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="tet_end">To</label>
                            <input type="text" id="tet_end" class="form-control" placeholder="MM / YY" name="tet_end">
                        </div>
                    </div>

                    <div class="h3 mt-5">LAST WORKING PLACE</div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="prev_wkplc" class="form-control" name="prev_wkplc" placeholder="Previous Workplace">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="prev_wkplc_addr" class="form-control" name="prev_wkplc_addr" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="tel" id="prev_wkplc_cont" class="form-control" name="prev_wkplc_cont" placeholder="Contact of Previous Workplace">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="position" class="form-control" name="position" placeholder="Position Held">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-6">
                            <label for="prev_wkplc_start">From</label>
                            <input type="text" id="prev_wkplc_start" class="form-control" placeholder="MM / YY" name="prev_wkplc_start">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="prev_wkplc_end">To</label>
                            <input type="text" id="prev_wkplc_end" class="form-control" placeholder="MM / YY" name="prev_wkplc_end">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-12">
                            <div class="md-form">
                                <textarea type="text" id="form8" name="reason" class="md-textarea mt-4" cols="100"></textarea>
                                <label for="form8">Reasons for leaving previos workplace</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="ref_nm" class="form-control" name="ref_nm" placeholder="Refree Name">
                        </div>

                        <div class="md-form col-12 col-sm-6">
                            <input type="tel" id="ref_cont" class="form-control" name="ref_cont" placeholder="Refree Contact">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-6">
                            <!-- Default inline 1-->
                            <div class="h5">PAYMENT</div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="paymentInline1" name="paymentRadios" value="Paid">
                                <label class="custom-control-label" for="paymentInline1">Paid</label>
                            </div>
                            <!-- payment inline -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="paymentInline2" name="paymentRadios" value="Pending">
                                <label class="custom-control-label" for="paymentInline2">Pending</label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <!-- Default inline 1-->
                            <div class="h5">JOB STATUS</div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="statusInline1" name="statusRadios" value="Posted">
                                <label class="custom-control-label" for="statusInline1">Posted</label>
                            </div>
                            <!-- status inline -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="statusInline2" name="statusRadios" value="Pending">
                                <label class="custom-control-label" for="statusInline2">Pending</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="md-form col-12 col-sm-6">
                            <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Job Title" required>
                        </div>

                        <!-- Select Company -->
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" name="job" id="dropdown">
                                <option value="-">-</option>
                                <?php
                                $company_list = $this->db->get('companies');
                                foreach ($company_list->result() as $company) { ?>
                                    <option value="<?php echo $company->name ?>"><?php echo $company->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                        <!-- Select Company -->

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
                                    <img src="<?php echo base_url(); ?>assets/images/avatar.png" onClick="triggerClick()" class="card-img-top" alt="" id="imageUpdate">
                                </span>
                                <input type="file" name="image" onChange="updatedImage(this)" id="image" class="form-control" style="display: none;">
                                <label>Upload Image</label>
                            </div>
                        </div>

                        <input id="submit" class="btn-block btn btn-success" type="submit" name="add_applicant" value="Submit" />
                        <?php echo form_close(); ?>


                    </div>
                </div>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>