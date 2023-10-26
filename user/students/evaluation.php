<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';

$checking_status= "";

$eval_status = new eval_status();
$res = $eval_status->check();
if($res){
    while($fetch = $res->fetch()){
        if($fetch['acad_status'] == 'Not Active'){
            ?>
                <script>
                    window.alert("Evaluation is not yet started. Please wait.");
                    window.location.href="index.php";
                </script>
            <?php
        }elseif($fetch['acad_status'] == 'Done'){
            ?>
            <script>
                window.alert("Evaluation is already done. Thanks for your coorperation.");
                window.location.href="index.php";
            </script>
        <?php
        }
    }
}

?>
<div class="bg-img-user">
    
<div class="container-fluid py-5">

<div class="row">

        <div class="col-12 px-xl-5 px-lg-5 px-md-2 px-1">
                <?php
                    $list_eval = new list_eval();
                    $res = $list_eval->fetch();

                    if($res){
                        while($fetch = $res->fetch()){
                ?>

                <div class="row p-4 px-xl-5 px-lg-5 px-md-2 px-1 mx-xl-5 mx-lg-5 mx-md-2 mx-1">

                    <div class="col-xl-4 col-lg-4 col-md-2 col-12 text-center">
                        <img src="../../uploads/<?=$fetch['subj_img']?>" width="150" height="150" style="border-radius: 50px;">
                    </div>
                    
                    <div class="col-xl-8 col-lg-8 col-md-10 col-12">

                        <div class="card text-bg-light">
                        <div class="card-header">
                        <?=$fetch['subj_subject']?> - <?=$fetch['subj_course']?>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">(<?=$fetch['subj_faculty_name']?>)</h5>
                        <?php
                            $check_eval = new eval_check();
                            $res_check_eval = $check_eval->checking();

                            if($res_check_eval){
                                $fetch_status = $res_check_eval->fetch();
                                
                                if($fetch_status['subject'] === $fetch['subj_subject'] ){
                                    $checking_status = "DONE";
                                    ?>
                                        <p class="card-text">Status:<span class="bg-primary p-1 text-white rounded">Done</span>.</p>
                                    <?php
                                }else {
                                    $checking_status = "NOT DONE";
                                    ?>
                                        <p class="card-text">Status: <span class="bg-danger p-1 text-white rounded">Not Done</span>.</p>
                                    <?php
                                }
                            }else {
                                $checking_status = "NOT DONE";
                                ?>
                                    <p class="card-text">Status: <span class="bg-danger p-1 text-white rounded">Not Done</span>.</p>
                                <?php
                            }
                        ?>
                            <form action="inputConfig.php" method="POST">
                                <input type="hidden" name="func" value="evaluate1">
                                <input type="hidden" name="status_evaluation" value="<?=$checking_status?>">
                                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                <input type="hidden" name="acad_yr" value="<?=$_GET['acad_yr']?>">
                                <input type="hidden" name="acad_sem" value="<?=$_GET['acad_sem']?>">
                                <input type="hidden" name="subj_id" value="<?=$fetch['subj_id']?>">
                                <button type="submit" name="evaluate1" class="btn btn-primary">Evaluate</button>
                            </form>
                        </div>
                        </div>

                    </div>
                </div>
                <?php
                        }
                    }
                ?>

  

        </div>

            
</div>
</div>
</div>

<?php
include 'include/footer.php';
?>