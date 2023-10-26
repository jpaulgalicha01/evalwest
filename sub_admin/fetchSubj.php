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
  
if(isset($_POST['value'])&& isset($_POST['function'])=='Subject'){
    $value = secured($_POST['value']);
    $stmt = new fetchSubject();
    $stmtres = $stmt->fetchData($value);

    ?>
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>Course Subject</th>
        <th>Faculty</th>
        <th>Section</th>
        <th>Semester</th>
        <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                if($stmtres){
                    while($row = $stmtres->fetch()){
                        ?>
                        <tr>
                            <td><?=$row['subj_subject']?></td>       
                            <td><?=$row['subj_faculty_name']?></td>
                            <td><?=$row['subj_section']?></td>
                            <td><?=$row['subj_semes']?></td>
                
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" id="deleteBtn" value="<?=$row['subj_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        <?php
                    }
                } 
            ?>
        </tbody>

    </table>
    <!-- Modal Delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <input type="hidden" name="function" value="deleteSubject">
    <input type="hidden" name="delete_subject" id="delete_subject" value="<?=$row['subj_id']?>">  
    <p>Are you sure to delete ?</p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="deleteSubject" class="btn btn-danger">Delete</button>
    </div>
    </form>
    </div>
    </div>
    </div> 

<?php

}else {
    header("Location: index.php");
}
?>

<script>

    $(document).on('click','#deleteBtn',function(){
        var value = $(this).val();
        //  alert(value);
        $.ajax({
            method: "GET",
            url: "inputConfig.php",
            data: {
                value: value, function:"deleteSubject"
            },
            success:function(response){
                 var res = jQuery.parseJSON(response);
                if(res.status == 200){
                    $("#deleteModal").modal('show');
                    $("#delete_subject").val(res.data.subj_id);
                }
            }
        })
    });

</script>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>