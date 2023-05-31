<!DOCTYPE html>
<html>
<head>
    <title>Form Kredit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    // membuat instance
    $datakredit = new kredit;
    // aksi tampil data
    if ($_GET['aksi'] == 'tampil') {
        // aksi untuk tampil data
        $html = null;
        $html .= '<div class="container">';
        $html .= '<h3 class="mt-4">Form Kredit</h3>';
        $html .= '<p>Berikut ini data kredit</p>';
        $html .= '<table class="table table-bordered">';
        $html .= '<thead class="thead-dark">';
        $html .= '<tr>
<th>No.</th>
<th>id_produk</th>
<th>Nama_pembeli</th>
<th>Tanggal</th>
<th>Alamat</th>
<th>nama_produk</th>
<th>harga_produk</th>
<th>jumlah_produk</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $datakredit->tampil();
$no=null;
if(isset($data)){
foreach($data as $bariskredit){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$bariskredit->id_produk.'</td>
<td>'.$bariskredit->nama_pembeli.'</td>
<td>'.$bariskredit->tanggal.'</td>
<td>'.$bariskredit->alamat.'</td>
<td>'.$bariskredit->nama_produk.'</td>
<td>'.$bariskredit->harga_produk.'</td>
<td>'.$bariskredit->jumlah_produk.'</td>
<td>
<a href="index.php?file=kredit&aksi=edit&id_produk='.$bariskredit->id_produk.'">Edit</a>
<a href="index.php?file=kredit&aksi=hapus&id_produk='.$bariskredit->id_produk.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=kredit&aksi=simpan">';
$html .='<p>Nomor kredit<br/>';
$html .='<input type="text" name="txtid_produk"placeholder="Masukan No. kredit" autofocus/></p>';
$html .='<p>Nama Pembeli<br/>';
$html .='<input type="text" name="txtNama"placeholder="Masukan Nama Pembeli" size="30" required/></p>';
$html .='<p>Tanggal<br/>';
$html .='<input type="date" name="txtTanggal"required/></p>';
$html .='<p>Alamat<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukanalamat lengkap" cols="50" rows="5" required></textarea></p>';
$html .='<p>Nama produk<br/>';
$html .='<input type="text" name="txtNama_produk"placeholder="Masukan Nama Produk" size="30" required/></p>';
$html .='<p>Harga produk<br/>';
$html .='<input type="text" name="txtHarga_produk"placeholder="Masukan Harga Produk" autofocus/></p>';
$html .='<p>Jumlah Produk<br/>';
$html .='<input type="text" name="txtJumlah_produk"placeholder="Masukan jumlah_produk produk" autofocus/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_produk'=>$_POST['txtid_produk'],
'nama_pembeli'=>$_POST['txtNama'],
'tanggal'=>$_POST['txtTanggal'],
'alamat'=>$_POST['txtAlamat'],
'nama_produk'=>$_POST['txtNama_produk'],
'harga_produk'=>$_POST['txtHarga_produk'],
'jumlah_produk'=>$_POST['txtJumlah_produk']
);
// simpan siswa dengan menjalankan method simpan
$datakredit->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=kredit&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data kredit
$kredit=$datakredit->detail($_GET['id_produk']);
if($kredit->nama_produk ==''); 
else {
$pilihP='checked'; $pilihL =null; }
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=kredit&aksi=update">';
$html .='<p>Nomor kredit<br/>';
$html .='<input type="text" name="txtid_produk"value="'.$kredit->id_produk.'"placeholder="Masukan No. kredit" autofocus/></p>';
$html .='<p>Nama Pembeli<br/>';
$html .='<input type="text" name="txtNama"value="'.$kredit->nama_pembeli.'"placeholder="Masukan Nama Pembeli" size="30" required/></p>';
$html .='<p>Tanggal<br/>';
$html .='<input type="date" name="txtTanggal"value="'.$kredit->tanggal.'"required/></p>';
$html .='<p>Alamat<br/>';
$html .='<textarea name="txtAlamat" value="'.$kredit->alamat.'"placeholder="Masukanalamat lengkap" cols="50" rows="5" required></textarea></p>';
$html .='<p>Nama produk<br/>';
$html .='<input type="text" name="txtNama_produk"value="'.$kredit->nama_produk.'"placeholder="Masukan Nama Produk" size="30" required/></p>';
$html .='<p>Harga produk<br/>';
$html .='<input type="text" name="txtHarga_produk"value="'.$kredit->harga_produk.'"placeholder="Masukan Harga Produk" autofocus/></p>';
$html .='<p>Jumlah Produk<br/>';
$html .='<input type="text" name="txtJumlah_produk"value="'.$kredit->jumlah_produk.'"placeholder="Masukan jumlah produk" autofocus/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {
$data=array(
'id_produk'=>$_POST['txtid_produk'],
'nama_pembeli'=>$_POST['txtNama'],
'tanggal'=>$_POST['txtTanggal'],
'alamat'=>$_POST['txtAlamat'],
'nama_produk'=>$_POST['txtNama_produk'],
'harga_produk'=>$_POST['txtHarga_produk'],
'jumlah_produk'=>$_POST['txtJumlah_produk']
);
$datakredit->update($_POST['txtid_produk'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=kredit&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$datakredit->hapus($_GET['id_produk']);
echo '<meta http-equiv="refresh" content="0;url=index.php?file=kredit&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>    