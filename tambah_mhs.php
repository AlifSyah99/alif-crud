<?php
    include dirname(__FILE__).'/koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- card -->
        <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3 border-primary">
          <p class="text-black fs-5 mb-0">Tambah Data Mahasiswa</p>
          </div>

          <div class="card-body border-top ">
            <!-- from -->
            <form action="" method="post" class="mx-auto p-3">
            <?php
                    if(isset($_POST['tambah'])){
                      $nim = $_POST['nim'];
                      $nama = $_POST['nama'];
                      $jurusan = $_POST['jurusan'];
                      $kelas = $_POST['kelas'];
                      $alamat = $_POST['alamat'];
                      $telepon = $_POST['telepon'];
                      $dosen = $_POST['dosen'];
                      
                        $sqlGet = "SELECT * From mahasiswa WHERE nim = $nim";
                        $queryGet = $conn->query($sqlGet);
                        $count = mysqli_num_rows($queryGet);
                        if($count>0){
                          echo"<div class='alert alert-danger'>Nim : $nim Sudah Ada </div>";
                  
                        }else{
                          $sqlInsert = "INSERT INTO mahasiswa (nim,nama,id_jurusan,id_kelas,alamat,telepon,id_dosen)
                                        values ('$nim','$nama','$jurusan','$kelas','$alamat','$telepon','$dosen')";
                          $queryInsert = $conn->query($sqlInsert);
                          echo"<div class='alert alert-success'>Berhasil Disimpan </div>";
                        }
                        
                      }
                    
                    ?>
                <!-- row grip -->
                <div class="row">
                    <!-- col1 -->
                      <div class="col">
                        <div class="mb-2">
                          <label for="nim" class="form-label">NIM</label>
                          <input type="text" class="form-control" name="nim" id="nim" placeholder="201xxx" required>
                        </div>
        
                      <div class="mb-2">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>

                        <div class="mb-2">
                          <label for="jurusan" class="form-label">Jurusan</label>
                          <select class="form-select"name="jurusan" id="jurusan" required>
                            <option >Pilih Jurusan</option>
                            <?php
                                $sql = "select * from jurusan";
                                $data = mysqli_query($conn,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="mb-2">
                          <label for="kelas" class="form-label">Kelas</label>
                          <select class="form-select"name="kelas" id="kelas" required>
                            <option >Pilih Kelas</option>
                            <?php
                                $sql = "SELECT * from kelas";
                                $data = mysqli_query($conn,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                                <?php endforeach?>
                            </select>
                        </div>

                      </div>
                      <!-- end col1 -->
                      <!-- col2 -->
                      <div class="col">
                      <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <textarea class="form-control" name="alamat"id="alamat" rows="4" placeholder="jln.xxx" required></textarea>
                        </div>

                        <div class="mb-2">
                          <label for="telepon" class="form-label">Telepon</label>
                          <input type="text" class="form-control" name="telepon" id="telepon" placeholder="021xx" required>
                        </div>
                        <div class="mb-2">
                          <label for="dosen" class="form-label">Dosen</label>
                          <select class="form-select"name="dosen" id="dosen" required>
                            <option >Pilih Dosen</option>
                            <?php
                                $sql = "select * from dosen";
                                $data = mysqli_query($conn,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama']?> </option>
                                <?php endforeach?>
                            </select>

                      </div>
                </div>
                <!-- end row -->
                <div class="border-top border-2 mt-3 ">
                       <div class="container d-flex mt-2">
                          <a href="master.php" class="btn btn-secondary mx-auto me-2">Tutup</a>
                          <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Data">
                      </div>
                </div> 
            </form>
            <!-- end form -->
          </div>
          <!-- end body -->
        </div>
<!-- end card -->
    
     
    </body>

    <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
        </script>
    </html>