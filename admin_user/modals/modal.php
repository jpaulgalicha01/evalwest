<!-- Modal Delete-->
<div class="modal fade" id="deleteModalDep<?=$row['dep_yr_sec_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" name="function" value="deleteDep">
				<input type="hidden" name="delete_dep_id" value="<?=$row['dep_yr_sec_id']?>">  
				<p>Are you sure to delete ?</p>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="delete_dep" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModalDep<?=$row['dep_yr_sec_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Department Name</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
 
       
                        <div class="modal-body" >
                        <div class="form-group">
                        <input type="hidden" name="function" value="editCourse">
                        <input type="hidden"  name="edit_dep_id" value="<?=$row['dep_yr_sec_id']?>">
                        <label> Course :</label><br>
                        <input  type="text" name="edit_course" value="<?=$row['dep_yr_sec_course']?>" class="col-xl-5 form-control rounded">
                        <br>
                        <label>Name of Course :</label>
                        <input  type="text"  name="edit_course_name" value="<?=$row['dep_yr_sec_coursename']?>" class="form-control">
                        </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="editCourse" class="btn btn-success" value="Save">

</form>
</div>
</div>
</div>
<!-- End Modal Edit -->


