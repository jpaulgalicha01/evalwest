<!--Delete Modal -->
<div class="modal fade" id="deleteFaculty<?=$row['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<input type="hidden" name="function" value="deleteFacultyPerma">
<input type="hidden" name="deleteFacultyID" value="<?=$row['user_id']?>">  
<p>Are you sure to delete this permanent ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="deleteFacultyPerma"class="btn btn-danger">Delete</button>
</div>
</form>
</div>
</div>
</div>