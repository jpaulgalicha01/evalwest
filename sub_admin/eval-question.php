<?php
ob_start();
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';

$checkCrit = new fetchCriteria();
$res_check = $checkCrit->fetchData();

    if($res_check==0){
       ?>
        <script>
            window.alert("Please Fill in Criteria Page");
            window.location.href="eval-criteria.php";
        </script>
       <?php
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800 pt-2">Questionniare List</h1> <br>

<div class="row">

<div class="col-md-4">
<div class="card card-info card-primary">
<div class="card shadow mb-1">
<div class="card-body">
	<div class="card-header bg-gradient-primary text-gray-300 rounded">
	<b class="text-white">Question Form</b>
	</div>  
<div class="card-body">
	<form action="inputConfig.php" method="POST">
	<div class="form-group">

	<label>Criteria</label>
    <input type="hidden" name="function" value="addQuest">
	<select  class="custom-select custom-select-sm select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="criteria" required>
		<?php
            $fetchCrit = new fetchCriteria();
            $resFetchCrit = $fetchCrit->fetchData();

            if($resFetchCrit){
                ?>
                    <option selected disabled class="text-center" value="">-- Please Select Here --</option>
                <?php
                foreach($resFetchCrit as $row){
                    ?>
                        
                        <option value="<?=$row['crit_criteria']?>"><?=$row['crit_criteria']?></option>
                    <?php
                }
            }
        ?>

	</select>


		<div class="form-group">
		<label class="pt-1">Question</label>
		<textarea name="question" cols="30" rows="4" class="form-control" required=""></textarea>
		</div>
	</div>
	<div class="card-footer">
	<div class="d-flex justify-content-end">
		<div>
			<button type="reset" title="Reset Form" class="btn btn-sm btn-danger bg-gradient-danger"><i class="fa fa-undo" aria-hidden="true"></i></button>
		<button type="submit" title="Add Question" name="addQuest" class="btn btn-sm btn-primary btn-flat bg-gradient-primary mx-1"><i class="fa fa-check" aria-hidden="true"></i></button>
		</div>
	</div>
	</div>
</form>
</div>
</div>
</div>
</div>
</div>


<div class="col-md-8">
<div class="card card-outline card-info">
<div class="card shadow mb-1">
<div class="card-body">
<div class="table-responsive">
<div class="card-header bg-gradient-primary text-gray-300 rounded">


<b class="text-white">Questionniare for Evaluation</b>

</div>

<div class="card-body">
<fieldset class="border border-primary p-2 w-100">
<legend class="w-auto">Rating Legend</legend>
<table style="font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr class="text-center">
    <th>Scale</th>
    <th>Descriptive Rating</th>
  </tr>
  <tr class="text-center">
    <td>5</td>
    <td>Outstanding</td>
  </tr>
  <tr class="text-center">
    <td>4</td>
    <td>Very Satisfactory</td>
  </tr>
  <tr class="text-center">
    <td>3</td>
    <td>Satisfactory</td>
  </tr>
  <tr class="text-center">
    <td>2</td>
    <td>Fair</td>
  </tr>
  <tr class="text-center">
    <td>1</td>
    <td>Poor</td>
  </tr>
</table>
</fieldset><br>
</div>

<table class="table table-hover">
    <?php
        $fetchCrit = new fetchCriteria();
        $resFetchCrit = $fetchCrit->fetchData();

        if($resFetchCrit){
            while($row=$resFetchCrit->fetch()){
            ?>
                <thead>
                    <tr class="bg-gray-800 text-gray-300">
                        <th colspan="2"><?=$row['crit_criteria']?></span></th>
                </thead>

                <tbody class="tr-sortable ui-sortable">

                        
                <?php
                    $fethcQuest = new fetchQuest();
                    $resQuest = $fethcQuest->fetchData();

                    if($resQuest){
                        while($rowQuest=$resQuest->fetch()){
                            if($rowQuest['quest_crit']===$row['crit_criteria'])
                            {
                            ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-outline-secondary btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="fa fa-edit"></span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editQuest<?=$rowQuest['quest_id']?>" >Manage</button>
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteQuest<?=$rowQuest['quest_id']?>">Delete</button>
                                            </div>
                                        </div>

                                        <small><?=$rowQuest['quest_question']?></small>
                                    </td>
                                </tr>
                            <?php
                                require 'modals/modalQuest.php';
                            }
                        }
                    }
                ?>

                        


                </tbody>    
            <?php
        }
    }?>
       
</table>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- /.content -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>