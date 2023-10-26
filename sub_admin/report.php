<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800 pt-2">Evaluation Report</h1> <br>
<div class="card shadow mb-4">
<div class="card-body">
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
$acad_sem = new fetchAcad();
$result = $acad_sem->fetchData();

if($result){
    while($row = $result->fetch()){
    ?>
    <tr>
        <td><?=$row['acad_year']?></td>
        <td><?=$row['acad_sem']?></td>
        <td class="text-center">
            <form action="inputConfig.php" method="POST">
                <input type="hidden" name="function" value="report_eval">
                <input type="hidden" name="acad_year" value="<?=$row['acad_year']?>">
                <input type="hidden" name="acad_sem" value="<?=$row['acad_sem']?>">
                <button type="submit" class="btn btn-success btn-sm" name="report_eval">
                <i class="fa fa-eye"></i>
                </button>
            </form>
        </td>

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
include 'includes/scripts.php';
include 'includes/footer.php';
?>