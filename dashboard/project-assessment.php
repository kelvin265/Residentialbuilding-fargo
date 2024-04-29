<?php 
  require_once "includes/header.php"; 
  require_once "classes/phase.php";
  require_once "classes/activity.php";

//  selecting all phases
$phase= new Phase();
$phases = $phase->selectAll();
$phaseRows = [];
while ($row = $phases->fetch_assoc()) {
    $phaseRows[] = $row;
}

$activity = new Activity();
// retrieving data for estimated activities
$query = "select * from activities where project_id ='".$_GET['project_id']."' and estimated=1";
$activities = $activity->select($query);
$estActivities = [];

$Estimate_total_cost = 0 ;
while ($row = $activities->fetch_assoc()) {
    $estActivities[] = $row;

    // calculating total estimate cost
    $Estimate_total_cost += $activity->totalActivityCost($row['activity_id']);
}

// retrieving data for actual activities
$query = "select * from activities where project_id ='".$_GET['project_id']."' and estimated=0";
$activities = $activity->select($query);
$actualActivities = [];

$Actual_total_cost = 0 ;
while ($row = $activities->fetch_assoc()) {
    $actualActivities[] = $row;

    // calculating total estimate cost
    $Actual_total_cost += $activity->totalActivityCost($row['activity_id']);
}
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
<!-- Estimated Activities -->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#estimateModal"><i class="far fa-edit"></i> Add Activity</a>
                  <a href="bill-of-quantity.php?project_id=<?= $_GET['project_id']?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-paper-plane"></i> Bill of Quantitty</a>
                
                </div>               
                <div class="card">
                  <div class="card-header justify-content-between">
                    <h4>Estimated Activities</h4>
                    <h5>Total Cost is: <?=$Estimate_total_cost;?></h5>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php foreach($estActivities as $act): ?>
                      <?php $est_count++; ?>
                      <a href="manage-resources.php?activity_id=<?= $act['activity_id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <?php foreach($phaseRows as $row): ?>
                          <?php if($row['phase_id'] == $act['phase_id']): ?>
                            <h5 class="mb-1">Phase: <?=$row['name']?></h5>
                          <?php endif; ?>
                        <?php endforeach; ?>
                          <small>From: <?=$act['start_date']?>, To: <?=$act['end_date']?></small>
                        </div>
                        
                            <p class="mb-1">The activity description is: <?=$act['description']?> </p>
                          
                        
                        <small>Total Cost: <?= $activity->totalActivityCost($act['activity_id'])?></small>
                      </a>
                    <?php endforeach; ?>
                    <?php if($est_count == 0){ echo "No estimated activities for any phase";} ?>
                    </div>
                  </div>
                </div>
              </div>
<!-- Actual Activities -->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#realModal"><i class="far fa-edit"></i> Add Activity</a>
                  <a href="expenditure.php?project_id=<?= $_GET['project_id']?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-paper-plane"></i> Expenditure Report</a>
                </div>
                <div class="card">
                  <div class="card-header justify-content-between">
                    <h4>Actual Activities</h4>
                    <h5>Total Cost is: <?=$Actual_total_cost;?></h5>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php foreach($actualActivities as $act): ?>
                      <?php $est_count++; ?>
                      <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <?php foreach($phaseRows as $row): ?>
                          <?php if($row['phase_id'] == $act['phase_id']): ?>
                            <a href="manage-resources.php?activity_id=<?= $act['activity_id']?>" > <h5 class="mb-1">Phase: <?=$row['name']?></h5> </a>
                          <?php endif; ?>
                        <?php endforeach; ?>
                          <a href="#" data-toggle="modal" id="endAct" data-id="<?= $act['activity_id']?>" data-target="#endActivityModal"><small>From: <?=$act['start_date']?> To: <?=$act['end_date']?></small></a>
                        </div>
                        
                            <p class="mb-1">The activity description is: <?=$act['description']?> </p>
                          
                        
                        <small>Total Cost: <?= $activity->totalActivityCost($act['activity_id'])?></small>
                      </div>
                    <?php endforeach; ?>
                    <?php if($est_count == 0){ echo "No Actual activities for any phase";} ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- estimate modal -->
      <div class="modal fade" id="estimateModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Estimate Project Activity on Phase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/activity-controller.php">
                  <div class="form-group">
                    <label>Choose Phase</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                      <select class="form-control select2" name="phase_id">
                        <?php foreach($phaseRows as $row): ?>
                          <option value="<?= $row['phase_id']; ?>"><?= $row['name']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity description</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-newspaper"></i>
                        </div>
                        
                      </div>
                      <input type="text" class="form-control " placeholder="description" name="est_description">
                      <input type="hidden" name="project_id" value="<?= $_GET['project_id']?>" id="idInput">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Estimate The Start Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00"  name="start_date">
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
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00"  name="end_date">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- estimate modal end -->
      <!-- real modal -->
      <div class="modal fade" id="realModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
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
                    <label>Choose Phase</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                      <select class="form-control select2" name="phase_id">
                        <?php foreach($phaseRows as $row): ?>
                          <option value="<?= $row['phase_id']; ?>"><?= $row['name']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity description</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-newspaper"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control " placeholder="description" name="actual_description">
                      <input type="hidden" name="project_id" value="<?= $_GET['project_id']?>" id="idInput">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Enter The Start Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00"  name="start_date">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- real modal end -->
      <!-- real modal -->
      <div class="modal fade" id="endActivityModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">End The Current Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/activity-controller.php">
                  <div class="form-group">
                    <label>Enter The End Date (Year-month-day)</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="0000-00-00"  name="end_activity">
                      <input type="hidden" id="idIn" name="activity_id">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- end activity modal end -->
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
  <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/sweetalert.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script>
    $(document).ready(function() {
    $('#endAct').on('click', function(event) {
      const attributeValue = $(this).attr('data-id');
      $('#idIn').val(attributeValue);
    });
  });
  </script>
</body>


<!-- list-group.html  21 Nov 2019 03:51:01 GMT -->
</html>