<!-- Modal System Default-->
<div class="modal fade" id="sysDef<?php echo $fetch['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="code.php" method="POST"> 
<input type="hidden" name="status_id"  value="<?php echo $fetch['id']?>"">  
<p>Are you sure to make this system default ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="sys_def" class="btn btn-primary">Confirm</button>
</div>
</form>
</div>
</div>
</div>

<!-- Modal Manage-->
<div class="modal fade" id="manageModalStatus<?php echo $fetch['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" id="loading">
<form action="code.php" method="POST"> 
        <?php
            $status = mysqli_query($conn,"SELECT id,status FROM acad_yr WHERE id='".$fetch['id']."' ");
            if(mysqli_num_rows($status)>0){
                $fetch_status = mysqli_fetch_assoc($status); ?>

                <input type="text" name="status_id" value="<?php echo $fetch_status['id']?>">  
                <label class="px-2">Status :</label>
                <select class="custom-select custom-select-sm select2" style="width: 170px; height: auto;" name="status" >
                    <?php
                        if($fetch_status['status'] == 'Not Active'){?> 
                                <option class="text-center" Selected value="Not Active">Not Active</option>
                                <option class="text-center" value="Activate" >Activate</option>
                                <option class="text-center" value="Done" >Done</option>
                        <?php }
                          if($fetch_status['status'] == 'Activate'){?> 
                                <option class="text-center" value="Not Active">Not Active</option>
                                <option class="text-center" Selected value="Activate" >Activate</option>
                                <option class="text-center" value="Done" >Done</option>
                        <?php }
                          if($fetch_status['status'] == 'Done'){?> 
                                <option class="text-center" value="Not Active">Not Active</option>
                                <option class="text-center" value="Activate" >Activate</option>
                                <option class="text-center" Selected value="Done" >Done</option>
                        <?php }
                    ?>
                </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="change_status" class="btn btn-primary">Confirm</button>
    </div>

           <?php }
        ?>
</form>
</div>
</div>
</div>

