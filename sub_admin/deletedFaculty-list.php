<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

?>
<!-- Begin Page Content -->
<div class="container-fluid">


<h1 class="h3 mb-2 text-gray-800 pt-2">Deleted Faculty List (<?=$_SESSION['user_type']?>)</h1><br>


<!-- DataTales Example -->


<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive" id="result">
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Faculty ID No.</th>
<th>Name</th>
<th>Email</th>
<th>Position</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    <?php
        $fetchData = new fetchDeleteFaculty();
        $res = $fetchData->fetchData();
        if($res){
            while($row = $res->fetch()){
                ?>

                    <tr>
                    <td><?=$row['user_id_num']?></td>
                    <td><?=$row['user_name']?></td>
                    <td><?=$row['user_email']?></td>
                    <td><?=$row['user_position']?></td>

                    <td class="text-center">
                        
                        <button type="button" id="restoreFaculty" value="<?=$row['user_id']?>" class="btn btn-success btn-sm"><i class='fas fa-trash-restore-alt'></i></button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteFaculty<?=$row['user_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                    </tr>

                <?php

                require 'modals/modalDeletedFaculty.php';
            }
        }
    ?>

</tbody>
</table>                           
</div>
</div> 
</div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<script>
    $(document).on('click','#restoreFaculty',function(){
        var restoreFaculty = document.getElementById("restoreFaculty").value;
        var func = "restoreFaculty";
        // alert(restoreFaculty);
        
        $.ajax({
            type: "POST",
            url: "inputConfig.php",
            data:'restoreFaculty=' +restoreFaculty +'&function='+func,


            success:function (response){
                var res = jQuery.parseJSON(response);
                if(res.status==200){
                    window.alert(res.message);
                    window.location.href="deletedFaculty-list.php";
                }
                else if(res.status==404){
                    window.alert(res.message);
                    window.location.href="deletedFaculty-list.php";
                }
            },
            
        })
    })
</script>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>