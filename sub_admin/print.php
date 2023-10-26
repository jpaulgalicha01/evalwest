<?php
include 'config/security.php';
include 'config/controller.php';

$criteria="";
$acad_year = $_GET['acad_year'];
$acad_sem = $_GET['acad_sem'];

$faculty_name = "";
include 'print_eval.php';
?>
<p style="page-break-after: always;"></p>
<?php
include 'print_com.php';
?>


<br><br><br><br><br><br><br>
 <footer class="pt-5">
                <div class="container my-auto">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 500px;">
                                        <p class="text-center"><?=$_SESSION['name_user']?></p>
                                        <hr style="width:300px;">
                                        <div class="text-center"><b>Prepared By</b></div>
                                </th>
                                <th style="width: 500px;">
                                        <p class="text-center">Marlyn Rivera Ph.D</p>
                                        <hr style="width:300px;">
                                        <div class="text-center"><b>Recieved By</b></div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    
                </div>
    </footer>
<!-- End of Footer -->


 <script>
window.print('pdf');
window.onafterprint = function(event) {
window.close();
};
</script> 


<?php
include 'includes/scripts.php';
?>