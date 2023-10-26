<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!--Modal-->
<div class="modal fade" id="add_YrSec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Year & Section </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body" >
<form action="inputConfig.php" method="POST">
	<div class="form-group">
        <input type="hidden" name="function" value="addYrSec">
		<input type="hidden" name="course" value="<?=$_SESSION['user_type']?>">
        
		<Label class="pr-2">Year & Section:</Label>
		<select class="custom-select custom-select-sm select2 " tabindex="-1" style="width:120px;" aria-hidden="true" name="year" required="true">
		<option value="" disabled selected class="text-center">----</option>
		<option value="1">1st Year</option>
		<option value="2">2nd Year</option>
		<option value="3">3rd Year</option>
		<option value="4">4th Year</option>
		</select>
		<select class="custom-select custom-select-sm select2 " tabindex="-1" style="width:100px;" aria-hidden="true" name="section" required="true">
		<option value="" disabled selected class="text-center">----</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		</select>

	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" name="addYrSec">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->



<h1 class="h3 mb-2 text-gray-800 pt-2">Year and Section List</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
	<div class="d-flex justify-content-end pb-3">
		<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_YrSec"><i class="fa fa-plus" ></i>
		</button>
	</div>
<div class="table-responsive">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Year & Section</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
	$fethYrSec = new fetchYrSec();
	$res = $fethYrSec->fetchData();

	if($res)
	{
		foreach ($res as $row)
		{
			?>
				<tr>
					<td><?=$row['yr_sec_YrSec']?></td>
					<td class="text-center">
					<button type="button" title="Delete" class="btn btn-danger btn-sm" data-target="#deleteModal<?=$row['yr_sec_id']?>" data-toggle="modal" value=""><i class="fa fa-trash" aria-hidden="true"></i></button>
					</td>
				</tr>
			<?php
			require 'modals/modal.php';
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