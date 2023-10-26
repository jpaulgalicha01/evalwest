
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/logo1.png"/>
    
    <title>Evaluation Report A.Y <?=$_GET['acad_year']?> - <?=$_GET['acad_sem']?> (<?=$_GET['name']?>)</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
        @font-face {
            src: url(../fonts/old-english-text-mt.ttf);
            font-family: old_english;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

<div class="container-fluid">
<div class=" py-3">
        <table >
            <thead>
            <tr>
            <th class="text-center align-middle" >
                    <img src="../img/printlogo1.png" style="height:160px;">
                </th>
                <th class="text-center" style="width:600px;">
                        <span style="font-size:30px; font-family: old_english;">West Visayas State University</span><br>
                        <small>(Formerly Iloilo Normal School)</small><br>
                        <small class="font-weight-bold">HIMAMAYLAN CITY CAMPUS</small><br>
                        <small>Brgy. Caradio-an, Himamaylan City, Negros Occidental, 6108</small><br>
                        <small>*Tel. No. (034)-388-3300</small><br>
                        <small>*Official Page: <u>https://www.facebook.com/westhimamaylan/</u></small><br>
                        <small>*Email Address: himamaylan@wvsu.edu.ph</small>
                </th>
                <th class="text-center">
                    <img src="../img/printlogo2.png" style="height:160px;">
                </th>
            </tr>
            </thead>
            <tr>
                <td class="text-center pt-1 pb-5" colspan="3">
                    <b>QCE Summary Sheet for Teaching Effectiveness by Evaluator Type</b>
                </td>
            </tr>
            <tr>

            <td colspan="2">Name: <?=$_GET['name']?>  
            </td>
            <td>College/Unit: WVSU-HCC</td>
            </tr>
            <tr>
            <td colspan="2">Academic Rank: <?=$_GET['position']?></td>
            <td>Department: <?=$_SESSION['user_type']?></td>
      
            </tr>
        </table>
        <br><br>

        <span class="h3 text-gray-800  pt-3">Student Evaluation Report</span>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th class="pl-1">Student</th>
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
                    <th class="pl-1">Total Mean</th>
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
                        }
                    }
                ?>
            </tbody>
        </table>
        <br><br>


        <span class="h3 text-gray-800  pt-3">Peer Evaluation Report</span>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th class="pl-1">Peer</th>
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
                    <th class="pl-1">Total Mean</th>
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
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        <br><br>

        <span class="h3 text-gray-800  pt-3">Self Evaluation Report</span>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th class="pl-1">Self</th>
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
                    <th class="pl-1">Total Mean</th>
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
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        <br><br>

        <span class="h3 text-gray-800  pt-3">Supervisor Evaluation Report</span>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th class="pl-1">Num. Supervisor Evaluated</th>
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
                    <th class="pl-1">Total Mean</th>
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
                            $faculty_name = $_GET['name'];
                            if($fetch_faculty_id['name'] != $faculty_name){
                                echo "<tr>";

                                echo "<td>".++$y."</td>";
                                $head_faculty_name = $fetch_faculty_id['name'];
                                $head_criteria_score = new head_criteria_result();
                                $head_criteria_score->score($acad_year,$acad_sem,$head_faculty_name,$criteria);

                                $head_self_mean = new head_self_mean();
                                $head_self_mean->total($acad_year,$acad_sem,$head_faculty_name,$criteria);
                                
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        <br><br>
</div>

</div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content --> 