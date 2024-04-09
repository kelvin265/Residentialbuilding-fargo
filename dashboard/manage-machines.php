<?php require_once "includes/header.php"; ?>
<?php require_once "classes/machine.php"; ?>
<?php 
  $machine = new Machine();
  $machines = $machine->selectAll();
?>
    
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage machines</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rate Per Day</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $count = 0; ?>
                          <?php while($machine = $machines->fetch_assoc()): ?>
                          <?php $count++; ?>
                          <tr>
                            <td>
                              <?= $count;?>
                            </td>
                            <td><?= $machine['name']?></td>
                            <td><?= $machine['description']?></td>
                            <td><?= $machine['daily_rate']?></td>
                            <td>
                              <a href="#" class="btn btn-primary"><i class="material-icons">create</i> <span
														class="icon-name"></a>
                              <a href="controllers/machine-controller.php?delete_id=<?= $machine['machine_id']?>" class="btn btn-danger"><i class="material-icons">delete_forever</i> <span
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