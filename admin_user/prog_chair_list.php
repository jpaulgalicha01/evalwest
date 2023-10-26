<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';
include 'include/navbar.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">


<!--Modal-->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Department/Division Chair</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
<div class="modal-body" >
<div class="form-group">
<label>Department:</label><br>
<input type="hidden" name="function" value="add_prog_chair">

<select class="custom-select custom-select-sm select2 " tabindex="-1" aria-hidden="true" name="dep" required="">

<option selected disabled value="">Please Select Here</option>
<?php
    $fetch_dep = new fetchCourse();
    $res = $fetch_dep->fetch_course();
    
        if($res){
            foreach ($res as $row){
                ?>  
                    
                    <option value="<?=$row['dep_yr_sec_course']?>"><?=$row['dep_yr_sec_course']?></option>
                <?php
            }
        } else {
            ?>
                <option selected disabled value="">No Data Available</option>
            <?php
        }
    ?>
    
</select>
    

<label class="pt-1">Name:</label><br>
<input  type="text" name="name"  class="form-control rounded" placeholder="ex. (Last Name, First Name M I.)" required>
<label>Username:</label><br>
<input  type="text" name="username" class="form-control rounded" required>
<label>Password:</label><br>
<input  type="password" name="password" class="form-control rounded" required>
<label>Email</label><br>
<input  type="email" name="email" class="form-control rounded" placeholder="ex. (example@mail.com)" required>

</div>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="add_prog_chair" class="btn btn-primary">Add</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->

<h1 class="h3 mb-2 text-gray-800 pt-2">Department/Division Chair List</h1> <br>


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
<div class="d-flex justify-content-end pb-3">
	<button type="button" title="Add" class="btn btn-primary rounded-circle btn-sm" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus" ></i>
</button>
</div>
<div class="table-responsive">

<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Department/Division/Program</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
    $fetchProgChiar = new fetchProgChair();
    $res = $fetchProgChiar->fetchData();

    if($res){
        foreach($res as $row){

                ?>
                    <tr>
                        <td><?=$row['acc_name']?></td>
                        <td><?=$row['acc_email']?></td>
                        <td><?=$row['acc_type']?></td>
                        <td class="text-center"> 
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewModal<?=$row['acc_id']?>" value=""><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$row['acc_id']?>" value=""><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                <?php
                require 'modals/modal3.php';
            
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
include 'include/scripts.php';
include 'include/footer.php';
?>