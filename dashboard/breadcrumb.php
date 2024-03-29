<?php require_once "includes/header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Default</h4>
                  </div>
                  <div class="card-body">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                      </ol>
                    </nav>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Icon</h4>
                  </div>
                  <div class="card-body">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Home</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Background</h4>
                  </div>
                  <div class="card-body">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-warning text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-success text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-danger text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-secondary text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-dark text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script src="assets/js/custom.js"></script>
</body>


<!-- breadcrumb.html  21 Nov 2019 03:51:00 GMT -->
</html>