<?php
include '../config/db_conn.php';


class user_info extends DataBase{
    public function userInfo(){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_id='".$_SESSION['user_id']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        }else {
            return false;
        }
    }
}
class fetchFaculty extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_users WHERE user_type='Faculty' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class fetchStudent extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_users WHERE user_type='Student' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class fetchCourse extends DataBase{
    public function fetch_course(){
        $stmt = "SELECT * FROM tbl_dep_yr_sec";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class inputCourse extends DataBase{
    private $department;
    private $course;
    private $course_name;

    public function inputData($department,$course,$course_name){
        $stmt = "SELECT * FROM tbl_dep_yr_sec WHERE dep_yr_sec_department='$department' AND dep_yr_sec_course='$course'";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already Added This Data");
                    window.location.href = "department.php";
                </script>
            <?php
        } else {
            $add_data = "INSERT INTO `tbl_dep_yr_sec`(`dep_yr_sec_department`, `dep_yr_sec_course`, `dep_yr_sec_coursename`) 
            VALUES ('$department','$course','$course_name')";
            $add_data_run = $this->connect()->query($add_data);

            if($add_data_run){
                ?>
                    <script>
                        window.alert("Successfully Added");
                        window.location.href="department.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        window.alert("There's Something Wrong To Add");
                        window.location.href="department.php";
                    </script>
                <?php
            }
        }
    }
}

class editCourse extends DataBase{
    private $edit_dep_id;
    private $edit_course;
    private $edit_course_name;

    public function editData($edit_dep_id,$edit_course,$edit_course_name){
        $stmt = "SELECT * FROM tbl_dep_yr_sec WHERE dep_yr_sec_id='$edit_dep_id' AND dep_yr_sec_course='$edit_course' AND `dep_yr_sec_coursename`='$edit_course_name' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already Added This Data");
                    window.location.href = "department.php";
                </script>
            <?php
        } else {
            $update_data = "UPDATE `tbl_dep_yr_sec` SET `dep_yr_sec_course`='$edit_course',`dep_yr_sec_coursename`='$edit_course_name' 
                            WHERE dep_yr_sec_id='$edit_dep_id'";
            $update_data_run = $this->connect()->query($update_data);
            
            if($update_data_run){
                ?>
                    <script>
                        window.alert("Succesfully Updating Data");
                        window.location.href = "department.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        window.alert("Failed Updating Data");
                        window.location.href = "department.php";
                    </script>
                <?php
            }
        }
    }
    
}


class deleteDep extends DataBase {
    private $delete_dep_id;

    public function deleteData($delete_dep_id){
        $stmt = "DELETE FROM `tbl_dep_yr_sec` WHERE  dep_yr_sec_id='$delete_dep_id' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
                ?>
                <script>
                    window.alert("Successfully Deleted Data");
                    window.location.href = "department.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("Failed Deleting Data");
                    window.location.href = "department.php";
                </script>
            <?php
        }
    }
}

class addProgChair extends DataBase{
    private $dep;
    private $name;
    private $username;
    private $password;
    private $email;
    
    public function addData($dep,$name,$username,$password,$email){
        $check_name = "SELECT * FROM tbl_accounts WHERE acc_name='$name' ";

        $check_name_run = $this->connect()->query($check_name);
        $check_name_run->execute();

        if($check_name_run->rowCount()>=1){
            ?>
                <script>
                    window.alert("Name is Already Used");
                    window.location.href = "prog_chair_list.php";
                </script>
            <?php
        } else {
            $check_uname = "SELECT * FROM tbl_accounts WHERE acc_uname = '$username' ";
            $check_uname_run = $this->connect()->query($check_uname);
            $check_uname_run->execute();

            if($check_uname_run->rowCount()>=1){
                ?>
                    <script>
                        window.alert("UserName is Already Used");
                        window.location.href = "prog_chair_list.php";
                    </script>
                <?php
            } else{
                $check_email = "SELECT * FROM tbl_accounts WHERE acc_email='$email' ";
                $check_email_run = $this->connect()->query($check_email);
                $check_email_run->execute();

                if($check_email_run->rowCount()>=1){
                    ?>
                        <script>
                            window.alert("Email is Already Used");
                            window.location.href = "prog_chair_list.php";
                        </script>
                    <?php
                } else {
                    $password_md5 = md5($password);
                    $acc_id = rand();

                    $addProgChair = "INSERT INTO `tbl_accounts`(`acc_id_rand`,`acc_name`, `acc_uname`, `acc_pass`, `acc_email`, `acc_type`,`acc_img`) 
                    VALUES ('$acc_id','$name','$username','$password_md5','$email','$dep','default-profile.png')";
                    $addProgChair_run = $this->connect()->query($addProgChair);

                    if($addProgChair_run){
                        ?>
                            <script>
                                window.alert("Successfully Added");
                                window.location.href = "prog_chair_list.php";
                            </script>
                        <?php
                    } else {
                        ?>
                            <script>
                                window.alert("There's Something Wrong to Added");
                                window.location.href = "prog_chair_lis.php";
                            </script>
                        <?php
                    }
                }
            }
        }
    }
}

class fetchProgChair extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_type != 'admin' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else{
            return false;
        }
    }
}


class deleteProgChair extends DataBase {
    private $delete_sub; 

    public function deleteData($delete_sub){
        $stmt = "DELETE FROM tbl_accounts WHERE acc_id='$delete_sub'";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Deleted");
                    window.location.href = "prog_chair_list.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("There's Somethind Wrong to Delete Data");
                    window.location.href = "prog_chair_list.php";
                </script>
            <?php
        }
    }
}

class change_img extends DataBase{
    private $user_id,$profile_img;
    public function change($user_id,$profile_img){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($profile_img);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            ?>
            <script>
                window.alert("Please select format JPG,PNG,JPEG");
                window.location.href = "profile.php";
            </script>
            <?php
        }else {
            $stmt = "UPDATE tbl_accounts SET acc_img='$profile_img' WHERE acc_id='$user_id' ";
            $stmt_run = $this->connect()->query($stmt);

            if($stmt_run){
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);             
                ?>
                <script>
                    window.alert("Successfully Update Data");
                    window.location.href = "index.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    window.alert("There's Something Wrong to Update Data");
                    window.location.href = "profile.php";
                </script>
                <?php
            }
        }
    }
}

class change_user_info extends DataBase{
    private $user_id,$user_name,$user_uname,$user_email,$user_npass;
    public function change($user_id,$user_name,$user_uname,$user_email,$user_npass){
        if(!empty($user_npass)){
            $stmt = "UPDATE tbl_accounts SET acc_name='$user_name',acc_uname='$user_uname',acc_email='$user_email',acc_pass='".md5($user_npass)."' WHERE acc_id='$user_id' ";
            $stmt_run = $this->connect()->query($stmt);

            if($stmt_run){    
                ?>
                <script>
                    window.alert("Successfully Update Data");
                    window.location.href = "index.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    window.alert("There's Something Wrong to Update Data");
                    window.location.href = "profile.php";
                </script>
                <?php
            }
        }else{
            $stmt = "UPDATE tbl_accounts SET acc_name='$user_name',acc_uname='$user_uname',acc_email='$user_email' WHERE acc_id='$user_id' ";
            $stmt_run = $this->connect()->query($stmt);

            if($stmt_run){    
                ?>
                <script>
                    window.alert("Successfully Update Data");
                    window.location.href = "index.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    window.alert("There's Something Wrong to Update Data");
                    window.location.href = "profile.php";
                </script>
                <?php
            }
        }
    }
}

?>