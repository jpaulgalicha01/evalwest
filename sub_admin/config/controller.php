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

class fetchAcad extends DataBase {
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_dep='".$_SESSION['user_type']."'";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()>0){
            return $stmt_run;
        }
    }
}
class fetchYear extends DataBase {
    public function fetchData(){
        $stmt = "SELECT DISTINCT acad_year FROM tbl_acad_yr";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        }
    }
}
class addAcadYr extends DataBase{
    private $acad_dep;
    private $acad_yr;
    private $semester; 

    public function addData($acad_dep,$acad_yr,$semester){


                $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_dep='$acad_dep' AND `acad_year`= '$acad_yr' AND `acad_sem`='$semester'";
                $stmt_run = $this->connect()->query($stmt);
        
                $stmt_run->execute();
        
                if($stmt_run->rowCount() >= 1){
                    ?>
                        <script>
                            window.alert("Already Added This Data");
                            window.location.href = "acad-yr.php";
                        </script>
                    <?php
                } 
                else {
        
                       $check_sys_def = "SELECT * FROM tbl_acad_yr WHERE acad_dep='$acad_dep' AND acad_SysDef='YES' ";
                       $check_sys_def_run = $this->connect()->query($check_sys_def);
                       if($check_sys_def_run->rowCount()>=1){
                            $addAcadYr = "INSERT INTO tbl_acad_yr ( `acad_dep`, `acad_year`, `acad_sem`, `acad_SysDef`, `acad_status`)
                            VALUES('$acad_dep','$acad_yr','$semester','NO','Not Active')";
                            $addAcadYr_run = $this->connect()->query($addAcadYr);

                            if($addAcadYr_run){
                                ?>
                                    <script>
                                        window.alert("Successfully Added");
                                        window.location.href = "acad-yr.php";
                                    </script>
                                <?php
                            } else {
                                ?>
                                    <script>
                                        window.alert("There's Something Wrong To Added");
                                        window.location.href = "acad-yr.php";
                                    </script>
                                <?php
                            }

                       } else {
                        $addAcadYr = "INSERT INTO tbl_acad_yr ( `acad_dep`, `acad_year`, `acad_sem`, `acad_SysDef`, `acad_status`)
                            VALUES('$acad_dep','$acad_yr','$semester','YES','Not Active')";
                            $addAcadYr_run = $this->connect()->query($addAcadYr);

                            if($addAcadYr_run){
                                ?>
                                    <script>
                                        window.alert("Successfully Added");
                                        window.location.href = "acad-yr.php";
                                    </script>
                                <?php
                            } else {
                                ?>
                                    <script>
                                        window.alert("There's Something Wrong To Added");
                                        window.location.href = "acad-yr.php";
                                    </script>
                                <?php
                            }
                       }
        
         
                }
            }
        }

class deleteAcad extends DataBase{
    private $delete_acad;
    
    public function deleteData($delete_acad){
        $stmt= $this->connect()->query("DELETE FROM tbl_acad_yr WHERE acad_id='$delete_acad' ");
        $stmt->execute();

        if($stmt){
            ?>
                <script>
                    window.alert("Successfully Deleted Data");
                    window.location.href = "acad-yr.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("Failed To Delete Data");
                    window.location.href = "acad-yr.php";
                </script>
            <?php
        }
    }
}

class addYrSec extends DataBase{
    private $course;
    private $year;
    private $section;

    public function addData($course,$year,$section){
        $stmt = "SELECT * FROM tbl_yr_sec WHERE yr_sec_course='$course' AND yr_sec_year='$year' AND yr_sec_section='$section' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already Added This Data");
                    window.location.href="year_section.php";
                </script>
            <?php
        } else {
            $add_data = "INSERT INTO `tbl_yr_sec`(`yr_sec_course`, `yr_sec_year`, `yr_sec_section`, `yr_sec_YrSec`) 
            VALUES ('$course','$year','$section','$year-$section')";
            $add_data_run = $this->connect()->query($add_data);

            if($add_data){
                ?>
                    <script>
                        window.alert("Successfully Added");
                        window.location.href="year_section.php";
                    </script>
                <?php
            } else{
                ?>
                    <script>
                        window.alert("There's Something Wrong To Add Data");
                        window.location.href="year_section.php";
                    </script>
                <?php
            }
        }
    }
}

class fetchYr extends DataBase{
    public function fetchData(){
        $stmt = "SELECT DISTINCT yr_sec_year FROM tbl_yr_sec WHERE yr_sec_course='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class fetchYrSec extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_yr_sec WHERE yr_sec_course='".$_SESSION['user_type']."' ORDER BY yr_sec_YrSec ASC ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class fetchYrSec1 extends DataBase{
    public function fetchData(){
        $stmt = "SELECT DISTINCT yr_sec_section FROM tbl_yr_sec WHERE yr_sec_course='".$_SESSION['user_type']."' ORDER BY yr_sec_section ASC ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class deleteYrSec extends DataBase{
    private $delete_id;

    public function deleteData($delete_id){
        $stmt = "DELETE FROM tbl_yr_sec WHERE yr_sec_id ='$delete_id' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Deleted Data");
                    window.location.href="year_section.php";
                </script>
            <?php
        } else {                
            ?>
                <script>
                    window.alert("There's Something Wrong To Delete Data");
                    window.location.href="year_section.php";
                </script>
            <?php
        }
    }
}

class addCriteria extends DataBase {
    private $criteria;

    public function addData($criteria){
        $stmt = "SELECT * FROM tbl_criteria WHERE crit_criteria='$criteria' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already Added Data");
                    window.location.href="eval-criteria.php";
                </script>
            <?php
        } else {
            $addData = "INSERT INTO `tbl_criteria`( `crit_criteria`) VALUES ('$criteria')";
            $addData_run = $this->connect()->query($addData);

            if($addData_run){
                ?>
                    <script>
                        window.alert("Successfully Added Data");
                        window.location.href="eval-criteria.php";
                    </script>
                <?php
            } else{
                ?>
                    <script>
                        window.alert("There's Something Wrong to Add Data");
                        window.location.href="eval-criteria.php";
                    </script>
                <?php
            }
        }
    }
}

class fetchCriteria extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_criteria";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class editCriteria extends DataBase {
    private $crit_id;
    private $manage_criteria;
    public function editData($crit_id,$manage_criteria){
        $stmt = "SELECT * FROM tbl_criteria WHERE crit_criteria ='$manage_criteria' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();
        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already List in Data");
                    window.location.href="eval-criteria.php";
                </script>
            <?php
        } else {
            $editCrit = "UPDATE `tbl_criteria` SET `crit_criteria`='$manage_criteria' WHERE crit_id='$crit_id' ";
            $editCrit_run = $this->connect()->query($editCrit);

            if($editCrit_run){
                ?>
                    <script>
                        window.alert("Successfully Update The Data");
                        window.location.href="eval-criteria.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        window.alert("There's Something Wrong To Update The Data");
                        window.location.href="eval-criteria.php";
                    </script>
                <?php
            }
        }
    }
}

class deleteCrit extends DataBase {
    private $delete_id;
    public function deleteData($delete_id){
        $stmt = "DELETE FROM tbl_criteria WHERE crit_id='$delete_id'";
        $stmt_run = $this->connect()->query($stmt);
        
        if($stmt){
            ?>
                <script>
                    window.alert("Successfully Delete Data");
                    window.location.href="eval-criteria.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("There's Something Wrong To Delete The Data");
                    window.location.href="eval-criteria.php";
                </script>
            <?php
        }
    }
}

class addQuest extends DataBase{
    private $criteria;
    private $question;

    public function addData($criteria,$question){
        $stmt = "SELECT * FROM tbl_question WHERE quest_crit='$criteria' AND quest_question='$question' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already Added Data");
                    window.location.href="eval-question.php";
                </script>
            <?php
        } else {
            $addQuest = "INSERT INTO `tbl_question`(`quest_crit`, `quest_question`) 
                        VALUES ('$criteria','$question')";
            $addQuest_run = $this->connect()->query($addQuest);
            if($addQuest_run ){
                ?>
                    <script>
                        window.alert("Successfully Added Data");
                        window.location.href="eval-question.php";
                    </script>
                <?php
          
            }
        }
    }
}

class fetchQuest extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_question";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();
        if($stmt_run->rowCount()){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class editQuest extends DataBase{
    private $quest_id;
    private $quest_crit;
    private $quest;

    public function editData($quest_id,$quest_crit,$quest){
        $stmt = "SELECT * FROM tbl_question WHERE quest_crit='$quest_crit' AND quest_question='$quest'";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            ?>
                <script>
                    window.alert("Already List in Data");
                    window.location.href="eval-question.php";
                </script>
            <?php
        } else {
            $editQuest = "UPDATE `tbl_question` SET `quest_crit`='$quest_crit',`quest_question`='$quest' WHERE `quest_id`='$quest_id' ";
            $editQuest_run = $this->connect()->query($editQuest);

            if($editQuest_run){
                ?>
                    <script>
                        window.alert("Successfully Update The Data");
                        window.location.href="eval-question.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        window.alert("There's Something Wrong To Update The Data");
                        window.location.href="eval-question.php";
                    </script>
                <?php
            }
        }
    }
}

class deleteQuest extends DataBase{
    private $delete_quest;
    public function deleteData($delete_quest){
        $stmt = "DELETE FROM tbl_question WHERE quest_id = '$delete_quest' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Delete The Data");
                    window.location.href="eval-question.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("There's Something Wrong To Delete The Data");
                    window.location.href="eval-question.php";
                </script>
            <?php
        }
    }
}


class sysDef extends DataBase{
    private $SysDef_id;

    public function editData($SysDef_id){
        $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_id='$SysDef_id' AND acad_dep='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            $row = $stmt_run->fetch();
            if($row['acad_SysDef'] =='NO' ){
                $update_status = $this->connect()->query("UPDATE tbl_acad_yr SET acad_SysDef='NO' WHERE acad_dep='".$_SESSION['user_type']."' AND acad_SysDef='YES' ");
                if($update_status){
                    $this->connect()->query("UPDATE tbl_acad_yr SET acad_SysDef='YES' WHERE acad_id='$SysDef_id' ");    
                    ?>
                        <script>
                            window.alert("Successfully Update");
                            window.location.href="eval-status.php";
                        </script>
                    <?php
                } else{
                    ?>
                        <script>
                            window.alert("There's Something Wrong To Update");
                            window.location.href="eval-status.php";
                        </script>
                    <?php
                }
            } else{
                ?>
                <script>
                    window.alert("There's Something Wrong To Update");
                    window.location.href="eval-status.php";
                </script>
            <?php
            }    
        }
        else {
            ?>
            <script>
                window.alert("There's Something Wrong To Update");
                window.location.href="eval-status.php";
            </script>
        <?php
        }
    }
}

class changeStatus extends DataBase{
    private $status_id;
    private $status;

    public function editData($status_id,$status){
        $stmt = "SELECT * FROM tbl_acad_yr WHERE acad_id='$status_id' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            $row = $stmt_run->fetch();

            if($row['acad_SysDef']=='YES'){
                $this->connect()->query("UPDATE tbl_acad_yr SET acad_status='$status' WHERE acad_id='$status_id' ");
                    $_SESSION['acad_status'] = $status;    
                ?>
                    <script>
                        window.alert("Successfully Update");
                        window.location.href="eval-status.php";
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        window.alert("Please Set As System Default");
                        window.location.href="eval-status.php";
                    </script>
                <?php
            }
        }
    }
}


class send_email extends DataBase{
    public function email(){
        $acad_sem = "SELECT * FROM tbl_acad_yr WHERE acad_dep='".$_SESSION['user_type']."' AND acad_SysDef='YES' ";
        $acad_sem_run = $this->connect()->query($acad_sem);
        $acad_sem_run->execute();

        if($acad_sem_run->rowCount()){
            return $acad_sem_run;
        }else {
            return false;
        }
    }
}
class user_sending extends DataBase{
    public function user(){
        $stmt = "SELECT * FROM tbl_users WHERE user_course='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        }else {
            return false;
        }
    }
}

class addFaculty extends DataBase{
    private $department;
    private $course;
    private $image;
    private $faculty_id;
    private $faculty_name;
    private $faculty_email;
    private $position;

    public function addData($department,$course,$image,$faculty_id,$faculty_name,$faculty_email,$position){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            ?>
            <script>
                window.alert("Please select format JPG,PNG,JPEG");
                window.location.href = "faculty-list.php";
            </script>
            <?php
        }else {
            $checkidNum  = "SELECT * FROM tbl_users WHERE user_id_num='$faculty_id' AND user_department='$department' AND user_course='$course' ";
            $checkidNum_run = $this->connect()->query($checkidNum);
            $checkidNum_run->execute();
            if($checkidNum_run->rowCount()==1){
                ?>
                <script>
                    window.alert("Faculty ID Number Is Already On List");
                    window.location.href = "faculty-list.php";
                </script>
                <?php   
            } else {
                $checkEmail = "SELECT * FROM tbl_users WHERE user_department='$department' AND user_course='$course' AND user_email='$faculty_email' ";
                $checkEmail_run = $this->connect()->query($checkEmail);
                $checkEmail_run->execute();
                if($checkEmail_run->rowCount()===1){
                    ?>
                    <script>
                        window.alert("Email Already On List");
                        window.location.href = "faculty-list.php";
                    </script>
                    <?php   
                } else {
                    $addFaculty = "INSERT INTO `tbl_users`(`user_id_num`, `user_department`, `user_course`, `user_name`, `user_email`, `user_type`, `user_position`, `user_img`) 
                    VALUES ('$faculty_id','$department','$course','$faculty_name','$faculty_email','faculty','$position','$image')";
                    $addFaculty_run = $this->connect()->query($addFaculty);

                    if($addFaculty_run){    
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);             
                        ?>
                        <script>
                            window.alert("SuccessFully Added");
                            window.location.href = "faculty-list.php";
                        </script>
                        <?php  
                    } else {
                        ?>
                            <script>
                                window.alert("There's Something Wrong to Added");
                                window.location.href = "faculty-list.php";
                            </script>
                        <?php  
                    }
                }
            }
        }
    }
}

class fetchFaculty extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_users WHERE user_department='".$_SESSION['user_dep']."' AND user_course='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()>0){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class editFaculty extends DataBase{
   private $editFacultyID;
   private $image;
   private $edit_faculty_id;
   private $edit_faculty_name;
   private $edit_faculty_email;
   private $edit_faculty_position;

   public function editData ($editFacultyID,$image,$edit_faculty_id,$edit_faculty_name,$edit_faculty_email,$edit_faculty_position){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            ?>
            <script>
                window.alert("Please select format JPG,PNG,JPEG");
                window.location.href = "faculty-list.php";
            </script>
            <?php
        } else {

            $stmt = "UPDATE `tbl_users` SET `user_id_num`='$edit_faculty_id', `user_name`='$edit_faculty_name', `user_email`='$edit_faculty_email',
            `user_position`='$edit_faculty_position', `user_img`='$image' WHERE `user_id`='$editFacultyID'";
            $stmt_run = $this->connect()->query($stmt);

            if($stmt){
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                ?>
                <script>
                    window.alert("Successfully Update Data");
                    window.location.href = "faculty-list.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    window.alert("There's Something Wrong to Update Data");
                    window.location.href = "faculty-list.php";
                </script>
                <?php
            }
        }

   }
}
class deleteFaculty extends DataBase{
    private $deleteFacultyID;

    public function deleteData($deleteFacultyID){
        $stmt = "INSERT INTO `tbl_deleted_users` (user_id_num, user_department, user_course, user_name, user_email,
        user_position, user_img) SELECT user_id_num, user_department, user_course, user_name, user_email,
        user_position, user_img FROM tbl_users WHERE user_id='$deleteFacultyID' ";
        $stmt_run = $this->connect()->query($stmt);  

        if($stmt_run){
           $this->connect()->query("DELETE FROM tbl_users WHERE user_id='$deleteFacultyID' ");
            ?>
                <script>
                    window.alert("Successfully Delete Data");
                    window.location.href = "faculty-list.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("There's Something Wrong to Delete Data");
                    window.location.href = "faculty-list.php";
                </script>
            <?php
        }
    }
}

class fetchDeleteFaculty extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_deleted_users WHERE user_department='".$_SESSION['user_dep']."' AND user_course='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()>0){
            return $stmt_run;
        } else {
            return false;
        }
    }
}

class restoreFaculty extends DataBase{
    private $restoreFacultyID;

    public function restoreData($restoreFacultyID){
        $stmt = "INSERT INTO `tbl_users` (user_id_num, user_department, user_course, user_name, user_email,
        user_position, user_img) SELECT user_id_num, user_department, user_course, user_name, user_email,
        user_position, user_img FROM tbl_deleted_users WHERE user_id='$restoreFacultyID' ";
        $stmt_run = $this->connect()->query($stmt);  

        if($stmt_run){
            $this->connect()->query("DELETE FROM tbl_deleted_users WHERE user_id='$restoreFacultyID' ");
            $data = [
                'status' => 200,
                'message' => "Successfully Restore Data"
            ];
            echo json_encode($data);
            
         } else {
            $data = [
                'status' => 404,
                'message' =>"There's Something Wrong to Restore Data"
            ];
            echo json_encode($data);
        
         }
    }
}
class deleteFacultyPerma extends DataBase{
    private $deleteFacultyID;

    public function deleteData($deleteFacultyID){
        $stmt = "DELETE FROM tbl_deleted_users WHERE user_id='$deleteFacultyID' ";
        $stmt_run = $this->connect()->query($stmt);
        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Delete Data");
                    window.location.href = "deletedFaculty-list.php";
                </script>
            <?php
        } else{
            ?>
                <script>
                    window.alert("There's Something Wrong to Delete Data");
                    window.location.href = "deletedFaculty-list.php";
                </script>
            <?php
        }
    }
}


class addStudent extends DataBase{
    private $AcadYear;
    private $course;
    private $student;
    private $year;
    private $section;

    public function addData($AcadYear,$course,$student,$year,$section){
        
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
        // Validate whether selected file is a CSV file
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
            
            // If the file is uploaded
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                
                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                
                // Skip the first line
                fgetcsv($csvFile);
                
                // Parse data from CSV file line by line
                while(($row = fgetcsv($csvFile)) !== FALSE){
                    // Get row data
                    $id_num = $row[0];
                    $name = $row[1];
                    $email = $row[2];
                    
                    $checkStudent = "SELECT * FROM tbl_users WHERE  user_id_num='$id_num' AND user_acad_year='$AcadYear' AND user_course='$course' AND user_name='$name' AND user_email='$email' AND user_yr='$year' AND user_section='$section' AND user_YrSec='$year-$section' AND user_type='Student' ";
                    $checkStudent_run = $this->connect()->query($checkStudent);
                    $checkStudent_run->execute();
            
                    if($checkStudent_run->rowCount()>=1){
                       ?>
                            <script>
                                window.alert("Some Student is Already Added");
                                window.location.href = "student-list-add.php";
                            </script>
                       <?php
                    }
            
                    else{
            
                        $addStudent = "INSERT INTO tbl_users (user_id_num,user_acad_year,user_course,user_name,user_email,user_yr,user_section,user_YrSec,user_type,user_img)
                        VALUES ('$id_num','$AcadYear','$course','$name','$email','$year','$section','$year-$section','Student','student-img.png' )";
                        $addStudent_run = $this->connect()->query($addStudent);
            
                        if(!empty($addStudent_run)){
                            ?>
                                <script>
                                    window.alert("Successfully Added");
                                    window.location.href = "student-list-add.php";
                                </script>
                        <?php
                        }
                    }
                }
                
                // Close opened CSV file
                fclose($csvFile);
                
            }
            else{
                ?>
                    <script>
                        window.alert("There's Something Wrong To Added");
                        window.location.href = "student-list-add.php";
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    window.alert("Please Use CSV File Only");
                    window.location.href = "student-list-add.php";
                </script>
            <?php
        }


    }
}

class fetchStudent0 extends DataBase{

    public function fetchData(){



            $stmt = "SELECT * FROM tbl_users WHERE  user_course='".$_SESSION['user_type']."' AND user_type='Student' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
                return $stmt_run;
            }
       }
}

class fetchStudent extends DataBase{
    private $section;
    public function fetchData($section){


        if($section == 'all'){
            $stmt = "SELECT * FROM tbl_users WHERE user_acad_year='".$_SESSION['StudacadYear']."' AND user_course='".$_SESSION['user_type']."' AND user_type='Student' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
                return $stmt_run;
            } else {
                return false;
            }
                   
        }
        else 
        {
            $stmt = "SELECT * FROM tbl_users WHERE user_acad_year='".$_SESSION['StudacadYear']."' AND user_course='".$_SESSION['user_type']."' AND user_type='Student' AND user_YrSec='$section' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();
            
            if($stmt_run->rowCount()){
                return $stmt_run;
            } else {
                return false;
            }
                   
            }  
    }
}

class fetchStudentModal extends DataBase{
    private $value;
    public function fetchData($value){



            $stmt = "SELECT * FROM tbl_users WHERE  user_id='$value' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
                return $stmt_run;
            }
       }
}
class editStudent extends DataBase{
   private $edit_user_id;
   private $edit_user_id_num;
   private $edit_user_name;
   private $edit_user_email;

   public function editData($edit_user_id,$edit_user_id_num,$edit_user_name,$edit_user_email){
    $check = "SELECT * FROM tbl_users WHERE user_id='$edit_user_id' AND user_acad_year='".$_SESSION['StudacadYear']."' AND user_id_num='$edit_user_id_num' AND user_name='$edit_user_name' AND user_email='$edit_user_email' ";
    $check_run = $this->connect()->query($check);
    $check_run->execute();
    if($check_run->rowCount()>=1){
        ?>
            <script>
                window.alert("Already Added This Data");
                window.location.href = "student-list-add.php";
            </script>
        <?php
    } else {
        $updateStudent = "UPDATE `tbl_users` SET `user_id_num`='$edit_user_id_num' , `user_name`='$edit_user_name' , `user_email`='$edit_user_email' WHERE `user_id`='$edit_user_id' ";
        $updateStudent_run = $this->connect()->query($updateStudent);

        if($updateStudent_run){
            ?>
            <script>
                window.alert("Successfully Update Data");
                window.location.href = "student-list-add.php";
            </script>
        <?php
        } else {
            ?>
                <script>
                    window.alert("There's Something Wrong To Update Data");
                    window.location.href = "student-list-add.php";
                </script>
            <?php
        }
    }
   }
}
class fetchDeletedStudentModal extends DataBase{
    private $value;
    public function fetchData($value){



            $stmt = "SELECT * FROM tbl_deleted_users WHERE  user_id='$value' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
                return $stmt_run;
            }
       }
}
class deleteStudent extends DataBase{
    private $delete_user_id;

    public function deleteData($delete_user_id){
        $stmt = "INSERT INTO tbl_deleted_users (user_id_num,user_acad_year,user_course,user_name,user_email,user_yr,user_section,user_YrSec,user_type,user_img)
                 SELECT user_id_num,user_acad_year,user_course,user_name,user_email,user_yr,user_section,user_YrSec,user_type,user_img FROM tbl_users WHERE user_id ='$delete_user_id' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            $this->connect()->query("DELETE FROM tbl_users WHERE user_id='$delete_user_id' ");
            ?>
                <script>
                    window.alert("Successfully Delete Data");
                    window.location.href = "student-list-add.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("There's Something Wrong to  Delete Data");
                    window.location.href = "student-list-add.php";
                </script>
            <?php           
        }
    }
}
class fetchDeletedStudent0 extends DataBase{

    public function fetchData(){



            $stmt = "SELECT * FROM tbl_deleted_users WHERE user_course='".$_SESSION['user_type']."' AND user_type='Student' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
               return $stmt_run;
            }
       }
}
class fetchDeletedStudent extends DataBase{

    public function fetchData(){



            $stmt = "SELECT * FROM tbl_deleted_users WHERE user_acad_year='".$_SESSION['DeletedStudacadYear']."' AND user_course='".$_SESSION['user_type']."' AND user_type='Student' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();

            if($stmt_run->rowCount()){
               return $stmt_run;
            }
       }
}
class fetchDeletedStudent1 extends DataBase{
    private $deletedsection;
    public function fetchData($deletedsection){

        if($deletedsection == 'all'){
            $stmt = "SELECT * FROM tbl_deleted_users WHERE user_acad_year='".$_SESSION['StudacadYear']."' AND user_course='".$_SESSION['user_type']."' AND user_type='Student' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();
            if($stmt_run){
                return $stmt_run;
            }else {
                return false;
            }

        } else {
            $stmt = "SELECT * FROM tbl_deleted_users WHERE user_acad_year='".$_SESSION['StudacadYear']."' AND user_course='".$_SESSION['user_type']."' AND user_type='Student' AND user_YrSec='$deletedsection' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();
            if($stmt_run){
                return $stmt_run;
            }else {
                return false;
            }
        }
  
    }
}

class restoreStudent extends DataBase{
    private $restoreStudentID;

    public function restoreData($restoreStudentID){
        $stmt = "INSERT INTO tbl_users (user_id_num,user_acad_year,user_course,user_name,user_email,user_yr,user_section,user_YrSec,user_type,user_img)
                 SELECT user_id_num,user_acad_year,user_course,user_name,user_email,user_yr,user_section,user_YrSec,user_type,user_img FROM tbl_deleted_users WHERE user_id ='$restoreStudentID' ";
        $stmt_run = $this->connect()->query($stmt);  

        if($stmt_run){
            $this->connect()->query("DELETE FROM tbl_deleted_users WHERE user_id='$restoreStudentID' ");
            $data = [
                'status' => 200,
                'message' => "Successfully Restore Data"
            ];
            echo json_encode($data);
            
         } else {
            $data = [
                'status' => 404,
                'message' =>"There's Something Wrong to Restore Data"
            ];
            echo json_encode($data);
        
         }
    }
}

class deleteStudentPerma extends DataBase{
    private $delete_user_id;

    public function deleteData($delete_user_id){
        $stmt = "DELETE FROM tbl_deleted_users WHERE user_id='$delete_user_id' ";
        $stmt_run = $this->connect()->query($stmt);
        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Delete Data");
                    window.location.href = "deleted-student-list-restore.php";
                </script>
            <?php
        } else{
            ?>
                <script>
                    window.alert("There's Something Wrong to Delete Data");
                    window.location.href = "deleted-student-list-restore.php";
                </script>
            <?php
        }
    }
}
class fetchCountFaculty extends DataBase{
    public function fetchData(){
        $stmt = "SELECT * FROM tbl_users WHERE user_department='".$_SESSION['user_dep']."' AND user_course='".$_SESSION['user_type']."' AND user_position='Program Chair' OR user_position='School Director' OR user_position='Dean of Instruction' OR user_position='Campus Administrator'  ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()>0){
            return $stmt_run;
        } else {
            return false;
        }
    }
}
class addSubject extends DataBase{
    private $sub_year,$sub_course,$sub,$sub_faculty_id,$sub_section,$sub_semes;

    public function addData($sub_year,$sub_course,$sub,$sub_faculty_id,$sub_section,$sub_semes){
        $check_stmt = "SELECT * FROM tbl_subj WHERE `subj_year`='$sub_year' AND `subj_section`='$sub_section' AND `subj_course`='$sub_course' AND `subj_subject`='$sub' AND `subj_semes`='$sub_semes' ";
        $check_stmt_run = $this->connect()->query($check_stmt);
        $check_stmt_run->execute();
        if($check_stmt_run->rowCount()>=1){
            ?>
                <script>
                    window.alert("Already Added This Data");
                    window.location.href = "course-subject-add.php";
                </script>
            <?php
        } else {
            $faculty = "SELECT * FROM tbl_users WHERE user_id='$sub_faculty_id' ";
            $faculty_run = $this->connect()->query($faculty);
            if($faculty_run->rowCount()){
                $fetch_faculty = $faculty_run->fetch();
                
                $add_stmt = "INSERT INTO `tbl_subj`(`subj_year`, `subj_section`, `subj_course`, `subj_subject`, `subj_id_num`, `subj_faculty_name`, `subj_semes`,`subj_img`) 
                VALUES ('$sub_year','$sub_section','$sub_course','$sub','".$fetch_faculty['user_id_num']."','".$fetch_faculty['user_name']."','$sub_semes','".$fetch_faculty['user_img']."')";
                $add_stmt_run = $this->connect()->query($add_stmt);
    
                if($add_stmt_run){
                    ?>
                        <script>
                            window.alert("Succesfully Added This Data");
                            window.location.href = "course-subject-add.php";
                        </script>
                    <?php
                }else {
                    ?>
                        <script>
                            window.alert("There's Somethind Wrong to Added This Data");
                            window.location.href = "course-subject-add.php";
                        </script>
                    <?php
                }
            }
        }
    }
}
class checkSubj extends DataBase{
    private $value;
    public function fetchData($value){
        $stmt = "SELECT * FROM tbl_subj WHERE subj_id='$value' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()){
            return $stmt_run;
        } 
    }
}
class fetchSubject extends DataBase{
    private $value;
    public function fetchData($value){
        if($value == 'all'){
            $stmt = "SELECT * FROM tbl_subj WHERE subj_year='".$_SESSION['year']."' AND subj_course='".$_SESSION['user_type']."' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();
            if($stmt_run->rowCount()){
                return $stmt_run;
            } 
        } else {
            $stmt = "SELECT * FROM tbl_subj WHERE subj_year='".$_SESSION['year']."' AND subj_course='".$_SESSION['user_type']."' AND subj_semes='$value' ";
            $stmt_run = $this->connect()->query($stmt);
            $stmt_run->execute();
            if($stmt_run->rowCount()){
                return $stmt_run;
            } 
        }
    }
}

class deleteSubject extends DataBase {
    private $deleteID_Subj;
    public function deleteData($deleteID_Subj) {
        $stmt = "DELETE FROM tbl_subj WHERE subj_id='$deleteID_Subj' ";
        $stmt_run = $this->connect()->query($stmt);
        if($stmt_run){
            ?>
                <script>
                    window.alert("Successfully Deleted This Data");
                    window.location.href = "course-subject-add.php";
                </script>
            <?php
        }else {
            ?>
                <script>
                    window.alert("There's Something Wrong to Delete This Data");
                    window.location.href = "course-subject-add.php";
                </script>
            <?php
        }
    }
}

class eval_result extends DataBase{
    private $acad_year,$acad_sem;
    public function fetchData($acad_year,$acad_sem){
        $stmt = "SELECT DISTINCT id_num,name FROM tbl_result_eval WHERE acad_year='$acad_year'
        AND semester='$acad_sem' AND course='".$_SESSION['user_type']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        }
    }
}
class eval_count extends DataBase{
    private $name;
    public function countData($name){
        $stmt = "SELECT DISTINCT faculty_id, stud_id FROM tbl_result_eval WHERE name='$name' ORDER BY faculty_id AND stud_id";
        $stmt_run = $this->connect()->query($stmt);

        $evalute_count = $stmt_run->rowCount();
        echo "<td>".$evalute_count."</td>";
    }
}
class forward_report1 {
    private $acad_year,$acad_sem;
    public function redirect($acad_year,$acad_sem){
        header("Location: report1.php?acad_year=".$acad_year." &acad_sem=".$acad_sem." ");
    }
}
class check_forward_report1{
    public function redirect(){
        if(!empty($_GET['acad_year']) && !empty($_GET['acad_sem'])){
            // header("Location: report1.php?acad_year=".$acad_year." &acad_sem=".$acad_sem." ");
        }else{
            echo"<script>window.location.href='report.php'</script>";
        }
    }
}

class forward_show_report {
    private $acad_year,$acad_sem,$faculty_id,$name;
    public function redirect($acad_year,$acad_sem,$faculty_id,$name){
        header("Location: show_report.php?acad_year=".$acad_year." &acad_sem=".$acad_sem." &faculty_id=".$faculty_id." &name=".$name." ");
    }
}
class check_show_report{
    public function redirect(){
        if(!empty($_GET['acad_year']) && !empty($_GET['acad_sem']) && !empty($_GET['faculty_id']) && !empty($_GET['name'])){
            // header("Location: report1.php?acad_year=".$acad_year." &acad_sem=".$acad_sem." ");
        }else{
            echo"<script>window.location.href='report.php'</script>";
        }
    }
}

class fetch_result extends DataBase{
    private $faculty_id,$faculty_name;
    public function fetchData($faculty_id,$faculty_name){
        $stmt = "SELECT *  FROM tbl_users WHERE  user_course='".$_SESSION['user_type']."' AND user_id_num='$faculty_id' AND user_name='$faculty_name' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            return $stmt_run;
        }
    }
}

class student_result extends DataBase{
    public function fethData($acad_year,$acad_sem){
        $stmt = "SELECT DISTINCT stud_id FROM tbl_result_eval WHERE eval_type='Student Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."' AND id_num =".$_GET['faculty_id']." LIMIT 10";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            return $stmt_run;
        }

    }
}

class student_criteria_result extends DataBase{
    public function score($acad_year,$acad_sem,$stud_id,$criteria){

        $student_score_criteria = $this->connect()->query("SELECT DISTINCT per_criteria FROM tbl_result_eval WHERE eval_type='Student Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND stud_id='$stud_id' LIMIT 10");

        foreach($student_score_criteria as $fetch_criteria){
            if($fetch_criteria['per_criteria'] <= $criteria){

                $student_criteria_sum = $this->connect()->query("SELECT SUM(score_per_criteria) AS 'score_mean' FROM tbl_result_eval WHERE eval_type='Student Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                AND stud_id='$stud_id' AND per_criteria='".$fetch_criteria['per_criteria']."' LIMIT 10");
                $data = $student_criteria_sum->fetch();
                if($student_criteria_sum){
                    $mean = number_format($data['score_mean'] / 5,2);
                    echo"<td>".$mean."</td>";

                    $this->connect()->query("UPDATE `tbl_result_eval` SET `mean_per_criteria`='$mean' WHERE eval_type='Student Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                    AND stud_id='$stud_id' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                }

            }
        }

    }
}

class total_student_mean extends DataBase{
    public function total($acad_year,$acad_sem,$stud_id,$criteria){
        $stmt = $this->connect()->query("SELECT DISTINCT overall_mean  FROM tbl_result_eval WHERE eval_type='Student Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND stud_id='$stud_id' ");

        if($stmt->rowCount()){
            while($total_mean = $stmt->fetch()){
                echo "<td>".$total_mean['overall_mean']."</td>";
            }
        }
    }
}

// Peer Result

class peer_result extends DataBase{
    public function fethData($acad_year,$acad_sem){
        $stmt = "SELECT DISTINCT faculty_id FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND acad_year='$acad_year' AND semester = '$acad_sem'
        AND course = '".$_SESSION['user_type']."' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ORDER BY faculty_id ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            return $stmt_run;
        }

    }
}

class peer_criteria_result extends DataBase{
    public function score($acad_year,$acad_sem,$faculty_id,$criteria){

        $peer_score_criteria = $this->connect()->query("SELECT DISTINCT per_criteria FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ");

        foreach($peer_score_criteria as $fetch_criteria){
            if($fetch_criteria['per_criteria'] <= $criteria){

                $peer_criteria_sum = $this->connect()->query("SELECT SUM(score_per_criteria) AS 'score_mean' FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                $data = $peer_criteria_sum->fetch();
                if($peer_criteria_sum){
                    $mean = number_format($data['score_mean'] / 5,2);
                    echo"<td>".$mean."</td>";

                    $this->connect()->query("UPDATE `tbl_result_eval` SET `mean_per_criteria`='$mean' WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                    AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                }

            }
        }

    }
}

class total_peer_mean extends DataBase{
    public function total($acad_year,$acad_sem,$faculty_id,$criteria){
        $stmt = $this->connect()->query("SELECT DISTINCT overall_mean  FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ");

        if($stmt->rowCount()){
            while($total_mean = $stmt->fetch()){
                echo "<td>".$total_mean['overall_mean']."</td>";
            }
        }
    }
}


// Self Evaluation
class self_result extends DataBase{
    public function fethData($acad_year,$acad_sem){
        $stmt = "SELECT DISTINCT faculty_id FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND acad_year='$acad_year' AND semester = '$acad_sem'
        AND course = '".$_SESSION['user_type']."' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ORDER BY faculty_id ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            return $stmt_run;
        }

    }
}

class self_criteria_result extends DataBase{
    public function score($acad_year,$acad_sem,$faculty_id,$criteria){

        $self_score_criteria = $this->connect()->query("SELECT DISTINCT per_criteria FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ");

        foreach($self_score_criteria as $fetch_criteria){
            if($fetch_criteria['per_criteria'] <= $criteria){

                $self_criteria_sum = $this->connect()->query("SELECT SUM(score_per_criteria) AS 'score_mean' FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                $data = $self_criteria_sum->fetch();
                if($self_criteria_sum){
                    $mean = number_format($data['score_mean'] / 5,2);
                    echo"<td>".$mean."</td>";

                    $this->connect()->query("UPDATE `tbl_result_eval` SET `mean_per_criteria`='$mean' WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                    AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                }

            }
        }

    }
}

class total_self_mean extends DataBase{
    public function total($acad_year,$acad_sem,$faculty_id,$criteria){
        $stmt = $this->connect()->query("SELECT DISTINCT overall_mean  FROM tbl_result_eval WHERE eval_type='Peer Evaluation' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND faculty_id='$faculty_id' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ");

        if($stmt->rowCount()){
            while($total_mean = $stmt->fetch()){
                echo "<td>".$total_mean['overall_mean']."</td>";
            }
        }
    }
}

// Head Evaluation
class head_result extends DataBase{
    public function fethData($acad_year,$acad_sem){
        $stmt = "SELECT DISTINCT name FROM tbl_result_eval WHERE eval_type='Supervisor' AND acad_year='$acad_year' AND semester = '$acad_sem'
        AND course = '".$_SESSION['user_type']."' AND id_num=".$_GET['faculty_id']." AND name='".$_GET['name']."' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            return $stmt_run;
        }

    }
}


class head_criteria_result extends DataBase{
    public function score($acad_year,$acad_sem,$head_faculty_name,$criteria){

        $self_score_criteria = $this->connect()->query("SELECT DISTINCT per_criteria FROM tbl_result_eval WHERE eval_type='Supervisor' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
         AND id_num=".$_GET['faculty_id']." AND name='$head_faculty_name' ");

        foreach($self_score_criteria as $fetch_criteria){
            if($fetch_criteria['per_criteria'] <= $criteria){

                $self_criteria_sum = $this->connect()->query("SELECT SUM(score_per_criteria) AS 'score_mean' FROM tbl_result_eval WHERE eval_type='Supervisor' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                 AND id_num=".$_GET['faculty_id']." AND name='$head_faculty_name' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                $data = $self_criteria_sum->fetch();
                if($self_criteria_sum){
                    $mean = number_format($data['score_mean'] / 5,2);
                    echo"<td>".$mean."</td>";

                    $this->connect()->query("UPDATE `tbl_result_eval` SET `mean_per_criteria`='$mean' WHERE eval_type='Supervisor' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
                     AND id_num=".$_GET['faculty_id']." AND name='$head_faculty_name' AND per_criteria='".$fetch_criteria['per_criteria']."' ");
                }

            }
        }

    }
}

class head_self_mean extends DataBase{
    public function total($acad_year,$acad_sem,$head_faculty_name,$criteria){
        $stmt = $this->connect()->query("SELECT DISTINCT overall_mean  FROM tbl_result_eval WHERE eval_type='Supervisor' AND  acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."'
        AND id_num=".$_GET['faculty_id']." AND name='$head_faculty_name' ");

        if($stmt->rowCount()){
            while($total_mean = $stmt->fetch()){
                echo "<td>".$total_mean['overall_mean']."</td>";
            }
        }
    }
}

// comment

class comment extends DataBase{
    public function fetch($acad_year,$acad_sem){
        $stmt = " SELECT DISTINCT faculty_id,stud_id,comments FROM tbl_result_eval WHERE acad_year='$acad_year' AND semester='$acad_sem' AND course='".$_SESSION['user_type']."' AND id_num =".$_GET['faculty_id']." LIMIT 10";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run){
            return $stmt_run;
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
