<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';
include 'include/navbar.php';

?>
<!-- Begin Page Content -->
<div class="container-fluid">




<h1 class="h3 mb-2 text-gray-800 pt-2">Activity Logs</h1> <br>
<div class="d-flex justify-content-end pb-2">
    <div>
    <label class="pr-2">Name :</label>

    <select class="custom-select custom-select-sm select2 text-center" style="width: 170px; height: auto;" id="admin" onchange="admin_user();">
    <option value="all" selected>All</option>

    <option value="">Name</option>    
  
    </select>
    </div>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body" id="result">
	<div class="d-flex justify-content-end pb-2">
		<form action="pdf1.php">
			<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</button>
		</form>
	</div>
<div class="table-responsive">


<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Date</th>
<th>Time</th>
<th>Name</th>
<th>Activity</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Date</td>
    <td>time</td>
    <td>Name</td>
    <td>Activity</td>
</tr>

</tbody>
</table>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
	function admin_user()
    {
		var value = document.getElementById("admin").value;
	    // alert (value);
		//  $.ajax({
        //     type: "GET",
        //     url: "fetch.php?getAdmin=" + value,
        //     beforSend: function(){
        //         $("#result").html("<span>Please Wait...</span>");
        //     },
        //     success:function (data){
        //         $("#result").html(data);
        //     },
        // });

        $("#admin").val(value).change();
    }
    


</script>


<?php
include 'include/scripts.php';
include 'include/footer.php';
?>