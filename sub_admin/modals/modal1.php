<!-- Modal Delete-->
<div class="modal fade" id="deleteModalAcadYr<?=$row['acad_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<input type="hidden" name="function" value="deleteAcad">
<input type="hidden" name="delete_acad" value="<?=$row['acad_id']?>">  
<p>Are you sure to delete ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="deleteAcad"class="btn btn-danger">Delete</button>
</div>
</form>
</div>
</div>
</div>

