<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';
include 'include/navbar.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    
                    
                    <!-- Content Row -->
                    <div class="row">

                    <!-- Total Number  Student -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                              Total Student Acc:</div>
                                           
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $countStudnet = new fetchStudent();
                                                $count_prog = $countStudnet->fetchData();

                                                if($count_prog){
                                                    echo $count_prog->rowCount();
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Total Number  Faculty -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                           Total Faculty Acc:</div>
                                            
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $countFaculty = new fetchFaculty();
                                                $count_prog = $countFaculty->fetchData();

                                                if($count_prog){
                                                    echo $count_prog->rowCount();
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- Total Number Head Department -->
                        <div class="col-xl-3 col-md-6 mb-4">

                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Department Chair Acc. :</div>
                                                
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <?php
                                                                $countProgChair = new fetchProgChair();
                                                                $count_prog = $countProgChair->fetchData();

                                                                if($count_prog){
                                                                    echo $count_prog->rowCount();
                                                                } else {
                                                                    echo "0";
                                                                }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="prog_chair_list.php"><i class="fas fa-user fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <!-- Total Number  Department -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body" >
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Course:</div>
                                          
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $countCourse = new fetchCourse();
                                                    $res = $countCourse->fetch_course(); 
                                                    
                                                    if($res){
                                                      echo $res->rowCount();
                                                    } else {
                                                        echo "0";
                                                    }
                                                ?>

                                            </div>
                                       
                                        </div>
                                        
                                        <div class="col-auto">
                                            <a href="department.php"><i class="fas fa-list-alt fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<?php
include 'include/scripts.php';
include 'include/footer.php';
?>