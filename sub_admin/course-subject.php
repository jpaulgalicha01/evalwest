<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

?>
<!-- Begin Page Content -->
<div class="container-fluid">
 

<h1 class="h3 mb-2 text-gray-800 pt-2">Subject List</h1><br>

<!-- DataTales Example -->


<div class="card shadow mb-4">

<div class="card-body">
<div class="table-responsive">
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Year Level</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
    $fetch_YrSec = new fetchYr();
    $res_fetch_YrSec = $fetch_YrSec->fetchData();

    if($res_fetch_YrSec){
        while($row = $res_fetch_YrSec->fetch()){
            ?>
             <tr>
                <td><?=$row['yr_sec_year']?></td>
                <td class="text-center">
                <form action="inputConfig.php" method="POST">
                    <input type="hidden" name="function" value="addSubject">
                    <input type="hidden" name="year" value="<?=$row['yr_sec_year']?>">
                    <button type="submit" name="addSubject" class="btn btn-primary btn-sm">
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
