<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

  <!-- Content Row -->
  <div class="row">

<div class="col-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-3">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="callout callout-info">
<?php

$fetch_acad = new fetchAcad();
$res_fetch_acad = $fetch_acad->fetchData();

if($res_fetch_acad){
       while( $row=$res_fetch_acad->fetch()){
            
        if($row['acad_SysDef'] == 'YES' && $row['acad_status'] == 'Activate'){
            ?>
                                        
                    <h3>Evaluation Status: 
                    <b class='text-white'><small class='bg-success p-1' style='border-radius: 10px;'>
                    <?=$row['acad_status']?>
                    </small></b>
                    </h3>

                    <h3>Academic Year: 
                    <b><?=$row['acad_year'].' '.$row['acad_sem']?></b>
                    </h3>
            <?php
        }elseif($row['acad_SysDef'] == 'YES' && $row['acad_status'] == 'Done'){
            ?>
                                        
                    <h3>Evaluation Status: 
                    <b class='text-white'><small class='bg-primary p-1' style='border-radius: 10px;'>
                    <?=$row['acad_status']?>
                    </small></b>
                    </h3>

                    <h3>Academic Year: 
                    <b><?=$row['acad_year'].' '.$row['acad_sem']?></b>
                    </h3>
            <?php
        }elseif($row['acad_SysDef'] == 'YES' && $row['acad_status'] == 'Not Active'){
            ?>
                        <h3>Evaluation Status: 
                        <b class='text-white'><small class='bg-danger p-1' style='border-radius: 10px;'>
                        <?=$row['acad_status']?>
                        </small></b>
                        </h3>

                        <h3>Academic Year: <?=$row['acad_year']?>
                        <b><?=$row['acad_sem']?></b>
                        </h3>
            <?php
        } 
       }
   

        
}else {
    ?>
        <h3>Evaluation Status: 
        <b class='text-white'><small class='bg-danger p-1' style='border-radius: 10px;'>
        Not Started
        </small></b>
        </h3>

        <h3>Academic Year: 
        <b>Not Started</b>
        </h3>
    <?php                
}
?>


                </div>
            </div>
        </div>
    </div>
</div>
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
                            $countStud = new fetchStudent0();
                            $count_stud = $countStud->fetchData();

                            if($count_stud){
                                echo $count_stud->rowCount();
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
                            $countFac = new fetchFaculty();
                            $count_fac = $countFac->fetchData();

                            if($count_fac){
                                echo $count_fac->rowCount();
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
                            Total Supervisor ACC:</div>

                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php
                                    $countSuperFac = new fetchCountFaculty();
                                    $count_countSuperFac = $countSuperFac->fetchData();

                                    if($count_countSuperFac){
                                        echo $count_countSuperFac->rowCount();
                                    } else {
                                        echo "0";
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
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
include 'includes/scripts.php';
include 'includes/footer.php';
?>
