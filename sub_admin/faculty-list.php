<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!--Modal-->
<div class="modal fade" id="add_Faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
<div class="modal-body" >
<div class="form-group">
<input type="hidden" name="function" value="addFaculty">
<input type="hidden" name="department" value="<?=$_SESSION['user_dep']?>">
<input type="hidden" name="course" value="<?=$_SESSION['user_type']?>">

<label>Profile Image <span class="text-danger">*</span></label><br>
		<input type="file" name="image" accept=".jpg, .jpeg, .png" required> <br><br>

<label>Faculty ID No. <span class="text-danger">*</span></label><br>
<input  type="text" name="faculty_id" class="form-control rounded" pattern="[0-9]{6}" placeholder="ex. (000000)" required>
<label>Name <span class="text-danger">*</span></label><br>
<input  type="text" name="faculty_name" class="form-control rounded" placeholder="ex. (First Name M.I. Lastname)" required>
<label>Email <span class="text-danger">*</span></label><br>
<input  type="email" name="faculty_email" class="form-control rounded" placeholder="ex. (example@mail.com)" required>
<label>Position</label><br>
<select class="custom-select custom-select-sm select2 form-control rounded" tabindex="-1" aria-hidden="true" name="position" required="true">
<option value="" disabled selected>--Please Select Here--</option>	
<option value="Full-time Faculty">Full-time Faculty</option>
<option value="Part-time Faculty">Part-time Faculty</option>
<option value="Program Chair">Program Chair</option>
<option value="School Director">School Director</option>
<option value="Dean of Instruction">Dean of Instruction</option>
<option value="Campus Administrator">Campus Administrator</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="addFaculty" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->


<h1 class="h3 mb-2 text-gray-800 pt-2">Faculty List (<?=$_SESSION['user_type']?>)</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
	<div class="d-flex justify-content-end pb-3">
	<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_Faculty"><i class="fa fa-plus" ></i>
</button>
</div>
<div class="table-responsive">
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Faculty ID No.</th>
<th>Name</th>
<th>Email</th>
<th>Postion</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>

<?php
    $faculty = new fetchFaculty();
    $res_faculty = $faculty->fetchData();
    if($res_faculty){
        while($row = $res_faculty->fetch()){
            ?>
                <tr>
                    <td><?=$row['user_id_num']?></td>
                    <td><?=$row['user_name']?></td>
                    <td><?=$row['user_email']?></td>
                    <td><?=$row['user_position']?></td>
                    <td class="text-center">
                    <button type="button" title="View" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewFaculty<?=$row['user_id']?>"><i class='fas fa-eye'></i></button>
                    <button type="button" title="Edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editFaculty<?=$row['user_id']?>"><i class='fas fa-edit'></i></button>
                    <button type="button" title="Delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteFaculty<?=$row['user_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            <?php
            require 'modals/modalFaculty.php';
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

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>