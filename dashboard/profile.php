<?php 
require_once "includes/header.php"; 

?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          First Name
                        </span>
                        <span class="float-right text-muted">
                        <?= $_SESSION['login_first_name']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Last Name
                        </span>
                        <span class="float-right text-muted">
                        <?= $_SESSION['login_last_name']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                        <?= $_SESSION['login_email']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Dob
                        </span>
                        <span class="float-right text-muted">
                        <?= $_SESSION['login_dob']; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          gender
                        </span>
                        <span class="float-right text-muted">
                        <?= $_SESSION['login_gender']; ?>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="true">Update Personal details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="password-tab2" data-toggle="tab" href="#password" role="tab"
                          aria-selected="false">Change Password</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" action="controllers/user-controller.php" class="needs-validation">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value="<?= $_SESSION["login_first_name"]; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="<?= $_SESSION["login_last_name"]; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="update_email" value="<?= $_SESSION["login_email"]; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the email
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control datepicker" name="dob" value="<?= $_SESSION["login_dob"]; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the DOB
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              
                              <div class="form-group col-md-12 col-12">
                                <label>Gender</label><br>
                                <select class="form-control select2" name="gender">
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab2">
                        <form method="post" action="controllers/user-controller.php" class="needs-validation">
                          <div class="card-header">
                            <h4>Change Password</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="old_password">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="new_password">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                           
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
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
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- profile.html  21 Nov 2019 03:49:32 GMT -->
</html>