<?php require_once "includes/header.php"; ?>
<?php 
$user = new User();
$query = "select * from users where user_type=0";
$users = $user->select($query);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="controllers/machine-controller.php" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>New House Building Project</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="new_project_name" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the name of the project?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Customer Name</label><br>
                        <select class="form-control select2" name="customer_id">
                        <?php while($row=$users->fetch_assoc()): ?>
                          <option value="<?= $row['user_id']; ?>"><?= $row['first_name']; ?> <?= $row['last_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                      </div>
                      <!-- <div class="form-group">
                        <label>Starting Date</label>
                        <input type="text" name="start_date" class="form-control datepicker">
                      </div>
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="text" name="end_date" class="form-control datepicker">
                      </div>
                      <div class="form-group">
                        <label>Estimated Start Date</label>
                        <input type="text" name="est_start_date" class="form-control datepicker">
                      </div>
                      <div class="form-group">
                        <label>Estimated End Date</label>
                        <input type="text" name="est_end_date" class="form-control datepicker">
                      </div> -->
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