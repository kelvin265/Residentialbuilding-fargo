<?php 
  require_once "includes/header.php"; 
  require_once "classes/project.php"; 

  $project = new Project();
  $projects_pending = 0;
  $projects_inprogress = 0;
  $projects_completed = 0;
  $customer;
  if($_SESSION['login_user_type'] == 0){
    // Query to count projects according to their status
  $sql = "SELECT Concat(u.first_name, ' ', u.last_name) As fullname, COUNT(CASE WHEN p.status = 'pending' THEN p.project_id END) AS pending, COUNT(CASE WHEN p.status = 'complete' THEN p.project_id END) AS complete, COUNT(CASE WHEN p.status = 'inprogress' THEN p.project_id END) AS inprogress FROM projects p LEFT JOIN users u ON p.customer_id = u.user_id WHERE u.user_id='".$_SESSION['login_user_id']."' GROUP BY fullname";
  $result = $project->select($sql);
  

  if ($result->num_rows > 0) {
      // Fetch data and store it in an array
      while($row = $result->fetch_assoc()) {
        $projects_pending += $row["pending"];
        $projects_inprogress += $row["inprogress"];
        $projects_completed += $row["complete"];
        $customer = $row["fullname"];
      }
  }
  }
  else{
    // Query to count projects according to their status
    $sql = "SELECT status, COUNT(CASE WHEN status = 'pending' THEN project_id END) AS pending, COUNT(CASE WHEN status = 'complete' THEN project_id END) AS complete, COUNT(CASE WHEN status = 'inprogress' THEN project_id END) AS inprogress FROM projects  GROUP BY status;";
    $result = $project->select($sql);
    if ($result->num_rows > 0) {
        // Fetch data and store it in an array
        while($row = $result->fetch_assoc()) {
          $projects_pending += $row["pending"];
          $projects_inprogress += $row["inprogress"];
          $projects_completed += $row["complete"];
        }
    }

    // Query to count customers
    $sql = "SELECT user_type, COUNT(user_id) AS customer FROM users WHERE user_type= 0  GROUP BY user_type";
    $result = $project->select($sql);
    if ($result->num_rows > 0) {
        // Fetch data and store it in an array
        while($row = $result->fetch_assoc()) {
          $customer = $row["customer"];
        }
    }
  }
  
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">    
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Pending Projects</h5>
                          <h2 class="mb-3 font-18"><?= $projects_pending; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <?php if($_SESSION['login_user_type'] == 0): ?>
                          <div class="card-content">
                            <h5 class="font-15"> Customer's Name</h5>
                            <h2 class="mb-3 font-18"><?= $customer;?></h2>
                          </div>
                        <?php else: ?>
                          <div class="card-content">
                            <h5 class="font-15">Total Customers</h5>
                            <h2 class="mb-3 font-18"><?= $customer;?></h2>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Projects In proegress</h5>
                          <h2 class="mb-3 font-18"><?= $projects_inprogress; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Projects Completed</h5>
                          <h2 class="mb-3 font-18"><?= $projects_completed; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($_SESSION['login_user_type'] == 0): ?>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>My projects progress</h4>
                </div>
                <div class="card-body">
                  <div id="my_project_progress_chart" class="graph"></div>
                </div>
              </div>
            </div>
          </div>
          <?php else: ?>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Customers projects progress</h4>
                </div>
                <div class="card-body">
                  <div id="project_progress_chart" class="graph"></div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="Dashboard.php">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->  
  <script src="assets/bundles/morris/morris.min.js"></script>
  <script src="assets/bundles/morris/raphael-min.js"></script>
  <!-- Page Specific JS File -->
  <?php if($_SESSION['login_user_type'] == 0): ?>
  <script src="assets/js/page/my-project-progress.js"></script>
  <?php else: ?>
    <script src="assets/js/page/project-progress.js"></script>
    <?php endif; ?>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>