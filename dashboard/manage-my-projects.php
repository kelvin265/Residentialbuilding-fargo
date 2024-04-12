<?php require_once "includes/header.php"; ?>
<?php require_once "classes/project.php"; ?>
<?php 
  $proj = new Project();
  $query = "Select * from projects where customer_id='".$_SESSION['login_user_id']."'";
  $projects = $proj->select($query);

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
                    <h4>My Projects</h4>
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
                              <?php 
                              $daysDiff = $proj->daysBetweenDates($project['est_start_date'], $project['est_end_date']); 
                              if($daysDiff == 0):
                              ?>

                              <a href="#" id="modal1" class="btn btn-primary" data-id="<?= $project['project_id']?>" data-toggle="modal"  data-target="#exampleModal"><i class="material-icons">create</i> <span
														class="icon-name"></a>
                            <?php endif; ?>
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
      <!-- Modal with form -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">The Project Time Frame (Year - Month - Day)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/project-controller.php">
                  <div class="form-group">
                    <label>Estimate The Start Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00" name="est_start_date">
                      <input type="hidden" name="project_id" id="idInput">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Estimate The End Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00"  name="est_end_date">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
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

  <script>
    $(document).ready(function() {
    $('#modal1').on('click', function(event) {
      const attributeValue = $(this).attr('data-id');
      $('#idInput').val(attributeValue);
    });
  });
  </script>

</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>