<?php

include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';

$faculty_name = "";
$faculty_img ="";
$faculty_subj ="";
$faculty_id_num = "";
$faculty_course ="";
$quest_count="";


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

$evaluate = new evaluate_name();
$res = $evaluate->fetch();
if($res){
    while($fetch = $res->fetch()){
        $faculty_name = $fetch['user_name'];
        $faculty_img = $fetch['user_img'];
        $faculty_subj = $_REQUEST['position'];
        $faculty_id_num = $fetch['user_id_num'];
        $faculty_course = $fetch['user_course'];
    }
}
?>
<div class="bg-img-user">
    
<div class="container-fluid py-5">

<div class="row">

        <div class="col-12 px-xl-5 px-lg-5 px-md-2 px-1">

                <div class="row p-4 px-xl-5 px-lg-5 px-md-2 px-1 mx-xl-5 mx-lg-5 mx-md-2 mx-1">

                    <div class="col-xl-4 col-lg-4 col-md-2 col-12 text-center">
                        <div class="card">
                        <div class="px-xl-5 px-lg-5 p-2"><img src="../../uploads/<?=$faculty_img?>" width="200" height="200" style="border-radius: 50px"></div>
                        <div class="text-center">
                            <p><?= $faculty_subj?> - <?=$faculty_course ?></p>
                            <h3><?=$faculty_name?></h3>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-8 col-lg-8 col-md-10 col-12">

                        <div class="card text-bg-light">
                        <div class="card-header">
                        Performance Appraisal Form for Teaching Effectiveness
                        </div>
                        <div class="card-body">
                        <div class="card-title">
                        <fieldset class="py-2">
                            <legend><p>Rating Legend</p></legend>
                            <div class="table-responsive">
                            <table class="mx-5">
                            <tr class="text-center">
                                <th class="text-center">Scale</th>
                                <th class="text-center">Descriptive Rating</th>
                                <th class="text-center">Qualitative Description</th>
                            </tr>

                            <tbody class="table table-striped">
                                <tr class="text-center">
                                <td>5</td>
                                <td>Outstanding</td>
                                <td>The performance almost always exceeds the jobs requirement. <br>The faculty as an exceptional role model. </td>
                            </tr>
                            <tr class="text-center">
                                <td>4</td>
                                <td>Very&nbsp;Satisfactory</td>
                                <td>The performance meets and often exceeds the job requirements.</td>
                            </tr>
                            <tr class="text-center">
                                <td>3</td>
                                <td>Satisfactory</td>
                                <td>The performance meets the job requirements.</td>
                            </tr>
                                <tr class="text-center">
                                <td>2</td>
                                <td>Fair</td>
                                <td>The perfomance needs some developement to meet job requirements.</td>
                            </tr>
                                <tr class="text-center">
                                <td>1</td>
                                <td>Poor</td>
                                <td>The faculty fails to meet requirements.</td>
                            </tr>

                            </tbody>
                            </table>
                            </div>

                        </fieldset>
                        
                        </div>
                        <div class="card-text">

                        <form action="inputConfig.php" method="POST">
                        <input type="hidden" name="func" value="submit_evaluate">
                        <table class="table table-hover">
                            <?php
                                $criteria = new eval_crit();
                                $res = $criteria->criteria();

                                if($res){
                                    while($fetch = $res->fetch()){
                                    ?>
                                    
                                        <thead>
                                            <tr class="bg-gray-800 text-gray-300" style="background-color:black">
                                                <th colspan="2">
                                                    <span><?=$fetch['crit_criteria']?></span>
                                                </th>
                                                <th colspan="2" class="text-center">Score</th>
                                            </tr>
                                        </thead>

                                        <tbody class="tr-sortable ui-sortable">
                                            <?php
                                                $question = new eval_question();
                                                $fetch_quest = $question->quest();

                                                if($fetch_quest){
                                                    $quest_count = $fetch_quest->rowCount();
                                                    while($fetch_res = $fetch_quest->fetch()){
                                                        
                                                        if($fetch_res['quest_crit']==$fetch['crit_criteria']){

                                                        

                                                        ?>
                                                        <tr>
                                                            
                                                            <td colspan="2">
                                                                <input type="hidden" name="quest_id" value="<?=$fetch_res['quest_id']?>">
                                                                <?=$fetch_res['quest_question']?>
                                                            </p></td>
                                                            <td colspan="2" class="text-center">
                                                                <select class="align-middle" style="width: 90px; height: auto;" required="true" name="eval_score[<?=$fetch_res['quest_id']?>]">
                                                                <option class="text-center" Value="" selected disabled>--</option>
                                                                <option value="5" class="text-center">5</option>
                                                                <option value="4" class="text-center">4</option>
                                                                <option value="3" class="text-center">3</option>
                                                                <option value="2" class="text-center">2</option>
                                                                <option value="1" class="text-center">1</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <?php }}
                                                }
                                            ?>
                                            
                                        </tbody>
                                    <?php

                                    }
                                }
                            ?>
                            
                        </table>
                        
                        <input type="hidden" name="quest_count" value="<?=$quest_count?>">
                        <input type="hidden" name="type_eval" value="<?=$_GET['type_eval']?>">
                        <input type="hidden" name="acad_year" value="<?=$_GET['acad_yr']?>">
                        <input type="hidden" name="semester" value="<?=$_GET['acad_sem']?>"> 
                        <input type="hidden" name="id_num" value="<?=$_GET['id']?>">
                        <!-- <input type="hidden" name="department" value="<?=$_SESSION['user_course']?>"> -->
                        <input type="hidden" name="id_num1" value="<?=$faculty_id_num?>">
                        <input type="hidden" name="faculty_position" value="<?=$_GET['position']?>">
                        <input type="hidden" name="name_evaluate" value="<?=$faculty_name?>">
                        <label>Write a brief comment about your teacher here:</label><br>
                       <textarea name="comment" cols="30" rows="4" class="form-control" required=""></textarea><br>

                        <!-- Recaptcha -->
                       <div class="d-flex justify-content-center">
                        <div class="g-recaptcha" data-sitekey="6LcGxucjAAAAAC4SE-VXjrynghbGJkI-AxAFEWGV"></div>
                        </div>
                        
                        <br>
                        <div class="d-flex justify-content-center pb-3">
                        <button type="submit" class="btn btn-primary" name="submit_evaluate">Submit</button>
                        </div>
                            
                        </form>

                        </div>

                        
                        

                        </div>
                        </div>

                    </div>

                </div>
                

        </div>

            
</div>
</div>
</div>

<?php
include 'include/footer.php';
?>