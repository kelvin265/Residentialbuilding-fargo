<?php require_once "includes/header.php"; ?>
<?php require_once "classes/project.php"; ?>
<?php 
  $project = new Project();
  $projects = $project->selectAll();

  $user = new User();
  $users = $user->selectAll();
?>
    
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Projects</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Project Name</th>
                            <th>Customer Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Estimated Start Date</th>
                            <th>Estimated End Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $count = 0; ?>
                          <?php while($project = $projects->fetch_assoc()): ?>
                          <?php $count++; ?>
                          <tr>
                            <td>
                              <?= $count;?>
                            </td>
                            <td><?= $project['project_name']?></td>
                            
                            <?php while($row = $users->fetch_assoc()): ?>
                              <?php if($row['user_id'] == $project['customer_id']): ?>
                              <td><?= $row['first_name']?> <?= $row['last_name']?></td>
                              <?php endif; ?>
                            <?php endwhile; ?>
                            <td><?= $project['start_date']?></td>
                            <td><?= $project['end_date']?></td>
                            <td><?= $project['est_start_date']?></td>
                            <td><?= $project['est_end_date']?></td>
                            <td>
                              <a href="project-assessment.php?project_id=<?= $project['project_id']?>" class="btn btn-primary"><i class="material-icons">assessment</i> <span
														class="icon-name"></a>
                              <a href="controllers/project-controller.php?delete_id=<?= $project['project_id']?>" class="btn btn-danger"><i class="material-icons">delete_forever</i> <span
														class="icon-name"></a>
                            </td>
                          </tr>
                          <?php endwhile; ?>
                        </tbody>
                      </table>
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
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>