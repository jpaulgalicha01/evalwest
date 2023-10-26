<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';
include 'include/navbar.php';

?>
<!-- Begin Page Content -->
<div class="container-fluid">


<!--Modal-->
<div class="modal fade" id="add_Department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
<div class="modal-body" >
<div class="form-group">
<input type="hidden" name="function" value="inputCourse">
<label>Department :</label><br>
<select class="custom-select custom-select-sm select2 " name="department" tabindex="-1" aria-hidden="true" required="true">
<option value="" selected disabled>--Please Select Here--</option>
<option value="School of Education">School of Education</option>
<option value="School of Information and Communication Technology">School of Information and Communication Technology</option>
<option value="School of Physical Education">School of Physical Education</option>
<option value="School of Business and Management">School of Business and Management</option>
</select>

<label class="pt-3">Course :</label><br>
<input  type="text" name="course" class="col-xl-5 form-control rounded" placeholder="ex. BSIT" required>
<br>
<label>Name of Course :</label>
<input  type="text" name="course_name" class="form-control" placeholder="ex. (Bachelor of Science in Informtaion Technology" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="inputCourse" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->


<h1 class="h3 mb-2 text-gray-800 pt-2">Department List</h1> <br>


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
<div class="d-flex justify-content-end pb-3">
	<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_Department"><i class="fa fa-plus" ></i>
	</button>
</div>
<div class="table-responsive">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Course</th>
<th>Course Name</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
	
	<?php
		$department = new fetchCourse();
		$fetch = $department->fetch_course();

		if($fetch)
		{
			foreach($fetch as $row)
			{
			?>
			
				<tr>
                        <td><?=$row['dep_yr_sec_course']?></td>
                        <td><?=$row['dep_yr_sec_coursename']?></td>

                        <td class="text-center"> 
                        <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModalDep<?=$row['dep_yr_sec_id']?>"  value="">
                            <i class='fas fa-edit'></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModalDep<?=$row['dep_yr_sec_id']?>" value="">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        </td>
                        <?php
                            include 'modals/modal.php';
                        ?>
                    </tr>
			
			<?php
		}}
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


<?php
include 'include/scripts.php';
include 'include/footer.php';
?>