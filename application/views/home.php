<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<main class="container">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                <div class="card">
                <div class="card-header h5 text-center">JobCenter</div>
                <div class="card-body">
                <h4 class="h3 mb-3 font-weight-normal text-center">Please Sign In</h4>
                <?php echo form_open('home/login'); ?>
                        <div class="form-group">
                            <label for="inputName" class="sr-only">Email address</label>
                            <input type="text" id="inputName" class="form-control" name="name" placeholder="Name" required>    
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>    
                        </div>
                        <!-- <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label>
                        </div> -->
                        <div class="form-group">
                          <input type="submit" class="btn btn-sm btn-primary" name="login"  value="Sign in"/>
                          <a href="<?php echo site_url('home/register'); ?>" class="btn btn-sm btn-info" name="register" type="submit">Register</a>  
                        </div>
                        <?php echo form_close(); ?>
                      <p><a class="nav-link" href="reset.php">Forgot your password?</a></p>
                </div>
                <div class="foot card-footer text-center">
                    <p class="text-muted">&copy; 2020. Jobcenter <br/> All Rights Reserved</p>
                  </div>
                </div>                      
                </div>
            </div>
    </main>

