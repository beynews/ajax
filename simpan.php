<?php 

    include('koneksi.php');
    
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$foto = $_POST['foto'];

    $insert = mysqli_query($connect, "INSERT INTO  data_siswa SET nama='$nama', jeniskelamin='$jeniskelamin', alamat='$alamat', agama='$agama',nohp='$nohp', email='$email', foto='$foto'");
    
?>
    