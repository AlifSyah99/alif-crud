<?php
    include dirname(__FILE__).'/koneksi/koneksi.php';
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa where nim=$nim";
    $query = $conn->query($sql);
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Update</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- card -->
        <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3 border-primary" >
          <p class="text-black fs-5 mb-0">Update Data Mahasiswa</p>
          </div>

          <div class="card-body border-top">
            <!-- from -->
            <form action="" method="post" class="mx-auto p-3">
              <!-- row drid -->
            <div class="row">

              <div class="col">
                <div class="mb-2">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $data['nim']?>" readonly >
                </div>
 
               <div class="mb-2">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo$data['nama'] ?>" required>
                </div>

                <div class="mb-2">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <select class="form-select"name="jurusan" id="jurusan" required>
                    <?php
                         $sql = "select * from jurusan";
                         $dataJurusan = mysqli_query($conn,$sql);
                         $no =(int) 1;
                         foreach($dataJurusan as $rows ) : ?>
                         <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                         <?php endforeach?>
                    </select>
                </div>

                <div class="mb-2">
                  <label for="kelas" class="form-label">Kelas</label>
                  <select class="form-select"name="kelas" id="kelas" required>
                    <?php
                         $sql = "select * from kelas";
                         $dataJurusan = mysqli_query($conn,$sql);
                         $no =(int) 1;
                         foreach($dataJurusan as $rows ) : ?>
                         <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                         <?php endforeach?>
                    </select>
                </div>
              </div>
              <!-- end col1 -->

              <div class="col">
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea type="text" class="form-control" rows="4" name="alamat" id="alamat" required><?php echo$data['alamat'] ?></textarea>
                </div>

                <div class="mb-2">
                  <label for="telepon" class="form-label">Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $data['telepon']?>" required>
                </div>

                <div class="mb-2">
                  <label for="dosen" class="form-label">Dosen</label>
                  <select class="form-select"name="dosen" id="dosen" required>
                    <?php
                         $sql = "select * from dosen";
                         $dataDosen = mysqli_query($conn,$sql);
                         $no =(int) 1;
                         foreach($dataDosen as $rows ) : ?>
                         <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                         <?php endforeach?>
                    </select>
                </div>
            </div>
            <!-- end row -->
            <div class="border-top border-2 mt-3 ">
              <div class="container d-flex mt-2">
                  <a href="master.php" class="btn btn-secondary mx-auto me-2">Tutup</a>
                  <input type="submit" class="btn btn-primary" name="update" value="Ubah Data">
              </div>
                  
            </div>
              <!-- end container tombol -->
            </form>   
        
          </div>
        </div>
<!-- end card -->

    </body>
    <?php
        if(isset($_POST['update'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $jurusan = $_POST['jurusan'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $dosen = $_POST['dosen'];

                $sql = "UPDATE mahasiswa set nama='$nama',id_jurusan=$jurusan,id_kelas=$kelas,alamat='$alamat',telepon='$telepon',
                        id_dosen=$dosen WHERE nim='$nim'";
                $queryUpdate = mysqli_query($conn,$sql);
                echo"<script> window.location.href='master.php';</script>";
              }

    ?>
    <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
    </script>
</html>