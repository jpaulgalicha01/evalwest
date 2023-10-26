<!-- Modal Delete-->
<div class="modal fade" id="deleteModal<?=$row['yr_sec_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<input type="hidden" name="function" value="deleteYrSec"> 
<input type="hidden" name="delete_id" value="<?=$row['yr_sec_id']?>">  
<p>Are you sure to delete ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="deleteYrSec"class="btn btn-danger">Delete</button>
</div>
</form>
</div>
</div>
</div>