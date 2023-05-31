<!DOCTYPE html>
<html lang="en">
<head>
<title>Data KREDIT</title>
<link rel="stylesheet" href="Index.php">
</head>
<body>
<?php
include('class/Database.php');
include('class/Kredit.php');
?>
<center><h1>Aplikasi kredit</h1></center>
<hr/>
<p> <center>
<a href="index.php">Home</a>
<a href="index.php?file=kredit&aksi=tampil">Data kredit</a>
<a href="index.php?file=kredit&aksi=tambah">Tambah Data kredit</a>
</p> </center>
<hr/>
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang</h1>';
}
?>
</body>
</html>