<?php require_once "includes/header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="controllers/worker-type-controller.php" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>New House Building Project Type of Worker</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Worker Type Code</label>
                        <input type="text" name="new_worker_type_code" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the unique code?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="worker_type_description" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the phase description?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Rate Per Hour</label>
                        <input type="text" name="hourly_rate" class="form-control" required="">
                        <div class="invalid-feedback">
                          What's the rate per hour for this type of worker?
                        </div>
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