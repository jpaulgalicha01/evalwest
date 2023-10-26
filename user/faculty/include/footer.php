<!-- Profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-xl-4 col-lg-4 col-12 text-center">
          <img src="../../uploads/<?=$_SESSION['user_img']?>" width="100" height="100" style="border-top-left-radius: 50% 50%; border-top-right-radius: 50% 50%; border-bottom-right-radius: 50% 50%; border-bottom-left-radius: 50% 50%;">
        </div>
        <div class="col-xl-8 col-lg-8 col-12 text-xl-start text-lg-start text-center">
          <p>Name: <?=$_SESSION['user_name']?></p>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<footer class="p-2 footer" style="position:relative">
      <p><a href="https://web.facebook.com/westhimamaylan/?_rdc=1&_rdr" target="_blank"  class="text-black">West Visayas State University</a> - HCC © Eval-West 2022-2023</p>
  </footer>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>