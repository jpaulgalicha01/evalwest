<!--Modal-->
<div class="modal fade" id="editQuest<?=$rowQuest['quest_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="inputConfig.php" method="POST">
<div class="modal-body" >
<div class="form-group">
<label>Criteria</label>
<input type="hidden" name="function" value="editQuest">
<input type="hidden" name="quest_id" value="<?=$rowQuest['quest_id']?>">

<select  class="custom-select custom-select-sm select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="quest_crit">

<?php
        $fetchCrit1 = new fetchCriteria();
        $resFetchCrit1 = $fetchCrit1->fetchData();

        if($resFetchCrit1){
            while($row1=$resFetchCrit1->fetch()){
                if($row1['crit_criteria'] == $rowQuest['quest_crit']){
                    ?>
                        <option value="<?=$row1['crit_criteria']?>" selected><?=$row1['crit_criteria']?></option>
                    <?php
                } else {
                    ?>
                        <option value="<?=$row1['crit_criteria']?>"><?=$row1['crit_criteria']?></option>
                    <?php
                }
            }
        }
    
?>

</select>
<br><br>
<label>Question</label>
<textarea name="quest" cols="30" rows="4" class="form-control" required=""><?=$rowQuest['quest_question']?></textarea>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="editQuest" class="btn btn-success">Save</button>
</div>
</form>
</div>
</div>
</div>
<!--Close Modal-->


<!-- Modal Delete-->
<div class="modal fade" id="deleteQuest<?=$rowQuest['quest_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="function" value="deleteQuest">
					<input type="hidden" name="delete_quest" value="<?=$rowQuest['quest_id']?>">  
					<p>Are you sure to delete ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="deleteQuest"class="btn btn-danger">Delete</button>
				</div>
			</form>
		
</div>
</div>
</div>