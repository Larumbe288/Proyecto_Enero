<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Tables - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no'
          name='template/assets/img/icon.ico" type="image/x-icon"/'>
    <link rel="icon" href="../../dashboard/template/examples/assets/img/icon.ico" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="../../dashboard/template/examples/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../../dashboard/template/examples/assets/css/fonts.min.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="../../dashboard/template/examples/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dashboard/template/examples/assets/css/atlantis.min.css">
</head>

<body>
<div class="">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="../../dashboard/template/examples/demo1/index.html" class="logo"><img
                        src="../../dashboard/img/logo.png" alt="navbar brand" class="navbar-brand"
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
                            <input type="text" placeholder="Search..." class="form-control">
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
                                <img src="../../dashboard/template/examples/assets/img/profile.jpg" alt="../..."
                                     class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img
                                                    src="../../dashboard/template/examples/assets/img/profile.jpg"
                                                    alt="image profile" class="avatar-img rounded">
                                        </div>
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION["login"] ?></h4>
                                            <p class="text-muted"></p><a
                                                    href="profile.php"
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
                        <img src="../../dashboard/template/examples/assets/img/profile.jpg" alt="../..."
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
                    <li class="nav-item active">
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
                                    <a href="../../components/avatars.html">
                                        <span class="sub-item">Avatars</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/buttons.html">
                                        <span class="sub-item">Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/gridsystem.html">
                                        <span class="sub-item">Grid System</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/panels.html">
                                        <span class="sub-item">Panels</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/notifications.html">
                                        <span class="sub-item">Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/sweetalert.html">
                                        <span class="sub-item">Sweet Alert</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/font-awesome-icons.html">
                                        <span class="sub-item">Font Awesome Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/simple-line-icons.html">
                                        <span class="sub-item">Simple Line Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/flaticons.html">
                                        <span class="sub-item">Flaticons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../components/typography.html">
                                        <span class="sub-item">Typography</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="dashboard/ficha">
                            <i class="fas fa-book"></i>
                            <p>Categories</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="../../sidebar-style-1.html">
                                        <span class="sub-item">Imposible Sports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../overlay-sidebar.html">
                                        <span class="sub-item">Gastronomics Pleasures</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../compact-sidebar.html">
                                        <span class="sub-item">Clothes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../static-sidebar.html">
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
                                    <a href="../../forms/forms.html">
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
                                    <a href="../../tables/tables.html">
                                        <span class="sub-item">Basic Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../tables/datatables.html">
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
                                    <a href="../../maps/jqvmap.html">
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
                                    <a href="../../charts/charts.html">
                                        <span class="sub-item">Chart Js</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../charts/sparkline.html">
                                        <span class="sub-item">Sparkline</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                    </div>
                    <div class="row">
                        

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Categories</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="multi-filter-select_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="multi-filter-select_length"><label>Show <select name="multi-filter-select_length" aria-controls="multi-filter-select" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="multi-filter-select_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="multi-filter-select"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="multi-filter-select" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="multi-filter-select_info">
                                            <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 242.328px;">Name</th><th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 366.703px;">Position</th><th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 193.406px;">Office</th><th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 83.4219px;">Age</th><th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 159.547px;">Start date</th><th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 159.594px;">Salary</th></tr>
                                            </thead>
                                            <tfoot>
                                                <tr><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="Airi Satou">Airi Satou</option><option value="Angelica Ramos">Angelica Ramos</option><option value="Ashton Cox">Ashton Cox</option><option value="Bradley Greer">Bradley Greer</option><option value="Brenden Wagner">Brenden Wagner</option><option value="Brielle Williamson">Brielle Williamson</option><option value="Bruno Nash">Bruno Nash</option><option value="Caesar Vance">Caesar Vance</option><option value="Cara Stevens">Cara Stevens</option><option value="Cedric Kelly">Cedric Kelly</option><option value="Charde Marshall">Charde Marshall</option><option value="Colleen Hurst">Colleen Hurst</option><option value="Dai Rios">Dai Rios</option><option value="Donna Snider">Donna Snider</option><option value="Doris Wilder">Doris Wilder</option><option value="Finn Camacho">Finn Camacho</option><option value="Fiona Green">Fiona Green</option><option value="Garrett Winters">Garrett Winters</option><option value="Gavin Cortez">Gavin Cortez</option><option value="Gavin Joyce">Gavin Joyce</option><option value="Gloria Little">Gloria Little</option><option value="Haley Kennedy">Haley Kennedy</option><option value="Hermione Butler">Hermione Butler</option><option value="Herrod Chandler">Herrod Chandler</option><option value="Hope Fuentes">Hope Fuentes</option><option value="Howard Hatfield">Howard Hatfield</option><option value="Jackson Bradshaw">Jackson Bradshaw</option><option value="Jena Gaines">Jena Gaines</option><option value="Jenette Caldwell">Jenette Caldwell</option><option value="Jennifer Acosta">Jennifer Acosta</option><option value="Jennifer Chang">Jennifer Chang</option><option value="Jonas Alexander">Jonas Alexander</option><option value="Lael Greer">Lael Greer</option><option value="Martena Mccray">Martena Mccray</option><option value="Michael Bruce">Michael Bruce</option><option value="Michael Silva">Michael Silva</option><option value="Michelle House">Michelle House</option><option value="Olivia Liang">Olivia Liang</option><option value="Paul Byrd">Paul Byrd</option><option value="Prescott Bartlett">Prescott Bartlett</option><option value="Quinn Flynn">Quinn Flynn</option><option value="Rhona Davidson">Rhona Davidson</option><option value="Sakura Yamamoto">Sakura Yamamoto</option><option value="Serge Baldwin">Serge Baldwin</option><option value="Shad Decker">Shad Decker</option><option value="Shou Itou">Shou Itou</option><option value="Sonya Frost">Sonya Frost</option><option value="Suki Burks">Suki Burks</option><option value="Tatyana Fitzpatrick">Tatyana Fitzpatrick</option><option value="Thor Walton">Thor Walton</option><option value="Tiger Nixon">Tiger Nixon</option><option value="Timothy Mooney">Timothy Mooney</option><option value="Unity Butler">Unity Butler</option><option value="Vivian Harrell">Vivian Harrell</option><option value="Yuri Berry">Yuri Berry</option><option value="Zenaida Frank">Zenaida Frank</option><option value="Zorita Serrano">Zorita Serrano</option></select></th><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="Accountant">Accountant</option><option value="Chief Executive Officer (CEO)">Chief Executive Officer (CEO)</option><option value="Chief Financial Officer (CFO)">Chief Financial Officer (CFO)</option><option value="Chief Marketing Officer (CMO)">Chief Marketing Officer (CMO)</option><option value="Chief Operating Officer (COO)">Chief Operating Officer (COO)</option><option value="Customer Support">Customer Support</option><option value="Data Coordinator">Data Coordinator</option><option value="Developer">Developer</option><option value="Development Lead">Development Lead</option><option value="Director">Director</option><option value="Financial Controller">Financial Controller</option><option value="Integration Specialist">Integration Specialist</option><option value="Javascript Developer">Javascript Developer</option><option value="Junior Javascript Developer">Junior Javascript Developer</option><option value="Junior Technical Author">Junior Technical Author</option><option value="Marketing Designer">Marketing Designer</option><option value="Office Manager">Office Manager</option><option value="Personnel Lead">Personnel Lead</option><option value="Post-Sales support">Post-Sales support</option><option value="Pre-Sales Support">Pre-Sales Support</option><option value="Regional Director">Regional Director</option><option value="Regional Marketing">Regional Marketing</option><option value="Sales Assistant">Sales Assistant</option><option value="Secretary">Secretary</option><option value="Senior Javascript Developer">Senior Javascript Developer</option><option value="Senior Marketing Designer">Senior Marketing Designer</option><option value="Software Engineer">Software Engineer</option><option value="Support Engineer">Support Engineer</option><option value="Support Lead">Support Lead</option><option value="System Architect">System Architect</option><option value="Systems Administrator">Systems Administrator</option><option value="Team Leader">Team Leader</option><option value="Technical Author">Technical Author</option></select></th><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="Edinburgh">Edinburgh</option><option value="London">London</option><option value="New York">New York</option><option value="San Francisco">San Francisco</option><option value="Sidney">Sidney</option><option value="Singapore">Singapore</option><option value="Tokyo">Tokyo</option></select></th><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="33">33</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="51">51</option><option value="53">53</option><option value="55">55</option><option value="56">56</option><option value="59">59</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option></select></th><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="2008/09/26">2008/09/26</option><option value="2008/10/16">2008/10/16</option><option value="2008/10/26">2008/10/26</option><option value="2008/11/13">2008/11/13</option><option value="2008/11/28">2008/11/28</option><option value="2008/12/11">2008/12/11</option><option value="2008/12/13">2008/12/13</option><option value="2008/12/16">2008/12/16</option><option value="2008/12/19">2008/12/19</option><option value="2009/01/12">2009/01/12</option><option value="2009/02/14">2009/02/14</option><option value="2009/02/27">2009/02/27</option><option value="2009/04/10">2009/04/10</option><option value="2009/06/25">2009/06/25</option><option value="2009/07/07">2009/07/07</option><option value="2009/08/19">2009/08/19</option><option value="2009/09/15">2009/09/15</option><option value="2009/10/09">2009/10/09</option><option value="2009/10/22">2009/10/22</option><option value="2009/12/09">2009/12/09</option><option value="2010/01/04">2010/01/04</option><option value="2010/02/12">2010/02/12</option><option value="2010/03/11">2010/03/11</option><option value="2010/03/17">2010/03/17</option><option value="2010/06/09">2010/06/09</option><option value="2010/07/14">2010/07/14</option><option value="2010/09/20">2010/09/20</option><option value="2010/10/14">2010/10/14</option><option value="2010/11/14">2010/11/14</option><option value="2010/12/22">2010/12/22</option><option value="2011/01/25">2011/01/25</option><option value="2011/02/03">2011/02/03</option><option value="2011/03/09">2011/03/09</option><option value="2011/03/21">2011/03/21</option><option value="2011/04/25">2011/04/25</option><option value="2011/05/03">2011/05/03</option><option value="2011/05/07">2011/05/07</option><option value="2011/06/02">2011/06/02</option><option value="2011/06/07">2011/06/07</option><option value="2011/06/27">2011/06/27</option><option value="2011/07/25">2011/07/25</option><option value="2011/08/14">2011/08/14</option><option value="2011/09/03">2011/09/03</option><option value="2011/12/06">2011/12/06</option><option value="2011/12/12">2011/12/12</option><option value="2012/03/29">2012/03/29</option><option value="2012/04/09">2012/04/09</option><option value="2012/06/01">2012/06/01</option><option value="2012/08/06">2012/08/06</option><option value="2012/09/26">2012/09/26</option><option value="2012/10/13">2012/10/13</option><option value="2012/11/27">2012/11/27</option><option value="2012/12/02">2012/12/02</option><option value="2012/12/18">2012/12/18</option><option value="2013/02/01">2013/02/01</option><option value="2013/03/03">2013/03/03</option><option value="2013/08/11">2013/08/11</option></select></th><th rowspan="1" colspan="1"><select class="form-control"><option value=""></option><option value="$1,200,000">$1,200,000</option><option value="$103,500">$103,500</option><option value="$103,600">$103,600</option><option value="$106,450">$106,450</option><option value="$109,850">$109,850</option><option value="$112,000">$112,000</option><option value="$114,500">$114,500</option><option value="$115,000">$115,000</option><option value="$125,250">$125,250</option><option value="$132,000">$132,000</option><option value="$136,200">$136,200</option><option value="$137,500">$137,500</option><option value="$138,575">$138,575</option><option value="$139,575">$139,575</option><option value="$145,000">$145,000</option><option value="$145,600">$145,600</option><option value="$162,700">$162,700</option><option value="$163,000">$163,000</option><option value="$163,500">$163,500</option><option value="$164,500">$164,500</option><option value="$170,750">$170,750</option><option value="$183,000">$183,000</option><option value="$198,500">$198,500</option><option value="$205,500">$205,500</option><option value="$206,850">$206,850</option><option value="$217,500">$217,500</option><option value="$234,500">$234,500</option><option value="$235,500">$235,500</option><option value="$237,500">$237,500</option><option value="$313,500">$313,500</option><option value="$320,800">$320,800</option><option value="$324,050">$324,050</option><option value="$327,900">$327,900</option><option value="$342,000">$342,000</option><option value="$345,000">$345,000</option><option value="$356,250">$356,250</option><option value="$357,650">$357,650</option><option value="$372,000">$372,000</option><option value="$385,750">$385,750</option><option value="$433,060">$433,060</option><option value="$452,500">$452,500</option><option value="$470,600">$470,600</option><option value="$645,750">$645,750</option><option value="$675,000">$675,000</option><option value="$725,000">$725,000</option><option value="$75,650">$75,650</option><option value="$85,600">$85,600</option><option value="$85,675">$85,675</option><option value="$850,000">$850,000</option><option value="$86,000">$86,000</option><option value="$86,500">$86,500</option><option value="$87,500">$87,500</option><option value="$90,560">$90,560</option><option value="$92,575">$92,575</option><option value="$95,400">$95,400</option><option value="$98,540">$98,540</option></select></th></tr>
                                            </tfoot>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr><tr role="row" class="even">
                                                    <td class="sorting_1">Angelica Ramos</td>
                                                    <td>Chief Executive Officer (CEO)</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2009/10/09</td>
                                                    <td>$1,200,000</td>
                                                </tr><tr role="row" class="odd">
                                                    <td class="sorting_1">Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    <td>$86,000</td>
                                                </tr><tr role="row" class="even">
                                                    <td class="sorting_1">Bradley Greer</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2012/10/13</td>
                                                    <td>$132,000</td>
                                                </tr><tr role="row" class="odd">
                                                    <td class="sorting_1">Brenden Wagner</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2011/06/07</td>
                                                    <td>$206,850</td>
                                                </tr></tbody>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="multi-filter-select_info" role="status" aria-live="polite">Showing 1 to 5 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="multi-filter-select_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="multi-filter-select_previous"><a href="#" aria-controls="multi-filter-select" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="multi-filter-select" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="multi-filter-select" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="multi-filter-select" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="multi-filter-select" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="multi-filter-select" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="multi-filter-select_ellipsis"><a href="#" aria-controls="multi-filter-select" data-dt-idx="6" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="multi-filter-select" data-dt-idx="7" tabindex="0" class="page-link">12</a></li><li class="paginate_button page-item next" id="multi-filter-select_next"><a href="#" aria-controls="multi-filter-select" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
<!-- <script src="../../dashboard/template/examples/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../dashboard/template/examples/assets/js/core/popper.min.js"></script>
<script src="../../dashboard/template/examples/assets/js/core/bootstrap.min.js"></script>
jQuery UI
<script src="../../dashboard/template/examples/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../dashboard/template/examples/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

jQuery Scrollbar
<script src="../../dashboard/template/examples/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
Datatables
<script src="../../dashboard/template/examples/assets/js/plugin/datatables/datatables.min.js"></script>
Atlantis JS
<script src="../../dashboard/template/examples/assets/js/atlantis.min.js"></script>
Atlantis DEMO methods, don't include it in your project!
<script src="../../../../assets/js/setting-demo2.js"></script> -->
</body>

</html>