<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';

$acad_yr = "";
$semester = "";
$status = "";

$eval_status = new check_status();
$eval_status_res = $eval_status->status();

if($eval_status_res){
  while($res = $eval_status_res->fetch()){
    $status_id = $res['acad_id'];
    $acad_yr= $res['acad_year'];
    $semester = $res['acad_sem'];
    $status = $res['acad_status'];
  }
}

?>

<div class="container-fluid" style="background-color: #2f333d;">
    <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-12 col-12 d-flex">
          <div class="align-self-center row text-xl-start text-lg-start text-center p-5">

                  <h1 class="title-user">Welcome <?=$_SESSION['user_type']?>,</h1>
                  <?php

                        if($status == 'Not Active'){
                          ?>
                            <p class="text-white">Evaluation Status: <span class="bg-danger p-1 rounded">Not Started</span></p>
                            <p class="text-white">Academic Year: <?=$acad_yr." ".$semester ?></p>
                          <?php
                        }
                        elseif($status == 'Activate'){
                          ?>
                            <p class="text-white">Evaluation Status: <span class="bg-success p-1 rounded">Start</span></p>
                            <p class="text-white">Academic Year: <?=$acad_yr." ".$semester ?></p>
                          <?php
                        }
                        elseif($status == 'Done'){
                          ?>
                            <p class="text-white">Evaluation Status: <span class="bg-primary p-1 rounded">Done</span></p>
                            <p class="text-white">Academic Year: <?=$acad_yr." ".$semester ?></p>
                          <?php
                        }
                      else {
                      ?>
                          <p class="text-white">Evaluation Status: <span class="bg-secondary p-1 rounded">Not Set</span></p>
                          <p class="text-white">Academic Year: Not Set</p>
                      <?php
                    }
                  ?>

                  <div class="d-grid gap-2">
                    <form action="inputConfig.php" method="POST">
                      <input type="hidden" name="func" value="evaluate">
                      <input type="hidden" name="acad_id" value="<?=$acad_yr?>">
                      <input type="hidden" name="acad_sem" value="<?=$semester?>">
                      <input type="hidden" name="value" value="<?=$_SESSION['user_id']?>">
                      <button class="btn btn-primary" type="submit" name="evaluate"><span class="text-center">Start Evaluation</span></button>
                    </form>
                  </div>

          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-0 d-xl-block d-lg-block d-none p-0">
            <img src="../../img/user-bg1.png" alt="" width="100%" height="525">
        </div>
    </div>
</div>

<div class="container-fluid py-5" style="background-color:whitesmoke" id="about-us">
  <div class="row">
  <div class="col-12 text-center">
     <h1>The Developers</h1>
  </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-5">
      <div class="card p-2 rounded">
      <div class="text-center">
          <div class="upload py-2">
            <img src="../../img/ALINGASA.jpeg"  width = 150 height = 150 >
          </div>
          <p>Clarice A. Alingasa</p>
          <p>Project Manager</p>
      </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-5">
      <div class="card p-2 rounded">
      <div class="text-center">
          <div class="upload py-2">
            <img src="../../img/ISIO.jpeg"  width = 150 height = 150 >
          </div>
          <p>Samantha Gay Nichole B. Isio</p>
          <p>System Analyst</p>
      </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-5">
      <div class="card p-2 rounded">
      <div class="text-center">
          <div class="upload py-2">
            <img src="../../img/GALICHA.JPG"  width = 150 height = 150 >
          </div>
          <p>John Paul E. Galicha</p>
          <p>Programmer</p>
      </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-5">
      <div class="card p-2 rounded">
      <div class="text-center">
          <div class="upload py-2">
            <img src="../../img/ADONIS.JPEG"  width = 150 height = 150 >
          </div>
          <p>Adonis A. Espenido</p>
          <p>Asst. Programmer</p>
      </div>
      </div>
    </div>
    
  </div>
</div>

  <?php
  include 'include/footer.php';
  ?>
