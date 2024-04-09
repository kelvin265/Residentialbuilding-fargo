<?php 
require_once "includes/header.php";
require_once "classes/worker-type.php";
//  selecting all departments
$worker_type= new WorkerType();
$worker_types = $worker_type->selectAll();
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="controllers/worker-controller.php" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>New House Building Project Phase</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="new_first_name" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the first name?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the last name?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the address?
                        </div>
                      </div>
                      <div class="form-group">
                        <label> Gender</label>
                        <input type="text" name="gender" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the gender?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the phone number?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Select Type of Worker</label><br>
                        <select class="form-control select2" name="worker_type_code">
                        <?php while($row=$worker_types->fetch_assoc()): ?>
                          <option value="<?= $row['worker_type_code']; ?>"><?= $row['worker_type_code']; ?></option>
                        <?php endwhile; ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>