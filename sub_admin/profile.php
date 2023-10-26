<?php
include 'config/security.php';
include 'config/controller.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow h-100 py-3">

                <div class="text-center">
                        <div class="col-12">
                        <?php
                            $profile = new user_info();
                            $result_profile = $profile->userInfo();

                            if($result_profile){
                                $row = $result_profile->fetch();
                                ?>
                                    <div class="upload">
                                        <img src="../uploads/<?=$row['acc_img']?>" width = 100% height = 100% >
                                    </div>
                                <?php
                            }
                        ?>
                            
                        </div>
                </div>

                <div class="text-center p-4 d-flex justify-content-center">
                    <form action="inputConfig.php" method="POST" enctype="multipart/form-data">
                            <div class="custom-file">
                                <input type="hidden" name="function" value="change_image" >
                                <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>" >
                            <input type="file" name="image" accept=".jpg, .jpeg, .png" class="form-control-file">
                            </div>
                            <div class="py-3">
                                <button class="btn btn-primary form-control" name="change_image" type="submit">Upload</button>
                            </div>
                            
                    </form>
                </div>

                <?php
                    $profile = new user_info();
                    $result_profile = $profile->userInfo();

                    if($result_profile){
                        $row = $result_profile->fetch();
                        ?>
                        <form action="inputConfig.php" method="post">
                            <div class="row p-5">
                                <input type="hidden" name="function" value="edit_info">
                                <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>" >
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <label for="">Name:</label>
                                    <input type="text" name="user_name" class="form-control" value="<?=$row['acc_name']?>">
                                    
                                    <label for="">Username:</label>
                                    <input type="text" class="form-control" name="user_uname" value="<?=$row['acc_uname']?>">
                                    <label for="">Email Address:</label>
                                    <input type="text" class="form-control" name="user_email" value="<?=$row['acc_email']?>">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <label for="">New Password:</label>
                                    <input type="text" class="form-control" name="user_npass">

                                    <div class="py-2 text-justify text-right">
                                        <button type="submit" name="edit_info" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <?php
                    }
                ?>

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