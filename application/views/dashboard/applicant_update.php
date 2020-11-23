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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mdb.lite.min.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <title>Update Employee | <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <!-- dashboard nav -->
    <?php $this->load->view('dashboard/inc/nav'); ?>
    <!-- dashboard nav -->

    <div class="container mt-5 mb-5">
        <div class="col-12 col-sm-10 offset-sm-1">
            <div class="card">
                <div class="card-header">Update Applicant</div>
                <div class="card-body">
                    <?php
                    $applicant_list = $this->db->get_where('applicants', array('id' => $id));
                    foreach ($applicant_list->result() as $applicant) {
                    ?>
                        <?php echo form_open('applicants/update_applicant_process/' . $applicant->id); ?>

                        <div class="h3">PERSONAL INFORMATION </div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="f_name" class="form-control" name="f_name" value="<?php echo $applicant->f_name; ?>" required>
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="l_name" class="form-control" name="l_name" value="<?php echo $applicant->l_name; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-7">
                                <!-- <label for="dob">Date of Birth</label> -->
                                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $applicant->dob; ?>" required>
                            </div>
                            <div class="md-form col-12 col-sm-5">
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $applicant->age; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $applicant->email; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="tel" id="phone" class="form-control" name="phone" value="<?php echo $applicant->phone; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="country" class="form-control" name="country" value="<?php echo $applicant->country; ?>" required>
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="dialect" class="form-control" name="dialect" value="<?php echo $applicant->dialect; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-8">
                                <div class="mt-4">
                                    <!-- Default inline 1-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline1" name="id_typeRadios" value="Passport" <?php if ($applicant->id_typeRadios == "Passport") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="custom-control-label" for="defaultInline1">Passport</label>
                                    </div>
                                    <!-- Default inline -->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline2" name="id_typeRadios" value="Drivers Licence" <?php if ($applicant->id_typeRadios == "Drivers Licence") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                        <label class="custom-control-label" for="defaultInline2">Drivers License</label>
                                    </div>
                                    <!-- Default inline 1-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline3" name="id_typeRadios" value="Voters ID" <?php if ($applicant->id_typeRadios == "Voters ID") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="custom-control-label" for="defaultInline3">Voters ID</label>
                                    </div>
                                    <!-- Default inline -->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline4" name="id_typeRadios" value="National ID" <?php if ($applicant->id_typeRadios == "National ID") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                        <label class="custom-control-label" for="defaultInline4">National ID</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 md-form">
                                <input type="text" id="id_no" class="form-control" name="id_no" placeholder="ID Number" value="<?php echo $applicant->id_no ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-4">
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="genderInline1" name="genderRadios" value="Male" <?php if ($applicant->genderRadios == "Male") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="genderInline1">Male</label>
                                </div>
                                <!-- gender inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="genderInline2" name="genderRadios" value="Female" <?php if ($applicant->genderRadios == "Female") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="genderInline2">Female</label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-8">
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="marstatInline1" name="mar_statRadios" value="Single" <?php if ($applicant->mar_statRadios == "Single") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                    <label class="custom-control-label" for="marstatInline1">Single</label>
                                </div>
                                <!-- marstat inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="marstatInline2" name="mar_statRadios" value="Married" <?php if ($applicant->mar_statRadios == "Married") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                    <label class="custom-control-label" for="marstatInline2">Married</label>
                                </div>
                                <!-- marstat inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="marstatInline3" name="mar_statRadios" value="Divorced" <?php if ($applicant->mar_statRadios == "Divorced") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                    <label class="custom-control-label" for="marstatInline3">Divorced</label>
                                </div>
                                <!-- marstat inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="marstatInline4" name="mar_statRadios" value="Widowed" <?php if ($applicant->mar_statRadios == "Widowed") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                    <label class="custom-control-label" for="marstatInline4">Widowed</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="spouse" class="form-control" name="spouse" placeholder="Spouse" value="<?php echo $applicant->spouse; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="religion" class="form-control" name="religion" placeholder="Religion" value="<?php echo $applicant->religion; ?>" required>
                            </div>
                        </div>

                        <div class="h3">LOCATION DETAILS</div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="residence" class="form-control" name="residence" placeholder="Residence" value="<?php echo $applicant->residence; ?>" required>
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="box_addr" class="form-control" name="box_addr" placeholder="Address" value="<?php echo $applicant->box_addr; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="landmark" class="form-control" name="landmark" placeholder="Landmark" value="<?php echo $applicant->landmark; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="street_nm" class="form-control" name="street_nm" placeholder="Street Name" value="<?php echo $applicant->street_nm; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-4">
                                <input type="text" id="suburb" class="form-control" name="suburb" placeholder="Suburb" value="<?php echo $applicant->suburb; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-4">
                                <input type="text" id="hse_no" class="form-control" name="hse_no" placeholder="House Number" value="<?php echo $applicant->hse_no; ?>">
                            </div>
                            <div class="md-form col-12 col-sm-4">
                                <input type="text" id="city_town" class="form-control" name="city_town" placeholder="City/Town" value="<?php echo $applicant->city_town; ?>" required>
                            </div>
                        </div>

                        <div class="h3 mt-5">AREA OF INTEREST(S) </div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="area_of_int_1" class="form-control" name="area_of_int_1" placeholder="Area of Interest 1" value="<?php echo $applicant->area_of_int_1; ?>" required>
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="area_of_int_2" class="form-control" name="area_of_int_2" placeholder="Area of Interest 2" value="<?php echo $applicant->area_of_int_2; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="area_of_int_3" class="form-control" name="area_of_int_3" placeholder="Area of Interest 3" value="<?php echo $applicant->area_of_int_3; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="area_of_int_4" class="form-control" name="area_of_int_4" placeholder="Area of Interest 4" value="<?php echo $applicant->area_of_int_4; ?>">
                            </div>
                        </div>

                        <div class="h3">EDUCATIONAL BACKGROUND</div>
                        <div class="h5 mt-2">A. JUNIOR HIGH SCHOOL</div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="jhs_nm" class="form-control" name="jhs_nm" placeholder="Name of Junior High School" value="<?php echo $applicant->jhs_nm; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="jhs_awd" class="form-control" name="jhs_awd" placeholder="Awards Recieved" value="<?php echo $applicant->jhs_awd; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-6">
                                <label for="jhs_start">From</label>
                                <input type="text" id="jhs_start" class="form-control" name="jhs_start" placeholder="MM / YY" value="<?php echo $applicant->jhs_start; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="jhs_end">To</label>
                                <input type="text" id="jhs_end" class="form-control" placeholder="MM / YY" name="jhs_end" value="<?php echo $applicant->jhs_end; ?>">
                            </div>
                        </div>

                        <div class="h5 mt-4">B. SECONDARY EDUCATION </div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="shs_nm" class="form-control" name="shs_nm" placeholder="Name of Senior High School" value="<?php echo $applicant->shs_nm; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="shs_course" class="form-control" name="shs_course" placeholder="Course Offered" value="<?php echo $applicant->shs_course; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-6">
                                <label for="shs_start">From</label>
                                <input type="text" id="shs_start" class="form-control" placeholder="MM / YY" name="shs_start" value="<?php echo $applicant->shs_start; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="shs_end">To</label>
                                <input type="text" id="shs_end" class="form-control" placeholder="MM / YY" name="shs_end" value="<?php echo $applicant->shs_end; ?>">
                            </div>
                        </div>

                        <div class="h5 mt-4">C. TERTIARY EDUCATION</div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="tet_nm" class="form-control" name="tet_nm" placeholder="Name of Tetiary" value="<?php echo $applicant->tet_nm; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="tet_course" class="form-control" name="tet_course" placeholder="Course Offered" value="<?php echo $applicant->tet_course; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-6">
                                <label for="tet_start">From</label>
                                <input type="text" id="tet_start" class="form-control" placeholder="MM / YY" name="tet_start" value="<?php echo $applicant->tet_start; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="tet_end">To</label>
                                <input type="text" id="tet_end" class="form-control" placeholder="MM / YY" name="tet_end" value="<?php echo $applicant->tet_end; ?>">
                            </div>
                        </div>

                        <div class="h3 mt-5">LAST WORKING PLACE</div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="prev_wkplc" class="form-control" name="prev_wkplc" placeholder="Previous Workplace" value="<?php echo $applicant->prev_wkplc; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="prev_wkplc_addr" class="form-control" name="prev_wkplc_addr" placeholder="Address" value="<?php echo $applicant->prev_wkplc_addr; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="tel" id="prev_wkplc_cont" class="form-control" name="prev_wkplc_cont" placeholder="Contact of Previous Workplace" value="<?php echo $applicant->prev_wkplc_cont; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="position" class="form-control" name="position" placeholder="Position Held" value="<?php echo $applicant->position; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-6">
                                <label for="prev_wkplc_start">From</label>
                                <input type="text" id="prev_wkplc_start" class="form-control" placeholder="MM / YY" name="prev_wkplc_start" value="<?php echo $applicant->prev_wkplc_start; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="prev_wkplc_end">To</label>
                                <input type="text" id="prev_wkplc_end" class="form-control" placeholder="MM / YY" name="prev_wkplc_end" value="<?php echo $applicant->prev_wkplc_end; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-12">
                                <div class="md-form">
                                    <textarea type="text" id="form8" name="reason" class="md-textarea mt-4" cols="100"><?php echo $applicant->reason; ?></textarea>
                                    <label for="form8">Reasons for leaving previos workplace</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="ref_nm" class="form-control" name="ref_nm" placeholder="Refree Name" value="<?php echo $applicant->ref_nm; ?>">
                            </div>

                            <div class="md-form col-12 col-sm-6">
                                <input type="tel" id="ref_cont" class="form-control" name="ref_cont" placeholder="Refree Contact" value="<?php echo $applicant->ref_cont; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-sm-6">
                                <div class="h5">PAYMENT</div>
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="paymentInline1" name="paymentRadios" value="Paid" <?php if ($applicant->paymentRadios == "Paid") {
                                                                                                                                                echo "checked";
                                                                                                                                            }; ?>>
                                    <label class="custom-control-label" for="paymentInline1">Paid</label>
                                </div>
                                <!-- payment inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="paymentInline2" name="paymentRadios" value="Pending" <?php if ($applicant->paymentRadios == "Pending") {
                                                                                                                                                    echo "checked";
                                                                                                                                                }; ?>>
                                    <label class="custom-control-label" for="paymentInline2">Pending</label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="h5">JOB STATUS</div>
                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="statusInline1" name="statusRadios" value="Posted" <?php if ($applicant->statusRadios == "Posted") {
                                                                                                                                                echo "checked";
                                                                                                                                            }; ?>>
                                    <label class="custom-control-label" for="statusInline1">Posted</label>
                                </div>
                                <!-- status inline -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="statusInline2" name="statusRadios" value="Pending" <?php if ($applicant->statusRadios == "Pending") {
                                                                                                                                                echo "checked";
                                                                                                                                            }; ?>>
                                    <label class="custom-control-label" for="statusInline2">Pending</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="md-form col-12 col-sm-6">
                                <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Job Title" value="<?php echo $applicant->job_title; ?>">
                            </div>

                            <div class="form-group md-form col-12 col-sm-6">
                                <!-- <label for="company">Company</label> -->
                                <select class="form-control" name="company" id="dropdown">
                                    <option value="<?php echo $applicant->company; ?>"><?php echo $applicant->company; ?></option>
                                    <?php
                                    $company_list = $this->db->get('companies');
                                    foreach ($company_list->result() as $company) { ?>
                                        <option value="<?php echo $company->name ?>"><?php echo $company->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-sm-4">
                                    <span class="img-div">
                                        <div class="text-center img-placeholder" onClick="triggerClick()">
                                            <h4>Upload image</h4>
                                        </div>
                                        <img src="<?php echo base_url(); ?>uploads/applicants/<?php echo $applicant->image; ?>" onClick="triggerClick()" class="card-img-top" id="imageUpdate">
                                    </span>
                                    <input type="file" name="image" onChange="updatedImage(this)" id="image" style="display: none;">
                                    <label>Upload Image</label>
                                </div>
                            </div>

                            <input id="submit" class="btn-block btn btn-success" type="submit" name="update_applicant" value="Update" />
                        <?php } ?>
                        <?php echo form_close(); ?>

                        </div>
                </div>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

            <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>