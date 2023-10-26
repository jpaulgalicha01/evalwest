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

if(isset($_POST['deletedsection'])&& isset($_POST['function'])=='deletedsection'){
    $deletedsection = secured($_POST['deletedsection']);

    $fetchDeletedSection = new fetchDeletedStudent1();
    $stmt_run = $fetchDeletedSection->fetchData($deletedsection);


        ?>
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>Student ID No.</th>
            <th>Name</th>
            <th>Year & Section</th>
            <th>Email</th>
            <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php            
                if($stmt_run){
                    while($row = $stmt_run->fetch()){ ?>
                    <tr>
                        <td><?=$row['user_id_num']?></td>
                        <td><?=$row['user_name']?></td>
                        <td><?=$row['user_YrSec']?></td>
                        <td><?=$row['user_email']?></td>
                        <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm" id="restoreStudent" value="<?=$row['user_id']?>"><i class='fas fa-trash-restore-alt'></i></button>
                        <button type="button" class="btn btn-danger btn-sm" id="deleteStudent" value="<?=$row['user_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php

                        }
                    }
                    ?>
            </tbody>
        </table>

        <!-- Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="inputConfig.php" method="POST">
<div class="modal-body">
    <input type="hidden" name="function" value="deleteStudents">
    <input type="hidden" name="delete_user_id" id="delete_user_id">
    <p>Are you sure to delete ?</p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="deleteStudents" class="btn btn-danger">Delete</button>
    </div>
</form>
</div>
</div>
</div>
        
    <?php
        
} 

else {
    header("Location: index.php");
}
?>


<script>
    $(document).on('click','#restoreStudent',function(){
        var restoreStudent = document.getElementById("restoreStudent").value;
        // alert(restoreStudent);
        
        $.ajax({
            type: "POST",
            url: "inputConfig.php",
            data:'restoreStudent=' +restoreStudent +'&function='+ 'restoreStudent',


            success:function (response){
                var res = jQuery.parseJSON(response);
                if(res.status==200){
                    window.alert(res.message);
                    window.location.href="deleted-student-list-restore.php";
                }
                else if(res.status==404){
                    window.alert(res.message);
                    window.location.href="deleted-student-list-restore.php";
                }
            },
            
        })
    });

    $(document).on('click','#deleteStudent',function(){
        var deleteStudent = $(this).val();
        //  alert(deleteStudent);
        
        $.ajax({
            type: "POST",
            url: "inputConfig.php",
            data:'deleteStudent=' +deleteStudent +'&function='+'deleteStudent',

            success:function (response){
                var res = jQuery.parseJSON(response);
                if(res.status==200){
                    $("#modalDelete").modal('show');
                    $("#delete_user_id").val(res.data.user_id);
                }else {
                    alert(res.message);
                }
            },
            
        })
    });
</script>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>