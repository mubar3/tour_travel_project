<?php
error_reporting(1);
include "../../assets/config/koneksi.php";
include "../../assets/phpqrcode/qrlib.php";

	// $fileName = $_FILES['gambar']['name'];
 	//        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/user/".$_FILES['gambar']['name']);

		$query2 = "select * from kabupaten where id_kab = '".$_POST['kabupaten']."'";
		$dtKab=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		// echo $query2."<br>";
		
		$kab = $dtKab["id_kab_kartanu"];
		
		$query2 = "select * from kecamatan where id_kec = '".$_POST['kecamatan']."'";
		$dtKec=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		// echo $query2."<br>";
		
		$query2 = "select * from kelurahan where id_kel = '".$_POST['kelurahan']."'";
		$dtKel=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		// echo $query2."<br>";
		
		$query2 = "select * from mwcu where upper(kec) = '".strtoupper($dtKec["nama_kecamatan"])."' and upper(ranting) = '".strtoupper($dtKel["nama_kelurahan"])."'";
		$dtNO=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		// echo $query2."<br>";
		
		$kd = $dtNO["kd"];
		$ranting_kode = $dtNO["ranting_kode"];
		
		$nobaru = $kab.".".$kd.".".$ranting_kode;
		// print_r($nobaru);
		// die();

	$query = mysqli_query($koneksi, "SELECT * FROM userr WHERE email='$_POST[email]' ");

	if(mysqli_num_rows($query) == 1){
	    echo "<script>window.alert('Email Sudah Dipakai!');
            window.location='../create-data-admin'</script>";
	  }
	 else{

	$fileName = $_FILES['gambar']['name'];
	$file_ext = substr($fileName, strripos($fileName, '.'));
	$fileName = $_POST["email"]. $_POST["admin"]. $file_ext;
	$move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/admin/".$fileName);
        date_default_timezone_set('Asia/Jakarta');
    	$tgl = date("Y-m-d");
    	$time = date("G:i:s");

    		// session_start();
    		// print_r($_SESSION['id']);
		// $pasword="12345";
		$pass=md5($_POST["pass"]);

		if($move) {
			$tbField[0] = "gambar";
			$tbField[1] = "nama";
			$tbField[2] = "hp";
			$tbField[3] = "alamat";
			$tbField[4] = "rt";
			$tbField[5] = "rw";
			$tbField[6] = "id_prov";
			$tbField[7] = "id_kab";
			$tbField[8] = "id_kec";
			$tbField[9] = "id_kel";
			$tbField[10] = "email";
		
			$tbField[11] = "tgl_input";
			$tbField[12] = "waktu";
			$tbField[13] = "id_level";
			$tbField[14] = "password";
			$tbField[15] = "no_anggota";
			

			$tbIsi[0] = "'".$fileName."'";
			$tbIsi[1] = "'".$_POST["nama"]."'";
			$tbIsi[2] = "'".$_POST["hp"]."'";
			$tbIsi[3] = "'".$_POST["alamat"]."'";
			$tbIsi[4] = "'".$_POST["rt"]."'";
			$tbIsi[5] = "'".$_POST["rw"]."'";
			
			$tbIsi[6] = "'".$_POST["provinsi"]."'";
			$tbIsi[7] = "'".$_POST["kabupaten"]."'";
			$tbIsi[8] = "'".$_POST["kecamatan"]."'";
			$tbIsi[9] = "'".$_POST["kelurahan"]."'";
			$tbIsi[10] = "'".$_POST["email"]."'";
			$tbIsi[11] = "'".$tgl."'";
			$tbIsi[12] = "'".$time."'";
			$tbIsi[13] = "'".$_POST["admin"]."'";
			$tbIsi[14] = "'".$pass."'";
			$tbIsi[15] = "'".$nobaru."'";
			
			$nmField = compile_array($tbField);
			$isiField = compile_array($tbIsi);

			$exe = _ins("userr",$nmField,$isiField,0);
	
            // input data ke tabel kartamus  
            mysqli_query($koneksi, $exe);

			$sql = mysqli_query($koneksi, "SELECT * FROM tb_properti ORDER BY id");
			// while($row=mysqli_fetch_array($sql)) {
			// 	if(isset($_POST["nilai".$row['id']]) && $_POST["nilai".$row['id']]) {
			// 		$query = "INSERT INTO user_properti (no_anggota,properti,nilai,ket) values ('".$_POST["a"]."',".$row['id'].",'".$_POST["nilai".$row['id']]."','".$_POST["cttn".$row['id']]."')";
			// 		mysqli_query($koneksi, $query);
			// 	}
			// }

            // input data ke tabel kartanu
            // mysqli_query($koneksi, "INSERT INTO users (gambar, no_anggota, idbanom, nik, nama, jabatan, masa_b1, masa_b2, jenjang, tmp_lhr, tgl_lhr, jk, alamat, id_prov, id_kab, 
			// id_kec, id_kel, hp, email, status_kawin, pendidikan, pekerjaan, kemampuan, bpjs, tgl_input, waktu, qrcodee, id_level, username, password) 
			// VALUES ('$fileNama', '$_POST[a]', '$_POST[banom]', '$_POST[b]', '$unama', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[jk]', 
			// '$j', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$_POST[o]', '$_POST[p]', '$_POST[q]', '$_POST[r]', '$_POST[s]', '$_POST[t]', '$_POST[u]', '$tgl', '$time', '$nameqrcodee', '$level', '$_POST[user]', '$id')");
            echo "<script>window.alert('Data Berhasil di Input!');
            window.location='../view-data-admin'</script>";
		}else{
            echo "<script>window.alert('Foto Tidak Ada!');
            window.location='../view-data-admin'</script>";
		}

	}

?>