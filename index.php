<?php
include dirname(__FILE__).'/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD | Mahasiswa</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

  <section class="section--login" style="width:100%;" >
      <div class="card container--login mx-auto shadow">
          <div class="card-header bg-light">
            <!-- <div class="icon--wrapper">
            <i class="icon fa-solid fa-circle-user fa-5x"></i>
            </div> -->
            <h3 class=" text-center"> Log In</h3>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <label for="username" class="form-label ">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
              <label for="password" class="form-label">password</label>
              <input type="password"  class="form-control mb-3" name="password" id="password" placeholder="Enter password" required>
              <input type="submit" name="submit" value="Login" class="btn btn-dark mt-3 mb-3 w-100">
              <?php
                  if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
               
                      $sqlGet = "Select * from user WHERE username = '$username' and password = '$password'";
                      $queryGet= $conn->query($sqlGet);
                      $count = mysqli_num_rows($queryGet);
                      if($count>0){
                        echo"<script> window.location.href='master.php';</script>" ;
                      }else{
                        echo"<div class='alert alert-danger'>Username atau password salah </div>";
                      }

                    
                  }
              ?>
            </form>
  
          </div>
      </div>

  </section>

</body>
<script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
        </script>
</html>