<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

$check_forward = new check_show_report();
$check_forward->redirect();

$faculty_position="";
$faculty_name="";

$criteria="";
$acad_year = $_GET['acad_year'];
$acad_sem = $_GET['acad_sem'];

$count_stud = "";
$count_peer = "";
$count_self = "";
$count_super = ""; 
?>
  <div class="container-fluid">



<h1 class="h3 mb-2 text-gray-800 pt-2">Evaluation Report
    (<?=$_GET['acad_year']." ".$_GET['acad_sem'];?>)
</h1><br>

<div class="row">

    <div class="col-xl-6 col-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <?php
                        $faculty_id = $_GET['faculty_id'];
                        $faculty_name = $_GET['name'];
                        
                        $fetch_faculty = new fetch_result();
                        $result_fetch_faculty = $fetch_faculty->fetchData($faculty_id,$faculty_name);
                        
                        if($result_fetch_faculty){
                            $fetch_faculty = $result_fetch_faculty->fetch();
                            $faculty_position= $fetch_faculty['user_position'];
                             ?>
                        <div class="col mr-1 pb-1">
                            
                            <img src='../uploads/<?=$fetch_faculty['user_img']?>' alt='' class='rounded-circle' style='width:150px; height:150px;'>
                        </div>
                        <div class="col mr-4 pr-4">
                            <label>Faculty ID No. : <text class="mb-2 text-gray-800 pt-2"><?=$fetch_faculty['user_id_num']?></text> <br></label><br>
                            <label>Name : <text class="mb-2 text-gray-800 pt-2"><?=$fetch_faculty['user_name']?></text> <br></label><br>
                            <label>Department : <text class="mb-2 text-gray-800 pt-2"><?=$fetch_faculty['user_department']." (". $fetch_faculty['user_course'].")"?></text> <br></label><br>
                        </div>
                        <?php }?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
                Status Of Report
            </div>
            <div class="shadow">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <canvas id="myPieChart" width="100%" height="35"></canvas>
                </div>
            </div>
            </div>
            
        </div>
    </div>

    </div>

<div class="d-flex justify-content-end pb-3">
<div class="dropdown">
<button class="btn btn-success dropdown-toggle" type="button"
    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <i class="fa fa-print"> Print</i>
</button>
<div class="dropdown-menu animated--fade-in"
    aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="print.php?acad_year=<?=$_GET['acad_year']?> &acad_sem=<?=$_GET['acad_sem']?> &faculty_id=<?=$_GET['faculty_id']?> &name=<?=$faculty_name?> &position=<?=$faculty_position?>" target="__blank">As PDF File</a>
</div>
</div>

</div>

<!-- Student Evaluation Result -->
<div class="card shadow mb-4">
    <span class="h3 mb-2 text-gray-800 pl-3 pt-3">Student Evaluation Report  </span>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Student</th>
            <?php
            $fetch_crit = new fetchCriteria();
            $result_fetch_crit = $fetch_crit->fetchData();
                if($result_fetch_crit){
                    while($row = $result_fetch_crit->fetch()){
                        $criteria = $row['crit_criteria'];
                        ?>
                            <th><?=$row['crit_criteria']?></th>
                        <?php
                    }
                }
            
            ?>
            <th>Total Mean</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $student_result = new student_result();
                    $student_result_evaluation = $student_result->fethData($acad_year,$acad_sem,$criteria);
                    if($student_result_evaluation){
                        $student_count = $student_result_evaluation->rowCount();
                        for($x=1; $x<=$student_count; ++$x){
                            $fetch_stud_id= $student_result_evaluation->fetch();
                
                            echo "<tr>";

                            echo "<td>$x</td>";
                            $stud_id = $fetch_stud_id['stud_id'];
                            $student_criteria_score = new student_criteria_result();
                            $student_criteria_score->score($acad_year,$acad_sem,$stud_id,$criteria);

                            $total_student_mean = new total_student_mean();
                            $total_student_mean->total($acad_year,$acad_sem,$stud_id,$criteria);

                            echo "</tr>";
                            $count_stud = $x;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>


<!-- Peer Evaluation Result -->
<div class="card shadow mb-4">
    <span class="h3 mb-2 text-gray-800 pl-3 pt-3">Peer Evaluation Report  </span>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Peer</th>
            <?php
            $fetch_crit = new fetchCriteria();
            $result_fetch_crit = $fetch_crit->fetchData();
                if($result_fetch_crit){
                    while($row = $result_fetch_crit->fetch()){
                       
                        ?>
                            <th><?=$row['crit_criteria']?></th>
                        <?php
                    }
                }
            
            ?>
            <th>Total Mean</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $peer_result = new peer_result();
                    $peer_result_evaluation = $peer_result->fethData($acad_year,$acad_sem,$criteria);
                    if($peer_result_evaluation){
                        $student_count = $peer_result_evaluation->rowCount();
                        for($x=1; $x<=$student_count; ++$x){
                            $fetch_faculty_id= $peer_result_evaluation->fetch();
                            if($fetch_faculty_id['faculty_id'] != $_GET['faculty_id']){
                
                                echo "<tr>";
                                
                                echo "<td>$x</td>";
                                $faculty_id = $fetch_faculty_id['faculty_id'];
                                $peer_criteria_score = new peer_criteria_result();
                                $peer_criteria_score->score($acad_year,$acad_sem,$faculty_id,$criteria);

                                $total_peer_mean = new total_peer_mean();
                                $total_peer_mean->total($acad_year,$acad_sem,$faculty_id,$criteria);
                                
                                echo "</tr>";
                                $count_peer = $x;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>


<!-- Self Evaluation Result -->
<div class="card shadow mb-4">
    <span class="h3 mb-2 text-gray-800 pl-3 pt-3">Self Evaluation Report  </span>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Self</th>
            <?php
            $fetch_crit = new fetchCriteria();
            $result_fetch_crit = $fetch_crit->fetchData();
                if($result_fetch_crit){
                    while($row = $result_fetch_crit->fetch()){
                       
                        ?>
                            <th><?=$row['crit_criteria']?></th>
                        <?php
                    }
                }
            
            ?>
            <th>Total Mean</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $self_result = new self_result();
                    $self_result_evaluation = $self_result->fethData($acad_year,$acad_sem,$criteria);
                    if($self_result_evaluation){
                        $student_count = $self_result_evaluation->rowCount();
                        $y = 0;
                        for($x=1; $x<=$student_count; ++$x){
                            $fetch_faculty_id= $self_result_evaluation->fetch();
                            if($fetch_faculty_id['faculty_id'] == $_GET['faculty_id']){
                                echo "<tr>";

                                echo "<td>".++$y."</td>";
                                $self_faculty_id = $fetch_faculty_id['faculty_id'];
                                $self_criteria_score = new self_criteria_result();
                                $self_criteria_score->score($acad_year,$acad_sem,$self_faculty_id,$criteria);

                                $total_self_mean = new total_self_mean();
                                $total_self_mean->total($acad_year,$acad_sem,$faculty_id,$criteria);
                                
                                echo "</tr>";
                                $count_self = $x;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Head Evaluation Result -->
<div class="card shadow mb-4">
    <span class="h3 mb-2 text-gray-800 pl-3 pt-3">Supervisor Evaluation Report </span>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Num. Supervisor Evaluated</th>
            <?php
            $fetch_crit = new fetchCriteria();
            $result_fetch_crit = $fetch_crit->fetchData();
                if($result_fetch_crit){
                    while($row = $result_fetch_crit->fetch()){
                       
                        ?>
                            <th><?=$row['crit_criteria']?></th>
                        <?php
                    }
                }
            
            ?>
            <th>Total Mean</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $head_result = new head_result();
                    $head_result_evaluation = $head_result->fethData($acad_year,$acad_sem,$criteria);
                    if($head_result_evaluation){
                        $student_count = $head_result_evaluation->rowCount();
                        $y = 0;
                        for($x=1; $x<=$student_count; ++$x){
                            $fetch_faculty_id= $head_result_evaluation->fetch();
                            if($fetch_faculty_id['name'] == $_GET['name']){
                                echo "<tr>";

                                echo "<td>".++$y."</td>";
                                $head_faculty_name = $fetch_faculty_id['name'];
                                $head_criteria_score = new head_criteria_result();
                                $head_criteria_score->score($acad_year,$acad_sem,$head_faculty_name,$criteria);

                                $head_self_mean = new head_self_mean();
                                $head_self_mean->total($acad_year,$acad_sem,$head_faculty_name,$criteria);
                                
                                echo "</tr>";
                                $count_super = $x;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>



</div>
    <!-- /.container-fluid -->
</div>

<!-- End of Main Content -->
<script src="../js/piechart.js" crossorigin="anonymous"></script>

<script>
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Student Result", "Peer", "Self", "Supervisor"],
    datasets: [{
      data: [<?=$count_stud?>,<?= $count_peer?>,<?=$count_self?>,<?=$count_super?>],
      backgroundColor: ['#007bff', '#dc3545','#1CC88A','#36B9CC'],
    }],
  },
});
</script>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>