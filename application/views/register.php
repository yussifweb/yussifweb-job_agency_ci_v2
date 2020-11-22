<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

      <main class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4">
                <div class="card">
                <div class="card-header text-center h3">JobCenter</div>
                <div class="card-body">
                <h4 class="h5 font-weight-normal text-center">Sign Up <br/><img class="my-auto" src="<?php echo base_url(); ?>assets/images/bootstrap-solid.svg" alt="" width="72" height="72"></h4>
                <?php echo form_open('home/register_process'); ?>                        
                        <div class="form-group">
                            <label for="name" id="name-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Please Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact" id="contact-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Please Enter Your contact" required>
                        </div>
                        <div class="form-group">
                            <label for="email" id="email-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" id="password-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password" id="password-label">Re-enter Password</label>
                            <input type="password" class="form-control"name="password_2" id="password_2" placeholder="Re-enter Password" required>
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
