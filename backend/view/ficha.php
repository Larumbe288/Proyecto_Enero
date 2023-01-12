<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Tables - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no'
          name='template/assets/img/icon.ico" type="image/x-icon"/'>
    <link rel="icon" href="../../../../dashboard/template/examples/assets/img/icon.ico" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="../../../dashboard/template/examples/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../../../dashboard/template/examples/assets/css/fonts.min.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="../../../dashboard/template/examples/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../dashboard/template/examples/assets/css/atlantis.min.css">
</head>

<body>
<div class="">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="../../../dashboard/template/examples/demo1/index.html" class="logo"><img
                        src="../../../dashboard/img/logo.png" alt="navbar brand" class="navbar-brand"
                        style="width: 25%"></a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            <div class="container-fluid">
                <div class="collapse" id="search-nav">
                    <form class="navbar-left navbar-form nav-search mr-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Search ../../../..." class="form-control">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                           aria-expanded="false" aria-controls="search-nav">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                           aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="../../../dashboard/template/examples/assets/img/profile.jpg"
                                     alt="../../../..."
                                     class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img
                                                    src="../../../../dashboard/template/examples/assets/img/profile.jpg"
                                                    alt="image profile" class="avatar-img rounded">
                                        </div>
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION["login"] ?></h4>
                                            <p class="text-muted"></p><a
                                                    href="profile.html"
                                                    class="btn btn-xs btn-secondary btn-sm">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Balance</a>
                                    <a class="dropdown-item" href="#">Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">

        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src="../../../dashboard/template/examples/assets/img/profile.jpg" alt="../../../..."
                             class="avatar-img rounded-circle">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?php echo $_SESSION["login"] ?>
                                    <span class="user-level">Administrator</span>
                                    <span class="caret"></span>
                                </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edit">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-user-alt"></i>
                            <p>Users</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../components/avatars.html">
                                        <span class="sub-item">Avatars</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/buttons.html">
                                        <span class="sub-item">Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/gridsystem.html">
                                        <span class="sub-item">Grid System</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/panels.html">
                                        <span class="sub-item">Panels</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/notifications.html">
                                        <span class="sub-item">Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/sweetalert.html">
                                        <span class="sub-item">Sweet Alert</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/font-awesome-icons.html">
                                        <span class="sub-item">Font Awesome Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/simple-line-icons.html">
                                        <span class="sub-item">Simple Line Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/flaticons.html">
                                        <span class="sub-item">Flaticons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../components/typography.html">
                                        <span class="sub-item">Typography</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a data-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-book"></i>
                            <p>Categories</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../sidebar-style-1.html">
                                        <span class="sub-item">Imposible Sports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../overlay-sidebar.html">
                                        <span class="sub-item">Gastronomics Pleasures</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../compact-sidebar.html">
                                        <span class="sub-item">Clothes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../static-sidebar.html">
                                        <span class="sub-item">Travelling</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#forms">
                            <i class="fas fa-box"></i>
                            <p>Products</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../forms/forms.html">
                                        <span class="sub-item">Basic Form</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#tables">
                            <i class="fas fa-money-bill-wave"></i>
                            <p>Sales</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../tables/tables.html">
                                        <span class="sub-item">Basic Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../tables/datatables.html">
                                        <span class="sub-item">Datatables</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#maps">
                            <i class="fab fa-rocketchat"></i>
                            <p>Comments</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../maps/jqvmap.html">
                                        <span class="sub-item">JQVMap</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#charts">
                            <i class="fab fa-wpforms"></i>
                            <p>Contact</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../../../charts/charts.html">
                                        <span class="sub-item">Chart Js</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../../charts/sparkline.html">
                                        <span class="sub-item">Sparkline</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="../logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="../../../dashboard/template/examples/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../../dashboard/template/examples/assets/js/core/popper.min.js"></script>
<script src="../../../dashboard/template/examples/assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="../../../dashboard/template/examples/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../../dashboard/template/examples/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../../dashboard/template/examples/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!--Datatables -->
<script src="../../../dashboard/template/examples/assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Atlantis JS -->
<script src="../../../dashboard/template/examples/assets/js/atlantis.min.js"></script>
</body>

</html>