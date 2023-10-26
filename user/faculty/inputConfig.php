<?php
include 'config/controller.php';
function secured($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}
if(isset($_POST['evaluate']) && $_POST['func']=='evaluate'){
    $user_id = secured($_POST['value']);
    $status_id = secured($_POST['acad_id']);
    $acad_sem = secured($_POST['acad_sem']);


    $evaluate = new evaluation();
    $res = $evaluate->evaluate($user_id,$status_id,$acad_sem);

}elseif(isset($_POST['evaluate1']) && $_POST['func']=='evaluate1'){
    $type_eval = secured($_POST['type_eval']);
    $checking_status = secured($_POST['status_evaluation']);
    $id = secured($_POST['id']);
    $acad_yr = secured($_POST['acad_yr']);
    $acad_sem = secured($_POST['acad_sem']);
    $faculty_id = secured($_POST['faculty_id']);

    $evaluate1 = new evaluate1();
    $evaluate1->evaluate($type_eval,$checking_status,$id,$acad_yr,$acad_sem,$faculty_id);

}elseif(isset($_POST['submit_evaluate']) && $_POST['func']=='submit_evaluate'){
    $type_eval = secured($_POST['type_eval']);
	$acad_year = secured($_POST['acad_year']);
	$semester =  secured($_POST['semester']);
	$id_num_evaluator =  secured($_POST['id_num']);
	// $department =  secured($_POST['department']);
	$id_num = secured($_POST['id_num1']);
	$faculty_position = secured($_POST['faculty_position']);
	$name_evaluate1 =  secured($_POST['name_evaluate']);
	$eval_score = $_POST["eval_score"];
	$comment =  secured($_POST["comment"]);
	$quest_count =  secured($_POST['quest_count']);
	$quest_id = secured($_POST['quest_id']);
    
    $submit_evaluate = new submit_evaluate();
    $submit_evaluate->submit($type_eval,$acad_year,$semester,$id_num_evaluator,$id_num,$faculty_position,$name_evaluate1,$eval_score,$comment,$quest_count,$quest_id);
}
else {
    header("Location: index.php");
}
?>