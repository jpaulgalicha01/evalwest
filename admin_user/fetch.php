<?php
include 'security.php';

if(isset($_GET['getAdmin'])){
    if($_GET['getAdmin']=='all'){?>
                    <div class="d-flex justify-content-end pb-2">
                        <form action="pdf.php">
                            <input type="hidden" name="admin" value="<?php echo $_GET['getAdmin']?>">
                            <button type="submit" name="print" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</button>
                        </form>
                    </div>
            <div class="table-responsive">
                <?php
                $activity_run = mysqli_query($conn,"SELECT * FROM activity_log ORDER BY id DESC"); ?>

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
                <?php
                    if(mysqli_num_rows($activity_run)>0){
                        while ($res = mysqli_fetch_assoc($activity_run)){
                            echo"<tr><td>".$res['date']."</td>";
                            echo"<td>".$res['time']."</td>";
                            echo"<td>".$res['name']."</td>";
                            echo"<td>".$res['activity']."</td></tr>";
                    ?>
                <?php }}?>
                </tbody>
                </table>
            </div>
   <?php } 
    else{ ?>    
                    <div class="d-flex justify-content-end pb-2">
                        <form action="pdf.php">
                            <input type="hidden" name="admin" value="<?php echo $_GET['getAdmin']?>">
                            <button type="submit" name="print" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</button>
                        </form>
                    </div>
                <div class="table-responsive">
                <?php
                $activity_run1 = mysqli_query($conn,"SELECT * FROM activity_log WHERE name='".$_GET['getAdmin']."' ORDER BY id DESC "); ?>

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
                <?php
                    if(mysqli_num_rows($activity_run1)>0){
                        while ($res = mysqli_fetch_assoc($activity_run1)){
                            echo"<tr><td>".$res['date']."</td>";
                            echo"<td>".$res['time']."</td>";
                            echo"<td>".$res['name']."</td>";
                            echo"<td>".$res['activity']."</td></tr>";
                    ?>
                <?php }}?>
                </tbody>
                </table>
            </div>
    <?php }

}
?>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>
