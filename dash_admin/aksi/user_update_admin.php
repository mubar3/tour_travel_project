<?php

    error_reporting(0);
    include "../../assets/config/koneksi.php";
    include "../../assets/phpqrcode/qrlib.php";

    session_start();


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
 

    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $time = date("G:i:s");

    if ($_FILES['gambar']['size'] != 0)
    {
    	$query2 = "select * from userr where id = '$_POST[id]' ";
        $LOCIMAGE=mysqli_fetch_array(mysqli_query($koneksi, $query2));
        
        $kd = $LOCIMAGE["gambar"];
        $loc="../../assets/img/admin/".$kd;
        unlink($loc);

		$fileName = $_FILES['gambar']['name'];
		$file_ext = substr($fileName, strripos($fileName, '.'));
		$fileName = $_POST["email"]. $_POST["admin"]. $file_ext;
		$move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/admin/".$fileName);
        if($move)
        {
        }
    }else{
        $fileName = $_POST["filegambar"];
	}
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
			$tbField[14] = "no_anggota";
			if(!empty($_POST["pass"])){
			$tbField[15] = "password";
			}

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
			$tbIsi[14] = "'".$nobaru."'";
			if(!empty($_POST["pass"])){
			$pass=$_POST["pass"];
			$password=md5($pass);
			$tbIsi[15] = "'".$password."'";
			}
					
			
			$nmField = compile_array($tbField);
			$isiField = compile_array($tbIsi);

			$compileSet = compile_array2($tbField,$tbIsi);

			$exe = _upd("userr",$compileSet,"id",$_POST["id"],0);
			// print_r($exe);
			// die();
	
            // input data ke tabel kartamus  
            mysqli_query($koneksi, $exe);

			//delete
			// $query = "delete from user_properti where no_anggota = '".$_POST["a"]."'";
			// mysqli_query($koneksi, $query);

			// $sql = mysqli_query($koneksi, "SELECT * FROM tb_properti ORDER BY id");
			// while($row=mysqli_fetch_array($sql)) {
			// 	if(isset($_POST["nilai".$row['id']]) && $_POST["nilai".$row['id']]) {
			// 		$query = "INSERT INTO user_properti (no_anggota,properti,nilai,ket) values ('".$_POST["a"]."',".$row['id'].",'".$_POST["nilai".$row['id']]."','".$_POST["cttn".$row['id']]."')";
			// 		mysqli_query($koneksi, $query);
			// 	}
			// }

            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data-admin'</script>";
?>
