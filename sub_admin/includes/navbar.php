
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
            <img src="../img/logo1.png" alt="logo" style="height: 84px; width: 84px;">
                <div class="sidebar-brand-text pl-2"> eval-west</div>
            </div>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" >
                <a class="nav-link"  href="index.php">

                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


                <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Course Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="acad-yr.php">Academic Year & Semester</a>
                    <a class="collapse-item" href="year_section.php">Year & Section</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Evaluation Setup</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Evaluation Form</h6>
                        <a class="collapse-item" href="eval-criteria.php">Criteria</a>
                        <a class="collapse-item" href="eval-question.php">Questionnaire</a>
                        <a class="collapse-item" href="eval-status.php">Status</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                User's List
            </div>

             <!-- Nav Item - Pages Collapse Menu For Faculty -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaculty"
                    aria-expanded="true" aria-controls="collapseFaculty">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Faculty</span>
                </a>
                <div id="collapseFaculty" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Faculty Account</h6>
                        <a class="collapse-item" href="faculty-list.php">Faculty List</a>
                        <a class="collapse-item" href="deletedFaculty-list.php">Deleted List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu For Student -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
                    aria-expanded="true" aria-controls="collapseStudent">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Students</span>
                </a>
                <div id="collapseStudent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Student Account</h6>
                        <a class="collapse-item" href="student-list.php">Student List</a>
                        <a class="collapse-item" href="deleted-student-list.php">Deleted List</a>
                        <a class="collapse-item" href="course-subject.php">Course Subject</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        

            <li class="nav-item" >
                <a class="nav-link"  href="report.php">

                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Evaluation Report</span></a>
            </li>

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