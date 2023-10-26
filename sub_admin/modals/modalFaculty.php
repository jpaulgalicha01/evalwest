
<!--View Modal-->
<div class="modal fade" id="viewFaculty<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">View Faculty</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form id="manageFaculty">
<div class="modal-body" >
<div class="form-group">
<input type="hidden" name="view_id" id="view_id">
    <div class="text-center">
        <div class="upload">
            <img src="../uploads/<?=$row['user_img']?>" class="img-fluid">
        </div>
    </div>
<label>Faculty ID No.</label><br>
<input  type="text" disabled class="form-control rounded" value="<?=$row['user_id_num']?>">
<label>Name</label><br>
<input  type="text" disabled class="form-control rounded" value="<?=$row['user_name']?>">
<label>Email</label><br>
<input  type="text" disabled class="form-control rounded" value="<?=$row['user_email']?>">
<label>Position</label><br>
<input type="text" disabled class="form-control rounded" value="<?=$row['user_position']?>">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->


<!--Edit Modal-->
<div class="modal fade" id="editFaculty<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Faculty</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
<div class="modal-body" >
<div class="form-group">
<input type="hidden" name="function" value="manageFaculty">
<input type="hidden" name="editFacultyID" value="<?=$row['user_id']?>">
    <div class="text-center">
        <div class="upload">
            <img src="../uploads/<?=$row['user_img']?>" class="img-fluid">
        </div>
    </div>
<label>Profile Picture</label><br>
<div class="pb-2">
<input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png"> 
</div>

<label>Faculty ID No.</label><br>
<input  type="text" name="edit_faculty_id" value="<?=$row['user_id_num']?>"class="form-control rounded" pattern="[0-9]{6}" required>
<label>Name</label><br>
<input  type="text" name="edit_faculty_name" value="<?=$row['user_name']?>"class="form-control rounded" placeholder="ex. (Last Name, First Name M I.)" required>
<label>Email</label><br>
<input  type="email" name="edit_faculty_email" value="<?=$row['user_email']?>" class="form-control rounded" placeholder="ex. (example@mail.com)" required>
<label>Position</label><br>

<select class="custom-select custom-select-sm select2 form-control rounded" tabindex="-1" aria-hidden="true" name="edit_faculty_position">
    <?php
        if($row['user_position'] == "Full-time Faculty"){
            ?>
                <option value="Full-time Faculty" selected>Full-time Faculty</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Program Chair">Program Chair</option>
                <option value="School Director">School Director</option>
                <option value="Dean of Instruction">Dean of Instruction</option>
                <option value="Campus Administrator">Campus Administrator</option>
            <?php
        } elseif($row['user_position'] == "Part-time Faculty"){
            ?>
                <option value="Full-time Faculty" >Full-time Faculty</option>
                <option value="Part-time Faculty" selected>Part-time Faculty</option>
                <option value="Program Chair">Program Chair</option>
                <option value="School Director">School Director</option>
                <option value="Dean of Instruction">Dean of Instruction</option>
                <option value="Campus Administrator">Campus Administrator</option>
            <?php
        } elseif($row['user_position'] == "Program Chair"){
            ?>
                <option value="Full-time Faculty" >Full-time Faculty</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Program Chair selected">Program Chair</option>
                <option value="School Director">School Director</option>
                <option value="Dean of Instruction">Dean of Instruction</option>
                <option value="Campus Administrator">Campus Administrator</option>
            <?php
        }elseif($row['user_position'] == "School Director"){
            ?>
                <option value="Full-time Faculty" >Full-time Faculty</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Program Chair">Program Chair</option>
                <option value="School Director" selected>School Director</option>
                <option value="Dean of Instruction">Dean of Instruction</option>
                <option value="Campus Administrator">Campus Administrator</option>
            <?php
        }elseif($row['user_position'] == "Dean of Instruction"){
            ?>
                <option value="Full-time Faculty" >Full-time Faculty</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Program Chair">Program Chair</option>
                <option value="School Director">School Director</option>
                <option value="Dean of Instruction" selected>Dean of Instruction</option>
                <option value="Campus Administrator">Campus Administrator</option>
            <?php
        }elseif($row['user_position'] == "Campus Administrator"){
            ?>
                <option value="Full-time Faculty" >Full-time Faculty</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Program Chair">Program Chair</option>
                <option value="School Director">School Director</option>
                <option value="Dean of Instruction">Dean of Instruction</option>
                <option value="Campus Administrator" selected>Campus Administrator</option>
            <?php
        }
    ?>

</select>
</div>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="manageFaculty" class="btn btn-success">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->

<!-- Modal Delete-->
<div class="modal fade" id="deleteFaculty<?=$row['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="inputConfig.php" method="POST">
<input type="hidden" name="function" value="deleteFaculty"> 
<input type="hidden" name="deleteFacultyID" value="<?=$row['user_id']?>">  
<p>Are you sure to delete ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="deleteFaculty"class="btn btn-danger">Delete</button>
</div>
</form>
</div>
</div>
</div>