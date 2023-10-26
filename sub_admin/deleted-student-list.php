<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

?>
<!-- Begin Page Content -->
<div class="container-fluid">
 

<h1 class="h3 mb-2 text-gray-800 pt-2">Deleted Student List</h1><br>

<!-- DataTales Example -->


<div class="card shadow mb-4">

<div class="card-body">
<div class="table-responsive">
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Academic Year</th>
<th>Total No. Student</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
		$fetchAcad = new fetchYear();
		$res = $fetchAcad->fetchData();
		if($res){
			while($row=$res->fetch()){
				?>
					<tr>
						<td><?=$row['acad_year']?></td>
						<td>
						<?php
							$fetchStudent = new fetchDeletedStudent0();
							$res_fetchStudent = $fetchStudent->fetchData();
								if($res_fetchStudent){
									$row1=$res_fetchStudent->fetch();
									if($row1['user_acad_year'] == $row['acad_year']){
										
											echo $res_fetchStudent->rowCount();
										
									} else {
										echo "0";
									}
									
								}else {
                                    echo "0";
                                }
                                
						?>
						</td>

						

						<td class="text-center">
						<form action="inputConfig.php" method="POST">
							<input type="hidden" name="function" value="DeletedacadYear">
							<input type="hidden" name="DeletedStudacadYear" value="<?=$row['acad_year']?>">
							<button type="submit" name="DeletedacadYear" class="btn btn-primary btn-sm">
								<i class='fas fa-edit'></i>
							</button>
						</form>
						</td>
					</tr>				
				<?php
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