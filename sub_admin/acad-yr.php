<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!--Modal-->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Academic Year and Semester</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">

<div class="modal-body">
<div class="form-group">
<label>Academic Year</label><br>
<input type="hidden" name="function" value="addAcadYr">
<input type="hidden" name="acad_dep" value="<?=$_SESSION['user_type']?>">
<input class="form-control" style="border-radius: 9px;" class="col-xl-5 " type="text" name="acad_yr" class="form-control" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" placeholder="ex. (2019-2020)"required>
</div>
<div class="form-group">
<label>Semester</label><br>
<select class="custom-select custom-select-sm select2 " tabindex="-1" aria-hidden="true" name="semester" id="semester">
<option value="1st Semester">1st Semester</option>
<option value="2nd Semester">2nd Semester</option>
</select>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="addAcadYr" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>
<!--Close Modal-->


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 pt-2">Academic Year and Semester List</h1> <br>



<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
<div class="d-flex justify-content-end pb-3">
	<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus" ></i>
</button>
</div>
<div class="table-responsive">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Academic Year</th>
<th>Semester</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
$fetchAcad = new FetchAcad();
$fetchAcad->fetchData();
$res = $fetchAcad->fetchData();
if($res){
	while($row=$res->fetch()){
		?>
		<tr>
			<td><?=$row['acad_year']?></td>
			<td><?=$row['acad_sem']?></td>
			<td class="text-center">
			<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModalAcadYr<?=$row['acad_id']?>" value=""><i class="fa fa-trash" aria-hidden="true"></i></button>
			</td>
		</tr>
		<?php
		require 'modals/modal1.php';
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