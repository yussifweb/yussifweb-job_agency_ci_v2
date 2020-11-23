<?php $token = $this->uri->segment(3); ?>
      
      <main class="container">
          <div class="row">
              <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                  <div class="card">
                      <div class="card-header h5 text-center">JobCenter</div>
                      <div class="card-body">
                          <?php echo form_open('home/reset_password_process/' . $token); ?>
                          <h4 class="h3 mb-3 font-weight-normal text-center">New Password</h4>
                          <div class="form-group">
                              <label for="inputPassword" class="sr-only">Password</label>
                              <input type="password" id="inputPassword" class="form-control" name="new_password" placeholder="Password" required>
                          </div>
                          <div class="form-group">
                              <label for="inputPassword" class="sr-only">Confirm Password</label>
                              <input type="password" id="inputPassword" class="form-control" name="new_password2" placeholder="Confirm Password" required>
                          </div>
                          <input class="btn btn-lg btn-primary btn-block" name="reset" type="submit" value="Reset Password"/>
                          <?php echo form_close(); ?>
                      </div>
                      <div class="foot card-footer text-center">
                          <p class="text-muted">&copy; 2020. Jobcenter <br /> All Rights Reserved</p>
                      </div>
                  </div>
              </div>
          </div>
      </main>