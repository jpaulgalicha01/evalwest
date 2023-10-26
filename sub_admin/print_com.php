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

        <span class="h3 text-gray-800  py-3">Peer Evaluation Report</span>

        <table border="1" width="100%">
            <tbody>
                <?php
                    $comment = new comment();
                    $result_comment = $comment->fetch($acad_year,$acad_sem);
                    if($result_comment){
                        $count_comment = $result_comment->rowCount();
                        $y = 0;
                        for($x=1; $x<=$count_comment; ++$x){
                            $eval_comment = $result_comment->fetch();
                            echo "<tr>";


                                echo"<td style='width: 20%;'>".++$y."</td>";
                                echo"<td>".$eval_comment['comments']."</td>";


                            echo"</tr>";
                        }

                    }
                ?>

            </tbody>
        </table>


        
</div>

</div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content --> 