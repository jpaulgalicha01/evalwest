        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
            <img src="../img/logo1.png" alt="logo" style="height: 80px; width: 80px;">
                <div class="sidebar-brand-text pl-2"> eval-west</div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item " >
        <a class="nav-link"  href="index.php">

            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item " >
        <a class="nav-link"  href="department.php">

        <i class="fas fa-fw fa-calendar"></i>
            <span>Department</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!--admin_user -->
    <li class="nav-item" >
        <a class="nav-link"  href="prog_chair_list.php">
            <i class="fa fa-user"></i>
            <span>Program Chair List</span></a>
    </li>
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->
        <!--admin_user -->
        <!-- <li class="nav-item" >
            <a class="nav-link"  href="activity_log.php">

                <i class="fa fa-history"></i>
                <span>Activity Logs</span></a>
        </li> -->
        


                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

        </ul>
        <!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"

                <?php
                    $profile = new user_info();
                    $result_profile = $profile->userInfo();

                    if($result_profile){
                        $row = $result_profile->fetch();
                    ?>

                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$row['acc_name']?></span>
                
                    <img class="img-profile rounded-circle"
                        src="../uploads/<?=$row['acc_img']?>">

                    <?php

                    }
                ?>

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->