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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <!-- container card -->
        <div class="card shadow mx-auto mt-3" style="width:85%">
          <div class="card-header bg-light border-top border-bottom-0 border-3 border-primary">
            <p class="text-black fs-5 mb-0">Data Mahasiswa</p></div>
          <div class="card-body border-top ">
            <!-- from -->
            <div class="container mt-3">
              <!-- judul -->
                <!-- end judul -->
                <!-- Button add nilai -->
                <a href="tambah_mhs.php" class="btn btn-primary mb-2"><i class="fa-solid fa-plus me-1"></i>Tambah</a>
                <!-- Table Data nilai -->
              <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Dosen</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM v_detail_mhs";
                            $data = mysqli_query($conn,$sql);
                            $no = (int) 1;
                            foreach($data as $rows ) : ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rows['nim']; $nim =$rows['nim'] ?></td>
                            <td><?php echo $rows['nama'] ?></td>
                            <td><?php echo $rows['nama_jurusan'] ?></td>
                            <td><?php echo $rows['nama_kelas'] ?></td>
                            <td><?php echo $rows['alamat'] ?></td>
                            <td><?php echo $rows['telepon'] ?></td>
                            <td><?php echo $rows['nama_dosen'] ?></td>
                            <td>
                            <?php
                              echo "<a href= 'update_mhs.php?nim=$nim' class='btn btn-warning btn-sm me-2' > <i class='fa-solid fa-pen-to-square me-1'></i>Update </a>";
                              echo "<a href= 'delete_mhs.php?nim=$nim' class='btn btn-danger btn-sm' > <i class='fa-solid fa-trash me-1' ></i> Delete </a>";
                              ?>
                            </td>
                          </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
    
            </div>
            
          </div>
        </div>
        <!-- end -->

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
        </script>
    </body>
    </html>
