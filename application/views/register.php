<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-4 offset-sm-4">
            <div class="card">
                <div class="card-header text-center h3">JobCenter</div>
                <div class="card-body">
                    <h4 class="h5 font-weight-normal text-center">Sign Up <br /><img class="my-auto" src="<?php echo base_url(); ?>assets/images/bootstrap-solid.svg" alt="" width="72" height="72"></h4>
                    <!-- <?php echo validation_errors(); ?> -->
                    <?php echo form_open('home/register_process'); ?>
                    <div class="form-group">
                        <label for="name" id="name-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Please Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" id="contact-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo set_value('contact'); ?>" placeholder="Please Enter Your contact" required>
                    </div>
                    <div class="form-group">
                        <label for="email" id="email-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Please Enter Your Email" required>
                        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" id="password-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password" id="password-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password2" id="password2" value="<?php echo set_value('password2'); ?>" placeholder="Confirm Password" required>
                        <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-sm btn-primary" name="register" type="submit" value="Sign Up" />
                        <a href="<?php echo site_url('home'); ?>" class="btn btn-success btn-sm">Log In</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="card-footer">
                    <a href="dashboard.php" class="btn btn-success btn-lg btn-block" role="button">Dashboard</a>
                </div>
            </div>

        </div>
    </div>
</main>