<!--View Modal-->
<div class="modal fade" id="viewModal<?=$row['acc_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">View Faculty</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>

	<div class="modal-body" >
	<div class="form-group">
	<input type="hidden" name="view_id" id="view_id">
	<div class="upload">

                <img src="../uploads/<?=$row['acc_img']?>"  width = 125 height = 125 title="">

    </div>

	<label>Department:</label><br>
	<input  type="text" disabled value="<?=$row['acc_type']?>" class="form-control rounded">
	<label>Name:</label><br>
	<input  type="text" disabled value="<?=$row['acc_name']?>" class="form-control rounded">
	<label>Email</label><br>
	<input  type="text" disabled value="<?=$row['acc_email']?>" class="form-control rounded">
	</div>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>
	</div>
	</div>
</div>
<!--Close Modal-->

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal<?=$row['acc_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<input type="hidden" name="function" value="deleteProgChair"> 
				<input type="hidden" name="delete_sub" value="<?=$row['acc_id']?>" >  
				<p>Are you sure to delete ?</p>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="deleteProgChair"class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>