 <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><a href="https://www.facebook.com/westhimamaylan/?_rdc=1&_rdr" target="_blank">West Visayas State University - HCC</a> &copy; Eval-West 2022-2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Profile Info.</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body" >
<div class="form-group">

<?php
    $profile = new user_info();
    $result_profile = $profile->userInfo();

    if($result_profile){
        $row = $result_profile->fetch();
        ?>
        <div class="upload">
        <img src="../uploads/<?=$row['acc_img']?>"  width = 125 height = 125 title="<?=$row['acc_name']?>">
        </div>
        <label>Name</label><br>
        <input  type="text" disabled value="<?=$row['acc_name']?>" class="form-control rounded">
        <label>Username</label><br>
        <input  type="text" disabled value="<?=$row['acc_uname']?>" class="form-control rounded">
        <label>Email</label><br>
        <input  type="text" disabled value="<?=$row['acc_email']?>" class="form-control rounded">
        <?php
    }
?>

</div>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<a href="profile.php"><button class="btn btn-success">Update Profile</button></a>
</div>
</div>
</div>
</div> 
<!-- Close Modal  -->


    <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>


</body>

</html>
