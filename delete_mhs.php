<?php
include dirname(__FILE__).'/koneksi/koneksi.php';
  $nim = $_GET['nim'];
  $sql = "DELETE FROM mahasiswa where nim=$nim";
  mysqli_query($conn,$sql);
  header("Location: master.php");
?>