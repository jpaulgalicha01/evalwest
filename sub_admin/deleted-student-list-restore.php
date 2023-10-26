<?php
ob_start();
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

if(isset($_POST['back'])){
	ob_end_flush(header("location: deleted-student-list.php"));
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<form action="" method="POST">
<button type="submit" name="back" class="btn btn-primary">&laquo; Back</button>
</form>

<h1 class="h3 mb-2 text-gray-800 pt-2">Deleted Student List (<?=$_SESSION['DeletedStudacadYear']?>)</h1>

<div class="d-flex justify-content-end pb-2">
<div>
<label class="px-2">Year & Section :</label>

<select class="custom-select custom-select-sm select2" style="width: 170px; height: auto;" id="deletedsection">
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
        $('#deletedsection').change(function(){
            var deletedsection = document.getElementById('deletedsection').value;
           // alert(deletedsection);

           		$.ajax({
        		type: "POST",
        		url: "deletedStudentList.php",
        		data:{deletedsection:deletedsection , function:'deletedsection'},
        		success:function(response){
        			$("#result").html(response)
        		}
        	});

        });

        $('#deletedsection').trigger('change');
    });


</script>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>