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
                        echo "<h1 class='bg-secondary text-center text-white p-2'>Evaluate for Peer Evaluation</h1>";
                        while($fetch = $res->fetch()){

                                
                ?>

                <div class="row p-4 px-xl-5 px-lg-5 px-md-2 px-1 mx-xl-5 mx-lg-5 mx-md-2 mx-1">

                    <div class="col-xl-4 col-lg-4 col-md-2 col-12 text-center">
                        <img src="../../uploads/<?=$fetch['user_img']?>" width="150" height="150" style="border-radius: 50px;">
                    </div>
                    
                    <div class="col-xl-8 col-lg-8 col-md-10 col-12">

                        <div class="card text-bg-light">
                        <div class="card-header">
                        <?=$fetch['user_position']?> - <?=$fetch['user_course']?>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">(<?=$fetch['user_name']?>)
                        <?php
                                if($fetch['user_id'] == $_SESSION['user_id']){
                                    echo"- SELF";
                                }
                            ?>
                        </h5>

                        <?php
                        $id_user = $fetch['user_id_num'];
                        $id_name = $fetch['user_name'];
                        $check_eval = new eval_check();
                        $result = $check_eval->checking($id_user,$id_name);
                        if($result){
                            $checking_status = "DONE";
                            ?>
                                <p class="card-text">Status:<span class="bg-primary p-1 text-white rounded">Done</span>.</p>
                            <?php
                        } else{
                            $checking_status = "NOT DONE";
                            ?>
                                <p class="card-text">Status: <span class="bg-danger p-1 text-white rounded">Not Done</span>.</p>
                            <?php
                        }
                        ?>
                            <form action="inputConfig.php" method="POST">
                                <input type="hidden" name="func" value="evaluate1">
                                <input type="hidden" name="type_eval" value="Peer Evaluation">
                                <input type="hidden" name="status_evaluation" value="<?=$checking_status?>">
                                <input type="hidden" name="id" value="<?=$_GET['faculty_id']?>">
                                <input type="hidden" name="acad_yr" value="<?=$_GET['acad_yr']?>">
                                <input type="hidden" name="acad_sem" value="<?=$_GET['acad_sem']?>">
                                <input type="hidden" name="faculty_id" value="<?=$fetch['user_id']?>">
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

        <div class="col-12 px-xl-5 px-lg-5 px-md-2 px-1">

            <?php
                $list_eval = new list_eval1();
                $res = $list_eval->fetch();

                if($res){
                    echo "<h1 class='bg-secondary text-center text-white p-2'>Evaluate as ".$_SESSION['user_position']."</h1>";
                    while($fetch = $res->fetch()){
                        
                            
                ?>

                <div class="row p-4 px-xl-5 px-lg-5 px-md-2 px-1 mx-xl-5 mx-lg-5 mx-md-2 mx-1">

                    <div class="col-xl-4 col-lg-4 col-md-2 col-12 text-center">
                        <img src="../../uploads/<?=$fetch['user_img']?>" width="150" height="150" style="border-radius: 50px;">
                    </div>
                    
                    <div class="col-xl-8 col-lg-8 col-md-10 col-12">

                        <div class="card text-bg-light">
                        <div class="card-header">
                        <?=$fetch['user_position']?> - <?=$fetch['user_course']?>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">(<?=$fetch['user_name']?>)
                        </h5>
                        <?php
                            $id_user = $fetch['user_id_num'];
                            $id_name = $fetch['user_name'];
                            $check_eval = new eval_check1();
                            $result = $check_eval->checking($id_user,$id_name);
                            if($result){
                                $checking_status = "DONE";
                                ?>
                                    <p class="card-text">Status:<span class="bg-primary p-1 text-white rounded">Done</span>.</p>
                                <?php
                            } else{
                                $checking_status = "NOT DONE";
                                ?>
                                    <p class="card-text">Status: <span class="bg-danger p-1 text-white rounded">Not Done</span>.</p>
                                <?php
                            }
                        ?>
                            <form action="inputConfig.php" method="POST">
                                <input type="hidden" name="func" value="evaluate1">
                                <input type="hidden" name="type_eval" value="Supervisor">
                                <input type="hidden" name="status_evaluation" value="<?=$checking_status?>">
                                <input type="hidden" name="id" value="<?=$_GET['faculty_id']?>">
                                <input type="hidden" name="acad_yr" value="<?=$_GET['acad_yr']?>">
                                <input type="hidden" name="acad_sem" value="<?=$_GET['acad_sem']?>">
                                <input type="hidden" name="faculty_id" value="<?=$fetch['user_id']?>">
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