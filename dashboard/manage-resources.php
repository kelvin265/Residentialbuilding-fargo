<?php 
  require_once "includes/header.php"; 
  require_once "classes/worker-type.php";
  require_once "classes/activity.php";

//  selecting all departments
$worker_type= new WorkerType();
$worker_types = $worker_type->selectAll();

$activity = new Activity();
$query = "select * from activities where project_id ='".$_GET['project_id']."'";
$activities = $activity->select($query);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
<!-- Estimated Workers -->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#workerModal"><i class="far fa-edit"></i> Assign Worker</a>
                </div>               
                <div class="card">
                  <div class="card-header">
                    <h4>Assigned Workers</h4>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php while($act = $activities->fetch_assoc()): ?>
                      <?php $est_count++; ?>
                      <a href="manage-resources" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <?php while($row = $phases->fetch_assoc()): ?>
                          <?php if($row['phase_id'] == $act['phase_id']): ?>
                            <h5 class="mb-1">Phase: <?=$row['name']?></h5>
                          <?php endif; ?>
                        <?php endwhile; ?>
                          <small>From: <?=$act['start_date']?>, To: <?=$act['end_date']?></small>
                        </div>
                        
                            <p class="mb-1">The activity description is: <?=$act['description']?> </p>
                          
                        
                        <small>Donec id elit non mi porta.</small>
                      </a>
                    <?php endwhile; ?>
                    <?php if($est_count == 0){ echo "No estimated activities for any phase";} ?>
                    </div>
                  </div>
                </div>
              </div>
<!-- Estimated Parts -->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#materialModal"><i class="far fa-edit"></i> Add Material</a>
                </div>               
                <div class="card">
                  <div class="card-header">
                    <h4>Estimated Materials</h4>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php while($act = $activities->fetch_assoc()): ?>
                      <?php $est_count++; ?>
                      <a href="manage-resources" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <?php while($row = $phases->fetch_assoc()): ?>
                          <?php if($row['phase_id'] == $act['phase_id']): ?>
                            <h5 class="mb-1">Phase: <?=$row['name']?></h5>
                          <?php endif; ?>
                        <?php endwhile; ?>
                          <small>From: <?=$act['start_date']?>, To: <?=$act['end_date']?></small>
                        </div>
                        
                            <p class="mb-1">The activity description is: <?=$act['description']?> </p>
                          
                        
                        <small>Donec id elit non mi porta.</small>
                      </a>
                    <?php endwhile; ?>
                    <?php if($est_count == 0){ echo "No estimated activities for any phase";} ?>
                    </div>
                  </div>
                </div>
              </div>
<!-- Estimated Machinery-->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#realModal"><i class="far fa-edit"></i> Add Activity</a>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Actual Activities</h4>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">List group item heading</h5>
                          <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                          varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">List group item heading</h5>
                          <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                          varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">List group item heading</h5>
                          <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                          varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- worker modal -->
      <div class="modal fade" id="workerModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add activity for estimation purposes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/activity-controller.php">
                  <div class="form-group">
                    <label>Choose Type of Worker</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                      <select class="form-control select2" id="worker_type">
                        <?php while($row=$worker_types->fetch_assoc()): ?>
                          <option value="<?= $row['worker_type_code']; ?>"><?= $row['worker_type_description']; ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Select Worker</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-newspaper"></i>
                        </div>                       
                      </div>
                      <select class="form-control select2" id="worker" name="worker_id">
                          <option value=""></option>
                        </select>
                      <input type="hidden" name="activity_id" value="<?= $_GET['activity_id']?>" id="idInput">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- real modal end -->
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
<script>
    $(document).ready(function() {
        // Function to update the second combobox based on the selected value of the first combobox
        $('#worker_type').change(function() {
            var selectedValue = $(this).val();
            var secondComboBox = $('#worker');

            // Clear existing options in the second combobox
            secondComboBox.empty();

            // Make AJAX request to fetch options based on the selected value
            $.ajax({
                url: 'controllers/worker-controller.php', 
                type: 'GET',
                data: { selectedValue: selectedValue },
                dataType: 'json',
                success: function(response) {
                    // Populate the second combobox with fetched options
                    $.each(response, function(index, option) {
                        secondComboBox.append($('<option>').text(option.name).attr('value', option.worker_id));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch options:', error);
                }
            });
        });

        // Trigger change event initially to populate the second combobox based on default selection
        $('#worker_type').change();
    });
</script>

</body>


<!-- list-group.html  21 Nov 2019 03:51:01 GMT -->
</html>