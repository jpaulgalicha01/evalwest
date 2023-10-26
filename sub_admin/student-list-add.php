<?php
ob_start();
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

if(isset($_POST['back'])){
	ob_end_flush(header("location: student-list.php"));
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">


<!--Modal-->
<div class="modal fade" id="add_Student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Student </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
<div class="modal-body" >
<div class="form-group">
<input type="hidden" name="function" value="addStudent">
<input type="hidden" name="AcadYear" value="<?=$_SESSION['StudacadYear']?>">
<input type="hidden" name="course" value="<?=$_SESSION['user_type']?>">
<input type="file" name="file" accept=".csv" required="true"><br><br>
<Label class="pr-2">Year & Section:</Label>
		<select class="custom-select custom-select-sm select2 " tabindex="-1" style="width:120px;" aria-hidden="true" name="year" required="true">
		<option value="" disabled selected class="text-center">----</option>
		<?php
			$fetch_YrSec = new fetchYr();
			$res_fetch_YrSec = $fetch_YrSec->fetchData();

			if($res_fetch_YrSec){
				while($row = $res_fetch_YrSec->fetch()){
					?>
						<option class="text-center" value="<?=$row['yr_sec_year']?>"><?=$row['yr_sec_year']?></option>   
					<?php
				}
			}
		?>
		</select>
		
		<select class="custom-select custom-select-sm select2 " tabindex="-1" style="width:100px;" aria-hidden="true" name="section" required="true">
		<option value="" disabled selected class="text-center">----</option>
			<?php
				$fetch_YrSec = new fetchYrSec1();
				$res_fetch_YrSec = $fetch_YrSec->fetchData();

				if($res_fetch_YrSec){
					while($row = $res_fetch_YrSec->fetch()){
						?>
							<option class="text-center" value="<?=$row['yr_sec_section']?>"><?=$row['yr_sec_section']?></option>   
						<?php
					}
				}
			?>
		</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="addStudent" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->


<form action="" method="POST">
<button type="submit" name="back" class="btn btn-primary">&laquo; Back</button>
</form>

<h1 class="h3 mb-2 text-gray-800 pt-2">Student List (<?=$_SESSION['StudacadYear']?>)</h1>

<div class="d-flex justify-content-end pb-2">
<div>
<label class="px-2">Year & Section :</label>

<select class="custom-select custom-select-sm select2" style="width: 170px; height: auto;" id="section">
<option class="text-center" selected value="all">All</option>
<?php
	$fetch_YrSec = new fetchYrSec();
	$res_fetch_YrSec = $fetch_YrSec->fetchData();

	if($res_fetch_YrSec){
		while($row = $res_fetch_YrSec->fetch()){
			?>
				<option class="text-center" value="<?=$row['yr_sec_YrSec']?>"><?=$row['yr_sec_YrSec']?></option>   
			<?php
		}
	}
?>
    

</select>
</div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">

<div class="d-flex justify-content-end pb-3">
    <button type="button" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_Student">
        <i class="fa fa-plus"></i>
    </button>
</div>

<div class="table-responsive" id="result">
	
</div>
</div>
</div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>

	$(document).ready(function(){
		$("#section").change(function(){
			var value = document.getElementById("section").value;
			// alert(value);
			$.ajax({
				type: "GET",
				url: "fetchStud.php",
				data:{value:value, func:"student"},
				success:function(response){
					$("#result").html(response);
				}
			})
		});

		$("#section").trigger('change');
	});
	
</script>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>