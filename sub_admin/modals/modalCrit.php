
<!-- Modal Edit-->
<div class="modal fade" id="editCriteria<?=$row['crit_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Criteria</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="inputConfig.php" method="POST">
<input type="hidden" name="function" value="editCrit">
<input type="hidden" name="crit_id" value="<?=$row['crit_id']?>">
<label>Name of Criteria :</label><br>
<textarea name="manage_criteria" class="form-control rounded" cols="60" rows="5" required><?=$row['crit_criteria']?></textarea>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" name="editCrit" class="btn btn-success" value="Save">
</div>
</form>
</div>
</div>
</div>
<!-- End Modal Edit -->


<!-- Modal Delete-->

<div class="modal fade" id="deleteCriteria<?=$row['crit_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<input type="hidden" name="function" value="deleteCrit">
<input type="hidden" name="delete_id" value="<?=$row['crit_id']?>">  
<p>Are you sure to delete ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="deleteCrit" class="btn btn-danger">Delete</button>
</div>
</div>
</div>
</div>
</form>
<!-- End Modal Delete -->