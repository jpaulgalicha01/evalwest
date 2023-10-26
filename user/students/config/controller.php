<?php
include '../../config/db_conn.php';

class check_status extends DataBase{
    public function status(){
        $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_dep ='".$_SESSION['user_course']."' AND acad_SysDef='YES' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        }else {
            return false;
        }
    }
}
class evaluation extends DataBase{
 private $user_id;
 private $status_id;
 private $acad_sem;
 public function evaluate($user_id,$status_id,$acad_sem){
    $stmt = "SELECT * FROM tbl_users WHERE user_id='$user_id' ";
    $stmt_run = $this->connect()->query($stmt);
    if($stmt_run->rowCount()){
        while($fetch = $stmt_run->fetch())
        {
          header("location: evaluation.php?id=".$fetch['user_id']." &acad_yr=".$status_id." &acad_sem=".$acad_sem." ");
        }
    }
 }
}

class eval_status extends DataBase{
    public function check(){
        if(isset($_GET['acad_yr'])){
            $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_dep='".$_SESSION['user_course']."' AND acad_year='".$_GET['acad_yr']."' AND acad_SysDef='YES' ";
            $stmt_run = $this->connect()->query($stmt);
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else {
                header("location: index.php");
            }
        } else {
            header("location: index.php");
        }

    }
}

class list_eval extends DataBase{
    public function fetch(){
        $check_section = "SELECT * FROM tbl_users WHERE user_id=".$_GET['id']." ";
        $check_section_run = $this->connect()->query($check_section);
        if($check_section_run->rowCount()){
            $res = $check_section_run->fetch();
            
            $list = "SELECT * FROM tbl_subj WHERE subj_year='".$res['user_yr']."' AND subj_section='".$res['user_section']."' AND subj_semes='".$_GET['acad_sem']."' ";
            $list_run = $this->connect()->query($list);
            $list_run->execute();

            if($list_run->rowCount()){
                return $list_run;
            } else {
                return false;
            }
        }
    }
}
class evaluate1 extends DataBase{
    private $checkin_status,$id,$acad_yr,$acad_sem,$subj_id;
    public function evaluate($checkin_status,$id,$acad_yr,$acad_sem,$subj_id){
        $stmt = "SELECT * FROM tbl_subj WHERE subj_id='$subj_id' ";
        $stmt_run = $this->connect()->query($stmt);
        if($stmt_run->rowCount()){
           $res = $stmt_run->fetch();
           if($checkin_status =="DONE"){
            ?>
                <script>
                    window.alert("You can only evaluate once!");
                    window.location.href="index.php";
                </script>
            <?php
           }
           else{
                header("Location: evaluation1.php?id=".$id." &status_evaluation=".$checkin_status." &acad_yr=".$acad_yr." &acad_sem=".$acad_sem." &subj_id=".$res['subj_id_num']." &subject=".$res['subj_subject']." ");
           }
        }else {
            return false;
        }
    }
}

class evaluation_status extends DataBase{
    public function checking_status(){
        if(isset($_GET['status_evaluation'])){
            $status = $_GET['status_evaluation'];
            if($status == "DONE"){
                ?>
                    <script>
                        window.alert("You can only evaluate once!");
                        window.location.href="index.php";
                    </script>
                <?php
            }
        }
    }
}
class evaluate_name extends DataBase{
    public function fetch(){
        if(isset($_REQUEST['subj_id'])){
            $stmt = "SELECT * FROM tbl_users WHERE user_id_num=".$_GET['subj_id']." ";
            $stmt_run = $this->connect()->query($stmt);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            } else {
                header("Location: index.php");
            }
        }else {
            header("Location: index.php");
        }
        
    }
}

class eval_check extends DataBase{
    public function checking(){
        $stmt = "SELECT * FROM tbl_users WHERE user_id ='".$_REQUEST['id']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            $fecth_user = $stmt_run->fetch();
            
            $stmt_check = "SELECT * FROM tbl_result_eval WHERE eval_type='Student Evaluation' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."' AND stud_id='".$fecth_user['user_id_num']."' 
            AND course='".$_SESSION['user_course']."' ";
            $stmt_check_run = $this->connect()->query($stmt_check);
            $stmt_check_run->execute();
            if($stmt_check_run->rowCount()){
                return $stmt_check_run;
            }else {
                return false;
            }

        }
    }
}

class eval_crit extends DataBase{
    public function criteria(){
        $stmt = "SELECT * FROM tbl_criteria";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class eval_question extends DataBase{
    public function quest(){
        $stmt = "SELECT * FROM tbl_question ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        }else {
            return false;
        }
    }
}

class submit_evaluate extends DataBase{
    private $type_eval,$acad_year,$semester,$id_num_evaluator,$department,$id_num,$subject,$name_evaluate1,$eval_score,$comment,$quest_count,$quest_id;
    public function submit($type_eval,$acad_year,$semester,$id_num_evaluator,$department,$id_num,$subject,$name_evaluate1,$eval_score,$comment,$quest_count,$quest_id){
        $stmt = "SELECT * FROM tbl_users WHERE user_id ='$id_num_evaluator' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            while($res = $stmt_run->fetch()){
                $quest = $this->connect()->query("SELECT * FROM tbl_question");
                $quest ->execute();
                foreach($quest as $fetch_quest){
                    if($fetch_quest['quest_id'] <= $eval_score){
                        $sc = $eval_score[$fetch_quest['quest_id']]; //score ni siya
            
                    $total = array_sum($eval_score);
                    $mean = $total / $quest_count;
                    $total_mean = number_format($mean,2);
            
                    $selec_res = $this->connect()->query("INSERT INTO `tbl_result_eval`(`eval_type`, `acad_year`, `semester`, `stud_id`, `year_level`, `course`,`id_num`, `subject`, `name`, `per_criteria`, `score_per_criteria`, `overall_points`, `overall_mean`, `comments`)
                    VALUES ('$type_eval','$acad_year','$semester','".$res['user_id_num']."','$acad_year','$department','$id_num','$subject','$name_evaluate1','".$fetch_quest['quest_crit']."','$sc','$total','$total_mean','$comment')");
            
                    if($selec_res){
                     echo'<script>
                             window.alert("Thank you for your cooperation. God Bless");
                            window.location.href="index.php";
                          </script>'; 
                  }
                  else{ echo"erorr";}
                }
              }
            }
        }

    }
}
?>