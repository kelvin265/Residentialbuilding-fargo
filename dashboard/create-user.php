<?php 
  require_once "includes/header.php"; 
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h3>User Information</h3>
                  </div>
                  <div class="card-body">
                    <form id="wizard_with_validation" method="POST" action="controllers/user-controller.php">
                      <h3>Account Information</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Email*</label>
                            <input type="email" name="email" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Password*</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Confirm Password*</label>
                            <input type="password" class="form-control" name="confirm" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">User Type*</label>    
                            <select class="form-control select2" id="user_type" name="user_type">
                              <option value='1' selected>Admin</option>
                            </select>                     
                          </div>     
                        </div>
                      </fieldset>
                      <h3>Profile Information</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">First Name*</label>
                            <input type="text" name="first_name" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Last Name*</label>
                            <input type="text" name="last_name" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Gender*</label>
                              <input type="text" name="gender" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">DOB*</label>
                            <input type="text" class="form-control datepicker" name="dob" required>
                          </div>
                        </div>
                      </fieldset>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Residential Building Fargo</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/form-wizard.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS  -->

</body>


<!-- form-wizard.html  21 Nov 2019 03:55:20 GMT -->
</html>