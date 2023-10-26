<?php
include 'config/controller.php';

function secured($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}

if(isset($_POST['inputCourse'])&& isset($_POST['function'])=='inputCourse'){
    
    $department = secured($_POST['department']);
    $course = secured($_POST['course']);
    $course_name = secured($_POST['course_name']);

    $inputCourse = new inputCourse();
    $inputCourse->inputData($department,$course,$course_name);
    
} elseif(isset($_POST['editCourse'])&& isset($_POST['function'])=='editCourse'){
    $edit_dep_id = secured($_POST['edit_dep_id']);
    $edit_course = secured($_POST['edit_course']);
    $edit_course_name = secured($_POST['edit_course_name']);

    $editCourse = new editCourse();
    $editCourse->editData($edit_dep_id,$edit_course,$edit_course_name);
}

elseif (isset($_POST['delete_dep']) && isset($_POST['function'])=='deleteDep'){
    $delete_dep_id = secured($_POST['delete_dep_id']);

    $deleteDep = new deleteDep();
    $deleteDep->deleteData($delete_dep_id);
} elseif(isset($_POST['add_prog_chair'])&& isset($_POST['function'])=='add_prog_chair'){
    $dep = secured($_POST['dep']);
    $name = secured($_POST['name']);
    $username = secured($_POST['username']);
    $password = secured($_POST['password']);
    $email = secured($_POST['email']);

    $add = new addProgChair();
    $add->addData($dep,$name,$username,$password,$email);
} elseif (isset($_POST['deleteProgChair']) && isset($_POST['function'])=='deleteProgChair'){
    $delete_sub = secured($_POST['delete_sub']);

    $deleteProgChair = new deleteProgChair();
    $deleteProgChair->deleteData($delete_sub);
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