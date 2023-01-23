<div class="sidebar sidebar-style-2">

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/web/backend/dashboard/template/examples/assets/img/profile.jpg" alt="../..."
                         class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" aria-expanded="true">
                                <span>
                                    <?php echo $_SESSION["login"] ?>
                                    <span class="user-level">Administrator</span>
                                </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="/web/backend/index.php/admin/dashboard" class="collapsed"
                       aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users">
                        <i class="fas fa-user-alt"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categories">
                        <i class="fas fa-book"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="products">
                        <i class="fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sales">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="comments">
                        <i class="fab fa-rocketchat"></i>
                        <p>Comments</p>
                    </a>
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
