<?php
include 'config/security.php';
include 'config/controller.php';
function secured($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "\'", $data);
    return $data;
  }
  
if (isset($_POST['addAcadYr']) && isset($_POST['function'])=='addAcadYr'){
    $acad_dep = secured($_POST['acad_dep']);
    $acad_yr = secured($_POST['acad_yr']);
    $semester = secured($_POST['semester']);

    $addacdYr  = new addAcadYr();
    $addacdYr->addData($acad_dep,$acad_yr,$semester);

} elseif(isset($_POST['deleteAcad'])&& isset($_POST['function'])=='deleteAcad'){
    $delete_acad = secured($_POST['delete_acad']);

    $deleteAcad = new deleteAcad ();
    $deleteAcad->deleteData($delete_acad);
}
elseif(isset($_POST['addYrSec']) && isset($_POST['function'])=='addYrSec'){
    $course = secured($_POST['course']);
    $year = secured($_POST['year']);
    $section = secured($_POST['section']);

    $addYrSec = new addYrSec();
    $addYrSec->addData($course,$year,$section);
    
}
elseif(isset($_POST['deleteYrSec']) && isset($_POST['function'])=='deleteYrSec'){
    $delete_id = secured($_POST['delete_id']);

    $deleteYrSec = new deleteYrSec();
    $deleteYrSec->deleteData($delete_id);
}elseif(isset($_POST['addCrit']) && isset($_POST['function'])=='addCrit'){
   $criteria = secured($_POST['criteria']);

   $addCriteria = new addCriteria();
   $addCriteria->addData($criteria);
}elseif(isset($_POST['editCrit'])&& isset($_POST['function'])=='editCrit'){
    $crit_id = secured($_POST['crit_id']);
    $manage_criteria = secured($_POST['manage_criteria']);

    $editCriteria = new editCriteria();
    $editCriteria->editData($crit_id,$manage_criteria);
}elseif(isset($_POST['deleteCrit'])&& isset($_POST['function'])=='deleteCrit'){
    $delete_id = secured($_POST['delete_id']);

    $deleteCrit = new deleteCrit();
    $deleteCrit->deleteData($delete_id);
}elseif(isset($_POST['addQuest'])&& isset($_POST['function'])=='addQuest'){
    $criteria = secured($_POST['criteria']);
    $question = secured($_POST['question']);

    $addQuest = new addQuest();
    $addQuest->addData($criteria,$question);
}elseif(isset($_POST['editQuest'])&& isset($_POST['function'])=='editQuest'){
    $quest_id = secured($_POST['quest_id']);
    $quest_crit = secured($_POST['quest_crit']);
    $quest = secured($_POST['quest']);

    $editQuest = new editQuest();
    $editQuest->editData($quest_id,$quest_crit,$quest);
}elseif(isset($_POST['deleteQuest'])&& isset($_POST['function'])=='deleteQuest'){
    $delete_quest = secured($_POST['delete_quest']);

    $deleteQuest = new deleteQuest();
    $deleteQuest->deleteData($delete_quest);
}elseif(isset($_POST['addFaculty'])&& isset($_POST['function'])=='addFaculty'){

    $department = secured($_POST['department']);
    $course = secured($_POST['course']);
    $image = $_FILES["image"]["name"];
    $faculty_id = secured($_POST['faculty_id']);
    $faculty_name = secured($_POST['faculty_name']);
    $faculty_email = secured($_POST['faculty_email']);
    $position = secured($_POST['position']);
    
    $addFaculty = new addFaculty();
    $addFaculty->addData($department,$course,$image,$faculty_id,$faculty_name,$faculty_email,$position);
}elseif(isset($_POST['manageFaculty'])&& isset($_POST['function'])=='manageFaculty'){
    $editFacultyID = secured($_POST['editFacultyID']);
    $image = $_FILES["image"]["name"];
    $edit_faculty_id = secured($_POST['edit_faculty_id']);
    $edit_faculty_name = secured($_POST['edit_faculty_name']);
    $edit_faculty_email = secured($_POST['edit_faculty_email']);
    $edit_faculty_position = secured($_POST['edit_faculty_position']);

    $editFaculty = new editFaculty();
    $editFaculty->editData($editFacultyID,$image,$edit_faculty_id,$edit_faculty_name,$edit_faculty_email,$edit_faculty_position);
}elseif(isset($_POST['deleteFaculty'])&& isset($_POST['function'])=='deleteFaculty'){
    $deleteFacultyID = secured($_POST['deleteFacultyID']);

    $deleteFaculty = new deleteFaculty();
    $deleteFaculty->deleteData($deleteFacultyID);
}elseif(isset($_POST['restoreFaculty'])&& isset($_POST['function'])=='restoreFaculty'){
    $restoreFacultyID = secured($_POST['restoreFaculty']);
    $restoreFaculty = new restoreFaculty();
    $restoreFaculty->restoreData($restoreFacultyID);
}elseif(isset($_POST['deleteFacultyPerma'])&& isset($_POST['function'])=='deleteFacultyPerma'){
    $deleteFacultyID = secured($_POST['deleteFacultyID']);
    
    $deleteFacultyPerma = new deleteFacultyPerma();
    $deleteFacultyPerma->deleteData($deleteFacultyID);
}elseif(isset($_POST['acadYear'])&& isset($_POST['function'])=='acadYear'){
    if(!empty($_POST['StudacadYear'])){
        $_SESSION['StudacadYear'] = secured($_POST['StudacadYear']);
        header("Location: student-list-add.php");
    }
}elseif(isset($_POST['addStudent'])&& isset($_POST['function'])=='addStudent'){
    $AcadYear = secured($_POST['AcadYear']);
    $course = secured($_POST['course']);
    $student = $_FILES['file']['name'];
    $year = secured($_POST['year']);
    $section = secured($_POST['section']);

    $addStudent = new addStudent();
    $addStudent->addData($AcadYear,$course,$student,$year,$section);
}elseif(isset($_POST['value'])&& isset($_POST['function'])=='showEditModal'){
    $value = secured($_POST['value']);

    $checkStudent = new fetchStudentModal();
    $res = $checkStudent->fetchData($value);

    if($res){
        while($row = $res->fetch()){
            $data = [
                'status' => 200,
                'data' => $row,
            ];
            echo json_encode($data);
        }
    }

}elseif(isset($_POST['value'])&& isset($_POST['function'])=='showDeleteModal'){
    $value = secured($_POST['value']);

    $checkStudent = new fetchStudentModal();
    $res = $checkStudent->fetchData($value);

    if($res){
        while($row = $res->fetch()){
            $data = [
                'status' => 200,
                'data' => $row,
            ];
            echo json_encode($data);
        }
    }

}elseif(isset($_POST['manageStudent'])&& isset($_POST['function'])=='manageStudent'){
    $edit_user_id = secured($_POST['edit_user_id']);
    $edit_user_id_num = secured($_POST['edit_user_id_num']);
    $edit_user_name = secured($_POST['edit_user_name']);
    $edit_user_email = secured($_POST['edit_user_email']);

    $editStudent = new editStudent();
    $editStudent->editData($edit_user_id,$edit_user_id_num,$edit_user_name,$edit_user_email);
}elseif(isset($_POST['deleteStud'])&& isset($_POST['function'])=='deleteStud'){
    $delete_user_id = secured($_POST['delete_user_id']);

    $deleteStudent = new deleteStudent();
    $deleteStudent-> deleteData($delete_user_id);
}elseif(isset($_POST['DeletedacadYear'])&& isset($_POST['function'])=='DeletedacadYear'){
    if(!empty($_POST['DeletedStudacadYear'])){
        $_SESSION['DeletedStudacadYear'] = secured($_POST['DeletedStudacadYear']);
        header("Location: deleted-student-list-restore.php");
    }
}elseif(isset($_POST['restoreStudent'])&& isset($_POST['function'])=='restoreStudent'){
    $restoreStudentID = secured($_POST['restoreStudent']);
    $restoreStudent = new restoreStudent();
    $restoreStudent->restoreData($restoreStudentID);
}
elseif(isset($_POST['deleteStudent'])&& isset($_POST['function'])=='deleteStudent'){
    $value = secured($_POST['deleteStudent']);

    $checkDeletedStudent = new fetchDeletedStudentModal();
    $res = $checkDeletedStudent->fetchData($value);

    if($res){
        while($row = $res->fetch()){
            $data = [
                'status' => 200,
                'data' => $row,
            ];
            echo json_encode($data);
        }
    }else{
        $data = [
            'message' => "There's something wrong",
        ];
        echo json_encode($data);
    }
}
elseif(isset($_POST['deleteStudents'])&& isset($_POST['function'])=='deleteStudents'){
    $delete_user_id = secured($_POST['delete_user_id']);

    $deleteStudentPerma = new deleteStudentPerma();
    $deleteStudentPerma-> deleteData($delete_user_id);
}elseif(isset($_POST['sysDefault'])&& isset($_POST['function'])=='sysDefault'){
    $SysDef_id = secured($_POST['SysDef_id']);

    $sysDef = new sysDef();
    $sysDef->editData($SysDef_id);
}elseif(isset($_POST['changeStatus'])&& isset($_POST['function'])=='changeStatus'){
    $status_id = secured($_POST['status_id']);
    $status = secured($_POST['status']);

    $changeStatus = new changeStatus();
    $changeStatus->editData($status_id,$status);
}elseif(isset($_POST['addSubject'])&& isset($_POST['function'])=='addSubject'){
    if(!empty($_POST['year'])){
        $_SESSION['year'] = $_POST['year'];
        header("Location: course-subject-add.php");
    }
}elseif(isset($_POST['addCourseSubject'])&& isset($_POST['function'])=='addCourseSubject'){
    $sub_year = secured($_POST['year']);
    $sub_course = secured($_POST['course']);
    $sub = secured($_POST['subject']);
    $sub_faculty_id = secured($_POST['faculty']);
    $sub_section = secured($_POST['section']);
    $sub_semes = secured($_POST['semester']);

    $add = new addSubject();
    $add->addData($sub_year,$sub_course,$sub,$sub_faculty_id,$sub_section,$sub_semes);
}elseif(isset($_GET['value'])&& isset($_GET['function'])=='deleteSubject'){
    $value = secured($_GET['value']);

    $check_subj = new checkSubj();
    $res_delete = $check_subj->fetchData($value);

    if($res_delete){
        while($row = $res_delete->fetch()){
            $data = [
                'status' => 200,
                'data' => $row,
            ];
            echo json_encode($data);
        }
    } else {
        $data = [
            'message' => "There's something wrong",
        ];
        echo json_encode($data);
    }    

}elseif(isset($_POST['deleteSubject'])&& isset($_POST['function'])=='deleteSubject'){
    $deleteID_Subj = secured($_POST['delete_subject']);

    $delete = new deleteSubject();
    $delete->deleteData($deleteID_Subj);
}elseif(isset($_POST['report_eval'])&& isset($_POST['function'])=='report_eval'){
   $acad_year = secured($_POST['acad_year']);
   $acad_sem = secured($_POST['acad_sem']);

   $forward = new forward_report1();
   $forward->redirect($acad_year,$acad_sem);

}elseif(isset($_POST['report_eval1'])&& isset($_POST['function'])=='report_eval1'){
    $acad_year = secured($_POST['acad_year']);
    $acad_sem = secured($_POST['acad_sem']);
    $faculty_id = secured($_POST['faculty_id']);
    $name = secured($_POST['name']);
    
    $forwar = new forward_show_report();
    $forwar->redirect($acad_year,$acad_sem,$faculty_id,$name);
 } elseif (isset($_POST['change_image']) && isset($_POST['function'])=='change_image'){
    $user_id = secured($_POST['user_id']);
    $profile_img = $_FILES['image']['name'];
    $change_img = new change_img();
    $change_img->change($user_id,$profile_img);
} elseif (isset($_POST['edit_info']) && isset($_POST['function'])=='edit_info'){
    $user_id = secured($_POST['user_id']);
    $user_name = secured($_POST['user_name']);
    $user_uname = secured($_POST['user_uname']);
    $user_email = secured($_POST['user_email']);
    $user_npass = secured($_POST['user_npass']);

    $change_info = new change_user_info();
    $change_info ->change($user_id,$user_name,$user_uname,$user_email,$user_npass);
}
else {
    header("Location: index.php");
}

?>