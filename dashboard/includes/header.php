<?php 
require_once "classes/user.php";
//authenticate before accessing site pages
  if(!isset($_SESSION['login_user_id'])){
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile.php  21 Nov 2019 03:49:30 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Residential Building</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/dropzonejs/dropzone.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/bundles/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="assets/bundles/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="assets/bundles/chocolat/dist/css/chocolat.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png' />
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?= $_SESSION['login_first_name'];?> <?= $_SESSION['login_last_name'];?></div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="controllers/user-controller.php?logout_action=0" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="dashboard.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" />
        </a>
        </div>
        <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
            <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="briefcase"></i><span>Widgets</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.php">Chart Widgets</a></li>
            <li><a class="nav-link" href="widget-data.php">Data Widgets</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Apps</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="chat.php">Chat</a></li>
            <li><a class="nav-link" href="portfolio.php">Portfolio</a></li>
            <li><a class="nav-link" href="blog.php">Blog</a></li>
            <li><a class="nav-link" href="calendar.php">Calendar</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="email-inbox.php">Inbox</a></li>
            <li><a class="nav-link" href="email-compose.php">Compose</a></li>
            <li><a class="nav-link" href="email-read.php">read</a></li>
            </ul>
        </li>
        <li class="menu-header">UI Elements</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Basic
                Components</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="alert.php">Alert</a></li>
            <li><a class="nav-link" href="badge.php">Badge</a></li>
            <li><a class="nav-link" href="breadcrumb.php">Breadcrumb</a></li>
            <li><a class="nav-link" href="buttons.php">Buttons</a></li>
            <li><a class="nav-link" href="collapse.php">Collapse</a></li>
            <li><a class="nav-link" href="dropdown.php">Dropdown</a></li>
            <li><a class="nav-link" href="checkbox-and-radio.php">Checkbox &amp; Radios</a></li>
            <li><a class="nav-link" href="list-group.php">List Group</a></li>
            <li><a class="nav-link" href="media-object.php">Media Object</a></li>
            <li><a class="nav-link" href="navbar.php">Navbar</a></li>
            <li><a class="nav-link" href="pagination.php">Pagination</a></li>
            <li><a class="nav-link" href="popover.php">Popover</a></li>
            <li><a class="nav-link" href="progress.php">Progress</a></li>
            <li><a class="nav-link" href="tooltip.php">Tooltip</a></li>
            <li><a class="nav-link" href="flags.php">Flag</a></li>
            <li><a class="nav-link" href="typography.php">Typography</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="shopping-bag"></i><span>Advanced</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="avatar.php">Avatar</a></li>
            <li><a class="nav-link" href="card.php">Card</a></li>
            <li><a class="nav-link" href="modal.php">Modal</a></li>
            <li><a class="nav-link" href="sweet-alert.php">Sweet Alert</a></li>
            <li><a class="nav-link" href="toastr.php">Toastr</a></li>
            <li><a class="nav-link" href="empty-state.php">Empty State</a></li>
            <li><a class="nav-link" href="multiple-upload.php">Multiple Upload</a></li>
            <li><a class="nav-link" href="pricing.php">Pricing</a></li>
            <li><a class="nav-link" href="tabs.php">Tab</a></li>
            </ul>
        </li>
        <li class="menu-header">Otika</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Forms</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="basic-form.php">Basic Form</a></li>
            <li><a class="nav-link" href="forms-advanced-form.php">Advanced Form</a></li>
            <li><a class="nav-link" href="forms-editor.php">Editor</a></li>
            <li><a class="nav-link" href="forms-validation.php">Validation</a></li>
            <li><a class="nav-link" href="form-wizard.php">Form Wizard</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="basic-table.php">Basic Tables</a></li>
            <li><a class="nav-link" href="advance-table.php">Advanced Table</a></li>
            <li><a class="nav-link" href="datatables.php">Datatable</a></li>
            <li><a class="nav-link" href="export-table.php">Export Table</a></li>
            <li><a class="nav-link" href="editable-table.php">Editable Table</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="pie-chart"></i><span>Charts</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="chart-amchart.php">amChart</a></li>
            <li><a class="nav-link" href="chart-apexchart.php">apexchart</a></li>
            <li><a class="nav-link" href="chart-echart.php">eChart</a></li>
            <li><a class="nav-link" href="chart-chartjs.php">Chartjs</a></li>
            <li><a class="nav-link" href="chart-sparkline.php">Sparkline</a></li>
            <li><a class="nav-link" href="chart-morris.php">Morris</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Icons</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="icon-font-awesome.php">Font Awesome</a></li>
            <li><a class="nav-link" href="icon-material.php">Material Design</a></li>
            <li><a class="nav-link" href="icon-ionicons.php">Ion Icons</a></li>
            <li><a class="nav-link" href="icon-feather.php">Feather Icons</a></li>
            <li><a class="nav-link" href="icon-weather-icon.php">Weather Icon</a></li>
            </ul>
        </li>
        <li class="menu-header">Media</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Gallery</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="light-gallery.php">Light Gallery</a></li>
            <li><a href="gallery1.php">Gallery 2</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>
            <ul class="dropdown-menu">
            <li><a href="carousel.php">Bootstrap Carousel.php</a></li>
            <li><a class="nav-link" href="owl-carousel.php">Owl Carousel</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="timeline.php"><i data-feather="sliders"></i><span>Timeline</span></a></li>
        <li class="menu-header">Main Components</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="cpu"></i><span>My Projects</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="manage-my-projects.php">Manage Projects</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="cpu"></i><span>Project</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-project.php">New Project</a></li>
            <li><a class="nav-link" href="manage-projects.php">Manage Projects</a></li>
          </ul>
        </li>
        <?php if($_SESSION['login_user_type'] == 1): ?>
        <li class="menu-header">Prerequisits</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="users"></i><span>Workers</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-worker.php">New Worker</a></li>
            <li><a class="nav-link" href="manage-workers.php">Manage Workers</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="slack"></i><span>Worker Types</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-worker-type.php">New Worker Types</a></li>
            <li><a class="nav-link" href="manage-worker-types.php">Manage Worker Types</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="truck"></i><span>Machinery</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-machine.php">New Machines</a></li>
            <li><a class="nav-link" href="manage-machines.php">Manage Machines</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="pie-chart"></i><span>Phases</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-phase.php">new phase</a></li>
            <li><a class="nav-link" href="manage-phases.php">Manage Phases</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="shopping-bag"></i><span>Parts</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-part.php">New Part</a></li>
            <li><a class="nav-link" href="manage-parts.php">Manage Parts</a></li>
          </ul>
        </li>
        <li class="menu-header">Other Pages</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="users"></i><span>Users</span></a>
          <ul class="dropdown-menu">
            <li><a href="create-user.php">New User</a></li>
            <li><a href="manage-users.php">Manage Users</a></li>

          </ul>
        </li>
        <?php endif; ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="copy"></i><span>Reports</span></a>
          <ul class="dropdown-menu">
            <li><a href="emp-performance-report.php">Project Progress</a></li>
            <li><a href="controller/report.php?overall=0">Overall performance</a></li>

          </ul>
        </li>
        </ul>
    </aside>
    </div>