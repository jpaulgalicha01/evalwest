<?php
    include 'security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/logo1.png"/>
    
    <title>Eval-West Activity Log</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
			<!-- DataTales Example -->
			<div class="card-body">
				<div class="d-flex justify-content-center">
					<h1>Activity Logs</h1><br><br>
				</div>
				<div class="table-responsive">
				<?php
				$activity_run = mysqli_query($conn,"SELECT * FROM activity_log ORDER BY id DESC"); ?>

				<table class="table table-hover" id="" width="100%" cellspacing="0">
				<thead>
				<tr>
				<th>Date</th>
				<th>Time</th>
				<th>Name</th>
				<th>Activity</th>
				</tr>
				</thead>
				<tbody>
				<?php
					if(mysqli_num_rows($activity_run)>0){
						while ($res = mysqli_fetch_assoc($activity_run)){
							echo"<tr><td>".$res['date']."</td>";
							echo"<td>".$res['time']."</td>";
							echo"<td>".$res['name']."</td>";
							echo"<td>".$res['activity']."</td></tr>";
					?>
				<?php }}
				else{
					echo"<td class='text-center' colspan='4'>No Records Found</td>";
				}
				?>
				</tbody>
				</table>
				</div>
			</div>

		</div>

	</body>
</html>

<script>
window.print('pdf');
window.onafterprint = function(event) {
window.location.href = 'activity_log.php'
};
</script> 
