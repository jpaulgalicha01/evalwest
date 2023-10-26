<?php
ob_start();
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

if(isset($_POST['back'])){
	ob_end_flush(header("location: course-subject.php"));
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">


<!--Modal-->
<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form action="inputConfig.php" method="POST">
	<div class="form-group">
    <input type="hidden" name="function" value="addCourseSubject">
    <input type="hidden" name="year" value="<?=$_SESSION['year']?>">
    <input type="hidden" name="course" value="<?=$_SESSION['user_type']?>">
    <label>Course Subject :</label><br>
    <input  type="text" name="subject" class="form-control rounded" placeholder="ex. (Computer Programming 1)" required>
    <label class="pt-2">Faculty :</label><br>

    <div class="card">
        <div class="ex1 p-1">
        <div class="p-2">

        <?php
        $faculty = new fetchFaculty();
        $res_faculty = $faculty->fetchData();
        if($res_faculty){
            while($row = $res_faculty->fetch()){
                ?>
                    <input type="radio" name="faculty" id="faculty" value="<?=$row['user_id']?>">
                    <span class="pl-1"><?=$row['user_name']?></span>
                    <br>

                <?php
            }
        } else {
            echo "No Data Found";
        }
    ?>

        </div>
    </div>
    </div>

    <Label class="pt-2">Section :</Label>
            <select class="custom-select custom-select-sm select2" tabindex="-1" aria-hidden="true" name="section" required="true">
            <option value="" disabled selected>-- Please Select Here --</option>
            <?php
        $fethYrSec = new fetchYrSec1();
        $res = $fethYrSec->fetchData();

        if($res)
        {
            foreach ($res as $row)
            {
                ?>
                <option value="<?=$row['yr_sec_section']?>"><?=$row['yr_sec_section']?></option>
                <?php
                
            }
        }
    ?>
                    

            </select>
    <Label class="pt-2">Semester :</Label>
            <select class="custom-select custom-select-sm select2" tabindex="-1" aria-hidden="true" name="semester" required="true">
            <option value="" disabled selected>-- Please Select Here --</option>
        <option value="1st Semester">1st Semester</option>
        <option value="2nd Semester">2nd Semester</option>
            </select>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" name="addCourseSubject" >Save</button>
    </div>
</form>
</div>
</div>
</div>
<!--Close Modal-->



<form action="" method="POST">
    <button type="submit" name="back" class="btn btn-primary">&laquo; Back</button>
</form>

<h1 class="h3 mb-2 text-gray-800 pt-2">Subject List (
    <?php
        if($_SESSION['year']== '1' ) {
            echo "1st Year";
        }
        else if($_SESSION['year'] == '2') {
            echo "2nd Year";
        }
        else if($_SESSION['year'] == '3') {
            echo "3rd Year";
        }
        else if($_SESSION['year']== '4') {
            echo "4th Year";
        }    
    ?>
    )
</h1>
<br>

<div class="d-flex justify-content-end pb-2">
   <div>
   <label class="px-2">Semester :</label>
   <select class="custom-select custom-select-sm select2" style="width: 170px; height: auto;" id="semester">
   <option class="text-center" value="all" selected>All</option>
   <option class="text-center" value="1st Semester">1st Semester</option>
   <option class="text-center" value="2nd Semester" >2nd Semester</option> 
   </select>
   </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">

<div class="d-flex justify-content-end pb-3">
    <button type="button" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_subject">
    <i class="fa fa-plus"></i>
    </button>
</div>

<div class="table-responsive" id="result">
                       
</div>
</div> 
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
//    function semester(){
//       var val = document.getElementById('semester').value;
// 		 alert(val);
//         // $.ajax({
//         //     type: "json",
//         //     url:"fetchSubj.php?fetchid=" + val +"; function=Subject",
//         //     beforeSend:function(){

//         //     },
//         //     success:function(response){
                
//         //     }
//         // })

       
//    }

$(document).ready(function(){
    $("#semester").change(function(){
        var value = document.getElementById('semester').value;
        // alert(value);
        $.ajax({
            type: "POST",
            url:"fetchSubj.php",
            data : {
                value: value, function:"Subject"
            },
            beforeSend:function(){

            },
            success:function(response){
                $("#result").html(response);
            }
        })
    })

    $("#semester").trigger('change');
})
</script>



<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>


