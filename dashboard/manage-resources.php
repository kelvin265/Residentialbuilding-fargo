<?php 
  require_once "includes/header.php"; 
  require_once "classes/worker-type.php";
  require_once "classes/activity.php";
  require_once "classes/material.php";
  require_once "classes/machine.php";
  require_once "classes/worker.php";

//  selecting data for the modals
$worker_type= new WorkerType();
$worker_types = $worker_type->selectAll();

$material= new Material();
$materials = $material->selectAll();

$machine = new Machine();
$machines = $machine->selectAll();

// selecting data for the estimated workers
$activity_worker = new Worker();
$query =  "SELECT * FROM activity_worker_cost where activity_id='".$_GET['activity_id']."'";
$activity_workers = $activity_worker->select($query);

// selecting data for the estimated materials
$activity_material = new Material();
$query =  "SELECT * FROM activity_material_cost where activity_id='".$_GET['activity_id']."'";
$activity_materials = $activity_material->select($query);

// selecting data for estimated machines
$activity_machine= new Machine();
$query =  "SELECT * FROM activity_machine_cost where activity_id='".$_GET['activity_id']."'";
$activity_machines = $activity_machine->select($query);

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
                    <h4>Estimated Workers</h4>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php while($row = $activity_workers->fetch_assoc()): ?>
                      <?php $est_count++; ?>
                      <a href="manage-resources" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name: <?=$row['worker_name']?></h5>
                          <small>Type of worker: <?=$row['worker_type_description']?></small>
                        </div>
                        
                            <p class="mb-1">The rate per hour is: <?=$row['hourly_rate']?>, Hours worked per day is: 12 hours, Total number of days is: <?=$row['total_days']?></p>
                          
                        
                        <small>Total cost is: <?=$row['total_cost']?></small>
                      </a>
                    <?php endwhile; ?>
                    <?php if($est_count == 0){ echo "No assigned workers to this activity";} ?>
                    </div>
                  </div>
                </div>
              </div>
<!-- Estimated Materials -->
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
                    <?php while($row = $activity_materials->fetch_assoc()): ?>
                      <?php $est_count++; ?>
                      <a href="manage-resources" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Material: <?=$row['material_name']?></h5>
                          <small>Price: <?=$row['price']?></small>
                        </div>
                        
                            <p class="mb-1">Quantity: <?=$row['quantity']?> </p>
                          
                        
                        <small>Total Cost: <?=$row['total_cost']?></small>
                      </a>
                    <?php endwhile; ?>
                    <?php if($est_count == 0){ echo "No estimated materials for this activity";} ?>
                    </div>
                  </div>
                </div>
              </div>
<!-- Estimated Machinery-->
              <div class="col-12 col-md-6 col-lg-6">
                <div class="buttons">
                  <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"  data-target="#machineryModal"><i class="far fa-edit"></i> Add Machine</a>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Estimated machines to be used</h4>
                  </div>
                  <div class="card-body">
                    <div class="list-group">
                    <?php $est_count = 0; ?>
                    <?php while($row = $activity_machines->fetch_assoc()): ?>
                      <?php $est_count++; ?>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Machine: <?= $row['name'] ?></h5>
                          <small>Rate Per Day: <?= $row['daily_rate'] ?></small>
                        </div>
                        <p class="mb-1">Total Number of days: <?= $row['total_days'] ?></p>
                        <small>Total Cost: <?= $row['total_cost'] ?></small>
                      </a>
                      <?php endwhile; ?>
                    <?php if($est_count == 0){ echo "No estimated machines for this activity";} ?>
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
                <h5 class="modal-title" id="formModal">Add worker for estimation purposes</h5>
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
                          <i class="fas fa-address-card"></i>
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
                          <i class="fas fa-user"></i>
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
      <!-- material modal -->
      <div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add building material for estimation purposes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/activity-controller.php">
                  <div class="form-group">
                    <label>Choose building material</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-hotel"></i>
                        </div>
                      </div>
                      <select class="form-control select2" name="material_id">
                        <?php while($row=$materials->fetch_assoc()): ?>
                          <option value="<?= $row['material_id']; ?>"><?= $row['material_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                        <input type="hidden" name="activity_id" value="<?= $_GET['activity_id']?>" id="idInput">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>quantity</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-balance-scale"></i>
                        </div>
                      </div>
                        <input type="text" name="quantity" class="form-control">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      
      <!-- machine modal -->
      <div class="modal fade" id="machineryModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Estimate machines to be used</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="Post" action="controllers/activity-controller.php">
                  <div class="form-group">
                    <label>Choose Machine</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-car-side"></i>
                        </div>
                      </div>
                      <select class="form-control select2" name="machine_id">
                        <?php while($row=$machines->fetch_assoc()): ?>
                          <option value="<?= $row['machine_id']; ?>"><?= $row['name']; ?></option>
                        <?php endwhile; ?>
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