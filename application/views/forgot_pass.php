      <main class="container">
          <div class="row">
              <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                  <div class="card">
                      <div class="card-header h5 text-center">JobCenter</div>
                      <div class="card-body">
                          <?php echo form_open('home/reset_process'); ?>
                          
                          <h2 class="form-title">Reset password</h2>
                          <div class="form-group">
                              <label for="inputEmail" class="sr-only">Email address</label>
                              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                          </div>
                          <div class="form-group">
                              <input class="btn btn-lg btn-primary btn-block" name="reset-password" type="submit" value="Submit" />
                          </div>
                          <?php echo form_close(); ?>
                      </div>
                      <div class="foot card-footer text-center">
                          <p class="text-muted">&copy; 2020. Jobcenter <br /> All Rights Reserved</p>
                      </div>
                  </div>
              </div>
          </div>
      </main>