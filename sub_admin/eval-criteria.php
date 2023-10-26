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
<h5 class="modal-title" id="exampleModalLabel">Add Criteria</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
<div class="modal-body">
<div class="form-group">
<label>Name of Criteria :</label><br>
<input type="hidden" name="function" value="addCrit">
<textarea name="criteria" class="form-control rounded" placeholder="Please Fill in Criteria Category" cols="60" rows="5" required></textarea>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="addCrit" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>
<!--Close Modal-->


<h1 class="h3 mb-2 text-gray-800 pt-2">Evaluation Criteria List</h1> <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
	<div class="d-flex justify-content-end pb-3">
		<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus" ></i>
		</button>
	</div>
<div class="table-responsive">

<table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Criteria List</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
    $fetchCriteria = new fetchCriteria();
    $res = $fetchCriteria->fetchData();

    if($res){
        foreach ($res as $row){
            ?>
                <tr>
                    <td><?=$row['crit_criteria']?></td>
                    <td class="text-center">
                    <button type="button" title="Edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCriteria<?=$row['crit_id']?>">
                        <i class='fas fa-edit'></i>
                    </button>
                    <button type="button" title="Delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCriteria<?=$row['crit_id']?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    </td>
                </tr>
            <?php

            require 'modals/modalCrit.php';
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