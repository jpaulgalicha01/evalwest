<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

if(isset($_SESSION['acad_status'])&& $_SESSION['acad_status']=="Activate"){
    require 'config/mail_activate.php';
    unset($_SESSION['acad_status']);
}
if(isset($_SESSION['acad_status'])&& $_SESSION['acad_status']=='Done'){
    require 'config/mail_done.php';
    unset($_SESSION['acad_status']);
}

$checkAcad = new fetchAcad();
$res_checkAcad = $checkAcad->fetchData();

if($res_checkAcad <= 1){
    echo"<script>window.location.href='acad-yr.php'</script>";
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800 pt-2">Evaluation Status</h1> <br>
<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Acad. Year</th>
<th>Semester</th>
<th>Sys. Default</th>
<th class="text-center">Status</th>
<th class="text-center">Manage</th>
</tr>
</thead>
<tbody>

<?php
    $fetch_acad = new fetchAcad();
    $res_fetch_acad = $fetch_acad->fetchData();

    if($res_fetch_acad){
        while($row=$res_fetch_acad->fetch()){
            ?>
                <tr>
                    <td><?=$row['acad_year']?></td>
                    <td><?=$row['acad_sem']?></td>
                    <td>
                        <?php
                            if($row['acad_SysDef'] == 'YES'){
                                ?>                     
                                    <button id='sys_def' class='btn btn-primary btn-sm'>YES</button> 
                                <?php
                            } else{
                                ?>                     
                                    <button id='sys_def' class='btn btn-danger btn-sm' data-toggle="modal" data-target="#sysDef<?=$row['acad_id']?>">NO</button> 
                                <?php                                
                            }
                        ?> 
                    </td>

                    <td class="text-center">
                        <?php
                            if($row['acad_status']=='Activate'){
                                ?>
                                     <div class='text-white'><span class='bg-success rounded p-1'>Active</span></div>
                                <?php
                            }elseif($row['acad_status']=='Done'){
                                ?>
                                     <div class='text-white'><span class='bg-primary rounded p-1'>Done</span></div>
                                <?php
                            }else{
                                ?>
                                    <div class='text-white'><span class='bg-danger rounded p-1'>Not Yet Started</span></div>
                                <?php
                            }
                        ?>
                       
                    </td>
                    <td class="text-center">
                        <button type="button" title="Manage" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#manageStatus<?=$row['acad_id']?>"><i class='fas fa-edit'></i></button>
                    </td>
                </tr>

            <?php
            require 'modals/modalStatus.php';
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