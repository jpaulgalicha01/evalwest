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

          header("location: evaluation.php?id=".$fetch['user_id']." &faculty_id=".$fetch['user_id_num']." &acad_yr=".$status_id." &acad_sem=".$acad_sem." ");
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
        
                $list = "SELECT *FROM tbl_users WHERE user_department='".$res['user_department']."' AND user_course='".$res['user_course']."' ";
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
class list_eval1 extends DataBase{
    public function fetch(){
        $check_section = "SELECT * FROM tbl_users WHERE user_id=".$_GET['id']." ";
        $check_section_run = $this->connect()->query($check_section);
        if($check_section_run->rowCount()){
            $res = $check_section_run->fetch();
            

            if($res['user_position'] == "Program Chair"){
                $list = "SELECT *FROM tbl_users WHERE user_department='".$res['user_department']."' AND user_course='".$res['user_course']."' AND
                user_position = 'Full-time Faculty' OR user_position = 'Part-time Faculty' ";
                $list_run = $this->connect()->query($list);
                $list_run->execute();

                if($list_run->rowCount()){
                    return $list_run;
                } else {
                    return false;
                }
            }
            else if($res['user_position'] == "School Director"){
                $list = "SELECT *FROM tbl_users WHERE user_department='".$res['user_department']."' AND user_course='".$res['user_course']."' AND
                user_position = 'Program Chair' ";
                $list_run = $this->connect()->query($list);
                $list_run->execute();

                if($list_run->rowCount()){
                    
                    return $list_run;
                } else {
                    return false;
                }
            }
            else if($res['user_position'] == "Dean of Instruction"){
                $list = "SELECT *FROM tbl_users WHERE user_position = 'School Director' ";
                $list_run = $this->connect()->query($list);
                $list_run->execute();

                if($list_run->rowCount()){
                    
                    return $list_run;
                } else {
                    return false;
                }
            }
            else if($res['user_position'] == "Campus Administrator"){
                $list = "SELECT *FROM tbl_users WHERE user_position = 'Dean of Instruction' ";
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
}
class evaluate1 extends DataBase{
    private $type_eval,$checking_status,$id,$acad_yr,$acad_sem,$faculty_id;
    public function evaluate($type_eval,$checking_status,$id,$acad_yr,$acad_sem,$faculty_id){
        $stmt = "SELECT * FROM tbl_users WHERE user_id='$faculty_id' ";
        $stmt_run = $this->connect()->query($stmt);
        if($stmt_run->rowCount()){
           $res = $stmt_run->fetch();
           if($checking_status =="DONE"){
            ?>
                <script>
                    window.alert("You can only evaluate once!");
                    window.location.href="index.php";
                </script>
            <?php
           }
           else{
                header("Location: evaluation1.php?type_eval=".$type_eval." &id=".$id." &status_evaluation=".$checking_status." &acad_yr=".$acad_yr." &acad_sem=".$acad_sem." &faculty_id=".$res['user_id_num']." &position=".$res['user_position']." ");
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
        if(isset($_REQUEST['faculty_id'])){
            $stmt = "SELECT * FROM tbl_users WHERE user_id_num=".$_GET['faculty_id']." ";
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
    private $id_user,$id_name; 
    public function checking($id_user,$id_name){
  
 
        $stmt_check = "SELECT * FROM tbl_result_eval WHERE  eval_type='Peer Evaluation' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."'  
        AND faculty_id='".$_GET['faculty_id']."' AND course='".$_SESSION['user_course']."' AND id_num='$id_user' AND name='$id_name' ";
        $stmt_check_run = $this->connect()->query($stmt_check);
        $stmt_check_run->execute();
        if($stmt_check_run->rowCount()>=1){
           return $stmt_check_run;
        }

    }
}
class eval_check1 extends DataBase{
    private $id_user,$id_name; 
    public function checking($id_user,$id_name){
        $stmt = "SELECT * FROM tbl_users WHERE user_id ='".$_REQUEST['id']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            $fecth_user = $stmt_run->fetch();
            
            if($fecth_user['user_position'] == "Program Chair"){
                $stmt_check = "SELECT * FROM tbl_result_eval WHERE  eval_type='Program Chair' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."'  
                AND faculty_id='".$_GET['faculty_id']."' AND course='".$_SESSION['user_course']."' AND id_num='$id_user' AND name='$id_name' ";
                $stmt_check_run = $this->connect()->query($stmt_check);
                $stmt_check_run->execute();
                if($stmt_check_run->rowCount()>=1){
                    return $stmt_check_run;
                }
            }elseif($fecth_user['user_position'] == "School Director"){
                $stmt_check = "SELECT * FROM tbl_result_eval WHERE  eval_type='School Director' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."'  
                AND faculty_id='".$_GET['faculty_id']."' AND course='".$_SESSION['user_course']."' AND id_num='$id_user' AND name='$id_name' ";
                $stmt_check_run = $this->connect()->query($stmt_check);
                $stmt_check_run->execute();
                if($stmt_check_run->rowCount()>=1){
                    return $stmt_check_run;
                }
            }elseif($fecth_user['user_position'] == "Dean of Instruction"){
                $stmt_check = "SELECT * FROM tbl_result_eval WHERE  eval_type='Dean of Instruction' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."'  
                AND faculty_id='".$_GET['faculty_id']."' AND id_num='$id_user' AND name='$id_name' ";
                $stmt_check_run = $this->connect()->query($stmt_check);
                $stmt_check_run->execute();
                if($stmt_check_run->rowCount()>=1){
                    return $stmt_check_run;
                }
            }elseif($fecth_user['user_position'] == "Campus Administrator"){
                $stmt_check = "SELECT * FROM tbl_result_eval WHERE  eval_type='Campus Administrator' AND acad_year='".$_GET['acad_yr']."' AND semester='".$_GET['acad_sem']."'  
                AND faculty_id='".$_GET['faculty_id']."' AND id_num='$id_user' AND name='$id_name' ";
                $stmt_check_run = $this->connect()->query($stmt_check);
                $stmt_check_run->execute();
                if($stmt_check_run->rowCount()>=1){
                    return $stmt_check_run;
                }
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
    private $type_eval,$acad_year,$semester,$id_num_evaluator,$id_num,$faculty_position,$name_evaluate1,$eval_score,$comment,$quest_count,$quest_id;
    public function submit($type_eval,$acad_year,$semester,$id_num_evaluator,$id_num,$faculty_position,$name_evaluate1,$eval_score,$comment,$quest_count,$quest_id){
        $stmt = "SELECT * FROM tbl_users WHERE user_id_num ='$id_num' ";
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
                 
                        $selec_res = $this->connect()->query("INSERT INTO `tbl_result_eval`(eval_type,acad_year, semester, faculty_id, department,course,id_num, name, per_criteria, score_per_criteria, overall_points, overall_mean, comments)
                        VALUES ('$type_eval','$acad_year','$semester','$id_num_evaluator','".$res['user_department']."','".$res['user_course']."','$id_num','$name_evaluate1','".$fetch_quest['quest_crit']."','$sc','$total','$total_mean','$comment')");
                
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