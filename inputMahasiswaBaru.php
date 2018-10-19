<body>
	<h1>Formulir</h1>
<form method="POST" action="halamanDataMahasiswa.php">
<table>
	<tr>
		<td>Nama </td>
		<td>:</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input type="radio" name="jk" value="laki-laki" checked>Laki-laki<br>
  		<input type="radio" name="jk" value="perempuan">Perempuan<br></td>
	</tr>
	<tr>
		<td>Program Studi</td>
		<td>:</td>
		<td><select name="prodi" required>
 			<option value="mi">D3 Manajemen Informatika</option>
  			<option value="mp">D3 Manajemen Pemasaran</option>
  			<option value="perhotelan">D3 Perhotelan</option>
  			<option value="tektel">D3 Teknik Telekomunikasi</option>
  			<option value="ka">D3 Komputerisasi Akutansi</option>
  			<option value="if">D3 Teknik Informatika</option>
  			<option value="ilkom">S1 Ilmu Komunikasi</option>
  			<option value="mbti">S1 Manajemen Bisnis Telekomunikasi Informatika</option>
			<option value="dkv">S1 Desain Komunikasi Visual</option>
			<option value="di">S1 Design Interior</option>
			<option value="sisfo">S1 Sistem Informasi</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>:</td>
		<td><select name="fakultas" required>
 			<option value="fit">FAKULTAS ILMU TERAPAN</option>
  			<option value="fik">FAKULTAS INDUSTRI KREATIF</option>
  			<option value="feb">FAKULTAS EKONOMI BISNIS</option>
  			<option value="fkb">FAKULTAS KOMUNIKASI BISNIS</option>
		</td>
	</tr>
	<tr>
		<td>Asal <br/>
			<td>:</td>
			<td><input type="text" name="asal"></td>
		</td>
	</tr>
	<tr>
		<td>Moto Hidup</td>
		<td>:</td>
		<td><textarea name="moto" rows="4" cols="50" ></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>

	</tr>

	<tr>
		
	</tr>
</table>
</form>
</body>

<?php 
	if(isset($_POST['submit'])){
		include("koneksiDB.php");
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		$asal = $_POST['asal'];
		$moto = $_POST['moto'];
		$status=true;


		if (!preg_match('/^[a-z A-Z]$/i', $nama) and strlen($nama)>25) {
			echo("Nama harus huruf dengan maksimal 25 karakter");
			$status=false;
		}
		if (!is_int($nim) and (strlen($nim)<10) or (strlen($nim)>10)) {
			echo("NIM harus angka dan 10 karakter");
			$status=false;
		}


		if($status){
			$sql=mysqli_query($koneksi,"INSERT INTO mahasiswa
				VALUES ( '$nama', $nim,'$jk', '$prodi', '$fakultas', '$asal', '$moto')");
		}

	}
	
 ?>