
<!-- Modal System Default-->
<div class="modal fade" id="sysDef<?=$row['acad_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="inputConfig.php" method="POST"> 
<input type="hidden" name="function" value="sysDefault">
<input type="hidden" name="SysDef_id" value="<?=$row['acad_id']?>">  
<p>Are you sure to make this system default ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="sysDefault" class="btn btn-primary">Confirm</button>
</div>
</form>
</div>
</div>
</div>

<!-- Modal Manage-->
<div class="modal fade" id="manageStatus<?=$row['acad_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="inputConfig.php" method="POST">
<input type="hidden" name="function" value="changeStatus">
<input type="hidden" name="status_id" value="<?=$row['acad_id']?>">  
<label class="px-2">Status :</label>
<select class="custom-select custom-select-sm select2" style="width: 170px; height: auto;" name="status">
<?php
    if($row['acad_status']=='Not Active'){
        ?>
            <option class="text-center" selected value="Not Active">Not Active</option>
            <option class="text-center" value="Activate" >Activate</option>
            <option class="text-center" value="Done" >Done</option>
        <?php
    }elseif($row['acad_status']=='Activate'){
        ?>
            <option class="text-center" value="Not Active">Not Active</option>
            <option class="text-center" selected value="Activate" >Activate</option>
            <option class="text-center" value="Done" >Done</option>
        <?php
    } else{
        ?>
            <option class="text-center" value="Not Active">Not Active</option>
            <option class="text-center" value="Activate" >Activate</option>
            <option class="text-center" selected value="Done" >Done</option>
        <?php        
    }
?>

</select>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="changeStatus" class="btn btn-primary">Confirm</button>
</div>
</form>
</div>
</div>
</div>