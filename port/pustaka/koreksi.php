<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Pustakawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    footer{
      background-color: rgb(107, 229, 210);
      margin-top: -285px;
      height: 300px;
    }
    .bot{
  width: 381px;
  height: 200px;
  position: relative;

  
  margin-left: 71.5%;
  background-color: lightgreen;
  top: -50px;
  text-align: center;
}
.bot2{
  text-align: center;
  width: 575px;
  height: 200px;
  position: relative;
  top: 166px;
  margin-left: 29%;

  background-color: lightblue;
}
.bot3{
  text-align: center;
  width: 389px;
  height: 200px;
  position: relative;
  top: -266px;

  background-color: lightgreen;
}
.heder{
  width: cover;
  height: 80px;
  text-align: center;
  background-color: rgb(107, 229, 210);

}
.text{
  font-family: sans-serif;
  font-size: 50px;
  font-color:  lightred;
  text-shadow: 50px;
}
.samping{
  width: 700px;
  height: 100%;
  font-color: lightgreen;

}
  </style>
  </head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="landing/index.php"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" href="daftar.php">Daftar Pustaka</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="input.php">Daftar</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="koreksi.php">Cari Daftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hapus.php">Hapus</a>
      </li> 
      <li class="nav-item">
        <div class="samping">
        <a class="nav-link"><marquee behavior="scroll" direction="left" onmouseover="stop()" onmouseout="start()"> Go Up And Never Stop</a></div></marquee>
      </li>      
    </ul>
  </div>  
</nav>

<div class="container">
  <br>  <br>
  <h2><center>Cari Daftar Pustaka</h2></center>
  <form method="post">
    <div class="form-group">
      <label for="namadikoreksi">Ketik Kode Pustaka</label>
      <input type="text" class="form-control" id="namadikoreksi" placeholder="Ketik kode pustaka" name="namadikoreksi">
    </div>
      <button type="submit" class="btn btn-primary" name="bkoreksi" onclick="return confirm('Apakah rekord dengan kata kunci yang terpilih dikoreksi ?')">Koreksi</button>
  </form>
</div>
</body>
</html>
<?php 
if (isset($_POST['bkoreksi'])) {
  $namadikoreksi=$_POST['namadikoreksi'];
  $koneksi=new mysqli("localhost","root","","perpustakaan");
  $sql="SELECT * FROM pustaka WHERE kodepustaka = '".$namadikoreksi."'";
  $q=$koneksi->query($sql);
  $rekord=$q->fetch_array();
  if (empty($rekord)) {
    echo "Rekord tidak ditemukan !";
    exit();
  } else {
    ?>
    <br><br> <br><br> 
<div class="container">
  <h2>Daftar Pustaka</h2><br>
  <form method="post">
    <div class="form-group">
      <label for="kodepustaka">Kode Pustaka</label>
      <input type="text" class="form-control" id="kodepustaka"  name="kodepustaka" value="<?php echo $rekord['kodepustaka'];?>" readonly>
    </div>
  <div class="form-group">
      <label for="judulpustaka">Judul Pustaka</label>
      <input type="text" class="form-control" id="judulpustaka"  name="judulpustaka" value="<?php echo $rekord['judulpustaka'];?>">
    </div>
   <div class="form-group">
      <label for="pengarang">Pengarang</label>
      <input type="text" class="form-control" id="pengarang" name="pengarang"
    value="<?php echo $rekord['pengarang'];?>">
    </div>
    <div class="form-group">
      <label for="penerbit">Penerbit</label>
      <input type="text" class="form-control" id="penerbit" name="penerbit"
    value="<?php echo $rekord['penerbit'];?>">
    </div>
    <div class="form-group">
      <label for="tahunterbit">Tahun Penerbitan</label>
      <input type="text" class="form-control" id="tahunterbit" name="tahunterbit"
    value="<?php echo $rekord['tahunterbit'];?>">
    </div>
  <br><br> 
   
    <?php
  } //end if empty
}
if (isset($_POST['bSimpan'])) {
  $kodepustaka=$_POST['kodepustaka'];
  $judulpustaka=$_POST['judulpustaka'];
  $pengarang=$_POST['pengarang'];
  $penerbit=$_POST['penerbit'];
  $tahunterbit=$_POST['tahunterbit'];
  $koneksi=new mysqli("localhost","root","","perpustakaan");
  $sql="UPDATE `pustaka` SET `kodepustaka` = '$kodepustaka', `judulpustaka` = '$judulpustaka',  `pengarang` = '$pengarang',  `penerbit` = '$penerbit',  `tahunterbit` = '$tahunterbit' WHERE `pustaka`.`kodepustaka` = '$kodepustaka';";
  $q=$koneksi->query($sql);
  if ($q) {
    echo "Rekord pustaka sudah tersimpan !";
  } else {
    echo "Rekord pustaka gagal tersimpan !";
  } 
}
?>


 <div >
    <p class="bot2"><br><u>Kontak</u><br><br>
     Email : ediyulianto166@gmail.com<br>
    No WA : 082282526021</p>
  <p class="bot"><u><br>Support</u><br>
    <br>
    W3school.com<br>
   Bootstrap.com<br>
  PHP.net</p>
  <p class="bot3"><u><br>Alamat</u><br><br>
    Kosan : Gerbang Belakang SMK N 4 Kota Bengkulu,<br> Jl. Enggano 6, Pasar Bengkulu, Kota Bengkulu<br><br>
  Rumah : Jl.RD II , Desa Suka Makmur, Kec. Marga Sakti Seblat, Kab. Bengkulu Utara, Bengkulu</p>
</div> 
<br>
<footer >
   <h2><center><font color="white">@2021 | Edi Yulianto</h2></center></font></center></h2>

   <table border="0" cellpadding="10" cellspacing="10" align="center" class="warna">
     <tr>
       <th colspan="4"><center><h5>About</h5></center></th colspan="2">
     </tr>
     <tr>
       <td width=""><img src="foto.png" width="100" height="100" border="1"></td>
       <td width="520" ><p><font>Nama  : Edi Yulianto</p>
              <p>NPM   : 1955201090</p>
            <p class="gas"><font size="2">Misi hidup saya untuk mencapai visi-visi saya adalah pertama dengan belajar sebaik<br>
             mungkin dalam perkuliahan sehingga ilmu yang saya miliki
              dapat digunakan di masa depan dan dapat membantu orang lain. </p></font>
            </td>
            <td width="100"></td>
            <td>
              <img src="tl.png" width="40" height="40">082282526021<br><br>
               <img src="em.png" width="40" height="40">ediyulianto166@gmail.com<br><br>
                <img src="yt.png" width="40" height="40">GakPunyaChanel<br>


     </tr>
   </table>
</footer>