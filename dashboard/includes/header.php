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
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
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
        <li class="dropdown active">
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
        <li><a class="nav-link" href="blank.php"><i data-feather="file"></i><span>Blank Page</span></a></li>
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
        <li class="menu-header">Maps</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Google
                Maps</span></a>
            <ul class="dropdown-menu">
            <li><a href="gmaps-advanced-route.php">Advanced Route</a></li>
            <li><a href="gmaps-draggable-marker.php">Draggable Marker</a></li>
            <li><a href="gmaps-geocoding.php">Geocoding</a></li>
            <li><a href="gmaps-geolocation.php">Geolocation</a></li>
            <li><a href="gmaps-marker.php">Marker</a></li>
            <li><a href="gmaps-multiple-marker.php">Multiple Marker</a></li>
            <li><a href="gmaps-route.php">Route</a></li>
            <li><a href="gmaps-simple.php">Simple</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="vector-map.php"><i data-feather="map-pin"></i><span>Vector
                Map</span></a></li>
        <li class="menu-header">Pages</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="user-check"></i><span>Auth</span></a>
            <ul class="dropdown-menu">
            <li><a href="auth-login.php">Login</a></li>
            <li><a href="auth-register.php">Register</a></li>
            <li><a href="auth-forgot-password.php">Forgot Password</a></li>
            <li><a href="auth-reset-password.php">Reset Password</a></li>
            <li><a href="subscribe.php">Subscribe</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="alert-triangle"></i><span>Errors</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="errors-503.php">503</a></li>
            <li><a class="nav-link" href="errors-403.php">403</a></li>
            <li><a class="nav-link" href="errors-404.php">404</a></li>
            <li><a class="nav-link" href="errors-500.php">500</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
                Pages</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="create-post.php">Create Post</a></li>
            <li><a class="nav-link" href="posts.php">Posts</a></li>
            <li><a class="nav-link" href="profile.php">Profile</a></li>
            <li><a class="nav-link" href="contact.php">Contact</a></li>
            <li><a class="nav-link" href="invoice.php">Invoice</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="chevrons-down"></i><span>Multilevel</span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Menu 1</a></li>
            <li class="dropdown">
                <a href="#" class="has-dropdown">Menu 2</a>
                <ul class="dropdown-menu">
                <li><a href="#">Child Menu 1</a></li>
                <li class="dropdown">
                    <a href="#" class="has-dropdown">Child Menu 2</a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Child Menu 1</a></li>
                    <li><a href="#">Child Menu 2</a></li>
                    </ul>
                </li>
                <li><a href="#"> Child Menu 3</a></li>
                </ul>
            </li>
            </ul>
        </li>
        </ul>
    </aside>
    </div>