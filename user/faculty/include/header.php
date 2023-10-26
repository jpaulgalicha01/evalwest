<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
            .upload{
                width: 150px;
                position: relative;
                margin: auto;
                }

                .upload img{
                border-radius: 50%;
                border: 6px solid #DCDCDC;
                }

                .upload .round{
                position: absolute;
                bottom: 0;
                right: 0;
                background: #1948b2;
                width: 32px;
                height: 32px;
                line-height: 33px;
                text-align: center;
                border-radius: 50%;
                overflow: hidden;
                }
                
        </style>
  </head>

  <body>
 
  <nav class="navbar navbar-expand-lg" style="background-color:#1948b2">
  <div class="container-fluid">
    <div class="navbar-brand ">
        <img src="../../img/log-user.png" width="170" height="60">
    </div>

    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php#about-us">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i>(<?=$_SESSION['user_name']?>)</i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
