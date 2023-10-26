<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

$check = new check_forward_report1();
$check->redirect();


?>


<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800 pt-2">Evaluation Report 

</h1><br>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive" id="result">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Name of Faculty</th>
<th>No. Faculty Evaluate</th>
<th class="text-center">Action</th>

</tr>
</thead>
<tbody>
<?php
$acad_year = $_REQUEST['acad_year'];
$acad_sem= $_REQUEST['acad_sem'];
$list_faculty = new eval_result();
$resulty_eval =$list_faculty->fetchData($acad_year,$acad_sem);

if($resulty_eval){
    while($row = $resulty_eval->fetch()){
        ?>
            <tr>
                <td><?=$row['name']?></td>
                <?php
                    $name = $row['name'];
                    $count = new eval_count();
                    $count->countData($name);
                ?>
                <td class="text-center">
                    <form action="inputConfig.php" method="POST">
                        <input type="hidden" name="function" value="report_eval1">
                        <input type="hidden" name="acad_year" value="<?=$_GET['acad_year']?>">
                        <input type="hidden" name="acad_sem" value="<?=$_GET['acad_sem']?>">
                        <input type="hidden" name="faculty_id" value="<?=$row['id_num']?>">
                        <input type="hidden" name="name" value="<?=$row['name']?>>">
                        <button type="submit" name="report_eval1" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
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