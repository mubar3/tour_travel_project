<?php
    error_reporting(0);
    include "../../assets/config/koneksi.php";
    include "../../assets/phpqrcode/qrlib.php";

   		
   		$data=$_POST['data'];
   		$id_lama=$_POST['id_lama'];

		// $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user ORDER by no_anggota DESC")); 
  //       $nb = $rr['no_anggota']+1;
  //       $noa = sprintf("%06s", $nb);

        $noa=$_POST['id_anggota_lama'];
		$nia_awal=substr($data['nik'],0,6);
		// $nobaru = $kab.".".$kd.".".$ranting_kode.".".$noa;
		// $nobaru = $data['id_prov'].$data['id_kab'].$data['jk'].$noa;
        $nobaru = $nia_awal.$data['jk'].$noa;

		

    $nameqrcode    = $nobaru.'.png';              //nama QR Code yang disimpan ke folder dan database
    $tempdir        = "../../assets/img/qrcode/";   // Nama Folder file QR Code kita nantinya akan disimpan
    // $isiqrcode     = $nobaru;
    $isiqrcode     = $server."data?id=".$nobaru;
    $quality        = 'H';
    $Ukuran         = 10;
    $padding        = 0;

    QRCode::png($isiqrcode,$tempdir.$nameqrcode,$quality,$Ukuran,$padding); // simpan qrcode

 
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $time = date("G:i:s");
    $level = ('3');

    // $noa = sprintf("%04s", $_POST['a']); // menggunakan nomor sampe 1000


     foreach($data as $k => $v) {
	         $field[] = "$k"."=".'"'.$v.'"';
		        }

			 $syntax=" UPDATE user SET ". implode(', ', $field)." ,qrcode='$nameqrcode',nokartanu='$nobaru'";
			 $where=" where id='$id_lama' ";


    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/user/".$_FILES['gambar']['name']);
        for($x=0;$x<20;$x++){
            if(filesize("../../assets/img/user/".$fileName)>50000)
            {resizer("../../assets/img/user/".$fileName, "../../assets/img/user/".$fileName, 70);}else{ break;}
            clearstatcache();
            }

        if($move)
        {$syntax=$syntax." ,gambar='$fileName' ";
        }
    }else{
        $fileName = $_POST["filegambar"];
	}

	if ($_FILES['ktp']['size'] != 0)
    {
        $fileNameKTP = $_FILES['ktp']['name'];
        $move = move_uploaded_file($_FILES['ktp']['tmp_name'], "../../assets/img/ktp/".$_FILES['ktp']['name']);
        for($x=0;$x<20;$x++){
            if(filesize("../../assets/img/ktp/".$fileName_ktp)>50000)
            {resizer("../../assets/img/ktp/".$fileName_ktp, "../../assets/img/ktp/".$fileName_ktp, 70);}else{ break;}
            clearstatcache();
            }
            
        if($move)
        {$syntax=$syntax." ,ktp='$fileNameKTP' ";
        }
    }else{
        $fileNameKTP = $_POST["ktp_lama"];
	}
        $syntax=$syntax.$where;

        // print_r($syntax);
        // die();

        $sql=mysqli_query($koneksi, $syntax);
			


			echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data'</script>";


function resizer ($source, $destination, $size, $quality=null) {
// $source - Original image file
// $destination - Resized image file name
// $size - Single number for percentage resize
// Array of 2 numbers for fixed width + height
// $quality - Optional image quality. JPG & WEBP = 0 to 100, PNG = -1 to 9
 
  // (A) FILE CHECKS
  // Allowed image file extensions
  $ext = strtolower(pathinfo($source)['extension']);
  if (!in_array($ext, ["bmp", "gif", "jpg", "jpeg", "png", "webp"])) {
    throw new Exception('Invalid image file type');
  }
 
  // Source image not found!
  if (!file_exists($source)) {
    throw new Exception('Source image file not found');
  }

  // (B) IMAGE DIMENSIONS
  $dimensions = getimagesize($source);
  $width = $dimensions[0];
  $height = $dimensions[1];

  if (is_array($size)) {
    $new_width = $size[0];
    $new_height = $size[1];
  } else {
    $new_width = ceil(($size/100) * $width);
    $new_height = ceil(($size/100) * $height);
  }

  // (C) RESIZE
  // Respective PHP image functions
  $fnCreate = "imagecreatefrom" . ($ext=="jpg" ? "jpeg" : $ext);
  $fnOutput = "image" . ($ext=="jpg" ? "jpeg" : $ext);

  // Image objects
  $original = $fnCreate($source);
  $resized = imagecreatetruecolor($new_width, $new_height); 

  // Transparent images only
  if ($ext=="png" || $ext=="gif" || $ext=="jpg") {
    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    imagefilledrectangle(
      $resized, 0, 0, $new_width, $new_height,
      imagecolorallocatealpha($resized, 255, 255, 255, 127)
    );
  }

  // Copy & resize
  imagecopyresampled(
    $resized, $original, 0, 0, 0, 0, 
    $new_width, $new_height, $width, $height
  );

  // Correct image orientation
$exif = exif_read_data($source);
if ($exif && isset($exif['Orientation'])) {
  $orientation = $exif['Orientation'];
  switch ($orientation) {
    case 1:
      // no rotation necessary
      break;

    case 3: 
      $resized = imagerotate($resized,180,0);
      break;
                               
    case 6: 
      $resized = imagerotate($resized,270,0);
      break;
                   
    case 8: 
      $resized = imagerotate($resized,90,0);  
      break;
  }
}

  // (D) OUTPUT & CLEAN UP
  if (is_numeric($quality)) {
    $fnOutput($resized, $destination, $quality);
  } else {
    $fnOutput($resized, $destination);
  }
  imagedestroy($original);
  imagedestroy($resized);
}

?>
