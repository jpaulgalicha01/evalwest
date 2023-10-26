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
  
if(isset($_GET['value'])&& isset($_GET['func'])=='section'){
    $section = secured($_GET['value']);
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
                $fetchSection = new fetchStudent();
                $res = $fetchSection->fetchData($section);

                if($res){
                    while($row = $res->fetch()){
                        ?>
                        <tr>
                            <td><?=$row['user_id_num']?></td>
                            <td><?=$row['user_name']?></td>
                            <td><?=$row['user_YrSec']?></td>
                            <td><?=$row['user_email']?></td>
                            <td class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" id="editBtn" value="<?=$row['user_id']?>"><i class='fas fa-edit'></i></button>
                            <button type="button" class="btn btn-danger btn-sm"  id="deleteBtn" value="<?=$row['user_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        
                    <?php
                   
                }
                }
            ?>
        </tbody>
    </table>

<!--Manage Modal-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
    <div class="modal-body" >
    <div class="form-group">
    <input type="hidden" name="function" value="manageStudent">
    <input type="hidden" name="edit_user_id" id="edit_user_id" >
    <label>Student ID No.</label><br>
    <input  type="text" name="edit_user_id_num" id="edit_user_id_num" class="form-control rounded" pattern="[0-9]{4}-[0-9]{4}-[A-Z]{2}" required>
    <label>Name</label><br>
    <input  type="text" name="edit_user_name" id="edit_user_name" class="form-control rounded" placeholder="ex. (Last Name, First Name M I.)" required>
    <label>Year & Section</label><br>

    <select class="custom-select custom-select-sm select2" style="width: 120px; height: auto;" name="edit_user_YrSec"disabled>
    <option class="text-center" id="edit_user_YrSec"><span id="edit_user_YrSec"></span></option>
    </select>
    <br>

    <label>Email</label><br>
    <input  type="email" name="edit_user_email" id="edit_user_email" class="form-control rounded" placeholder="ex. (example@mail.com)" required>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="manageStudent" class="btn btn-success">Save</button>
    </div>
</form>
</div>
</div>
</div>
<!--Close Modal-->

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
    <input type="hidden" name="function" value="deleteStud">
    <input type="hidden" name="delete_user_id" id="delete_user_id">
    <p>Are you sure to delete ?</p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="deleteStud" class="btn btn-danger">Delete</button>
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
    $(document).on('click','#editBtn',function(){
        var value = $(this).val();
        // alert(value);
        $.ajax({
            method: "POST",
            url:"inputConfig.php",
            data:{value:value, function:"showEditModal"},
            success:function(response){
                var res = jQuery.parseJSON(response);
                if(res.status == 200){
                    $("#modalEdit").modal('show');
                    $("#edit_user_id").val(res.data.user_id);
                    $("#edit_user_id_num").val(res.data.user_id_num);
                    $("#edit_user_name").val(res.data.user_name);
                    $("#edit_user_YrSec").val(res.data.user_YrSec);
                    $("#edit_user_YrSec").text(res.data.user_YrSec);
                    $("#edit_user_email").val(res.data.user_email);
                }
            }
        })
    });

    $(document).on('click','#deleteBtn',function(){
        var value = $(this).val();
        // alert(value);
        $.ajax({
            method: "POST",
            url:"inputConfig.php",
            data:{value:value, function:"showDeleteModal"},
            success:function(response){
                var res = jQuery.parseJSON(response);
                if(res.status == 200){
                    $("#modalDelete").modal('show');
                    $("#delete_user_id").val(res.data.user_id);
                }
            }
        })
    })
</script>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>